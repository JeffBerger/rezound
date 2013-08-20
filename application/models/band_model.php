<?php 

class Band_model extends CI_Model{
	
	function get_band_info($id){
		$result = $this->db->get_where('bands',array('band_id' => $id));
	
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