<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

// class My_Controller extends CI_Controller {

// }

class Admin_Controller extends CI_Controller {

	protected $datatables = TRUE;
	protected $css = [];

	protected $css_cdn = [];

	protected $css_custom = ['Custom_CSS' => 'custom.css'];

	protected $js = [];

	protected $js_cdn = [];

	protected $js_custom = [];

	protected $title;

	protected $title_page;

	protected $page_name;

	protected $content;

	private $rights;

	public function __construct()
	{
		parent::__construct();

		if ( ! $this->session->userdata('user')) {	
			redirect(base_url('/admin/authorization/signin'));
		}

		$this->load->model('admin/right_model', 'right_model');
	}

	public function index()
	{
		$this->rights = $this->right_model->get_rights($this->page_name);
		if ($this->rights) {
			$this->session->set_userdata('rights', $this->rights);
		}
		else {
			$rights['right_create'] = 0;
			$rights['right_read'] = 0;
			$rights['right_update'] = 0;
			$rights['right_delete'] = 0;
			$this->session->set_userdata('rights', $rights);
		}

		if ($this->session->userdata('rights')->right_read == 0) {
			redirect(base_url('/admin/profile'));
		}

		$data['datatables'] = $this->datatables;
		$data['css'] = $this->css;
		$data['css_cdn'] = $this->css_cdn;
		$data['css_custom'] = $this->css_custom;
		$data['js'] = $this->js;
		$data['js_cdn'] = $this->js_cdn;
		$data['js_custom'] = $this->js_custom;
		$data['title'] = $this->title;
		$data['title_page'] = $this->title_page;
		$data['page_name'] = $this->page_name;
		$data['content'] = $this->content;
		$data['menu'] = $this->menu_model->get_menu();
		$data['rights'] = $this->rights;
		return $data;
	}

	public function get_rights()
	{
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			return $this->get_message_not_ajax();
		}

		if ( ! $this->session->userdata('rights')) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'data' => 'No session.'], JSON_UNESCAPED_UNICODE));
			return;
		}

		$this->output->set_output(json_encode(['status' => 'SUCCESS', 'rights' => $this->session->userdata('rights')], JSON_UNESCAPED_UNICODE));
	}

	public function get_data()
	{
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			return $this->get_message_not_ajax();
		}

		$edit = $this->input->post('icon_edit');
		$view = $this->input->post('icon_view');
		$delete = $this->input->post('icon_delete');
		$select_checkbox = $this->input->post('select_checkbox');

		if ($this->input->post('draw')) {
			$result = $this->crud_model->get_all_limit($this->input->post());
		}
		else {
			$result = $this->crud_model->get_all();	
		}

		$json = [];
		$json_new = [];

		foreach ($result as $key => $value) {
			$json_new[$key] = $value;
			$value->edit = $edit;
			$value->view = $view;
			$value->delete = $delete;
			$value->select_checkbox = $select_checkbox;
		}	

		$json['data'] = $json_new;

		if ($json['data']) {
			$json['status'] = 'SUCCESS';
			$json['message'] = 'Data has come.';
			$json['count'] = count($result).' rows.';
			$json['session'] = $this->session->user;
			$this->output->set_output(json_encode($json, JSON_UNESCAPED_UNICODE));
		}
		else {
			$json['status'] = 'ERROR';
			$json['message'] = 'No data found in the database.';
			$json['count'] = '0 rows.';
			$this->output->set_output(json_encode($json, JSON_UNESCAPED_UNICODE));
		}
	}

	public function get_data_for_update()
	{
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			return $this->get_message_not_ajax();
		}

		// Если данные не пришли от клиента
		if ( ! $this->input->post('id')) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come.']));
			return;
		}

		$result = $this->crud_model->get_one($this->input->post('id'));

		// Если данные получены
		if (isset($result)) {
			$this->output->set_output(json_encode(['count' => count(array($result)).' row.', 'status' => 'SUCCESS', 'message' => 'Data has come.', 'data' => $result]));
			return;
		}
	}

	public function create()
	{
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			return $this->get_message_not_ajax();
		}

		if ($this->session->user->right_create == 0) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'You do not have permission to create information.']));
			return;
		}

		// Если данные не пришли от клиента
		if ( ! $this->input->post()) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come.']));
			return;
		}

		$data = $this->validation($this->input->post());

		// Если данные прошли проверку, тогда отправляем их в модель для внесения в базу данных
		if ($data) {
			$result = $this->crud_model->create($data);
		}

		// Если данные добавлены в базу данных
		if (isset($result)) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Data added.', 'data' => $data]));
			return;
		}
	}

	public function create_batch()
	{
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			return $this->get_message_not_ajax();
		}

		if ($this->session->user->right_create == 0) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'You do not have permission to create information.']));
			return;
		}

		// Если данные не пришли от клиента
		if ( ! $this->input->post()) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come.']));
			return;
		}

		$data = $this->validation_batch($this->input->post());

		// Если данные прошли проверку, тогда отправляем их в модель для внесения в базу данных
		if ($data) {
			$result = $this->crud_model->create_batch($data);
		}

		// Если данные добавлены в базу данных
		if (isset($result)) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'В базу данных добавлено '.$result.' записи.', 'data' => $data]));
			return;
		}
	}

	public function update()
	{
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			return $this->get_message_not_ajax();
		}

		if ($this->session->user->right_update == 0) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'You do not have permission to edit information.']));
			return;
		}

		// Если данные не пришли от клиента
		if ( ! $this->input->post('id')) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come.']));
			return;
		}

		$data = $this->validation($this->input->post());

		// Отправляем данные в модель для изменения в базе данных
		if ($data) {
			$result = $this->crud_model->update($data, $this->input->post('id'));
		}

		// Если данные измененны
		if (isset($result)) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Данные изменены.', 'data' => $data]));
			return;
		}
	}

	public function delete()
	{
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			return $this->get_message_not_ajax();
		}

		if ($this->session->user->right_delete == 0) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'You do not have permission to delete information.']));
			return;
		}

		// Если данные не пришли от клиента
		if ( ! $this->input->post('id')) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come.']));
			return;
		}

		$result = $this->crud_model->delete($this->input->post('id'));

		// Если данные удалены
		if (isset($result)) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Data deleted.']));
			return;
		}
	}

	 public function update_all_rows()
    {
        $this->output->set_content_type('application/json');

        // Если это не Ajax-запрос
        if ($this->input->is_ajax_request() === FALSE) {
            return $this->get_message_not_ajax();
        }

        foreach ($this->input->post() as $key => $value) {
            foreach ($value as $rows) {
                $data = $this->set_data($rows);
                $result = $this->crud_model->update($data, $rows['id']);
            }
        }
        // Если данные измененны
		if (isset($result)) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Data updated.', 'data' => $data]));
			return;
		}

    }

	public function upload_file()
	{
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			return $this->get_message_not_ajax();
		}

		foreach ($_FILES as $key => $value) {
			if ($key === 'image') {
				$userfile = $key;
			}
		}

		$dir = strtolower(get_class($this));

		if ( file_exists('./assets/admin/uploads/'.$dir) === FALSE ) {
			mkdir('./assets/admin/uploads/'.$dir, 0777);
		}

		$config['upload_path'] = './assets/admin/uploads/'.$dir;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($userfile)) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->upload->display_errors()]));
		}
		else {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'File uploaded successfully.']));
			$data['id'] = $this->input->post('id');
			$data['image'] = $this->upload->data('file_name');
			$result = $this->crud_model->update($data, $this->input->post('id'));
		}
	}

	public function change_field()
	{
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			return $this->get_message_not_ajax();
		}

		if ($this->session->user->right_update == 0) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'You do not have permission to edit information.']));
			return;
		}

		// Если данные не пришли от клиента
		if ( ! $this->input->post('id')) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come.']));
			return;
		}

		$data[$this->input->post('name_field')] = $this->input->post('status') == 1 ? 0 : 1;
		$result = $this->crud_model->update($data, $this->input->post('id'));

		// Если данные измененны
		if (isset($result)) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Data updated.', 'data' => $data]));
			return;
		}
	}

	public function change_field_text()
	{
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			return $this->get_message_not_ajax();
		}

		if ($this->session->user->right_update == 0) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'You do not have permission to edit information.']));
			return;
		}

		// Если данные не пришли от клиента
		if ( ! $this->input->post('id')) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come.']));
			return;
		}

		$data[$this->input->post('name_field')] = $this->input->post('value');
		$result = $this->crud_model->update($data, $this->input->post('id'));

		// Если данные измененны
		if (isset($result)) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Data updated.', 'data' => $data]));
			return;
		}
	}

	public function set_property($name, $value = NULL)
	{
		if ( ! $this->$name) {
			$this->$name = $value;
		}
	}

	protected function get_message_not_ajax() {
		return $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'This is not an ajax request. You want to access the page directly. Contact the programmer.']));
	}
}

