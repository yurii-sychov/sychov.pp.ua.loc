<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Ci_Controller {

	protected $css = [];
	protected $js = [];
	protected $js_custom = [];

	public function index()
	{
        $data['datatables'] = FALSE;
		$data['title'] = 'Связаться с нами';
		$data['title_page'] = 'Связаться с нами';
		$data['page_name'] = 'contact';
		$data['content'] = 'contact/index';
		$data['menu'] = $this->menu_model->get_menu();
		$data['css'] = array_merge(['summernote' => 'plugins/summernote/summernote-bs4.css'], $this->css);
		$data['js'] = array_merge(['summernote' => 'plugins/summernote/summernote-bs4.min.js'], $this->js);
		$data['js_custom'] = array_merge(['Contact_JS' => 'pages/contact.js'], $this->js_custom);
		$this->load->view('admin/'.$this->config->item('theme_admin').'/index', $data);
	}

	public function send_message_ajax()
	{
		
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			$this->output->set_status_header(202);
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'This is not an ajax request!']));
			return;
		}

		// Если данные не пришли
		if ( !$this->input->post()) {
			$this->output->set_status_header(202);
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come!']));
			return;
		}

		// Если не заполнено поле имя
		if ($this->input->post('name') == '') {
			$this->output->set_status_header(202);
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Поле имя не должно быть пустым!', 'name' => 'name']));
			return;
		}

		// Если не заполнено поле почта
		if ($this->input->post('email') == '') {
			$this->output->set_status_header(202);
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Поле email не должно быть пустым!', 'name' => 'email']));
			return;
		}

		// Если не заполнено поле тема
		if ($this->input->post('subject') == '') {
			$this->output->set_status_header(202);
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Поле тема не должно быть пустым!', 'name' => 'subject']));
			return;
		}

		// Если не заполнено поле сообщение
		if ($this->input->post('message') == '') {
			$this->output->set_status_header(202);
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Поле сообщение не должно быть пустым!', 'name' => 'message']));
			return;
		}

		// Если сообщение не отправлено
		if ($this->send($this->input->post()) === FALSE) {
			$this->output->set_status_header(202);
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Error sending message!']));
			return;
		}

		$this->output->set_status_header(200);
		$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Сообщение успешно отправлено!']));

	}

	private function send($data)
	{
		$this->load->library('email');

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'localhost';
		$config['smtp_user'] = 'yurii@sychov.pp.ua';
		$config['smtp_pass'] = 'Yuras0910';
		$config['mailtype'] = 'html';

		$this->email->initialize($config);
		
		$this->email->from($this->input->post('email', TRUE), $this->input->post('name', TRUE));
		$this->email->to('yurii@sychov.pp.ua');
		$this->email->subject($this->input->post('subject', TRUE));
		$this->email->message($this->input->post('message', TRUE));
		return $this->email->send();
	}
}