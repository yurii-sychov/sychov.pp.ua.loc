<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Tip_service_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'tip_service';
		$this->key_name = 'id';
    }

	public function get_tip_services()
	{
		$query = $this->db->get('tip_service');

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}
}