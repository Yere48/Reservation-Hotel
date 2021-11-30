<?php 
 
class Registrasi extends CI_Controller{
 
		function __construct() {
		parent::__construct();		
		$this->load->model(array('Mod_customer'));	
		$this->load->library('htmlcut');
	}
 
	function index() {
		$data = array();
		$this->parser->parse('registrasi', $data);
	}

	public function ajax_add()
	{
		$data = array(
			'roleID' => 3,
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'nik' => $this->input->post('nik'),
			'phone' => $this->input->post('phone'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
	    );
	    
	    $insert = $this->Mod_customer->save($data);
			echo json_encode(array("status" => TRUE));
			$this->session->set_flashdata('msg','Sign Up Succesful');
			redirect(base_url('registrasi'));
		}
}