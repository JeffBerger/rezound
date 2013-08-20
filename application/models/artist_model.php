<?php 

class artist_model extends CI_Model{
	
	function get_bands($user_id){
		$result = $this->db->get_where('band_members',array('user_id' => $user_id));
		
		foreach ($result->result() as $row)
			$bandid[] = $row->band_id;
		
		$data = array();
		
		foreach($bandid as $band_id){
			$result = $this->db->get_where('bands',array('band_id' => $band_id));
			
			
			foreach ($result->result() as $row){
				$bandentry = array();
				
				foreach($row as $key => $val){
					if($val && $val != "")
						$bandentry[$key] = $val;
				}
				$data[] = $bandentry;
				
			}
			
		}
		
		return $data;
	}
	
}