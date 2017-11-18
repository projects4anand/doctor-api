<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// https://github.com/projects4anand/doctor-api.git
class LoginController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Patient_Model');
	}
	public function index()
	{
		
	}

	public function login(){
		// $_POST = json_decode(file_get_contents("php://input"), true);
		session_unset();
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		//$record = null;
		$record = $this->Patient_Model->login($email,$pass);
		if($record){
			$array = array(
				'name' => $record['pat_email_id'],
				'id' => $record['pat_id'],
				'role' => $record['pat_role_id']
			);
			$this->session->set_userdata( $array );
			//$var['data'] = ($this->session->userdata('name'));

			print_r($array);
			// echo "Name:--".$var['data'];
			echo json_encode($array);
		}else {
			//return false;
			session_destroy();
			$var['data']= 'Username and Password do not match';
			echo $var['data'];
		}
		//echo json_encode($var);
		//echo json_encode($var['data']);
	}

	public function logout()
	{
		session_unset();
		echo true;
	}

}

/* End of file LoginController.php */
/* Location: ./application/controllers/LoginController.php */

// SELECT
// 	`patient`.`pat_id`,
//     `patient`.`pat_first_name`,
//     `patient`.`pat_last_name`,
//     `schedule`.`sch_date`,
//     `appointment`.`appo_status`,
//     `patient`.`pat_status`
// FROM
//     `appointment`
// RIGHT JOIN `patient` ON `patient`.`pat_id` = `appointment`.`sch_pat_id`
// JOIN `schedule` ON `schedule`.`sch_hos_id` = `hospital`.`hos_id`
// WHERE
//     `patient`.`pat_role_id` = 2