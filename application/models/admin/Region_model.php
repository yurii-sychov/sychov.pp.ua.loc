<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Region_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'regions';
		$this->key_name = 'id';
    }

    public function get_regions($country_id)
	{
		$this->db->where('country_id', $country_id);
		$query = $this->db->get($this->table_name);

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}
}