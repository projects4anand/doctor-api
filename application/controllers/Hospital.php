<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Hospital_Model');
	}
	public function index()
	{

	}
	public function create()
	{
		// $_POST=json_decode(file_get_contents("php://input"), true);
		$data = array(
			'hos_name' => $this->input->post('hos_name'), 
			'hos_speciality' => $this->input->post('hos_speciality'),
			'hos_address' => $this->input->post('hos_address'),
			'hos_tagline' => $this->input->post('hos_tagline'),
			'hos_amount' =>$this->input->post('hos_amount'),
			'hos_status' => 1  	 
		);
		print_r($data);
		$msg = $this->Hospital_Model->insert($data);
		if($msg == 1){
			$var['data'] = true;
		}else $var['data'] = false;
		echo $var['data'];
	}

	public function read()
	{
		$data = $this->Hospital_Model->getAll();
		echo json_encode($data);
	}

	public function update()
	{	
		$id = $this->uri->segment(3);
		$record = $this->input->input_stream();
		$data = array(
			'hos_name' => $record['hos_name'], 
			'hos_speciality' => $record['hos_speciality'],
			'hos_address' => $record['hos_address'],
			'hos_tagline' => $record['hos_tagline'],
			'hos_amount' => $record['hos_amount'],
			'hos_status' => "active"  	 
		);
		print_r($data);
		echo $id;
		$update = false;
		$update = $this->Hospital_Model->update($data,$id);
		if($update == true){
			echo "Updated Successfully";
		}else echo "Update Error";
	}

	public function delete()
	{	
		$id = $this->uri->segment(3);
		$delete = $this->Hospital_Model->delete($id);
		if($delete == true){
			echo "Deleted Successfully";
		}else echo "Delete Error";			
	}

	

}

/* End of file hospital.php */
/* Location: ./application/controllers/hospital.php */