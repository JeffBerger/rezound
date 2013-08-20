<?php

class featured_model extends CI_Model
{

	function get_featured($type)
	{
		//	$type is one of 'band', 'album', or 'venue'	(singular)
		
		$this->load->helper('date');
		$now = now();	// current time referenced to GMT
		$today = date("Y-m-d H:i:s", $now);
		$f_id = array();

		$this->db->from('featured_' . $type . 's');	// table names are plural
		$this->db->where('start_date <=', $today);
		$this->db->where('end_date >=', $today);
		$result = $this->db->get();
		if($result->num_rows() == 0)
			return 'fail';
		$id_name = $type . "_id";
		foreach($result->result_array() as $row)
		{
//			$f_id = $row->$id_name;
			array_push($f_id, $row[$id_name]);
//			error_log("The array push of $id_name gives us $row[$id_name]");
		}
//		error_log("Length of the f_id array from get_featured: " . count($f_id));
		
		shuffle($f_id);
		return $f_id;
		
	}

	
	function featured_band_info()
	{
		$f_id = $this->get_featured('band');
		$f_bands = array();
//		error_log("Length of the f_id array from featured_band_info: " . count($f_id));
		
		for($i=0; $i<count($f_id); $i++)
		{
			array_push($f_bands, array());
			
			$result = $this->db->get_where('bands', array('band_id' => $f_id[$i]));
			if($result->num_rows() == 0)
				return 'fail';
			foreach($result->result() as $row)
			{
//				$name = $row->band_name;
//				$image = $row->image;
//				$latest = $row->latest_release;
				$f_bands[$i][] = $row->band_name;
				$f_bands[$i][] = $row->image;
				$f_bands[$i][] = $row->latest_release;
				
			}
		
		}
		
//		foreach($f_bands as $key => $value){
//			error_log("FBAND VALUE OF $key and $value");
//		}
//		return array($name, $image, $latest);
		return $f_bands;
		
	}

	
	function featured_album_info()
	{
		$f_id = $this->get_featured('album');
		$f_albums = array();
		//		error_log("Length of the f_id array from featured_album_info: " . count($f_id));
	
		for($i=0; $i<count($f_id); $i++)
		{
			array_push($f_albums, array());
			
			// fetch album info
			$result1 = $this->db->get_where('albums', array('album_id' => $f_id[$i]));
			if($result1->num_rows() == 0)
				return 'fail';
			foreach($result1->result() as $row)
			{
				$f_albums[$i][] = $row->band_id;
				$f_albums[$i][] = $row->image;
				$f_albums[$i][] = $row->album_name;
			}
			
			// fetch band name
			$result2 = $this->db->get_where('bands', array('band_id' => $f_albums[$i][0]));
			if($result2->num_rows() == 0)
				return 'fail';
			foreach($result2->result() as $row)
			{
				$f_albums[$i][0] = $row->band_name;
			}
				
		}
	
			/*
				foreach($f_albums as $key => $value){
					foreach($value as $innervalue){
						error_log("FALBUM VALUE OF $key and $value and $innervalue");
					}
				}
			*/
		return $f_albums;
	
	}
	
}
	
?>