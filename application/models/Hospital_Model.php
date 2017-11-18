<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital_Model extends CI_Model {

	function insert($data)
	{
		if($this->db->insert('hospital', $data))
			return true;
		else return false;
	}

	function update($data,$id)
	{
		return $this->db->update('hospital', $data, 'hos_id ='.$id);
	}

	function delete($id)
	{
		return $this->db->delete('hospital', array('hos_id' => $id ));
	}

	function getAll()
	{
		$query = $this->db->get('hospital');
		return $query->result();
	}

	function getSelected($id)
	{
		$record = $this->db->get_where('hospital',array('hos_id' => $id));
		return $record->row();
	}

}

/* End of file Hospital_Model.php */
/* Location: ./application/models/Hospital_Model.php */