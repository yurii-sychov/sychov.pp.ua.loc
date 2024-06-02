<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'menu';
		$this->key_name = 'id';
    }

    /**
	 * [get_all_show Получение всех записей с таблицы в БД имеющих show = 1]
	 * @return [type] [Массив объектов]
	 */
	public function get_menu()
	{
		if ($this->session->user->group !== 'root_admin') {
			$this->db->where('active', 1);
		}
		$query = $this->db->get($this->table_name);

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);

		$menu = [];
		foreach ($query->result() as $row) {
			if ($row->parent_id === 0) {
				$menu[$row->parent_id][] = [];
			}
			$menu[$row->parent_id][] = $row;
		}
		return $menu;
	}
}