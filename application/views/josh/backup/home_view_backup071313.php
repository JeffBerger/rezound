<?php if(isset($valid)) : ?>
	<input type="hidden" id="verified" value="true">
<?php else :?>
	<input type="hidden" id="verified" value="false">
<?php endif;?>




<h1><i class="icon-group"></i> Bands</h1>

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
 
 
 
<h1><i class="icon-music"></i> Albums</h1>

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
 
 	
 
<h1><i class="icon-ticket"></i> Venues</h1>

<div id="venue_container" style=margin:20px>


	<div class="arrow_container" style=width:50px;height:100%;margin:10px;float:left>
		<div style=height:95px>
		</div>
		<div height=50px>
 				<img class="arrow prev" src="<?=base_url()?>img/rezound_prevarrow_2.gif" />
 		</div>
	</div>

	
	<div id="venue_inner_container">
		<!-- Contains the list of featured albums generated and displayed dynamically by scripts. -->
	</div>
	
 
	<div class="arrow_container" style=width:50px;height:100%;margin:10px;float:left>
		<div style=height:95px>
		</div>
		<div height=50px>
 				<img class="arrow next" src="<?=base_url()?>img/rezound_nextarrow_2.gif" />
 		</div>
	</div>
 
 </div>

 
 <div style="clear: both"></div>
 <br>
 <br>
 




<script src="<?php echo base_url();?>scripts/image_effects.js"></script>



<script>

//Show featured items upon page load
//$(document).ready(function(){

	var path = $("#basepath").val() + 'home/featured';

	// Specify which featured item types to show here
	var item_sets = ["bands", "albums", "venues"];

	for(var j=0; j<item_sets.length; j++)
	{
		var item_type = item_sets[j];
		var item_singular = item_type.slice(0, item_type.length-1);
//		$('body').prepend('item_type:  ' + item_type + ' ;  item_singular:  ' + item_singular + '<br>');
		
		$.post(path, {item_type: item_type}, function(response)
		{
//			if(response == 'fail')
//				$('body').prepend('AJAX FAILED');
		
			featured_list = jQuery.parseJSON(response);
//			featured_list.push(jQuery.parseJSON(response));

			if(featured_list != 'fail')
			{
				for(var i=0; i<featured_list.length; i++)
				{
					$('#' + item_singular + '_inner_container').append('<div class="individual_container" style=width:150px;height:100%;margin:20px;float:left>	<div class="text_box_top" style=width:100%;height:45px>	<center>	<span class="poptext" hidden>' + featured_list[i][0] +'</span>	</center>	</div> 	<div class="image_box" style=width:100%;height:150px>	<img class="popoutmedia" src=' + featured_list[i][1] + ' width=150px height=150px />	</div> 	<div class="text_box_bottom" style=width:100%;height:105px>	<center>	<br><span class="poptext" hidden>' + featured_list[i][2] + '</span>	</center>	</div>	</div>');
				}
			}
			else
				$('body').prepend('AJAX FAILED');
			

		fit_display();
		image_pop();

		});
	}	

		


//});



</script>




<script>




$(window).resize(function(){
//	cont_num = Math.floor( ($(this).width() - 2*arr_w - album_cont_margin) / cont_w );

//	if(cont_num < featured_list.length)	// only perform operation if all elements are not already shown
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

//	if(cont_num < featured_list.length)	// only perform operation if all elements are not already shown
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