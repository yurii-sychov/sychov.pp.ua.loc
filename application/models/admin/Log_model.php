<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'logs';
		$this->key_name = 'id';
    }

    /**
	 * [get_all_show Получение всех записей с таблицы в БД имеющих show = 1]
	 * @return [type] [Массив объектов]
	 */
	public function get_all()
	{
		$this->db->select('
			logs.id as id,
			logs.link as link,
			logs.action as action,
			logs.short_action as short_action,
			logs.data as data,
			logs.browser as browser,
			logs.ip as ip,
			logs.time as time,
			logs.importance as importance,
			users.surname as surname,
			users.name as name,
			users.patronymic as patronymic,		
		');
		$this->db->from($this->table_name);
		$this->db->join('users', 'users.id = logs.user_id');
		$query = $this->db->get();
		// $this->save_log('Получение данных с таблицы '.$this->table_name.'.', ['rows' => $this->db->affected_rows()]);
		return $query->result();
	}
}