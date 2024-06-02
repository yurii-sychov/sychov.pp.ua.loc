<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Stantion_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'stantions';
		$this->key_name = 'id';
    }

    public function get_stantions($company_id = 0, $filial_id = 0)
	{
		// $this->db->where('company_id', $company_id);
		// $this->db->where('filial_id', $filial_id);
		$query = $this->db->get($this->table_name);

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}
}