<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mod_employee extends CI_Model {
  var $table = 'employee';

  public function __construct()
	{
		parent::__construct();
  }
  

	public function get_all()
	{
		$query = $this->db->get($this->table);
	    $result = $query->result_array();

	    return $result;
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('employeeID',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('employeeID', $id);
		$this->db->delete($this->table);
	}

	public function cek_login($table, $where)
	{		
		return $this->db->get_where($table, $where);
	}

	public function get_user_data($table, $username)
	{
		$this->db->from($table);
		$this->db->where('username', $username);
		$query = $this->db->get();

		return $query->row();
	}
  
}