<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Electric_meters_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'electric_meters';
		$this->key_name = 'id';
    }

    /**
	 * [get_all_show Получение всех записей с таблицы в БД имеющих show = 1]
	 * @return [type] [Массив объектов]
	 */
	public function get_all()
	{
		$this->db->select('
			electric_meters.id as id,
			filials.name as filial,
			stantions.name as stantion,
			electric_meters.type as type,
			electric_meters.factory_number as factory_number,
			DATE_FORMAT(electric_meters.year_made, "%Y") as year_made,
			electric_meters.connection as connection,
			electric_meters.installation_location as installation_location,
			electric_meters.coefficient as coefficient,
			electric_meters.type_needs as type_needs,
			electric_meters.image as image,
			electric_meters.status as status,
			electric_meters.history as history,
			electric_meters.created_at as created_at,
			electric_meters.created_by as created_by,
			electric_meters.updated_at as updated_at,
			electric_meters.updated_by as updated_by
		');
		$this->db->from($this->table_name);
		$this->db->join('filials', 'filials.id = electric_meters.filial_id');
		$this->db->join('stantions', 'stantions.id = electric_meters.stantion_id');
		$query = $this->db->get();

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}

	/**
	 * [get_data_active Получение активных счётчиков]
	 * @return [type] [description]
	 */
	public function get_all_active()
	{
		$this->db->select('
			electric_meters.id as id,
			filials.name as filial,
			stantions.name as stantion,
			electric_meters.type as type,
			electric_meters.factory_number as factory_number,
			electric_meters.connection as connection,
			electric_meters.installation_location as installation_location,
			electric_meters.coefficient as coefficient,
			electric_meters.type_needs as type_needs,
			electric_meters.status as status,
		');
		$this->db->from($this->table_name);
		$this->db->join('filials', 'filials.id = electric_meters.filial_id');
		$this->db->join('stantions', 'stantions.id = electric_meters.stantion_id');
		$this->db->where('status', 1);
		$query = $this->db->get();

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}
}