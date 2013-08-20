<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class User extends REST_Controller
{
	public function user_info_get($id)
	{
		$this->load->model("user_model");
		$data = $this->user_model->get_user_info($id);
		
		$this->response($data);
	}

	public function user_info_put()
	{
		// Update a user
	}
	
	public function user_info_post()
	{
		// Create a new user
	}

	public function user_info_delete()
	{
		// Make a user inactive
	}

	
	
	public function user_following_get($id)
	{
		$this->load->model("user_model");
		$data = $this->user_model->get_user_following($id);
		
		$this->response($data);
	}
	
	public function user_followed_get($id)
	{
		$this->load->model("user_model");
		$data = $this->user_model->get_user_followed($id);
	
		$this->response($data);
	}
	
}