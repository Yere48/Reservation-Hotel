<?php 
 
class Facility extends CI_Controller{
 
	function __construct() {
		parent::__construct();		
		$this->load->model(array('Mod_facilities'));	
		$this->load->library('htmlcut');
	}
 
	function index() {
		$fac = $this->Mod_facilities->get_all();
    	$data = array(
    		'fac' => $fac
		);
		$this->parser->parse('backend/facility', $data);
	}

	public function ajax_add()
	{
		$data = array(
			'facilities' => $this->input->post('facilities'),
			'price' => $this->input->post('price')
	    );
	    $insert = $this->Mod_facilities->save($data);
			echo json_encode(array("status" => TRUE));
	}
	  
	public function ajax_update()
	{
		$data = array(
			'facilities' => $this->input->post('facilities'),
			'price' => $this->input->post('price')
		);
	    $this->Mod_facilities->update(array('facilitiesID' => (int) $this->input->post('facilitiesID')), $data);
		echo json_encode(array("status" => TRUE));
	}

  	public function ajax_edit($id)
	{
		$data = $this->Mod_facilities->get_by_id($id);
		echo json_encode($data);
  	}

  	public function ajax_delete($id)
	{
	    $this->Mod_facilities->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
  
}