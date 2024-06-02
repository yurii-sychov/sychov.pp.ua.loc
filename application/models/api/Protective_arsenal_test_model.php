<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Protective_arsenal_test_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'protective_arsenal_test';
		$this->key_name = 'id';
    }

	public function get_all()
	{
		$this->db->select('
			protective_arsenal_test.*,
			filials.name as filial,
			stantions.name as stantion
		');
		$this->db->from($this->table_name);
		$this->db->join('filials', 'filials.id = protective_arsenal_test.filial_id');
		$this->db->join('stantions', 'stantions.id = protective_arsenal_test.stantion_id');
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get();
		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', ['rows' => $this->db->affected_rows()]);
		return $query->result();
	}
}