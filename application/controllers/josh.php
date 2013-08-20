<?php

class Josh extends CI_Controller{

	public function test()
	{
		$this->load->view('josh/test_view');
	}
	
	
	public function test2()
	{
//		if ( $this->session->userdata('login_state') == FALSE ) {
//			redirect( "login/loginform" );    // no session established, kick back to login page
//		}
		$view_passed['content_path'] = 'josh/test_view';
		$this->load->view('template/general_template_view',$view_passed);
	}


	public function featured()
	{
		$view_passed['content_path'] = 'josh/featured_view';
		$this->load->view('template/general_template_view',$view_passed);
	}

	
	public function home_bootstrap_test()
	{
		$view_passed['content_path'] = 'josh/home_view_bootstrap_test';
		$this->load->view('template/general_template_view',$view_passed);
	}
	

	public function home_backbone_test()
	{
		$view_passed['content_path'] = 'josh/home_view_backbone_test';
		$this->load->view('template/general_template_view',$view_passed);
	}


}


?>