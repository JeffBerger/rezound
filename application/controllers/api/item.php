<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');


class Item extends REST_Controller{

	public function item_info_get($type, $id)
	{
		error_log("$type , $id");
		$this->load->model("item_model");
		$data = $this->item_model->get_item_info($type, $id);
		
		if($data != 'fail')
			$this->response($data);
	}


}


?>