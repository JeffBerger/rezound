<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	
	public function index()
	{
		if ( $this->session->userdata('login_state') == FALSE ) {
			redirect( "login/loginform" );    // no session established, kick back to login page
		}
		$view_passed['content_path'] = 'account_user/myaccount_view';
		$this->load->view('template/general_template_view',$view_passed);
	}
	
	public function myaccount()
	{
		if ( $this->session->userdata('login_state') == FALSE ) {
			redirect( "login/loginform" );    // no session established, kick back to login page
		}
		$view_passed['content_path'] = 'account_user/myaccount_view';
		$this->load->view('template/general_template_view',$view_passed);
	}

	public function account_details()
	{
		if ( $this->session->userdata('login_state') == FALSE ) {
			redirect( "login/loginform" );    // no session established, kick back to login page
		}
		$this->load->helper('form');
		$view_passed['content_path'] = 'account_user/account_details_view';
		$this->load->view('template/general_template_view',$view_passed);
	}
	
	
	public function change_normal()
	{
		if ( $this->session->userdata('login_state') == FALSE ) {
			redirect( "login/loginform" );    // no session established, kick back to login page
		}
		
		$this->load->library('form_validation');
		$this->load->model('user_acct_model');
		
		$fieldname = $this->input->post('field_name');
		
		$this->form_validation->set_rules('field_name','New '.$fieldname,'trim|required');
		
		if ($this->form_validation->run())
		{
			$new = $this->input->post('new_value');
			$returnval = $this->user_acct_model->change_field($fieldname, $new);
			$view_passed['result'] = $returnval;
		}
				
		$view_passed['content_path'] = 'account_user/account_details_view';
		$this->load->view('template/general_template_view',$view_passed);
	}
	
	
	public function change_email()
	{
		if ( $this->session->userdata('login_state') == FALSE ) {
			redirect( "login/loginform" );    // no session established, kick back to login page
		}
		
		$this->load->library('form_validation');
		$this->load->model('user_acct_model');
		
		
		$alt = $this->input->post('alt');
		if( $alt )
			$alt = 1;
		else
			$alt = 0;
			
		
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('email','New email','trim|required|email|valid_email|matches[email_retype]');
		$this->form_validation->set_rules('email_retype','Email address confirmation','trim|required');
		
		if ($this->form_validation->run())
		{
			$password = $this->input->post('password');
			$new = $this->input->post('email');
			$returnval = $this->user_acct_model->verify_change_email($password, $new, $alt);
			$view_passed['result'] = $returnval;
		}
		
		$view_passed['content_path'] = 'account_user/account_details_view';
		$this->load->view('template/general_template_view',$view_passed);
		
		
	}
	
	public function change_pass()
	{
		if ( $this->session->userdata('login_state') == FALSE ) {
			redirect( "login/loginform" );    // no session established, kick back to login page
		}
		
		$this->load->library('form_validation');
		$this->load->model('user_acct_model');
		
		$this->form_validation->set_rules('password_old','Old password','trim|required');
		$this->form_validation->set_rules('password_new','New password','trim|required|min_length[8]|max_length[20]|matches[password_retype]');
		$this->form_validation->set_rules('password_retype','Password confirmation','trim|required');
		
		if ($this->form_validation->run())
		{
			$old = $this->input->post('password_old');
			$new = $this->input->post('password_new');
		
			$returnval = $this->user_acct_model->change_password($old, $new);
			$view_passed['result'] = $returnval;
		}
				
		$view_passed['content_path'] = 'account_user/account_details_view';
		$this->load->view('template/general_template_view',$view_passed);
		
		
	}
	
	public function profile(){
		if ( $this->session->userdata('login_state') == FALSE ) {
			redirect( "" );    // no session established, kick back to login page
		}
		if ( $this->session->userdata('is_artist')){
			$this->load->model("artist_model");
			$user_id = $this->session->userdata("user_id");
			$view_passed["bands"] = $this->artist_model->get_bands($user_id);
			$view_passed['content_path'] = 'account_artist/profile_view';
		}else{
			$view_passed['content_path'] = 'account_user/profile_view';
		}
		$this->load->view('template/general_template_view',$view_passed);
		
		
	}
	
	public function verify_email(){
		$this->load->model('user_acct_model');
	
		$verify_id = $this->uri->segment(3);
		$returnval = $this->user_acct_model->change_email($verify_id);
		$view_passed['result'] = $returnval;
		
		redirect('account/profile');
		
//		$view_passed['content_path'] = 'account_user/account_details_view';
//		$this->load->view('template/general_template_view',$view_passed);
	
	}
	
}