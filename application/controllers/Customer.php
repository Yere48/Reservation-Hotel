<?php 
 
class Customer extends CI_Controller{
 
	function __construct() {
		parent::__construct();		
		$this->load->model(array('Mod_customer'));	
		$this->load->library('htmlcut');
	}
 
	function index() {
		$cust = $this->Mod_customer->get_all();
    	$data = array(
    		'cust' => $cust
		);
		$this->parser->parse('backend/customer', $data);
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
	}
	  
	public function ajax_update()
	{
		if ($this->input->post('password')<>'') {
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'nik' => $this->input->post('nik'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);
		} else {
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'nik' => $this->input->post('nik'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'username' => $this->input->post('username')
			);
		}
	    $this->Mod_customer->update(array('employeeID' => (int) $this->input->post('employeeID')), $data);
		echo json_encode(array("status" => TRUE));
	}

  	public function ajax_edit($id)
	{
		$data = $this->Mod_customer->get_by_id($id);
		echo json_encode($data);
  	}

  	public function ajax_delete($id)
	{
	    $this->Mod_customer->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
  
}