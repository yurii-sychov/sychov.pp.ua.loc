<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_model extends Crud_Model {

	public function __construct()
    {
        parent::__construct();

		$this->table_name = 'schedules';
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
			schedules.id as id,
			schedules.date_service as date_service,
			schedules.periodicity as periodicity,
			DATE_ADD(schedules.date_service, INTERVAL schedules.periodicity YEAR) as date_next_service,
			companies.name as company,
			filials.name as filial,
			stantions.name as stantion,
			equipments.name as equipment,
			disps.name as disp,
			disps.tip as tip,
			disps.year_made as year_made,
			tip_service.name as tip_service
		');
		$this->db->from($this->table_name);
		$this->db->from('companies');
		$this->db->from('filials');
		$this->db->from('stantions');
		$this->db->from('disps');
		$this->db->from('equipments');
		$this->db->from('tip_service');

		$this->db->where('companies.id = disps.company_id');
		$this->db->where('filials.id = disps.filial_id');
		$this->db->where('stantions.id = disps.stantion_id');
		$this->db->where('equipments.id = disps.equipment_id');
		$this->db->where('tip_service.id = schedules.tip_service_id');
		$this->db->where('disps.id = schedules.disp_id');
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
			schedules.id as id,
			schedules.date_service as date_service,
			schedules.periodicity as periodicity,
			DATE_ADD(schedules.date_service, INTERVAL schedules.periodicity YEAR) as date_next_service,
			companies.name as company,
			filials.name as filial,
			stantions.name as stantion,
			equipments.name as equipment,
			disps.name as disp,
			disps.tip as tip,
			disps.year_made as year_made,
			tip_service.name as tip_service
		');
		$this->db->where('companies.id = disps.company_id');
		$this->db->where('filials.id = disps.filial_id');
		$this->db->where('stantions.id = disps.stantion_id');
		$this->db->where('equipments.id = disps.equipment_id');
		$this->db->where('tip_service.id = schedules.tip_service_id');
		$this->db->where('disps.id = schedules.disp_id');
		if ($post['length'] != -1) {
			$this->db->limit($post['length'], $post['start']);
		}
		$query = $this->db->get();

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
		$this->db->select('
			schedules.id as id,
			schedules.date_service as date_service,
			schedules.periodicity as periodicity,
			filials.name as filial,
			stantions.name as stantion,
			equipments.name as equipment,
			disps.name as disp,
			disps.tip as tip,
			disps.year_made as year_made,
			tip_service.name as tip_service
		');
		$this->db->from($this->table_name);
		$this->db->from('filials');
		$this->db->from('stantions');
		$this->db->from('disps');
		$this->db->from('equipments');
		$this->db->from('tip_service');
		$this->db->where('filials.id = disps.filial_id');
		$this->db->where('stantions.id = disps.stantion_id');
		$this->db->where('equipments.id = disps.equipment_id');
		$this->db->where('tip_service.id = schedules.tip_service_id');
		$this->db->where('disps.id = schedules.disp_id');
		$this->db->where($this->table_name.'.'.$this->key_name, $id);
		$query = $this->db->get();

		$$this->save_log('Получение записи ID: '.$id.' с таблицы '.$this->table_name.'.', 'select', ['select_rows' => $this->db->affected_rows()]);
		return $query->row();
	}


	public function add_schedule($post)
	{
		$data['disp_id'] = $post['id'];
		if ($post['name_field'] === 'kap_rem') {
			$data['tip_service_id'] = 1;
		}
		if ($post['name_field'] === 'tek_rem') {
			$data['tip_service_id'] = 2;
		}
		if ($post['name_field'] === 'med_rem') {
			$data['tip_service_id'] = 3;
		}
		return $this->db->insert('schedules', $data);
	}

	public function remove_schedule($post)
	{
		if ($post['name_field'] === 'kap_rem') {
			$this->db->where('tip_service_id', 1);
		}
		if ($post['name_field'] === 'tek_rem') {
			$this->db->where('tip_service_id', 2);
		}
		if ($post['name_field'] === 'med_rem') {
			$this->db->where('tip_service_id', 3);
		}
		$this->db->where('disp_id', $post['id']);
		return $this->db->delete('schedules');
	}
}