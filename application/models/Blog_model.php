<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function add_comment($data)
	{
		$this->db->insert('comments', $data);
		$key = $this->db->insert_id();
		return $key;
	}
}