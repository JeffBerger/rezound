<?php echo $error;?>

<?php echo form_open_multipart('jeff/uploadhandler');?>

<!-- <form action="<?php echo base_url();?>index.php/jeff/uploadhandler" method="post" enctype="multipart/form-data"> -->
<input type="file" name="file"/>
<input type="submit" value="upload" />
</form>

<?php if(isset($filename)):?>
	<input type="hidden" id="path" value="<?php echo base_url();?>uploads/<?php echo $filename;?>"/>
	<span>Formats available to download your file in are : </span>
	<select id="myList">
  <option></option>
  <?php foreach ($formats as $format):?>
  <option><?php echo $format;?></option>
  <?php endforeach;?>
</select>
<a id="download" href="" download>DOWNLOAD LINK</a>

<?php endif;?>

<script type="text/javascript">

$("#download").click(function(e){
	var format = $("#myList option:selected").text();
	if(format == ""){
		e.preventDefault();
		alert("Please choose a file format");
	}
});

$("#myList").change(function(){
	var format = $("#myList option:selected").text();
	if(format != "")
		$("#download").attr("href",$("#path").val()+"."+format);
});

</script>