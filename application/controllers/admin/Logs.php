<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('admin/filial_model', 'filial_model');
		// $this->load->model('admin/stantion_model', 'stantion_model');
		$this->load->model('admin/log_model', 'crud_model');

		$this->css = array_merge([
			// 'ICheck' => 'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
			// 'summernote' => 'plugins/summernote/summernote-bs4.css'
		], $this->css);

		$this->js = array_merge([
			// 'summernote' => 'plugins/summernote/summernote-bs4.min.js'
		], $this->js);

		$this->js_custom = array_merge([
			'Clients_JS' => 'pages/logs.js'
		], $this->js_custom);

		$this->set_property('title', 'Действия в системе');
		$this->set_property('title_page', 'Действия в системе');
		$this->set_property('page_name', 'logs');
		$this->set_property('content', 'logs/index');
	}

	public function index()
	{
		$data = parent::index();
		$this->load->view('admin/'.$this->config->item('theme_admin').'/index', $data);
	}

	// public function validation($data)
	// {		
	// 	$this->load->library('form_validation');

	// 	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

	// 	if ($this->form_validation->run('logs') == FALSE) {
	// 		$this->output->set_status_header(202);
	// 		$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => validation_errors()], JSON_UNESCAPED_UNICODE));
	// 		return;
	// 	}
	// 	$data = $this->set_data($data);
	// 	return $data;
	// }

	// private function set_data($data)
	// {
	// 	$set_data['filial_id'] = $data['filial'];
	// 	$set_data['stantion_id'] = $data['stantion'];
	// 	$set_data['name'] = $data['name'];
	// 	$set_data['square'] = $data['square'];

	// 	return $set_data;
	// }
}