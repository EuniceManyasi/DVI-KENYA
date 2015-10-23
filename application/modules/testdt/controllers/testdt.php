<?php
/**
* 
*/
class Testdt extends MX_Controller
{
	
	function __construct()
	{
      parent::__construct();
	}
	function tester(){
		//$this->load->view('test_v');
	  $data['module'] = "testdt";
      $data['view_file'] = "test_v";
      $data['section'] = "stock";
      $data['subtitle'] = "Test Stock";
      $data['page_title'] = "Test Stock";
      echo Modules::run('template/admin', $data);
	}
}
?>