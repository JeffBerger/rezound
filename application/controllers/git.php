<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Git extends CI_Controller {

    public function index(){
	$gitarray = json_decode($_POST["payload"],true);
	$branch = $gitarray["ref"];
	$refarray = explode("/",$gitarray["ref"]);
	$branch = $refarray[2];

	if($branch == "master"){
		`cd /home/rezound/rezound`;
		`git pull`;			
	}else if($branch == "jeff"){
		`cd /home/jeff/live/rezound`;
		`git pull`;
	}

		
    }
}

