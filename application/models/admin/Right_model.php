<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Right_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'rights';
		$this->key_name = 'id';
    }

	public function get_rights($page_name = null)
	{
		$this->db->select('rights.right_read, rights.right_create, rights.right_update, rights.right_delete');
		// $this->db->select('rights.*, pages.page_name');
		$this->db->where('rights.user_id', $this->session->user->id);
		$this->db->where('pages.page_name', $page_name);
		$this->db->where('rights.page_id = pages.id');
		$query = $this->db->get('rights, pages');

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->row();
	}

	    /**
	 * [get_all_show Получение всех записей с таблицы в БД имеющих show = 1]
	 * @return [type] [Массив объектов]
	 */
	public function get_all()
	{
		$this->db->select('
			users.surname as surname,
			users.name as name,
			users.patronymic as patronymic,
			pages.page_name as page_name,
			rights.id as id,
			rights.right_create as right_create,
			rights.right_read as right_read,
			rights.right_update as right_update,
			rights.right_delete as right_delete,
			rights.created_at as created_at,
			rights.created_by as created_by,
			rights.updated_at as updated_at,
			rights.updated_by as updated_by
		');
		$this->db->from($this->table_name);
		$this->db->join('users', 'users.id = rights.user_id');
		$this->db->join('pages', 'pages.id = rights.page_id');
        $this->db->where_not_in('pages.page_name', 'rights');
		$query = $this->db->get();

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}
}