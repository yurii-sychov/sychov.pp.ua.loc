<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Electric_meters extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/filial_model', 'filial_model');
		$this->load->model('admin/stantion_model', 'stantion_model');
		$this->load->model('admin/electric_meters_model', 'crud_model');

		$this->css = array_merge(['ICheck' => 'plugins/icheck-bootstrap/icheck-bootstrap.min.css', 'summernote' => 'plugins/summernote/summernote-bs4.css'], $this->css);

		$this->js = array_merge(['bs-custom-file-input' => 'plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'summernote' => 'plugins/summernote/summernote-bs4.min.js'], $this->js);

		$this->css_custom = array_merge(['Datetimepicker' => 'plugins/datetimepicker/build/jquery.datetimepicker.min.css'], $this->css_custom);
		
		$this->js_custom = array_merge(['Clients_JS' => 'pages/electric_meters.js', 'Datetimepicker' => 'plugins/datetimepicker/build/jquery.datetimepicker.full.min.js'], $this->js_custom);

		$this->set_property('title', 'Электросчётчики');
		$this->set_property('title_page', 'Электросчётчики');
		$this->set_property('page_name', 'electric_meters');
		$this->set_property('content', 'electric_meters/index');
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

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run('electric_meters') == FALSE) {
			$this->output->set_status_header(202);
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => validation_errors()], JSON_UNESCAPED_UNICODE));
			return;
		}
		$data = $this->set_data($data);
		return $data;
	}

	private function set_data($data)
	{
		$set_data['filial_id'] = 1;
		$set_data['stantion_id'] = $data['stantion'];
		$set_data['type'] = $data['type'];
		$set_data['factory_number'] = $data['factory_number'];
		$set_data['year_made'] = $data['year_made'];
		$set_data['connection'] = $data['connection'];
		$set_data['installation_location'] = $data['installation_location'];
		$set_data['coefficient'] = $data['coefficient'];
		$set_data['type_needs'] = $data['type_needs'];
		$set_data['status'] = isset($data['status']) && $data['status'] == 'on' ? 1 : 0;
        $set_data['history'] = $data['history'];

		return $set_data;
	}
}