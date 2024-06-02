<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/employee_model', 'crud_model');

        $this->css = array_merge(['ICheck' => 'plugins/icheck-bootstrap/icheck-bootstrap.min.css'], $this->css);
		
        $this->js_custom = array_merge(['Employees_JS' => 'pages/employees.js'], $this->js_custom);

		$this->set_property('title', 'Employees');
		$this->set_property('title_page', 'Employees');
		$this->set_property('page_name', 'employees');
		$this->set_property('content', 'employees/index');
	}

	public function index()
    {
        $data = parent::index();
        $this->load->view('admin/'.$this->config->item('theme_admin').'/index', $data);
    }

	public function validation($data)
	{
		$this->load->library('form_validation');

		if ($this->form_validation->run('employees') === FALSE) {
        	if ($this->form_validation->error('name')) {
        		$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('name'), 'name' => 'name']));
        		return;
        	}

        	if ($this->form_validation->error('surname')) {
        		$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('surname'), 'name' => 'surname']));
        		return;
        	}

        	if ($this->form_validation->error('email')) {
        		$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('email'), 'name' => 'email']));
        		return;
        	}

        	if ($this->form_validation->error('profession')) {
        		$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('profession'), 'name' => 'profession']));
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
		$set_data['name'] = $data['name'];
		$set_data['surname'] = $data['surname'];
		$set_data['email'] = $data['email'];
		$set_data['profession'] = $data['profession'];
        $set_data['status'] = isset($data['status']) && $data['status'] == 'on' ? 1 : 0;
		$set_data['gender'] = $data['gender'];

		return $set_data;
	}
}