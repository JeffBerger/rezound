<?php 

class music_model extends CI_Model{
	
	function get_track_info($id){
		$result = $this->db->get_where('tracks',array('track_id' => $id));
		
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
	
	function get_album_info($id){

		$result = $this->db->get_where('albums',array('album_id' => $id));
		
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
}