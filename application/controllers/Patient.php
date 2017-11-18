<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Patient_Model');
	}

	public function index()
	{
		
	}

	public function create()
	{
		// $_POST=json_decode(file_get_contents("php://input"), true);
		$data = array(
			'pat_first_name' => $this->input->post('pat_first_name'),
			'pat_last_name' => $this->input->post('pat_last_name'),
			'pat_gender' => $this->input->post('pat_gender'), 
			'pat_dob' => $this->input->post('pat_dob'), 
			'pat_address' => $this->input->post('pat_address'),
			'pat_email_id'=>$this->input->post('pat_email'),
			'pat_mobile' => $this->input->post('pat_mobile'), 
			'pat_role_id' => 2, 
			'pat_username' => $this->input->post('pat_username'), 
			'pat_password' => $this->input->post('pat_password'), 
			'pat_status' => 1			
		);
		// print_r($data);
		$msg = $this->Patient_Model->insert($data);
		if($msg == 1){
			$var['data'] = true;
		}else $var['data'] = false;
		echo $var['data'];
	}

	public function read()
	{
		$data = $this->Patient_Model->getAll();
		echo json_encode($data);
	}

	public function update()
	{
		$id = $this->uri->segment(3);
		$record = $this->input->input_stream();
		$data = array(
			'pat_first_name' => $record['pat_first_name'],
			'pat_last_name'=> $record['pat_last_name'],
			'pat_gender'=> $record['pat_gender'], 
			'pat_dob'=> $record['pat_dob'], 
			'pat_address'=> $record['pat_address'],
			'pat_email_id'=>$record['pat_email'], 
			'pat_mobile'=> $record['pat_mobile'],  
			'pat_username'=> $record['pat_username'], 
			'pat_password'=> $record['pat_password'], 
			'pat_status'=> 1
		);
		$update = false;
		$update = $this->Patient_Model->update($data,$id);
		if($update == true){
			echo true;
		}else echo false;
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$delete = $this->Patient_Model->delete($id);
		if($delete == true){
			echo true;
		}else echo false;	
	}

}

/* End of file Patient.php */
/* Location: ./application/controllers/Patient.php */