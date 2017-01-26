<?php
defined('BASEPATH') or exit('No direct script access!');
/**
* 
*/
class ContactUs extends MX_Controller
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function index()
	{
		$data['content_view'] = 'info/contactus_v';
		$this->load->view('template/template_v.php',$data);
	}
}
?>