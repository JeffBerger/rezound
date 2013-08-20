<?php

$allowedExts = array("gif", "jpeg", "jpg");
$extension = end(explode(".", $_FILES["file_var"]["name"]));
if ((($_FILES["file_var"]["type"] == "image/gif")
|| ($_FILES["file_var"]["type"] == "image/jpeg")
|| ($_FILES["file_var"]["type"] == "image/jpg"))
&& ($_FILES["file_var"]["size"] < 20000)
&& in_array($extension, $allowedExts))
  {
  

	if ($_FILES["file_var"]["error"] > 0)
	{
		echo "Error: " . $_FILES["file_var"]["error"] . "<br>";
	}
	else
	{
		echo "Upload: " . $_FILES["file_var"]["name"] . "<br>";
		echo "Type: " . $_FILES["file_var"]["type"] . "<br>";
		echo "Size: " . ($_FILES["file_var"]["size"] / 1024) . " kB<br>";
		echo "Stored in: " . $_FILES["file_var"]["tmp_name"] . "<br><br>";
	}
	
	$folder = "joshupload/";
	if(file_exists($folder))
	{
		echo "Folder exists.  Proceeding...<br>";
	}
	else
	{
		echo "Folder does not exist.  Creating...<br>";
		mkdir($folder);
	}

	$filepath = $folder . $_FILES["file_var"]["name"];

	if (file_exists($filepath))
	{
		echo "The file " . $_FILES["file_var"]["name"] . " already exists.  Please choose another.<br>";
	}
	else
	{
		move_uploaded_file($_FILES["file_var"]["tmp_name"], $filepath);
		echo "The file " . $_FILES["file_var"]["name"] . " has been stored in the following location:  " . $filepath . "<br>";
	}


  }
else
  {
  echo "Invalid file.  Please choose another.";
  }


?>