<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'users';
		$this->key_name = 'id';
    }

    public function get_password($id)
    {
    	$this->db->select('password');
    	$this->db->where($this->key_name, $id);
		$query = $this->db->get($this->table_name);

		$this->save_log('Получение записи ID: '.$id.' с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->row();
    }

	// /**
	//  * [get_all_show Получение всех записей с таблицы в БД имеющих show = 1]
	//  * @return [type] [Массив объектов]
	//  */
	// public function get_all_show()
	// {
	// 	$this->db->where('status', 1);
	// 	$query = $this->db->get($this->table_name);
	// 	
	// 	$this->save_log('Получение данных с таблицы '.$this->table_name.'.', ['rows' => $this->db->affected_rows()]);
	// 	return $query->result();
	// }
}