<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Protective_arsenal extends Api_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('api/protective_arsenal_test_model', 'crud_model');
	}

	protected function set_data()
	{
		$data = [];
		$data['name'] = 'Переносне заземленняfffffffffffffffff';
		$data['type'] = 'ПЗ-10 кВ';
		$data['place'] = 'Майстерня';
		return $data;
	}
}