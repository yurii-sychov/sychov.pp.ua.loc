<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Schedules extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('admin/filial_model', 'filial_model');
        $this->load->model('admin/stantion_model', 'stantion_model');
        $this->load->model('admin/equipment_model', 'equipment_model');
        $this->load->model('admin/tip_service_model', 'tip_service_model');
		$this->load->model('admin/schedule_model', 'crud_model');

        $this->css = array_merge(['ICheck' => 'plugins/icheck-bootstrap/icheck-bootstrap.min.css'], $this->css);
		
        $this->js = array_merge([], $this->js);

        $this->css_custom = array_merge(['Datetimepicker' => 'plugins/datetimepicker/build/jquery.datetimepicker.min.css'], $this->css_custom);
        $this->js_custom = array_merge(['Schedules_JS' => 'pages/schedules.js', 'Datetimepicker' => 'plugins/datetimepicker/build/jquery.datetimepicker.full.min.js'], $this->js_custom);
		$this->set_property('title', 'Графіки обслуговувань');
		$this->set_property('title_page', 'Графіки обслуговувань');
		$this->set_property('page_name', 'schedules');
		$this->set_property('content', 'schedules/index');
	}

    public function index()
    {
        $data = parent::index();
        $data['filials'] = $this->filial_model->get_filials();
        $data['stantions'] = $this->stantion_model->get_stantions();
        $data['equipments'] = $this->equipment_model->get_equipments();
        $data['tip_services'] = $this->tip_service_model->get_tip_services();        
        // echo "<pre style=\"margin: 100px 0 0 300px;\">";
        // echo "<br/><strong>Имя класса, к которому принадлежит объект:</strong><br/>";
        // print_r( get_class($this) );
        // echo "<br/><strong>Имя родительского класса:</strong><br/>";
        // print_r( get_parent_class($this) );
        // echo "<br/><strong>Свойства class Schedule:</strong><br/>";
        // print_r( get_class_vars('Schedules') );
        // echo "<br/><strong>Методы class Schedule:</strong><br/>";
        // print_r( get_class_methods('Schedules') );
        // echo "</pre>";
        // echo "<pre style='margin:100px 0 0 300px'>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('admin/'.$this->config->item('theme_admin').'/index', $data);
    }

    public function get_data_for_edit()
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
            $this->output->set_output(json_encode(['count' => count($result).' row.', 'status' => 'SUCCESS', 'message' => 'Data has come.', 'data' => $result]));
            return;
        }
    }

    public function validation($data)
    {		        
        $this->load->library('form_validation');

        if ($this->form_validation->run('schedules') === FALSE) {
            if ($this->form_validation->error('date_service')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('date_service'), 'name' => 'date_service']));
                return;
            }

            if ($this->form_validation->error('periodicity')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('periodicity'), 'name' => 'periodicity']));
                return;
            }
            
            $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Необходимо проверить массив проверки.']));
        }
        else {
            $data = $this->set_data($data);
            return $data;
        }
    }

	protected function set_data($data)
	{
        $set_data['date_service'] = $data['date_service'];
        $set_data['periodicity'] = $data['periodicity'];

		return $set_data;
	}

    public function generate_schedule_big_repair()
    {
        $this->output->set_content_type('application/json');

        // Если это не Ajax-запрос
        if ($this->input->is_ajax_request() === FALSE) {
            return $this->get_message_not_ajax();
        }

        if ($this->session->userdata('user')->group === 'root_admin' || $this->session->userdata('user')->group === 'super_admin') {
            $this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Implement the method "generate_schedule_big_repair()" in the controller.']));
            return;
        }

        $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'You do not have permission to update information.']));   
    }

    public function generate_schedule_permanent_repair()
    {
        $this->output->set_content_type('application/json');

        // Если это не Ajax-запрос
        if ($this->input->is_ajax_request() === FALSE) {
            return $this->get_message_not_ajax();
        }

        if ($this->session->userdata('user')->group === 'root_admin' || $this->session->userdata('user')->group === 'super_admin') {
            $this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Implement the method "generate_schedule_permanent_repair()" in the controller.']));
            return;
        }

        $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'You do not have permission to update information.']));
    }

    public function generate_schedule_technical_service()
    {
        $this->output->set_content_type('application/json');

        // Если это не Ajax-запрос
        if ($this->input->is_ajax_request() === FALSE) {
            return $this->get_message_not_ajax();
        }

        if ($this->session->userdata('user')->group === 'root_admin' || $this->session->userdata('user')->group === 'super_admin') {
            $this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Implement the method "generate_schedule_technical_service()" in the controller.']));
            return;
        }

        $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'You do not have permission to update information.']));
    }

    // public function update_all_rows()
    // {
    //     // print_r($_POST);
    //     foreach ($this->input->post() as $key => $value) {
    //         foreach ($value as $data) {
    //             print_r($data);
    //         }
    //     }
    //     $this->output->set_content_type('application/json');

    //     // Если это не Ajax-запрос
    //     if ($this->input->is_ajax_request() === FALSE) {
    //         return $this->get_message_not_ajax();
    //     }

    //     $this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Implement the method "update_all_rows()" in the controller.']));
    // }    

    // public function change_field()
    // {
    //     parent::change_field();
        
    //     if ( ($this->input->post('name_field') === 'kap_rem' OR $this->input->post('name_field') === 'tek_rem' OR $this->input->post('name_field') === 'med_rem') && $this->input->post('status') == 0) {
    //     // if ( ($this->input->post('name_field') === 'kap_rem' OR $this->input->post('name_field') === 'tek_rem') && $this->input->post('status') == 0) {

    //         $result = $this->crud_model->add_schedule($this->input->post());
    //         // Если данные добавлены
    //         if (isset($result)) {
    //             $this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Data added!']));
    //             return;
    //         }
    //     }
    //     else {
    //         $result = $this->crud_model->remove_schedule($this->input->post());
    //         // Если данные удалены
    //         if (isset($result)) {
    //             $this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Data removed!']));
    //             return;
    //         }
    //     }
    // }
}