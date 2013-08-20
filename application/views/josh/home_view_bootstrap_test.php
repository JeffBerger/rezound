<?php if(isset($valid)) : ?>
	<input type="hidden" id="verified" value="true">
<?php else :?>
	<input type="hidden" id="verified" value="false">
<?php endif;?>



<h1><i class="icon-beaker icon-large"></i> Bootstrap Testing Ground</h1>

<h3>Pagination:</h3>

<div class="pagination pagination-centered">
	<ul>
		<li><a href="#"><i class="icon-chevron-sign-left"></i></a></li>
		<li><a href="#"><img class="popoutmedia" src="<?=base_url()?>img/profiledefault.png" style="width:150px; height:150px; max-width:none" /></a></li>
		<li><a href="#"><img class="popoutmedia" src="<?=base_url()?>img/featuredalbum.jpg" style="width:150px; height:150px; max-width:none" /></a></li>
		<li><a href="#"><img class="popoutmedia" src="<?=base_url()?>img/featuredvenue.jpg" style="width:150px; height:150px; max-width:none" /></a></li>
		<li><a href="#"><img class="popoutmedia" src="<?=base_url()?>img/profiledefault.png" style="width:150px; height:150px; max-width:none" /></a></li>
		<li><a href="#"><img class="popoutmedia" src="<?=base_url()?>img/featuredalbum.jpg" style="width:150px; height:150px; max-width:none" /></a></li>
		<li><a href="#"><img class="popoutmedia" src="<?=base_url()?>img/featuredvenue.jpg" style="width:150px; height:150px; max-width:none" /></a></li>
		<li><a href="#"><img class="popoutmedia" src="<?=base_url()?>img/profiledefault.png" style="width:150px; height:150px; max-width:none" /></a></li>
		<li><a href="#"><img class="popoutmedia" src="<?=base_url()?>img/featuredalbum.jpg" style="width:150px; height:150px; max-width:none" /></a></li>
		<li><a href="#"><img class="popoutmedia" src="<?=base_url()?>img/featuredvenue.jpg" style="width:150px; height:150px; max-width:none" /></a></li>
		<li><a href="#"><i class="icon-chevron-sign-right"></i></a></li>
	</ul>
</div>


<h3>Carousel:</h3>

<div id="testCarousel" class="carousel slide" style="margin:20px; width:450px">
	<ol class="carousel-indicators">
		<li data-target="#testCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#testCarousel" data-slide-to="1"></li>
		<li data-target="#testCarousel" data-slide-to="2"></li>
	</ol>

	<!-- Carousel items -->
	<div class="carousel-inner">
		<div class="active item">
				<img src="<?=base_url()?>img/profiledefault.png" style="width:150px; height:150px; max-width:none; float:left" />
				<img src="<?=base_url()?>img/featuredalbum.jpg" style="width:150px; height:150px; max-width:none; float:left" />
				<img src="<?=base_url()?>img/featuredvenue.jpg" style="width:150px; height:150px; max-width:none; float:left" />
			<div style="clear: both"></div>
			<div class="carousel-caption">
				<div style=float:left>
					<h4>Caption 1</h4>
					<p>The caption for set 1.</p>
				</div>
				<div style=float:left>
					<h4>Caption 1</h4>
					<p>The caption for set 1.</p>
				</div>
				<div style=float:left>
					<h4>Caption 1</h4>
					<p>The caption for set 1.</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img src="<?=base_url()?>img/profiledefault.png" style="width:150px; height:150px; max-width:none; float:left" />
			<img src="<?=base_url()?>img/featuredalbum.jpg" style="width:150px; height:150px; max-width:none; float:left" />
			<img src="<?=base_url()?>img/featuredvenue.jpg" style="width:150px; height:150px; max-width:none; float:left" />
			<div style="clear: both"></div>
			<div class="carousel-caption">
				<h4>Caption 2</h4>
				<p>The caption for set 2.</p>
			</div>
		</div>
		<div class="item">
			<img src="<?=base_url()?>img/profiledefault.png" style="width:150px; height:150px; max-width:none; float:left" />
			<img src="<?=base_url()?>img/featuredalbum.jpg" style="width:150px; height:150px; max-width:none; float:left" />
			<img src="<?=base_url()?>img/featuredvenue.jpg" style="width:150px; height:150px; max-width:none; float:left" />
			<div style="clear: both"></div>
			<div class="carousel-caption">
				<h4>Caption 3</h4>
				<p>The caption for set 3.</p>
			</div>
		</div>
	</div>

	<!-- Carousel nav -->
	<a class="carousel-control left" href="#testCarousel" data-slide="prev"><i class="icon-caret-left"></i></a>
	<a class="carousel-control right" href="#testCarousel" data-slide="next"><i class="icon-caret-right"></i></a>
</div>

    
    
    
    
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
				$('body').prepend('AJAX FAILED');
		}

		fit_display();
		image_pop();

		});
	//}	

		


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