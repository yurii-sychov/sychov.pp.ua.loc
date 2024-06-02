<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Rights extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/user_model', 'user_model');
		$this->load->model('admin/page_model', 'page_model');
		$this->load->model('admin/right_model', 'crud_model');

		$this->css = array_merge([
			'ICheck' => 'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
		], $this->css);

		$this->js = array_merge([], $this->js);
		
		$this->js_custom = array_merge([
			'Clients_JS' => 'pages/rights.js'
		], $this->js_custom);

		$this->set_property('title', 'Права');
		$this->set_property('title_page', 'Права');
		$this->set_property('page_name', 'rights');
		$this->set_property('content', 'rights/index');
	}

	public function index()
	{
		$data = parent::index();
		$data['users'] = $this->user_model->get_users();
		$data['pages'] = $this->page_model->get_pages();
		$this->load->view('admin/'.$this->config->item('theme_admin').'/index', $data);
	}

	public function validation($data)
	{		
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run('rights') == FALSE) {
			$this->output->set_status_header(202);
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => validation_errors()], JSON_UNESCAPED_UNICODE));
			return;
		}
		$data = $this->set_data($data);
		return $data;
	}

	private function set_data($data)
	{
		$set_data['user_id'] = $data['user'];
		$set_data['page_id'] = $data['page'];
		$set_data['right_create'] = isset($data['right_create']) && $data['right_create'] ? 1 : 0;
		$set_data['right_read'] = isset($data['right_read']) && $data['right_read'] ? 1 : 0;
		$set_data['right_update'] = isset($data['right_update']) && $data['right_update'] ? 1 : 0;
		$set_data['right_delete'] = isset($data['right_delete']) && $data['right_delete'] ? 1 : 0;

		return $set_data;
	}
}