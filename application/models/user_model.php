<?php 

class User_model extends CI_Model{
	
	function get_user_info($id){
		$result = $this->db->get_where('user_accts',array('user_id' => $id));
		
		if($result->num_rows() == 0)
			return 'fail';
		
		$data = array();
		foreach ($result->result() as $row){
			foreach($row as $key => $value){
				if($value && $value != "")
					$data[$key] = $value;
			}
		}
		
		return $data;
	}
	
	function get_user_following($id){
		$data = array();
		$result = $this->db->get_where('users_following',array('user_id' => $id));
		
		$this->load->model("band_model");
		$this->load->model("venue_model");
		
		foreach ($result->result() as $row){
			$data_item = array();
			foreach($row as $key => $value){
				if($value && $value != "")
					if($key=="followed_band_id")
						$data_item = $this->band_model->get_band_info($value);
					else if($key=="followed_user_id")
						$data_item = $this->get_user_info($value);
					else if($key=="followed_venue_id")
						$data_item = $this->venue_model->get_venue_info($value);
						
			}
			$data[] = $data_item;
		}
		
		return $data;
		
	}
	
	function get_ids_following($id){
		$data = array();
		$result = $this->db->get_where('users_following',array('user_id' => $id));
	
		foreach ($result->result() as $row){
			$data_item = array();
			foreach($row as $key => $value){
				if($value && $value != "")
					$data_item[$key] = $value;
			}
			$data[] = $data_item;
		}
	
		return $data;
	
	}
	
	function get_user_followed($id){
		$data = array();
		$result = $this->db->get_where('users_following',array('followed_user_id' => $id));
		
		foreach ($result->result() as $row){
			$user_id = $row->user_id;
			$data[] = $this->get_user_info($user_id);
		}
		
		
		return $data;
	}
	
	function get_user_tracks($id){
		$data = array();
		$this->load->model("music_model");
		$result = $this->db->get_where('user_owned_tracks',array('user_id' => $id));
		
		foreach ($result->result() as $row){
			$track_id = $row->track_id;
			$data[] = $this->music_model->get_track_info($track_id);
		}
		
		return $data;
	}
	
	function get_user_albums($id){
		$data = array();
		$this->load->model("music_model");
		$result = $this->db->get_where('users_owned_albums',array('user_id' => $id));
		
		if($result->num_rows() == 0)
			return 'fail';
		
		foreach ($result->result() as $row){
			$album_id = $row->album_id;
			$data[] = $this->music_model->get_album_info($album_id);
		}
		
		return $data;
	}
}