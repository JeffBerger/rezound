<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artist extends CI_Controller {
	
	public function index(){
		parent::Controller();
	}
	
	public function bands(){
		$id = $this->uri->segment(3);
		
		$this->load->model("artist_model");
		$result = $this->artist_model->bands($id);
		
		echo json_encode($result);
	}
	
}