<?php 
 
class Cust_Home extends CI_Controller{
 
	function __construct() {
		parent::__construct();		
		$this->load->library('htmlcut');
	}
 
	function index() {

    	$data = array(
    		
    	);
		$this->parser->parse('frontend/cust_home', $data);
	}
  
}