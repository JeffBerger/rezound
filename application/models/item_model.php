<?php 

class Item_model extends CI_Model{
	
	function get_item_info($type, $id){
		
		
		$result = $this->db->get_where($type . 's', array($type . '_id' => $id));	// table names are plural
	
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


?>