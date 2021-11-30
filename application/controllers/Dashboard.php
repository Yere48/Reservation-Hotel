<?php 
 
class Dashboard extends CI_Controller{
 
	function __construct() {
		parent::__construct();		
		$this->load->library('htmlcut');
	}
 
	function index() {

    	$data = array(
    		
    	);
		$this->parser->parse('backend/dashboard', $data);
	}
  
}