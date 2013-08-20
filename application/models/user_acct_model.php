<?php

class user_acct_model extends CI_Model
{

	function change_field($fieldname, $newval)
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->where('user_idr', $user_id);
		$this->db->update('user_accts', array($fieldname => $newval));
		
		if($this->db->_error_message())
			return 'fail';
		else
			return 'pass';
	}


	function change_password($oldpass, $newpass)
	{
		$this->load->library('phpass');
		$newhashed = $this->phpass->hash($newpass);		// hash the new password
		
		// pull existing password from database
		$user_id = $this->session->userdata('user_id');
		$result = $this->db->get_where('user_accts', array('user_id' => $user_id));
		if($result->num_rows() == 0)
			return 'fail';
		foreach($result->result() as $row)
		{ 
			$storedpass = $row->password;
		}
		
		// verify old password for security
		if(!$this->phpass->check($oldpass, $storedpass))
			return 'fail';
		
		// update only if new password does not match old password 
		if($this->phpass->check($newpass, $storedpass))
		{
			return 'same_as_old';
		}
		else
		{
			$this->db->where('user_id', $user_id);
			$this->db->update('user_accts', array('password' => $newhashed));
			return 'pass';
		}
	
		return 'fail';
	}
	

	function verify_change_email($password, $email, $alt)
	{	// governs initial operations to attempt to change email address (main or alt)
		$this->load->library('phpass');
		$this->load->library('email');
		$this->email->set_newline('\r\n');
	
		$verif = md5(time());
	
		// pull account info from database
		$user_id = $this->session->userdata('user_id');
		
		//check password
		$result = $this->db->get_where('user_accts', array('user_id' => $user_id));
		if($result->num_rows() == 0)
			return 'fail';
		foreach($result->result() as $row)
		{
			$storedpass = $row->password;
			$stored_email = $row->email;
		}
		if($alt == 1 && $email == $stored_email)
			return 'same_email';	// if alt email matches main email, throw error
		else 
		{
			if($this->phpass->check($password, $storedpass))
			{	// only attempt to change email if password is confirmed
				$rawlink = "www.westphalianarms.com/ReZound/index.php/account/verify_email/$verif";
				$link = "<a href=\"$rawlink\">$rawlink</a>";
	
				$this->email->from("jeff@solcorporation.com","ReZound Autoemail");
				$this->email->to($email);
				$this->email->subject("ReZound email change verification");
				$this->email->message("Verify your email address change by following this link \r\n $rawlink \r\n or pasting it into your browser");
				if(!$this->email->send()){
					show_error($this->email->print_debugger());
				}
			
				$this->db->insert('email_verif',array('user_id' => $user_id , 'verification' => $verif, 'email' => $email, 'alt' => $alt));
			
				return 'pass';
			}
			else
				return 'fail';
		}
		
	}
	
	
	function change_email($verif_id)
	{	// governs operations to actually change email after verification has been completed
		$result = $this->db->get_where('email_verif',array('verification' => $verif_id));

		if($result->num_rows() == 0)
			return 'fail';
		foreach($result->result() as $row)
		{
			$user_id = $row->user_id;
			$email = $row->email;
			$alt = $row->alt;
		}

		$this->session->sess_create();
		$this->session->set_userdata('login_state', true);
		$this->session->set_userdata('user_id', $user_id);
		
		if($alt == 1)
			$fieldname = 'alt_email';
		else
			$fieldname = 'email';
		
		$this->change_field($fieldname, $email);
		
		$this->db->where('verification', $verif_id);
		$this->db->delete('email_verif');
		
		if($this->db->_error_message())
			return 'fail';
		else
			return 'pass';
		
	}

}

?>