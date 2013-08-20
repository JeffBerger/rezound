<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Music extends CI_Controller {
	
	public function index()
	{
		$view_passed['content_path'] = 'music/home_view';
		$view_passed['is_logged_in'] = false;
		$this->load->view('template/general_template_view',$view_passed);
	}
	public function newmusic()
	{
		$view_passed['content_path'] = 'music/newmusic_view';
		$view_passed['is_logged_in'] = false;
		$this->load->view('template/general_template_view',$view_passed);
	}
	public function artists()
	{
		$view_passed['content_path'] = 'music/artists_view';
		$view_passed['is_logged_in'] = false;
		$this->load->view('template/general_template_view',$view_passed);
	}
	public function albums()
	{
		$view_passed['content_path'] = 'music/albums_view';
		$view_passed['is_logged_in'] = false;
		$this->load->view('template/general_template_view',$view_passed);
	}
	public function genres()
	{
		$view_passed['content_path'] = 'music/genres_view';
		$view_passed['is_logged_in'] = false;
		$this->load->view('template/general_template_view',$view_passed);
	}	
	
}