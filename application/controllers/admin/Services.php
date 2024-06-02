<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/service_model', 'crud_model');

        $this->css = array_merge(['ICheck' => 'plugins/icheck-bootstrap/icheck-bootstrap.min.css'], $this->css);
        $this->css = array_merge(['Summernote' => 'plugins/summernote/summernote-bs4.css'], $this->css);
		
        $this->js_custom = array_merge(['Services_JS' => 'pages/services.js'], $this->js_custom);

        $this->js = array_merge(['Summernote' => 'plugins/summernote/summernote-bs4.min.js'], $this->js);

		$this->set_property('title', 'Services');
		$this->set_property('title_page', 'Services');
		$this->set_property('page_name', 'services');
		$this->set_property('content', 'services/index');
	}

    public function index()
    {
        $data = parent::index();
        $this->load->view('admin/'.$this->config->item('theme_admin').'/index', $data);
    }

    public function validation($data)
    {	
        $this->load->library('form_validation');

        if ($this->form_validation->run('services') === FALSE) {
            if ($this->form_validation->error('name')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('name'), 'name' => 'name']));
                return;
            }

            if ($this->form_validation->error('icon')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('icon'), 'name' => 'icon']));
                return;
            }

            if ($this->form_validation->error('description')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('description'), 'name' => 'description']));
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
        $set_data['icon'] = $data['icon'];
        $set_data['active'] = isset($data['active']) && $data['active'] == 'on' ? 1 : 0;
		$set_data['description'] = $data['description'];

		return $set_data;
	}
}