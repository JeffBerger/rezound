<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class Artist extends REST_Controller
{
	public function bands_get($id)
	{
		$this->load->model("artist_model");
		$data = $this->artist_model->get_bands($id);
		
		$this->response($data);
	}
}