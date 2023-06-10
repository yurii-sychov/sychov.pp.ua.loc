<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Building_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'buildings';
		$this->key_name = 'id';
    }

    /**
	 * [get_all_show Получение всех записей с таблицы в БД имеющих show = 1]
	 * @return [type] [Массив объектов]
	 */
	public function get_all()
	{
		$this->db->select('
			buildings.id as id,
			filials.name as filial,
			stantions.name as stantion,
			buildings.name as name,
			buildings.square as square,
			buildings.created_at as created_at,
			buildings.created_by as created_by,
			buildings.updated_at as updated_at,
			buildings.updated_by as updated_by
		');
		$this->db->from($this->table_name);
		$this->db->join('filials', 'filials.id = buildings.filial_id');
		$this->db->join('stantions', 'stantions.id = buildings.stantion_id');
		$query = $this->db->get();

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}

	public function get_square()
	{
		$this->db->select('stantions.name as stantion, SUM(square) as full_square');
		$this->db->join('stantions', 'stantions.id = buildings.stantion_id');
		$this->db->group_by('stantion_id');
// 		if ($this->input->get()) {
		    $this->db->order_by($this->input->get('field'), $this->input->get('sort'));
// 		}
// 		else {
		  //  $this->db->order_by('stantion', 'asc');
// 		}
		$this->db->from($this->table_name);
		$query = $this->db->get();

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();

	}


}