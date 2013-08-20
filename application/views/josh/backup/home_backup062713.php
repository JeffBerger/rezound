<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		$this->load->model('featured_model');
		$f_bands = $this->featured_model->featured_band_info();
		error_log("FBANDS FROM CONTROLLER $f_bands");
//		print_r($f_bands);
		$view_passed['f_bands'] = $f_bands;
// 		$this->load->view('template/header_view');
// 		$this->load->view('home/home_view', $view_passed);
// 		$this->load->view('template/footer_view');
		$view_passed['content_path'] = 'home/home_view';
		$this->load->view('template/general_template_view',$view_passed);
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