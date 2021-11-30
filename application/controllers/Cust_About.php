<?php 
 
class Cust_About extends CI_Controller{
 
	function __construct() {
		parent::__construct();		
		$this->load->library('htmlcut');
	}
 
	function index() {

    	$data = array(
    		
    	);
		$this->parser->parse('frontend/cust_about', $data);
	}
  
}