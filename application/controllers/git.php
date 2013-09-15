<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Git extends CI_Controller {

    public function index(){
        $gitarray = json_decode($_POST["payload"],true);
        $branch = $gitarray["ref"];
        $refarray = explode("/",$gitarray["ref"]);
        $branch = $refarray[2];

        error_log("Branch is $branch");

	putenv("HOME=/var/www");
        if($branch == "master"){
                `git pull`;
        }else if(strpos($branch,"jeff")!==FALSE){
                chdir("/home/jeff/live/rezound");
                `git pull`;
        }else if(strpos($branch,"josh")!==FALSE){
                chdir("/home/josh/live/rezound");
                `git pull`;
        }else if(strpos($branch,"kat")!==FALSE){
                chdir("/home/kat/live/rezound");
                `git pull`;
	}

    }
}
