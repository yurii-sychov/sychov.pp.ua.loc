<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Electric_meters_data extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/filial_model', 'filial_model');
		$this->load->model('admin/stantion_model', 'stantion_model');
		$this->load->model('admin/electric_meters_model', 'electric_meters');

		$this->load->model('admin/electric_meters_data_model', 'crud_model');

		$this->css = array_merge(['ICheck' => 'plugins/icheck-bootstrap/icheck-bootstrap.min.css', 'DateRangepicker' => 'plugins/daterangepicker/daterangepicker.css'], $this->css);
		$this->js = array_merge(['InputMask' => 'plugins/inputmask/jquery.inputmask.min.js', 
			// 'Moment' => 'plugins/moment/moment.min.js', 'DateRangepicker' => 'plugins/daterangepicker/daterangepicker.js'
		], $this->js);
		
		$this->css_custom = array_merge(['Datetimepicker' => 'plugins/datetimepicker/build/jquery.datetimepicker.min.css'], $this->css_custom);
		$this->js_custom = array_merge(['Clients_JS' => 'pages/electric_meters_data.js', 'Datetimepicker' => 'plugins/datetimepicker/build/jquery.datetimepicker.full.min.js'], $this->js_custom);

		$this->set_property('title', 'Показания собственных нужд');
		$this->set_property('title_page', 'Показания собственных нужд');
		$this->set_property('page_name', 'electric_meters_data');
		$this->set_property('content', 'electric_meters_data/index');
	}

	public function index()
	{
		$data = parent::index();
		$data['filials'] = $this->filial_model->get_filials();
		$data['stantions'] = $this->stantion_model->get_stantions();
		$this->load->view('admin/'.$this->config->item('theme_admin').'/index', $data);
	}

	public function validation($data)
	{		
		$this->load->library('form_validation');

		if ($this->form_validation->run('electric_meters_data') === FALSE) {
			if ($this->form_validation->error('filial')) {
				$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('filial'), 'name' => 'filial']));
				return;
			}


			if ($this->form_validation->error('stantion')) {
				$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('stantion'), 'name' => 'stantion']));
				return;
			}
			

			if ($this->form_validation->error('type')) {
				$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('type'), 'name' => 'type']));
				return;
			}

			if ($this->form_validation->error('factory_number')) {
				$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('factory_number'), 'name' => 'factory_number']));
				return;
			}
			if ($this->form_validation->error('connection')) {
				$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('connection'), 'name' => 'connection']));
				return;
			}

			if ($this->form_validation->error('installation_location')) {
				$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('installation_location'), 'name' => 'installation_location']));
				return;
			}

			if ($this->form_validation->error('coefficient')) {
				$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('coefficient'), 'name' => 'coefficient']));
				return;
			}

			if ($this->form_validation->error('type_needs')) {
				$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('type_needs'), 'name' => 'type_needs']));
				return;
			}
			
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Необходимо проверить массив проверки.']));

		}
		else {
			$data = $this->set_data($data);
			return $data;
		}
	}

	private function set_data($data)
	{
		// $set_data['filial_id'] = 1;
		// $set_data['stantion_id'] = $data['stantion'];
		// $set_data['type'] = $data['type'];
		// $set_data['factory_number'] = $data['factory_number'];
		// $set_data['connection'] = $data['connection'];
		// $set_data['installation_location'] = $data['installation_location'];
		// $set_data['coefficient'] = $data['coefficient'];
		// $set_data['type_needs'] = $data['type_needs'];
		// $set_data['status'] = isset($data['status']) && $data['status'] == 'on' ? 1 : 0;

		// return $set_data;
	}

	public function validation_batch($data)
	{
		$this->load->library('form_validation');

		if ($this->form_validation->run('electric_meters_data') == FALSE) {

			$this->output->set_status_header(202);
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => validation_errors()], JSON_UNESCAPED_UNICODE));
			return;
		}

		$data = $this->set_data_batch($data);
		return $data;
	}

	private function set_data_batch($data)
	{
		foreach ($data as $item) {

			for ($i=0; $i < count($item); $i++) { 
				$set_data_batch[$i]['electric_meters_id'] = $data['id'][$i];  
				$set_data_batch[$i]['date_of_reading'] = $data['date_of_reading'][$i];
				$set_data_batch[$i]['current'] = $data['current'][$i] * $data['coefficient'][$i];
				$set_data_batch[$i]['previous'] = $data['previous'][$i];
				$set_data_batch[$i]['difference'] = $set_data_batch[$i]['current'] - $data['previous'][$i];
				// if (isset($data['id'])) {
				// 	$set_data['updated_at'] = date('Y-m-d  H:i:s');
				// 	$set_data['updated_by'] = $this->session->user->id;
				// }
				// else {
				// 	$set_data['created_at'] = date('Y-m-d  H:i:s');
				// 	$set_data['created_by'] = $this->session->user->id;
				// }
			}
		}

		return $set_data_batch;
	}

	public function add()
	{
		$data = parent::index();
		$data['datatables'] = FALSE;
		$data['title'] = 'Добавление показаний электросчётчиков';
		$data['title_page'] = 'Добавление показаний электросчётчиков';
		$data['content'] = 'electric_meters_data/form';
		$data['filials'] = $this->filial_model->get_filials();
		$data['stantions'] = $this->stantion_model->get_stantions();
		$electric_meters = $this->electric_meters->get_all_active();
		foreach  ($electric_meters as $key => $value) {
			$last_meters_data = $this->crud_model->get_meters_data_previous($value->id);
			if (isset($last_meters_data)) {
			    $electric_meters[$key]->previous = $last_meters_data->current ? $last_meters_data->current : 0;
			    $electric_meters[$key]->created_at = $last_meters_data->created_at ? $last_meters_data->created_at : '0000-00-00';
			}
		}
		$data['electric_meters'] = $electric_meters;

		$this->load->view('admin/'.$this->config->item('theme_admin').'/index', $data);
	}

	public function search_electric_meters()
	{
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'This is not an ajax request. You want to access the page directly. Contact the programmer.']));
			return;
		}

		if ( !$this->input->post()) {
			$this->output->set_status_header(202);
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Данные не пришли!'], JSON_UNESCAPED_UNICODE));
			return;
		}

		$electric_meters = $this->electric_meters->get_all_active();
		foreach  ($electric_meters as $key => $value) {
			$previous = $this->crud_model->get_meters_data_previous($value->id);
			$electric_meters[$key]->previous = $previous ? $previous : 0;
		}

		$result= [];
		if ($this->input->post('name') === 'stantion') {
			foreach  ($electric_meters as $key => $value) {
				if ($value->stantion === $this->input->post('value')) {
					array_push($result, $value);
				}
			}
		}

		if ($this->input->post('name') === 'factory_number') {
			foreach  ($electric_meters as $key => $value) {
				if ($this->input->post('value')) {
					if (strpos(strval($value->factory_number), strval($this->input->post('value'))) !== FALSE) {
						array_push($result, $value);
					}
				}
			}
		}

		if ( $this->input->post('value') === '') {
			$result = $electric_meters;
		}

		if ($result) {
			$this->output->set_status_header(200);
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Данные получены!', 'data' => $result], JSON_UNESCAPED_UNICODE));
			return;
		}

		$this->output->set_status_header(202);
		$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Нет совпадений!'], JSON_UNESCAPED_UNICODE));
	}
}