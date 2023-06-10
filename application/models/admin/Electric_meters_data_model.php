<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Electric_meters_data_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'electric_meters_data';
		$this->key_name = 'id';
    }

    /**
	 * [get_all_show Получение всех записей с таблицы в БД имеющих show = 1]
	 * @return [type] [Массив объектов]
	 */
	public function get_all()
	{
		$this->db->select('
			electric_meters_data.id as id,
			electric_meters_data.current,
			electric_meters_data.previous,
			DATE_FORMAT(electric_meters_data.date_of_reading, "%Y-%m-%d") as date_of_reading,
			electric_meters_data.difference,
			filials.name as filial,
			stantions.name as stantion,
			electric_meters.type as type,
			electric_meters.factory_number as factory_number,
			electric_meters.connection as connection,
			electric_meters.installation_location as installation_location,
			electric_meters.coefficient as coefficient,
			electric_meters.type_needs as type_needs,
			electric_meters.status as status	
		');
		$this->db->from('electric_meters_data, electric_meters, filials, stantions');
		$this->db->where('filials.id = electric_meters.filial_id');
		$this->db->where('stantions.id = electric_meters.stantion_id');
		$this->db->where('electric_meters.id = electric_meters_data.electric_meters_id');
		$query = $this->db->get();

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}

	/**
	 * [get_data_active Получение активных счётчиков]
	 * @return [type] [description]
	 */
	// public function get_data_active()
	// {
	// 	$this->db->select('
	// 		electric_meters.id as id,
	// 		filials.name as filial,
	// 		stantions.name as stantion,
	// 		electric_meters.type as type,
	// 		electric_meters.factory_number as factory_number,
	// 		electric_meters.connection as connection,
	// 		electric_meters.installation_location as installation_location,
	// 		electric_meters.coefficient as coefficient,
	// 		electric_meters.type_needs as type_needs,
	// 		electric_meters.status as status,
	// 	');
	// 	$this->db->from($this->table_name);
	// 	$this->db->join('filials', 'filials.id = electric_meters.filial_id');
	// 	$this->db->join('stantions', 'stantions.id = electric_meters.stantion_id');
	// 	$this->db->where('status', 1);
	// 	$query = $this->db->get();
	// 	$this->save_log('Получение данных с таблицы '.$this->table_name.'.', ['rows' => $this->db->affected_rows()]);
	// 	return $query->result();
	// }

	public function search_electric_meters($data)
	{
		$this->db->select('
			electric_meters_data.id as id,
			electric_meters_data.current,
			electric_meters_data.previous,
			electric_meters_data.date_of_reading,
			electric_meters_data.difference,
			filials.name as filial,
			stantions.name as stantion,
			electric_meters.type as type,
			electric_meters.factory_number as factory_number,
			electric_meters.connection as connection,
			electric_meters.installation_location as installation_location,
			electric_meters.coefficient as coefficient,
			electric_meters.type_needs as type_needs,
			electric_meters.status as status	
		');
		$this->db->from('electric_meters_data, electric_meters, filials, stantions');
		$this->db->where('filials.id = electric_meters.filial_id');
		$this->db->where('stantions.id = electric_meters.stantion_id');
		$this->db->where('electric_meters.id = electric_meters_data.electric_meters_id');
		if ($data['name'] === 'stantion_id') {
			$this->db->where('tantion_id', $data['value']);
		}
		if ($data['name'] === 'number') {
			$this->db->where('number', $data['value']);
		}
		$query = $this->db->get();

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}

	public function get_meters_data_previous($id) {
		$this->db->select('current, DATE_FORMAT(created_at, "%Y-%m-%d") as created_at');
		$this->db->where('electric_meters_id', $id);
		$this->db->order_by('date_of_reading', 'DESC');
		$this->db->limit(1);
		$this->db->from($this->table_name);
		$query = $this->db->get();
		return $query->row();
	}
}