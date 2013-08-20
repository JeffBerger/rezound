<p><i>Featured Artists</i></p>

<?php

function display_featured($artist,$album)
{
	// I would like to move the HTML code into a PHP function so I can call it repeatedly, but I can't figure out how.
}
?>

<!--
<table border="0">
<tr>
	<td>Artist 1</td>
	<td>Latest album 1</td>
	
</tr>
-->

<div id="container" style=width:1000px;height:500px;>

<?php for($i=0;$i<5;$i++) : ?>

<hr>

<div style=background-color:#888888;width:50%;float:left;>
	<b>Artist <?php echo $i;?></b><br>
	<img src="http://westphalianarms.com/ReZound/img/featuredalbum.jpg">
</div>

<div style=width:50%;float:left;>
	<table border="0">
	<tr>
		<th>Latest Album:</th>
		<td>Album name</td>
	</tr>
	<tr>
		<th>Released:</th>
		<td>Release date</td>
	</tr>
	<tr>
		<th>Genre:</th>
		<td>Band/album genre</td>
	</tr>
	<tr>
		<th>Current Single:</th>
		<td>Single track name</td>
	</tr>
	
	</table>
</div>

<div  style=clear:both;>	<!--clears floating objects on right and left-->
<hr>
</div>
<?php endfor;?>

</div>



