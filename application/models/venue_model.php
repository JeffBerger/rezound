<?php 

class Venue_model extends CI_Model{

	function get_venue_info($id){
		$result = $this->db->get_where('venues',array('venue_id' => $id));
	
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