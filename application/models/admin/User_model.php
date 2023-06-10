<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'users';
		$this->key_name = 'id';
    }

    /**
	 * [get_all Получение всех записей с таблицы в БД]
	 * @return [type] [Массив объектов]
	 */
	public function get_all()
	{
		if( $this->session->user->group !== 'root_admin') {
			$this->db->where('id', $this->session->user->id);
		}
		$query = $this->db->get($this->table_name);

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}

    /**
	 * [get_all_show Получение всех записей с таблицы в БД имеющих show = 1]
	 * @return [type] [Массив объектов]
	 */
	public function get_all_show()
	{
		$this->db->where('status', 1);
		$query = $this->db->get($this->table_name);

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}

	public function get_user($data)
	{
		$this->db->where('email', $data['email']);
		$this->db->where('password', sha1($data['password']));
		$query = $this->db->get($this->table_name);

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->row();
	}

	public function get_email($data)
	{
		
		$this->db->where('email', $data);
		$query = $this->db->get($this->table_name);

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->row('email');
	}

	public function create_user($data)
	{
		$data_set = [];
		$data_set['email'] = $data['email'];
		$data_set['password'] = sha1($data['password']);
		$query = $this->db->insert($this->table_name, $data_set);
		$key = $this->db->insert_id();

		$this->save_log('Добавление записи ID: '.$key.' в таблицу '.$this->table_name.'.', 'create', ['create_row' => $data]);
		return $key;

	}

	public function get_users()
	{
		$query = $this->db->get($this->table_name);

		$logs['data'] = ['select_row' => $this->db->affected_rows()];
		$logs['short_action'] = 'select';
		$logs['importance'] = 0;
		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}
}