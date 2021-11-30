<?php 
 
class Employee extends CI_Controller{
 
	function __construct() {
		parent::__construct();		
		$this->load->model(array('Mod_employee'));	
		$this->load->library('htmlcut');
	}
 
	function index() {
		$employee = $this->Mod_employee->get_all();
    	$data = array(
    		'employee' => $employee
		);
		$this->parser->parse('backend/employee', $data);
	}

	public function ajax_add()
	{
		$data = array(
			'roleID' => 2,
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'nip' => $this->input->post('nip'),
			'nik' => $this->input->post('nik'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'dateofbirth' => date('Y-m-d', strtotime($this->input->post('dateofbirth'))),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'photo' => $this->input->post('photo')
	    );
	    $insert = $this->Mod_employee->save($data);
			echo json_encode(array("status" => TRUE));
	}
	  
	public function ajax_update()
	{
		if ($this->input->post('password')<>'') {
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'nip' => $this->input->post('nip'),
				'nik' => $this->input->post('nik'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'dateofbirth' => date('Y-m-d', strtotime($this->input->post('dateofbirth'))),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'photo' => $this->input->post('photo')
			);
		} else {
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'nip' => $this->input->post('nip'),
				'nik' => $this->input->post('nik'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'dateofbirth' => date('Y-m-d', strtotime($this->input->post('dateofbirth'))),
				'username' => $this->input->post('username'),
				'photo' => $this->input->post('photo')
			);
		}
	    $this->Mod_employee->update(array('employeeID' => (int) $this->input->post('employeeID')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function upload_foto()
	{
		$img = rand(1000,100000)."_".$_FILES['file']['name'];
		$img_loc = $_FILES['file']['tmp_name'];
		$folder="assets/upload/employee/";

		if(move_uploaded_file($img_loc,$folder.$img)) {
			$isi = $folder.$img;
			echo json_encode(['file'=>$isi]);
		} else {
			die("Gagal upload file");
		}
  	}

  	public function ajax_edit($id)
	{
		$data = $this->Mod_employee->get_by_id($id);
		echo json_encode($data);
  	}

  	public function ajax_delete($id)
	{
	    $data = $this->Mod_employee->get_by_id($id);
	    if (file_exists($data->photo)) {
	      unlink($data->photo);
	    }
	    $this->Mod_employee->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
  
}