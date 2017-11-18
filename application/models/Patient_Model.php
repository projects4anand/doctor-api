<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_Model extends CI_Model {

	function insert($data)
	{
		if($this->db->insert('patient', $data))
			return true;
		else return false;
	}

	function update($data,$id)
	{
		return $this->db->update('patient', $data, "pat_id=".$id);
	}

	function delete($id)
	{
		return $this->db->delete('patient', array('pat_id' => $id ));
	}

	function getAll()
	{
		$query = $this->db->get_where('patient', array('pat_role_id' => 2));
		return $query->result();
	}

	function getSelected($id)
	{
		$record = $this->db->get_where('patient',array('pat_id' => $id));
		return $record->row();
	}

	function login($email,$pass)
	{
		$record = $this->db->get_where('patient', array("pat_email_id" => $email,"pat_password"=>$pass));
		if($record){
		return $record->row_array();
		}else return false;
	}


}

/* End of file Patient_Model.php */
/* Location: ./application/models/Patient_Model.php */