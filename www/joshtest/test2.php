<?php

//echo "AAAARRRRRGGHHHHHHH$@(*@$)(&!$)";


echo "I'm going to try including some other PHP files.<br><br><br>";

echo "test.php:<br><br>";
include "test.php";
echo "<br>";

/*
echo "formtest.php:<br><br>";
include "formtest.php";
echo "<br>";
*/

echo "Now one that doesn't exist:<br><br>";
include "notthere.php";
//require "notthere.php";
echo "<br>";

echo "This text should only show if include was used in the last command.<br><br><br><br>";

echo "Ok, now for some files of other types.<br><br><br>";

$file = fopen("file_test.txt", "r");
echo fgets($file) . "<br>";
echo fgets($file) . "<br>";
echo fgets($file) . "<br>";
echo fgets($file) . "<br>";
if(feof($file))
{
	echo "At end of file.";
}
else
{
	echo "Not at end of file.";
}
fclose($file);

echo "<br><br>";

$file = fopen("file_test.txt", "r");
do
{
	$char = fgetc($file);
	echo $char;
}while($char != "p");
fclose($file);

echo "<br><br>Test writing to new file:<br>";

$fnew = fopen("file_test_new1.txt", "w");
echo file_exists("file_test_new1.txt") . "<br>";
fwrite($fnew, "This is new text for the file.<br>");
fclose($fnew);

$fnew = fopen("file_test_new1.txt", "a+");
fwrite($fnew, "This is appended text.<br>");
fclose($fnew);

$fnew = fopen("file_test_new1.txt", "r");
while(!feof($fnew))
{
	echo fgets($fnew);
}
fclose($fnew);



?>