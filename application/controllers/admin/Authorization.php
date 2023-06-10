<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/user_model', 'user_model');
	}

	public function signin()
	{
		if ( !$this->input->post()) {
			$data = [];
			$this->load->view('admin/'.$this->config->item('theme_admin').'/authorization/signin', $data);
			return;
		}

		$this->output->set_content_type('application/json');

		$result = $this->user_model->get_user($this->input->post());

		// Если ошибка
		if (!$result) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'ERROR!']));
			return;
		}

		// Если данные получены
		$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'SUCCESS!']));
		unset($result->password);
		$this->session->set_userdata('user', $result);	
	}

	public function signup()
	{
		if ( !$this->input->post()) {
			$data = [];
			$this->load->view('admin/'.$this->config->item('theme_admin').'/authorization/signup', $data);
			return;
		}

		$this->output->set_content_type('application/json');
		
		$data = $this->validation_signup($this->input->post());

		// Отправляем данные в модель для внесения в базу данных
		if ($data) {
			$result = $this->user_model->create_user($data);
		}

		// Если данные добавлены
		if (isset($result)) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'User is registered!']));
			return;
		}
	}



	public function signout()
	{
		$this->session->unset_userdata('user');
		redirect(base_url('/admin/authorization/signin'));
	}

	public function get_email()
	{
		$this->output->set_content_type('application/json');

		$result = $this->user_model->get_email($this->input->post('email'));
		
		// Если ошибка
		if (!$result) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'SUCCESS!']));
			return;
		}

		// Если данные получены
		$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'A user with this mailbox is already registered!']));		
	}

	private function validation_signup($data)
    {	
        $this->load->library('form_validation');

        if ($this->form_validation->run('signup') === FALSE) {

            if ($this->form_validation->error('email')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('email'), 'name' => 'email']));
                return;
            }

            if ($this->form_validation->error('password')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('password'), 'name' => 'password']));
                return;
            }

            if ($this->form_validation->error('retypePassword')) {
                $this->output->set_output(json_encode(['status' => 'ERROR', 'message' => $this->form_validation->error('retypePassword'), 'name' => 'retypePassword']));
                return;
            }
        }
        else {
            $data = $this->set_data_signup($data);

            return $data;
        }
    }

    private function set_data_signup($data)
	{
		$set_data['email'] = $data['email'];
		$set_data['password'] = $data['password'];

		return $set_data;
	}


}