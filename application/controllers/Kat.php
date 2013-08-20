<?php

class Kat extends CI_Controller{

	public function profile_test()
	{
		$view_passed['content_path'] = 'Kat/profile_view';
		$this->load->view('template/general_template_view',$view_passed);
	}


}


?>