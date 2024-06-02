<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/service_model', 'service_model');
		$this->load->model('admin/employee_model', 'employee_model');
		$this->load->model('admin/client_model', 'client_model');
		$this->load->model('blog_model');
	}

	/**
	 * [index description]
	 * @return [type] [Страница сайта]
	 */
	public function index()
	{
		$data['title'] = 'SychovLAB';
		$data['page'] = 'landing';
		$data['content'] = 'landing';

		$data['services'] = $this->service_model->get_all_show();
		$data['employees'] = $this->employee_model->get_all_show();
		$data['clients'] = $this->client_model->get_all_show();
		$this->load->view($this->config->item('theme') . '/index', $data);
	}

	/**
	 * [send_message Отправка сообщения на почту если отключен JS]
	 * @return [type] [NULL]
	 */
	public function send_message()
	{
		return FALSE;
		if ($this->send($this->input->post()) === TRUE) {
			redirect(base_url());
		}
	}

	/**
	 * [send_message_ajax Отправка сообщения на почту Ajax-запросом]
	 * @return [type] [json]
	 */
	public function send_message_ajax()
	{

		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'This is not an ajax request!']));
			return;
		}

		// Если данные не пришли
		if (!$this->input->post()) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come!']));
			return;
		}

		// Если не заполнено поле имя
		if ($this->input->post('name') == '') {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Поле имя не должно быть пустым!', 'name' => 'name']));
			return;
		}

		// Если не заполнено поле почта
		if ($this->input->post('email') == '') {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Поле email не должно быть пустым!', 'name' => 'email']));
			return;
		}

		// Если не заполнено поле тема
		if ($this->input->post('subject') == '') {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Поле тема не должно быть пустым!', 'name' => 'subject']));
			return;
		}

		// Если не заполнено поле сообщение
		if ($this->input->post('message') == '') {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Поле сообщение не должно быть пустым!', 'name' => 'message']));
			return;
		}

		// Если сообщение отправлено
		if ($this->send($this->input->post()) === TRUE) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Сообщение успешно отправлено!']));
			return;
		}

		// Если сообщение не отправлено
		if ($this->send($this->input->post()) === FALSE) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Error sending message!']));
			return;
		}
	}

	/**
	 * [send Отправка сообщения на почту]
	 * @param  [type] $data [Данные для формирования сообщения]
	 * @return [type] [boolean]
	 */
	private function send($data)
	{
		$this->load->library('email');

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'localhost';
		$config['smtp_user'] = 'admin@sychov.pp.ua';
		$config['smtp_pass'] = '3006@0910Yurasis';

		$this->email->initialize($config);

		$this->email->from($this->input->post('email', TRUE), $this->input->post('name', TRUE));
		$this->email->to('yurii@sychov.pp.ua');
		$this->email->subject($this->input->post('subject', TRUE));
		$this->email->message($this->input->post('message', TRUE));
		return $this->email->send();
	}

	private function send_req($data)
	{
		$this->load->library('email');

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'localhost';
		$config['smtp_user'] = 'admin@sychov.pp.ua';
		$config['smtp_pass'] = '3006@0910Yurasis';

		$this->email->initialize($config);

		$this->email->from($data['email'], $data['name']);
		$this->email->to('yurii@sychov.pp.ua');
		$this->email->subject($data['subject']);
		$this->email->message($data['message']);
		return $this->email->send();
	}

	/**
	 * [send_message_ajax Отправка сообщения на почту Ajax-запросом]
	 * @return [type] [json]
	 */
	public function send_message_req()
	{
		print_r($this->input->post());
		$this->output->set_content_type('application/json');

		// // Если это не Ajax-запрос
		// if ($this->input->is_ajax_request() === FALSE) {
		// 	$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'This is not an ajax request!']));
		// 	return;
		// }
		$data = json_decode($this->input->raw_input_stream, TRUE);
		// Если данные не пришли
		if (!$data) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come!']));
			return;
		}

		// Если не заполнено поле имя
		if ($data['name'] == '') {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'The name must not be empty!', 'name' => 'name']));
			return;
		}

		// Если не заполнено поле почта
		if ($data['email'] == '') {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'The email must not be empty!', 'name' => 'email']));
			return;
		}

		// Если не заполнено поле тема
		if ($data['subject'] == '') {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'The subject must not be empty!', 'name' => 'subject']));
			return;
		}

		// Если не заполнено поле сообщение
		if ($data['message'] == '') {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'The message must not be empty!', 'name' => 'message']));
			return;
		}

		// Если сообщение отправлено
		if ($this->send_req($data) === TRUE) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Message sent successfully!']));
			return;
		}

		// Если сообщение не отправлено
		if ($this->send_req($data) === FALSE) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Error sending message!']));
			return;
		}
	}
}
