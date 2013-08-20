<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		$view_passed['content_path'] = 'home/home_view';
		$this->load->view('template/general_template_view',$view_passed);
	}
	
	public function featured()
	{
		$this->load->model('featured_model');
		$f_bands = $this->featured_model->featured_band_info();
		$f_albums = $this->featured_model->featured_album_info();
		//error_log("FBANDS FROM CONTROLLER $f_bands");
		//		print_r($f_bands);
		//		$view_passed['f_bands'] = $f_bands;
		
		//	Ajax for loading featured bands
		if($f_bands != 'fail' && $f_albums != 'fail')
		{
			$ajax = array();
			$item1 = $this->input->post('item1');
			$item2 = $this->input->post('item2');
				
			//	Complete the URL for image file locations
			for($i=0; $i<count($f_bands); $i++)
			{
				$f_bands[$i][1] = base_url() . $f_bands[$i][1];
			}
			for($i=0; $i<count($f_albums); $i++)
			{
				$f_albums[$i][1] = base_url() . $f_albums[$i][1];
			}
				
			$ajax = array($f_bands, $f_albums);
				
			echo json_encode($ajax);
		}
		
	}
	
	
	public function about()
	{
		$view_passed['content_path'] = 'home/about_view';
		$this->load->view('template/general_template_view',$view_passed);
	}
	
	public function FAQ()
	{
		$view_passed['content_path'] = 'home/faq_view';
		$this->load->view('template/general_template_view',$view_passed);
	}
	
}