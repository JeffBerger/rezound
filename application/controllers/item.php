<?php 


class Item extends CI_Controller{

	public function item_info()
	{
		$view_passed['content_path'] = 'item/item_view';
		$this->load->view('template/general_template_view',$view_passed);
	}


}


?>