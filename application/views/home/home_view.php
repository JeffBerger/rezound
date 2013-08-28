<?php if(isset($valid)) : ?>
	<input type="hidden" id="verified" value="true">
<?php else :?>
	<input type="hidden" id="verified" value="false">
<?php endif;?>

TEST TEST TEST GITPULL TESTwww

<h1><i class="icon-group icon-large"></i> Bands</h1>

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
 
 
 
<h1><i class="icon-music icon-large"></i> Albums</h1>

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
 
 	
 
<h1><i class="icon-ticket icon-large"></i> Venues</h1>

<div id="venue_container" style=margin:20px>


	<div class="arrow_container" style=width:50px;height:100%;margin:10px;float:left>
		<div style=height:95px>
		</div>
		<div height=50px>
 				<img class="arrow prev" src="<?=base_url()?>img/rezound_prevarrow_2.gif" />
 		</div>
	</div>

	
	<div id="venue_inner_container">
		<!-- Contains the list of featured venues generated and displayed dynamically by scripts. -->
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
 
 <iframe src="https://kiwiirc.com/client/hubbard.freenode.net/?nick=rezound_de|?#fuziontech" style="border:0; width:100%; height:450px;"></iframe>




<script src="<?php echo base_url();?>scripts/image_effects.js"></script>



<script>

//Show featured items upon page load
//$(document).ready(function(){

	var path = $("#basepath").val() + 'home/featured';

	// Specify which featured item types to show here
	var item_sets = ["bands", "albums", "venues"];
	var item_singular = [];

	// Remove "s" from name of each type for selecting certain objects below
	for(var j=0; j<item_sets.length; j++)
	{
		item_singular[j] = item_sets[j].slice(0, item_sets[j].length-1);
	}
		
	// Ajax for fetching item information
	$.post(path, {item_sets: item_sets}, function(response)
	{
		featured_list = jQuery.parseJSON(response);

		for(var k=0; k<featured_list.length; k++)
		{
			if(featured_list[k] != 'fail')
			{
				// insert item information into HTML for display
				for(var i=0; i<featured_list[k].length; i++)
				{
					$('#' + item_singular[k] + '_inner_container').append('<div class="individual_container" style=width:150px;height:100%;margin:20px;float:left>	<div class="text_box_top" style=width:100%;height:45px>	<center>	<span class="poptext" hidden>' + featured_list[k][i][0] +'</span>	</center>	</div> 	<div class="image_box" style=width:100%;height:150px>	<img class="popoutmedia" src=' + featured_list[k][i][1] + ' style="width:150px; height:150px; max-width:none" />	</div> 	<div class="text_box_bottom" style=width:100%;height:105px>	<center>	<br><span class="poptext" hidden>' + featured_list[k][i][2] + '</span>	</center>	</div>	</div>');
				}
			}
			else
//				$('body').prepend('AJAX FAILED');
				$('#' + item_singular[k] + '_inner_container').append('There are no featured ' + item_sets[k] + ' to display at this time.');
		}

		fit_display();
		hide_arrows();
		image_pop();

		});
	//}	

		


//});



</script>




<script>




$(window).resize(function(){
	fit_display();
	hide_arrows();
});



$(document).ready(function(){

	fit_display();
	hide_arrows();
		
	if($("#verified").val() == "true"){
		$("#dialog").html("Congratulations, you are verified!");
		$("#dialog").dialog();
	}
});



</script>