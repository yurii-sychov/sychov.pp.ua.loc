<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('admin/country_model', 'country_model');
        $this->load->model('admin/region_model', 'region_model');
        $this->load->model('admin/city_model', 'city_model');
        $this->load->model('admin/profile_model', 'crud_model');


        $this->css = array_merge([
                'ICheck' => 'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
                'Select2' => 'plugins/select2/css/select2.min.css',
            ], $this->css);
		
        $this->js = array_merge([
                'Select2' => 'plugins/select2/js/select2.full.min.js'
            ], $this->js_custom) ;

        $this->js_custom = array_merge(['Profile_JS' => 'pages/profile.js'], $this->js_custom);

		$this->datatables = FALSE;

        $this->set_property('title', 'Profile');
		$this->set_property('title_page', 'Profile');
		$this->set_property('page_name', 'profile');
		$this->set_property('content', 'profile/index');
	}

    public function index()
    {       
        $data = parent::index();
        $data['user'] = $this->crud_model->get_one($this->session->userdata('user')->id);
        $data['countries'] = $this->country_model->get_countries();
        $data['regions'] = $this->region_model->get_regions($data['user']->country_id);
        $data['cities'] = $this->city_model->get_cities($data['user']->country_id, $data['user']->region_id);
        $skills = explode(',', $data['user']->skills);
        foreach ($skills as $key => $value) {
            $skills[$key] = trim($value);
        }
        $data['skills'] = $skills;        
        $data['menu'] = $this->menu_model->get_menu();
        $this->load->view('admin/'.$this->config->item('theme_admin').'/index', $data);
    }

    public function get_password()
    {
        $this->output->set_content_type('application/json');

        // Если это не Ajax-запрос
        if ($this->input->is_ajax_request() === FALSE) {
            return $this->get_message_not_ajax();
        }

        // Если данные не пришли
        if ( ! $this->input->post('id')) {
            $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come!']));
            return;
        }

        $result = $this->crud_model->get_password($this->input->post('id'));

        // Если данные получены и равны
        if (isset($result) && $result->password === sha1($this->input->post('password'))) {
            $this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Password is correct!']));
        }
        else {
            $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Wrong password!']));
        }
    }

    public function update_password()
    {
        $this->output->set_content_type('application/json');

        // Если это не Ajax-запрос
        if ($this->input->is_ajax_request() === FALSE) {
            return $this->get_message_not_ajax();
        }

        // Если данные не пришли
        if ( ! $this->input->post('id')) {
            $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come!']));
            return;
        }

        $data = [];
        $data['password'] = sha1($this->input->post('password'));
        $result = $this->crud_model->update($data, $this->input->post('id'));

        // Если данные измененны
        if (isset($result)) {
            $this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Password updated!']));
        }
        else {
            $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Failed to update password!']));
        }
    }

    public function get_regions()
    {
        $this->output->set_content_type('application/json');

        // Если это не Ajax-запрос
        if ($this->input->is_ajax_request() === FALSE) {
            return $this->get_message_not_ajax();
        }

        $result = $this->region_model->get_regions($this->input->post('country_id'));

        // Если данные получены
        if (isset($result) && count($result) > 0) {
            $this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Data received!', 'data' => $result]));
        }
        else {
            $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data not received!']));
        }
    }

    public function get_cities()
    {
        $this->output->set_content_type('application/json');

        // Если это не Ajax-запрос
        if ($this->input->is_ajax_request() === FALSE) {
            return $this->get_message_not_ajax();
        }

        $result = $this->city_model->get_cities($this->input->post('country_id'), $this->input->post('region_id'));

        // Если данные получены
        if (isset($result) && count($result) > 0) {
            $this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Data received!', 'data' => $result]));
        }
        else {
            $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data not received!']));
        }
    }

    public function validation($data)
    {		
        $this->load->library('form_validation');

        if ($this->form_validation->run('users') === FALSE) {

            if ($this->form_validation->error('surname')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('surname'), 'name' => 'surname']));
                return;
            }

            if ($this->form_validation->error('name')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('name'), 'name' => 'name']));
                return;
            }

            // if ($this->form_validation->error('patronymic')) {
            //     $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('patronymic'), 'name' => 'patronymic']));
            //     return;
            // }

            // if ($this->form_validation->error('password')) {
            //     $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('password'), 'name' => 'password']));
            //     return;
            // }

            if ($this->form_validation->error('email')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('email'), 'name' => 'email']));
                return;
            }

            if ($this->form_validation->error('address')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('address'), 'name' => 'address']));
                return;
            }

            if ($this->form_validation->error('country')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('country'), 'name' => 'country']));
                return;
            }

            if ($this->form_validation->error('region')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('region'), 'name' => 'region']));
                return;
            }

            if ($this->form_validation->error('city')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('city'), 'name' => 'city']));
                return;
            }

            // if ($this->form_validation->error('profession')) {
            //     $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('profession'), 'name' => 'profession']));
            //     return;
            // }

            // if ($this->form_validation->error('feedback')) {
            //     $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('feedback'), 'name' => 'feedback']));
            //     return;
            // }
            
            $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Необходимо проверить массив проверки.']));
        }
        else {
            $data = $this->set_data($data);
            return $data;
        }
    }

	private function set_data($data)
	{
		$set_data['surname'] = $data['surname'];
		$set_data['name'] = $data['name'];
		$set_data['patronymic'] = $data['patronymic'];
		// $set_data['password'] = sha1($data['password']);
		$set_data['email'] = $data['email'];
        $set_data['country_id'] = $data['country'];
        $set_data['region_id'] = $data['region'];
        $set_data['city_id'] = $data['city'];
        $set_data['address'] = $data['address'];
        $set_data['post'] = $data['post'];
        $set_data['education'] = $data['education'];
		$set_data['profession'] = $data['profession'];
        $set_data['about'] = $data['about'];
        $set_data['skills'] = $data['skills'];
        // $set_data['status'] = isset($data['status']) && $data['status'] == 'on' ? 1 : 0;
		$set_data['gender'] = $data['gender'];

		return $set_data;
	}
}