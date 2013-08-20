<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		parent::Controller();
		loginform();
	}
	
	public function login_user()
	{
		$this->load->model('login_model');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username_prev','Username (usually your email)','trim|required');
		$this->form_validation->set_rules('password_prev','Password','trim|required');
				
		$ajax = array();
		if ($this->form_validation->run())	{
			$user = $this->input->post('username_prev');
			$pass = $this->input->post('password_prev');
			
			$return = $this->login_model->login($user,$pass);
			if($return == 'pass'){
				$this->session->sess_create();
				$this->session->set_userdata('login_state', TRUE);
				$this->session->set_userdata('user_name',$user);
				$user_id = $this->login_model->get_user_id($user);
				
				if(!$user_id){
					$ajax['success'] = "error";
					$ajax['error'] = "<p>Error 0001 logging in and getting the user number</p>";
				}
				else {
					$this->session->set_userdata('user_id',$user_id);
					$ajax['success'] = "pass";
				}
				
				$is_artist = $this->login_model->is_artist($user);
				$this->session->set_userdata('is_artist',$is_artist);
				
			}
			else if($return == 'invalid_user'){
				$ajax['success'] = "error";
				$ajax['error'] = "<p>I'm sorry but your user account is not yet valid, please check your inbox / spam folder for our email and follow the link to verify.</p>";
			}else
				$ajax['success'] = "fail";
			
		}else{
			$ajax['success'] = "error";
			$ajax['error'] = json_encode(validation_errors());
		}
		
		echo json_encode($ajax);
		
		
	}
	
	public function logout(){
// 		$token = $this->session->userdata("FB");
// 		if($token)
// 		{
// 			$graph_url = "https://graph.facebook.com/me/permissions?method=delete&access_token=".$token;
// 			$result = json_decode(file_get_contents($graph_url));
// 		}
		$this->session->sess_destroy();
		// unset cookies
		if (isset($_SERVER['HTTP_COOKIE'])) {
			$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			foreach($cookies as $cookie) {
				$parts = explode('=', $cookie);
				$name = trim($parts[0]);
				setcookie($name, '', time()-1000);
				setcookie($name, '', time()-1000, '/');
			}
		}
		redirect('');
	}
	
	/*@author Jeffrey Berger
	 * Make a signup method that will add them to the DB and it will send them an Email verifying that it is 
valid email by giving them a one-time use email address that they have to click on.  Once they do then we say they are a 
valid user.
	 */
	
	public function signup_user()
	{
		$this->load->model('login_model');
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email','Email Address','trim|required|email|valid_email|is_unique[user_accts.username]');
		$this->form_validation->set_rules('password_new','Password (min 8 chars)','trim|required|min_length[8]|max_length[20]|matches[password_retype]');
		$this->form_validation->set_rules('password_retype','Password Confirmation','trim|required');
		
		$ajax = array();
		
		if($this->form_validation->run()){
			$ajax['success'] = "pass";
				
			$user = $this->input->post('email');
			$pass = $this->input->post('password_new');

			$this->login_model->sign_up($user,$pass);
			$user_id = $this->login_model->get_user_id($user);
			$this->login_model->verification_email($user_id,$user);
		}else{
			$ajax['success'] = "error";
			$ajax['error'] = json_encode(validation_errors());
		}
		
		echo json_encode($ajax);
	}	
	
	public function verify_account(){
		$this->load->model('login_model');
		
		$verify_id = $this->uri->segment(3);
		
		$user_id = $this->login_model->verify_acct($verify_id);
		
		if($user_id === false){
			redirect('login/login_form');
		}else{
			$this->login_model->set_user_to_verif($user_id);
			
			$user = $this->login_model->get_username($user_id);
			$is_artist = $this->login_model->is_artist($user);
			
			$this->session->sess_create();
			$this->session->set_userdata('login_state', TRUE);
			$this->session->set_userdata('user_name',$user);
			$this->session->set_userdata('user_id',$user_id);
			$this->session->set_userdata('is_artist',$is_artist);
			
			$view_passed['valid'] = true;
			$view_passed['content_path'] = 'home/home_view';
			$this->load->view('template/general_template_view',$view_passed);
		}
	
	}
	
	public function artist_signup_form(){
		$this->load->model('login_model');
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username',"User Name",'trim|required|is_unique[user_accts.username]');
		$this->form_validation->set_rules('email','Email Address','trim|required|email|valid_email');
		$this->form_validation->set_rules('password','Password (min 8 chars)','trim|required|min_length[8]|max_length[20]|matches[password_retype]');
		$this->form_validation->set_rules('password_retype','Password Confirmation','trim|required');

		
		if($this->form_validation->run()){
			$ajax['success'] = "pass";
			
			$user = $this->input->post('username');
			$email = $this->input->post('email');
			$pass = $this->input->post('password');
			
		
			$this->login_model->sign_up_artist($user,$pass,$email);
			$user_id = $this->login_model->get_user_id($user);
			$this->login_model->verification_email($user_id,$email);
		}else{
			$ajax['success'] = "error";
			$ajax['error'] = json_encode(validation_errors());
		}
		echo json_encode($ajax);
		
	}
	
	public function facebook_login(){
		$this->load->model('login_model');
		
		$username = $this->input->post("username");
		$fbid = $this->input->post("id");
		$firstname = $this->input->post("first_name");
		$lastname = $this->input->post("last_name");
		
		if(!$this->login_model->does_fb_user_exist($fbid)){
			$user = $this->login_model->create_fb_account($username,$fbid,$firstname,$lastname);
		}

		if(!$user){
			$this->session->sess_create();
			$this->session->set_userdata('login_state', TRUE);
			$this->session->set_userdata('user_name',$user);
			$this->session->set_userdata('FB', $this->input->post("accessToken"));
			$this->session->set_userdata('user_id',$this->login_model->get_user_id($user));
			echo "pass";
		}else{
			echo "fail";
		}

	}
	
	public function reset_password(){
		$user = $this->input->post("username");
		$this->load->model('login_model');
		
		//Get their email from the DB
		$email = $this->login_model->get_email($user);
		if($email == false){
			echo "fail";
			exit;
		}
		//If they aren't in the DB return an error
		
		//If they are, use md5 and the time and take the first 8 char to generate a random password
		//Give them the new password in an email
		$pass = $this->login_model->generate_password($user);
		error_log("PASS $pass");
		if($this->login_model->reset_password_email($email,$pass))
			echo "pass";
		else
			echo "fail";
		
		exit;
		//Return pass
	}
}