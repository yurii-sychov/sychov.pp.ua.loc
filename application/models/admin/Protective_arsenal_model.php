<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Protective_arsenal_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'protective_arsenal';
		$this->key_name = 'id';
    }

    /**
	 * [get_all_show Получение всех записей с таблицы в БД имеющих show = 1]
	 * @return [type] [Массив объектов]
	 */
	public function get_all()
	{
		$this->db->select('
			protective_arsenal.id as id,
			filials.name as filial,
			stantions.name as stantion,
			protective_arsenal.name as name,
			protective_arsenal.type as type,
		');
		$this->db->from($this->table_name);
		$this->db->join('filials', 'filials.id = protective_arsenal.filial_id');
		$this->db->join('stantions', 'stantions.id = protective_arsenal.stantion_id');
		$query = $this->db->get();

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}
}