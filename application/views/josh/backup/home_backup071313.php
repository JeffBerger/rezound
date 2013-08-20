<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		$view_passed['content_path'] = 'home/home_view';
		$this->load->view('template/general_template_view',$view_passed);
	}
	
	public function featured()
	{
		$featured = array();
		$this->load->model('featured_model');
		
		$item = $this->input->post('item_type');
		if($item == "bands")
			$featured = $this->featured_model->featured_band_info();
		else if($item == "albums")
			$featured = $this->featured_model->featured_album_info();
		else if($item == "venues")
			$featured = $this->featured_model->featured_venue_info();
		else
			$featured = 'fail';
//			exit;
		//error_log("FEATURED FROM CONTROLLER $featured");
		
		//	Ajax for loading featured bands
		if($featured != 'fail')
		{
			for($i=0; $i<count($featured); $i++)
			{
				$featured[$i][1] = base_url() . $featured[$i][1];	//	Complete the URL for image file locations
				
				if($item == "bands")
				{
					$featured[$i][2] = "<b>Latest Release:  </b>" . $featured[$i][2];	//	Complete "latest release" text for bands only
				}
			}
		}

		echo json_encode($featured);
		
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