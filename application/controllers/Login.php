<?php 
 
class Login extends CI_Controller{
 
	function __construct() {
		parent::__construct();		
		$this->load->model(array('Mod_employee'));
		$this->load->model(array('Mod_customer'));
		$this->load->library('htmlcut');
	}
 
	function index() {

    	$data = array(
		);
		$this->parser->parse('login', $data);
	}

	function auth(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
		);

		$cekemployee = $this->Mod_employee->cek_login("employee", $where)->num_rows();
		
		if($cekemployee > 0){
			$user_data = $this->Mod_employee->get_user_data("employee", $username);
			$data_session = array(
				'username' => $username,
				'id'	=> $user_data->employeeID,
				'firstname' => $user_data->firstname,
				'lastname' => $user_data->lastname,
				'nip' => $user_data->nip,
				'nik' => $user_data->nik,
				'email' => $user_data->email,
				'phone' => $user_data->phone,
				'dateofbirth' => $user_data->dateofbirth,
				'photo' => $user_data->photo,
				'status' => "login-employee"
			);
			$this->session->set_userdata($data_session);
			redirect(base_url("dashboard"));

		} else {
			$cekcustomer = $this->Mod_customer->cek_login("customer", $where)->num_rows();
			if($cekcustomer > 0){
				$user_data = $this->Mod_customer->get_user_data("customer", $username);
				$data_session = array(
				'username' => $username,
				'id'	=> $user_data->customerID,
				'firstname' => $user_data->firstname,
				'lastname' => $user_data->lastname,
				'nik' => $user_data->nik,
				'email' => $user_data->email,
				'phone' => $user_data->phone,
				'status' => "login-customer"
				);
				$this->session->set_userdata($data_session);
				redirect(base_url("cust_home"));

			}
			else{
				$this->session->set_flashdata('code','danger');
				$this->session->set_flashdata('msg','Gagal login, Silahkan Periksa Username dan Password anda');
				redirect(base_url('login'));
			}	
		}
	}
  
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
}