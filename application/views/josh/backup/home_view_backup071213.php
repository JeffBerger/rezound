<?php if(isset($valid)) : ?>
	<input type="hidden" id="verified" value="true">
<?php else :?>
	<input type="hidden" id="verified" value="false">
<?php endif;?>




<h1>Bands</h1>

<div id="band_container" style=margin:20px>

	<div class="arrow_container" style=width:50px;height:100%;margin:10px;float:left>
		<div style=height:95px>
		</div>
		<div height=50px>
 				<img class="arrow prev" src="<?=base_url()?>img/rezound_prevarrow_2.gif" />
 		</div>
	</div>

 	
	<div id="band_inner_container">
		<!-- Contains the list of featured bands generated and displayed dynamically by scripts. -->
	</div>

 
 	<div class="arrow_container" style=width:50px;height:100%;margin:10px;float:left>
		<div style=height:95px>
		</div>
		<div height=50px>
			<img class="arrow next" src="<?=base_url()?>img/rezound_nextarrow_2.gif" />
<!-- 			<i class="icon-chevron-sign-right icon-4x arrow next"></i>	 -->		<!-- Note:  this method produces some artifacts in the animation -->
 		</div>
	</div>
 

 </div>
 
 
 <div style="clear: both"></div>
 <br>
 <br>
 
 
 
<h1>Albums</h1>

<div id="album_container" style=margin:20px>


	<div class="arrow_container" style=width:50px;height:100%;margin:10px;float:left>
		<div style=height:95px>
		</div>
		<div height=50px>
 				<img class="arrow prev" src="<?=base_url()?>img/rezound_prevarrow_2.gif" />
 		</div>
	</div>

	
	<div id="album_inner_container">
		<!-- Contains the list of featured albums generated and displayed dynamically by scripts. -->
	</div>
	
 
	<div class="arrow_container" style=width:50px;height:100%;margin:10px;float:left>
		<div style=height:95px>
		</div>
		<div height=50px>
 				<img class="arrow next" src="<?=base_url()?>img/rezound_nextarrow_2.gif" />
 		</div>
	</div>
<!-- tried using style=vertical-align:middle but it didn't work -->
 
 </div>

 
 <div style="clear: both"></div>
 <br>
 <br>
 
 	
 
<h1>Venues</h1>
<!-- 
<div id="venue_container" style=width:100%;height:200px>
</div>
 -->




<script src="<?php echo base_url();?>scripts/image_effects.js"></script>



<script>

//Show featured items upon page load
//$(document).ready(function(){

	var path = $("#basepath").val() + 'home/featured';
	var item_sets = [];
	item_sets["item1"] = "bands";
	item_sets["item2"] = "albums";
//	item_sets["item3"] = "venues";

	$.post(path, item_sets, function(response){

		list = jQuery.parseJSON(response);

		/*
		*	"list" organization:
		*		0:	bands
		*			0:	band name
		*			1:	image
		*			2:	latest release
		*		1:	albums
		*			0:	band name
		*			1:	image
		*			2:	album name
		*
		*/
		for(var i=0; i<list[0].length; i++)
		{
			$('#band_inner_container').append('<div class="individual_container" style=width:150px;height:100%;margin:20px;float:left>	<div class="text_box_top" style=width:100%;height:45px>	<center>	<span class="poptext" hidden>' + list[0][i][0] +'</span>	</center>	</div> 	<div class="image_box" style=width:100%;height:150px>	<img class="popoutmedia" src=' + list[0][i][1] + ' width=150px height=150px />	</div> 	<div class="text_box_bottom" style=width:100%;height:105px>	<center>	<br><span class="poptext" hidden><b>Latest Release:  </b>' + list[0][i][2] + '</span>	</center>	</div>	</div>');
		}
		for(var i=0; i<list[1].length; i++)
		{
			$('#album_inner_container').append('<div class="individual_container" style=width:150px;height:100%;margin:20px;float:left>	<div class="text_box_top" style=width:100%;height:45px>	<center>	<span class="poptext" hidden>' + list[1][i][0] +'</span>	</center>	</div> 	<div class="image_box" style=width:100%;height:150px>	<img class="popoutmedia" src=' + list[1][i][1] + ' width=150px height=150px />	</div> 	<div class="text_box_bottom" style=width:100%;height:105px>	<center>	<br><span class="poptext" hidden>' + list[1][i][2] + '</span>	</center>	</div>	</div>');
		}
		

		fit_display();
		image_pop();
		

	});

//});



</script>




<script>




$(window).resize(function(){
//	cont_num = Math.floor( ($(this).width() - 2*arr_w - album_cont_margin) / cont_w );

//	if(cont_num < list.length)	// only perform operation if all elements are not already shown
//	{	
	//	$('.individual_container:visible').hide();
	//	$('.individual_container:hidden').slice(0, cont_num).show();	// syntax subtlety:	2nd argument is first not to be selected
	fit_display();
/*		$('.arrow_container').show();
	}
	else
	{
		$('.arrow_container').hide();
	}
*/
});



$(document).ready(function(){
//	cont_num = Math.floor( ($(this).width() - 2*arr_w - album_cont_margin) / cont_w );

//	if(cont_num < list.length)	// only perform operation if all elements are not already shown
//	{	
	//	$('.individual_container:visible').hide();
	//	$('.individual_container:hidden').slice(0, cont_num).show();	// syntax subtlety:	2nd argument is first not to be selected
	fit_display();
/*		$('.arrow_container').show();
	}
	else
	{
		$('.arrow_container').hide();
	}
*/
	
	if($("#verified").val() == "true"){
		$("#dialog").html("Congratulations, you are verified!");
		$("#dialog").dialog();
	}
});



</script>