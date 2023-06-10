<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
	}

	/**
	 * [index description]
	 * @param  [type] $id [Идентификатор статьи]
	 * @return [type] [Страница статьи]
	 */
	public function index($id = NULL)
	{
		if ( ! $id) {
			show_404();
		}

		$data['title'] = 'Blog';
		$data['page'] = 'blog';
		$data['content'] = 'article';
		$this->load->view($this->config->item('theme').'/index', $data);
	}

	/**
	 * [send_comment_ajax Добавление комментария к статье Ajax-запросом]
	 * @return [type] [json]
	 */
	public function send_comment_ajax()
	{
		$this->output->set_content_type('application/json');

		// Если это не Ajax-запрос
		if ($this->input->is_ajax_request() === FALSE) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'This is not an ajax request!']));
			return;
		}

		// Если данные не пришли
		if ( ! $this->input->post()) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Data did not come!']));
			return;
		}

		// Формируем массив данных
		$data = [];
		$data['name'] = $this->input->post('name', TRUE);
		$data['email'] = $this->input->post('email', TRUE);
		$data['website'] = $this->input->post('website', TRUE);
		$data['comment'] = $this->input->post('comment', TRUE);
		$data['moderation'] = 0;

		// Если не заполнено поле имя
		if ($data['name'] === '') {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'The name must not be empty!', 'name' => 'name']));
			return;
		}

		// Если не заполнено поле почта
		if ($data['email'] === '') {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'The email must not be empty!', 'name' => 'email']));
			return;
		}

		// Если не заполнено поле комментарий
		if ($data['comment'] === '') {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'The comment must not be empty!', 'name' => 'comment']));
			return;
		}

		// Отправляем данные в модель для внесения в базу данных
		$result = $this->blog_model->add_comment($data);

		// Если данные добавлены
		if ($result) {
			$this->output->set_output(json_encode(['status' => 'SUCCESS', 'message' => 'Comment saved!']));
			return;
		}

		// Если данные не добавлены
		if ( ! $result) {
			$this->output->set_output(json_encode(['status' => 'ERROR', 'message' => 'Error saving comment!']));
			return;
		}	
	}
}