<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Git extends CI_Controller {

    public function index(){
	error_log("GIT HAS BEEN FIRED");
	error_log(print_r($_REQUEST,true));
    }
}

