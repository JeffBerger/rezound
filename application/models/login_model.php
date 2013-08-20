<?php 

class login_model extends CI_Model{
	
	function sign_up($email,$pass){
		$this->load->library('phpass');
		$hashed = $this->phpass->hash($pass);
		$data = array(
				'email' => $email,
				'username' => $email,
				'password' => $hashed,
				'valid' => 'false',
				'joined_date' => date('Y-m-d H:i:s')
		);
		$this->db->insert('user_accts',$data);
	}
	
	function sign_up_artist($user,$pass,$email){
			$this->load->library('phpass');
		$hashed = $this->phpass->hash($pass);
		$data = array(
				'email' => $email,
				'username' => $user,
				'password' => $hashed,
				'valid' => 'false',
				'joined_date' => date('Y-m-d H:i:s'),
				'is_artist' => 1
		);
		$this->db->insert('user_accts',$data);		
		
		
	}
	
	function login($username,$password){
		$this->load->library('phpass');
		$result = $this->db->get_where('user_accts',array('username' => $username));
		
		if($result->num_rows() == 0)
			return 'fail';
		
		foreach ($result->result() as $row){
			$hashed = $row->password;
			$valid = $row->valid;
		}
		
		if($this->phpass->check($password,$hashed)){
			if($valid)
				return 'pass';
			else
				return 'invalid_user';
		}
		return 'fail';
	}
	
	function verification_email($user_id,$email){
		
		$this->load->library('email');
		$this->email->set_newline('\r\n');
		
		$verif = md5(time());
				
		$this->db->insert('user_verif',array('user_id' => $user_id , 'verification' => $verif));
		
		$rawlink = "www.westphalianarms.com/ReZound/index.php/login/verify_account/$verif";
		$link = "<a href=\"$rawlink\">$rawlink</a>";
		
		$this->email->from("jeff@solcorporation.com","ReZound Autoemail");
		$this->email->to($email);
		$this->email->subject("ReZound user verification");
		$this->email->message("Verify your account by following this link \r\n $rawlink \r\n or pasting it into your browser");
		if(!$this->email->send()){
			show_error($this->email->print_debugger());
		}
	}
	
	function set_user_to_verif($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->update('user_accts',array('valid' => 1));
		$this->db->where('user_id',$user_id);
		$this->db->delete('user_verif');
	}
	
	function verify_acct($verif){
		$result = $this->db->get_where('user_verif',array('verification' => $verif));
		
		if($result->num_rows() == 0)
			return false;
		else{
			foreach($result->result() as $row){
				$user = $row->user_id;
			}
		}
		
		return $user;
		
	}
	
	function get_user_id($user){
		
		$result = $this->db->get_where('user_accts',array('username' => $user));
		
		if($result->num_rows() == 0)
			return false;
		
		foreach ($result->result() as $row){
			return $row->user_id;	
		}	
	}
	
	function get_username($user_id){
	
		$result = $this->db->get_where('user_accts',array('user_id' => $user_id));
	
		if($result->num_rows() == 0)
			return false;
	
		foreach ($result->result() as $row){
			return $row->username;
		}
	}
	
	function is_artist($user){
		$result = $this->db->get_where('user_accts',array('username' => $user));
		
		if($result->num_rows() == 0)
			return false;
		
		foreach ($result->result() as $row){
			return $row->is_artist;
		}		
	}
	
	function get_email($user){
		$result = $this->db->get_where('user_accts',array('username'=>$user));
		
		if($result->num_rows() == 0)
			return false;
		
		foreach ($result->result() as $row){
			return $row->email;
		}
	}
	
	function generate_password($user){
		$newpwd = substr(md5(time()),0,8);

		$this->load->library('phpass');
		$hashed = $this->phpass->hash($newpwd);

		$this->db->where('username',$user);
		$this->db->update('user_accts',array('password' => $hashed));

		return $newpwd;
	}
	
	function reset_password_email($email,$password){
		$this->load->library('email');
		$this->email->set_newline('\r\n');
		
		$this->email->from("jeff@solcorporation.com","ReZound Autoemail");
		$this->email->to($email);
		$this->email->subject("ReZound password reset");
		$this->email->message("Your password has been reset to : $password ");
		
		return $this->email->send();
	}
	
	function does_fb_user_exist($fbid){
		$result = $this->db->get_where('user_accts',array('fb_id' => $fbid));
		if($result->num_rows() == 0)
			return false;
		else
			return true;		
	}
	
	function create_fb_account($username,$fbid,$first_name,$last_name){
		$result = $this->db->get_where('user_accts',array('username' => $username));
		if($result->num_rows() != 0){
			$user = $first_name . " " . $last_name;
			$result = $this->db->get_where('user_accts',array('username' => $user));
			if($result->num_rows() != 0){
				$username = $first_name . " " . $username . " " . $last_name;
			}
		}else {
			$user = $username;
		}
		
		
		$data = array(
				'username' => $user,
				'fb_id' => $fbid,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'joined_date' => date('Y-m-d H:i:s'),
				'valid' => 1
		);
		$this->db->insert('user_accts',$data);
	}
	
	function get_fb_username($fbid){
		$result = $this->db->get_where('user_accts',array('fb_id'=>$fbid));
		
		if($result->num_rows() == 0)
			return false;
		
		foreach ($result->result() as $row)
			return $row->username;		
	}
}