class Api_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Access-Control-Allow-Origin: *');
		$this->output->set_header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept, Authorization');
	}

	public function get_all_data()
	{
		$result = $this->crud_model->get_all();

		if ($result) {
			// $result  = array_pad($result, 1500, $result[0]);
			// echo "<pre style='margin:100px 0 0 300px'>";
			// print_r(count($result));
			// echo "</pre>";
			$this->output->set_status_header(200);
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Данные получены!', 'data' => $result], JSON_UNESCAPED_UNICODE));
			return;
		}

		$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Данные отсутсвуют!'], JSON_UNESCAPED_UNICODE));
	}

	public function get_one_data($id = null)
	{
		if ( !$id) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Отсутсвует идентификатор записи!'], JSON_UNESCAPED_UNICODE));
			return;
		}

		$result = $this->crud_model->get_one($id);

		if ($result) {
			$this->output->set_status_header(200);
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Данные получены!', 'data' => $result], JSON_UNESCAPED_UNICODE));
			return;
		}

		$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Данные отсутсвуют!'], JSON_UNESCAPED_UNICODE));
	}

	public function create()
	{
		$data = $this->set_data();

		$result = $this->crud_model->create($data);

		if ($result) {
			$this->output->set_status_header(200);
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'data' => $result], JSON_UNESCAPED_UNICODE));
			return;
		}
		
		$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Не удалось сохранить данные!'], JSON_UNESCAPED_UNICODE));
	}

	public function update()
	{
		// if (!$this->input->post('id')) {
		// 	$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Отсутсвует идентификатор записи!'], JSON_UNESCAPED_UNICODE));
		// 	return;
		// }

		// $data = $this->get_one_data_for_update(1);

		$data = $this->input->post();
		
		$result = $this->crud_model->update($data, $this->input->post('id'));

		if ($result) {
			$this->output->set_status_header(200);
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'data' => $result], JSON_UNESCAPED_UNICODE));
			return;
		}
		
		$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Не удалось измененить данные!'], JSON_UNESCAPED_UNICODE));
	}

	private function get_one_data_for_update($id)
	{
		return $this->crud_model->get_one($id);
	}

	public function delete()
	{
		$result = $this->crud_model->delete($id);
		if ($result) {
			$this->output->set_status_header(200);
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'data' => $result], JSON_UNESCAPED_UNICODE));
		}
		else {
			$this->output->set_status_header(400);
			$this->output->set_output(json_encode(['status' => 'ERROR'], JSON_UNESCAPED_UNICODE));
		}
	}
}