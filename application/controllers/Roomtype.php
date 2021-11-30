<?php 
 
class Roomtype extends CI_Controller{
 
	function __construct() {
		parent::__construct();		
		$this->load->model(array('Mod_roomtype'));	
		$this->load->library('htmlcut');
	}
 
	function index() {
		$room = $this->Mod_roomtype->get_all();
    	$data = array(
    		'room' => $room
		);
		$this->parser->parse('backend/roomtype', $data);
	}

	public function ajax_add()
	{
		$data = array(
			'room_type' => $this->input->post('room_type'),
			'price' => $this->input->post('price'),
			'capacity' => $this->input->post('capacity'),
			'photo' => $this->input->post('photo')
	    );
	    $insert = $this->Mod_roomtype->save($data);
			echo json_encode(array("status" => TRUE));
	}
	  
	public function ajax_update()
	{
		$data = array(
			'room_type' => $this->input->post('room_type'),
			'price' => $this->input->post('price'),
			'capacity' => $this->input->post('capacity'),
			'photo' => $this->input->post('photo')
		);
	    $this->Mod_roomtype->update(array('roomtypeID' => (int) $this->input->post('roomtypeID')), $data);
		echo json_encode(array("status" => TRUE));
	}

  	public function ajax_edit($id)
	{
		$data = $this->Mod_roomtype->get_by_id($id);
		echo json_encode($data);
  	}

  	public function ajax_delete($id)
	{
	    $this->Mod_roomtype->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function upload_foto()
	{
		$img = rand(1000,100000)."_".$_FILES['file']['name'];
		$img_loc = $_FILES['file']['tmp_name'];
		$folder="assets/upload/roomtype/";

		if(move_uploaded_file($img_loc,$folder.$img)) {
			$isi = $folder.$img;
			echo json_encode(['file'=>$isi]);
		} else {
			die("Gagal upload file");
		}
  	}
  
}