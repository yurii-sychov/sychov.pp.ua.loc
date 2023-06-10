<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Disps extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('admin/filial_model', 'filial_model');
        $this->load->model('admin/stantion_model', 'stantion_model');
        $this->load->model('admin/equipment_model', 'equipment_model');
		$this->load->model('admin/disp_model', 'crud_model');

        $this->css = array_merge(['Date-Range-Picker' => 'plugins/daterangepicker/daterangepicker.css', 'ICheck' => 'plugins/icheck-bootstrap/icheck-bootstrap.min.css'], $this->css);
		
        $this->js = array_merge([], $this->js);

        $this->css_custom = array_merge(['Datetimepicker' => 'plugins/datetimepicker/build/jquery.datetimepicker.min.css'], $this->css_custom);

        $this->js_custom = array_merge(['Disps_JS' => 'pages/disps.js', 'Datetimepicker' => 'plugins/datetimepicker/build/jquery.datetimepicker.full.min.js'], $this->js_custom);

		$this->set_property('title', 'Disps');
		$this->set_property('title_page', 'Disps');
		$this->set_property('page_name', 'disps');
		$this->set_property('content', 'disps/index');
	}

    public function index()
    {
        $data = parent::index();
        $data['filials'] = $this->filial_model->get_filials();
        $data['stantions'] = $this->stantion_model->get_stantions();
        $data['equipments'] = $this->equipment_model->get_equipments();
        $this->load->view('admin/'.$this->config->item('theme_admin').'/index', $data);
    }

    // public function index()
    // {
    //     $this->equipments = $this->equipment_model->get_equipments();
    //     parent::index();
    //     $this->load->view('admin/'.$this->config->item('theme_admin').'/index', $this);
    // }

    public function validation($data)
    {		
        $this->load->library('form_validation');

        if ($this->form_validation->run('disps') === FALSE) {
            if ($this->form_validation->error('filial')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('filial'), 'name' => 'filial']));
                return;
            }


            if ($this->form_validation->error('stantion')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('stantion'), 'name' => 'stantion']));
                return;
            }

            if ($this->form_validation->error('equipment')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('equipment'), 'name' => 'equipment']));
                return;
            }

            if ($this->form_validation->error('name')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('name'), 'name' => 'name']));
                return;
            }

            if ($this->form_validation->error('tip')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('tip'), 'name' => 'tip']));
                return;
            }

            if ($this->form_validation->error('year_made')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('year_made'), 'name' => 'year_made']));
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
		$set_data['company_id'] = 1;
        $set_data['filial_id'] = $data['filial'];
		$set_data['stantion_id'] = $data['stantion'];
		$set_data['equipment_id'] = $data['equipment'];
        $set_data['name'] = $data['name'];
        $set_data['tip'] = $data['tip'];
        $set_data['year_made'] = $data['year_made'];

		return $set_data;
	}

    public function change_field()
    {
        parent::change_field();
        
        if ( ($this->input->post('name_field') === 'big_repair' OR $this->input->post('name_field') === 'permanent_repair' OR $this->input->post('name_field') === 'technical_service') && $this->input->post('status') == 0) {
        // if ( ($this->input->post('name_field') === 'big_repair' OR $this->input->post('name_field') === 'permanent_repair') && $this->input->post('status') == 0) {

            $result = $this->crud_model->add_schedule($this->input->post());
            // Если данные добавлены
            if (isset($result)) {
                $this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Data added!']));
                return;
            }
        }
        else {
            $result = $this->crud_model->remove_schedule($this->input->post());
            // Если данные удалены
            if (isset($result)) {
                $this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Data removed!']));
                return;
            }
        }
    }

    public function generate_schedules()
    {
        $this->load->model('admin/tip_service_model', 'tip_service_model');
        print_r($this->load->model('admin/tip_service_model', 'tip_service_model'));
        // $result_disps = $this->crud_model->get_data_all();
        // $result_tip_service = $this->tip_service_model->get_tip_service();
        // print_r($result_disps);
    }
}