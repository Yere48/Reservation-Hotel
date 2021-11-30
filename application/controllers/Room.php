<?php 
 
class Room extends CI_Controller{
 
	function __construct() {
		parent::__construct();		
		$this->load->model(array('Mod_room','Mod_roomtype'));	
		$this->load->library('htmlcut');
	}
 
	function index() {
		$roomtype = $this->Mod_roomtype->get_all();
		$room = $this->Mod_room->get_all();
    	$data = array(
    		'room' => $room,
    		'roomtype' => $roomtype
		);
		$this->parser->parse('backend/room', $data);
	}

	public function ajax_add()
	{
		$data = array(
			'roomtypeID' => $this->input->post('roomtypeID'),
			'room_number' => $this->input->post('room_number'),
			'floor' => $this->input->post('floor')
	    );
	    $insert = $this->Mod_room->save($data);
			echo json_encode(array("status" => TRUE));
	}
	  
	public function ajax_update()
	{
		$data = array(
			'roomtypeID' => $this->input->post('roomtypeID'),
			'room_number' => $this->input->post('room_number'),
			'floor' => $this->input->post('floor')
		);
	    $this->Mod_room->update(array('roomID' => (int) $this->input->post('roomID')), $data);
		echo json_encode(array("status" => TRUE));
	}

  	public function ajax_edit($id)
	{
		$data = $this->Mod_room->get_by_id($id);
		echo json_encode($data);
  	}

  	public function ajax_delete($id)
	{
	    $this->Mod_room->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
  
}