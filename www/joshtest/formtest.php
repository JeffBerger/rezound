<?php

$un_input = $_POST["un_input"];
$pw_input = $_POST["pw_input"];

$login=array("Odin"=>"gungnir","Thor"=>"mjollnir","Fergus"=>"cladagh","CuChulainn"=>"gaebolg");

//echo "Testing formtest.php";

foreach($login as $x=>$xval)
{
	if($x === $un_input)
	{
		$pw_onfile = $xval;
		break;
	}
}



function pwchecker($pw_passed)
{
	global $un_input, $pw_onfile;
	
	if ($pw_passed === $pw_onfile)
	{
		echo "Password accepted.  Welcome, $un_input. <br>";
	}
	
	else
	{
		echo "Invalid password.  You will have to do better than that. <br>";
	}
		
}

pwchecker($pw_input);	


?>