<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Protective_arsenal extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/filial_model', 'filial_model');
        $this->load->model('admin/stantion_model', 'stantion_model');
		$this->load->model('admin/protective_arsenal_model', 'crud_model');

		$this->css = array_merge(['ICheck' => 'plugins/icheck-bootstrap/icheck-bootstrap.min.css'], $this->css);
		
		$this->js_custom = array_merge(['Clients_JS' => 'pages/protective_arsenal.js'], $this->js_custom);

		$this->set_property('title', 'Protective_arsenal');
		$this->set_property('title_page', 'Protective_arsenal');
		$this->set_property('page_name', 'protective_arsenal');
		$this->set_property('content', 'protective_arsenal/index');
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

		if ($this->form_validation->run('protective_arsenal') === FALSE) {
			if ($this->form_validation->error('filial')) {
				$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('filial'), 'name' => 'filial']));
				return;
			}


			if ($this->form_validation->error('stantion')) {
				$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('stantion'), 'name' => 'stantion']));
				return;
			}
			
			if ($this->form_validation->error('name')) {
				$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('name'), 'name' => 'name']));
				return;
			}

			if ($this->form_validation->error('type')) {
				$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('surname'), 'name' => 'type']));
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
		$set_data['filial_id'] = $data['filial'];
		$set_data['stantion_id'] = $data['stantion'];
		$set_data['name'] = $data['name'];
		$set_data['type'] = $data['type'];

		return $set_data;
	}
}