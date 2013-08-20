<?php

	echo "seriously wtf -.-";
	echo "<br>";
	echo "THIS WILL WORK";
	echo "<br>";
	
	//print "THIS WILL WORK";
	
	$x=10;
	echo $x;
	$x+=5;
	echo $x;
	$x/=3;
	echo $x;
	echo "<br>";
		
	$str1 = "Left";
	$num1 = 4;
	$str2 = "Dead";
	$num2 = 2;
	
	$str_total = $str1 . $num1 . $str2 . $num2;
	
	echo $str_total;
	echo "<br>";
	
	$text = "Here is some text";
	echo "The text is $text <br>";
	echo 'Or the text is $text <br>';
	
	
	echo "<br> Now let's try a conditional and a function call: <br>";
	$un = "Thor";
	$pw_right = "mjollnir";
	$pw_wrong = "gungnir";
	
	function pwchecker($pw_passed)
	{
		global $un, $pw_right;
		
		if ($pw_passed == $pw_right)
		{
			echo "Password accepted.  Welcome, $un. <br>";
		}
		
		else
		{
			echo "Invalid password.  You will have to do better than that. <br>";
		}
		
	}
	
	echo "Username:  $un <br>";
	echo "Password:  $pw_wrong <br>";
	pwchecker($pw_wrong);
	echo "<br>";
	echo "Username:  $un <br>";
	echo "Password:  $pw_right <br>";
	pwchecker($pw_right);
	echo "<br>";
	
	
	
?>