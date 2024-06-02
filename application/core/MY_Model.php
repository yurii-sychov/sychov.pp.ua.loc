<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class My_Model extends CI_Model {

}

class Crud_Model extends CI_Model {

	/**
	 * [$table_name Название таблицы]
	 * @var [type]
	 */
	protected $table_name;

	/**
	 * [$key_name Первичный ключ в таблице]
	 * @var [type]
	 */
	protected $key_name;

	/**
	 * [$field_image_name Название поля с картинкой]
	 * @var [type]
	 */
	// protected $field_image_name;

	public function __construct()
	{
		parent::__construct();
	}

	public function set_property($name, $value = '')
	{
		if ( ! $this->$name)
		{
			$this->$name = $value;
		}
	}
	
	/**
	 * [get_all Получение всех записей с таблицы в БД]
	 * @return [type] [Массив объектов]
	 */
	public function get_all()
	{
		// $this->db->cache_on();
		$query = $this->db->get($this->table_name);

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}

	/**
	 * [get_all Получение всех записей с таблицы в БД]
	 * @return [type] [Массив объектов]
	 */
	public function get_all_limit($post)
	{
		$this->db->limit($post['length'], $post['start']);
		$query = $this->db->get($this->table_name);

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}

	/**
	 * [get_one Получение одной записи с таблицы в БД]
	 * @param  [type] $id [Id записи]
	 * @return [type] [Объект]
	 */
	public function get_one($id)
	{
		$this->db->where($this->key_name, $id);
		$query = $this->db->get($this->table_name);

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_row' => $this->db->affected_rows()]);
		return $query->row();
	}

	/**
	 * [get_one Получение одного поля с таблицы в БД]
	 * @param  [type] $id [Id записи]
	 * @return [type] [Объект]
	 */
	public function get_field($field)
	{
		$this->db->where($field, $data);
		$query = $this->db->get($this->table_name);

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_row' => $this->db->affected_rows()]);
		return $query->row($field);
	}

	/**
	 * [create Добавление записи в таблицу]
	 * @param  [type] $data [Данные для добавления]
	 * @return [type] [Id добавленной записи]
	 */
	public function create($data)
	{
		if ($this->db->field_exists('created_at', $this->table_name)) {
			$data['created_at'] = date('Y-m-d  H:i:s');
		}
		if ($this->db->field_exists('created_by', $this->table_name)) {
			$data['created_by'] = $this->session->user->id;
		}
		$query = $this->db->insert($this->table_name, $data);
		$key = $this->db->insert_id();

		$this->save_log('Добавление записи ID: '.$key.' в таблицу '.$this->table_name.'.', 'create', ['create_row' => $data]);
		return $key;
	}

	public function create_batch($data) {
		
		foreach ($data as $k => $item) {
			if ($this->db->field_exists('created_at', $this->table_name)) {
				$data[$k]['created_at'] = date('Y-m-d  H:i:s');
			}
			if ($this->db->field_exists('created_by', $this->table_name)) {
				$data[$k]['created_by'] = $this->session->user->id;
			}	
		}
		$query = $this->db->insert_batch($this->table_name, $data);

		$this->save_log('Добавление записей в таблицу '.$this->table_name.'.', 'create', ['create_rows' => $data]);
		return $query;
	}

	/**
	 * [update Изменение записи в таблице]
	 * @param  [type] $data [Данные для изменения]
	 * @param  [type] $id [Id записи]
	 * @return [type] [Boolean]
	 */
	public function update($data, $id)
	{
		if ($this->db->field_exists('updated_at', $this->table_name)) {
			$data['updated_at'] = date('Y-m-d  H:i:s');
		}
		if ($this->db->field_exists('updated_by', $this->table_name)) {
			$data['updated_by'] = $this->session->user->id;
		}
		$this->db->where($this->key_name, $id);
		$query = $this->db->update($this->table_name, $data);

		$this->save_log('Обновление записи с ID: '.$id.' в таблице '.$this->table_name.'.', 'update', ['update_row' => $data]);
		return $query;
	}

	/**
	 * [delete Удаление записи в таблице]
	 * @param  [type] $id [Id записи]
	 * @return [type] [Boolean]
	 */
	public function delete($id)
	{
		$this->db->where($this->key_name, $id);
		$query = $this->db->delete($this->table_name);

		$this->save_log('Удаление записи с ID: '.$id.' с таблицы '.$this->table_name.'.', 'delete', ['delete_row' => $this->db->affected_rows()]);
		return $this->db->affected_rows();
	}

	public function count_rows()
	{
		return $this->db->count_all($this->table_name);
	}

	/**
	 * [save_log Создание записи в таблице логов]
	 * @param  [type] $text [Текст события]
	 * @param  [type] $logs [Данные в виде logs]
	 * @return [type] [null]
	 */
	protected function save_log($text, $action, $logs = [])
	{
		$this->load->library('user_agent');

		$data = [];

		if ($action === 'select') {
			$data['short_action'] = 'select';
		}
		elseif ($action === 'create') {
			$data['short_action'] = 'create';
		}
		elseif ($action === 'update') {
			$data['short_action'] = 'update';
		}
		elseif ($action === 'delete') {
			$data['short_action'] = 'delete';
		}
		else {
			$data['short_action'] = 'unknown';
		}

		$data['user_id'] = isset($this->session->user->id) ? $this->session->user->id : 0;
		$data['link'] = current_url();
		$data['action'] = $text;

		$data['data'] = json_encode($logs, JSON_UNESCAPED_UNICODE);
		$data['browser'] = $this->agent->browser();
		$data['ip'] = $this->input->ip_address();
		$data['time'] = date('Y-m-d  H:i:s');

		if ($action === 'select') {
			$data['importance'] = 0;
		}
		elseif ($action === 'create') {
			$data['importance'] = 1;
		}
		elseif ($action === 'update') {
			$data['importance'] = 2;
		}
		elseif ($action === 'delete') {
			$data['importance'] = 2;
		}
		else {
			$data['importance'] = 0;
		}
		$this->db->insert('logs', $data);
	}
}