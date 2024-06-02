<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Disp_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'disps';
		$this->key_name = 'id';
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

    /**
	 * [get_all_show Получение всех записей с таблицы в БД имеющих show = 1]
	 * @return [type] [Массив объектов]
	 */
	public function get_all()
	{
		$this->db->select('
			disps.id as id,
			companies.name as company,
			filials.name as filial,
			stantions.name as stantion,
			equipments.name as equipment,
			disps.name as name,
			disps.tip as tip,
			disps.year_made as year_made,
			disps.big_repair,
			disps.permanent_repair,
			disps.technical_service,
		');
		$this->db->from($this->table_name);
		$this->db->join('companies', 'companies.id = disps.company_id');
		$this->db->join('filials', 'filials.id = disps.filial_id');
		$this->db->join('stantions', 'stantions.id = disps.stantion_id');
		$this->db->join('equipments', 'equipments.id = disps.equipment_id');
		$query = $this->db->get();

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}

	/**
	 * [get_all_show Получение всех записей с таблицы в БД имеющих show = 1]
	 * @return [type] [Массив объектов]
	 */
	public function get_all_limit($post)
	{
		$this->db->select('
			disps.id as id,
			companies.name as company,
			filials.name as filial,
			stantions.name as stantion,
			equipments.name as equipment,
			disps.name as name,
			disps.tip as tip,
			disps.year_made as year_made,
			disps.big_repair,
			disps.permanent_repair,
			disps.technical_service
		');
		$this->db->from($this->table_name);
		$this->db->join('companies', 'companies.id = disps.company_id');
		$this->db->join('filials', 'filials.id = disps.filial_id');
		$this->db->join('stantions', 'stantions.id = disps.stantion_id');
		$this->db->join('equipments', 'equipments.id = disps.equipment_id');
		if ($post['length'] != -1) {
			$this->db->limit($post['length'], $post['start']);
		}
		$query = $this->db->get();

		$this->save_log('Получение данных с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->result();
	}


	public function add_schedule($post)
	{
		$data['disp_id'] = $post['id'];
		if ($post['name_field'] === 'big_repair') {
			$data['tip_service_id'] = 1;
		}
		if ($post['name_field'] === 'permanent_repair') {
			$data['tip_service_id'] = 2;
		}
		if ($post['name_field'] === 'technical_service') {
			$data['tip_service_id'] = 3;
		}
		return $this->db->insert('schedules', $data);
	}

	public function remove_schedule($post)
	{
		if ($post['name_field'] === 'big_repair') {
			$this->db->where('tip_service_id', 1);
		}
		if ($post['name_field'] === 'permanent_repair') {
			$this->db->where('tip_service_id', 2);
		}
		if ($post['name_field'] === 'technical_service') {
			$this->db->where('tip_service_id', 3);
		}
		$this->db->where('disp_id', $post['id']);
		return $this->db->delete('schedules');
	}
}