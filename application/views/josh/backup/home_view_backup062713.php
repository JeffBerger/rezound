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
 				<img class="arrow prev" src="<?=base_url()?>img/rezound_prevarrow.gif" />
 		</div>
	</div>

 
 <?php if($f_bands != 'fail') : ?> 
 	<?php
// 		$this->load->model('featured_model');
//		$f_bands = $this->featured_model->featured_band_info();
//		$f_bands = 10;
 		for($i=0; $i<count($f_bands); $i++)	// band IDs are 1-indexed in DB
 	: ?>
 	
	<div class="individual_container" style=width:150px;height:100%;margin:20px;float:left>
 	
 		<div class="text_box_top" style=width:100%;height:45px>
 			<center>
	 		<span class="poptext" hidden><?=$f_bands[$i][0]?></span>
 			</center>
 		</div>
 		
	 	<div class="image_box" style=width:100%;height:150px>
 			<img class="popoutmedia" src="<?=base_url() . $f_bands[$i][1]?>" width=150px height=150px />
 		</div>
 		
	 	<div class="text_box_bottom" style=width:100%;height:105px>
 			<center>
 			<br><span class="poptext" hidden><b>Latest Release:</b>  <?=$f_bands[$i][2]?></span>
 			<!-- Note:  Line break above was needed if using <p> to prevent this div box from shifting down when the text appears. -->
 			</center>
 		</div>
 		
	</div>
 		
 	<?php endfor;?>
 <?php endif;?>
 
 	<div class="arrow_container" style=width:50px;height:100%;margin:10px;float:left>
		<div style=height:95px>
		</div>
		<div height=50px>
 				<img class="arrow next" src="<?=base_url()?>img/rezound_nextarrow.gif" />
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
 				<img class="arrow prev" src="<?=base_url()?>img/rezound_prevarrow.gif" />
 		</div>
	</div>



<?php for($i=1;$i<=15;$i++) : ?>

 	<div class="individual_container" style=width:150px;height:100%;margin:20px;float:left>
 	
 		<div class="text_box_top" style=width:100%;height:45px>
 			<center>
	 		<span class="poptext" hidden>Artist <?=$i?></span>
 			</center>
 		</div>
 		
	 	<div class="image_box" style=width:100%;height:150px>
 			<img id="<?="album_".$i?>" class="popoutmedia" src="<?=base_url()?>img/featuredalbum.jpg" width=150px height=150px />
 		</div>
 		
	 	<div class="text_box_bottom" style=width:100%;height:105px>
 			<center>
 			<br><span class="poptext" hidden>Album <?=$i?> with a really really really really really really long title</span>
 			<!-- Note:  Line break above was needed if using <p> to prevent this div box from shifting down when the text appears. -->
 			</center>
 		</div>
 		
	</div>
 
 <?php endfor;?>
 
	<div class="arrow_container" style=width:50px;height:100%;margin:10px;float:left>
		<div style=height:95px>
		</div>
		<div height=50px>
 				<img class="arrow next" src="<?=base_url()?>img/rezound_nextarrow.gif" />
 		</div>
	</div>
<!-- tried using style=vertical-align:middle but it didn't work -->
 
 </div>
 
 <div style="clear: both"></div>
 <br>
 <br>
 
 <div>
 
 <?php for($i=6;$i<=10;$i++) : ?>
<!-- 
 	<div class="individual_container" style="float:left;margin:20px">

 		<div class="text_box_top" style=width:100%;height:100%>
	 		<span class="poptext" style="text-align: center" hidden>Artist <?=$i?></span>
 		</div>
 			<img id="<?="album_".$i?>" class="popoutmedia" src="<?=base_url()?>img/featuredalbum.jpg" width=150px height=150px style="display: block"/>

 			<p class="poptext" hidden>Album <?=$i?> with a really really really really really really long title</p>

	</div>
 -->
	
 <?php endfor;?>
 </div>
 	
 <div style="clear: both"></div>
 <br>
 <br>
 
<h1>Venues</h1>
<!-- 
<div id="venue_container" style=width:100%;height:200px>
</div>
 -->

<script>

var inith = $('.popoutmedia').eq(0).height();
var initw = $('.popoutmedia').eq(0).width();
var finh = inith * 1.25;
var finw = initw * 1.25;
var arrow_dir;
/*var win_w = $(window).width(); //	I think this is only evaluated once by the browser, making it useless to store in a variable. */
var cont_w = $('.individual_container').eq(0).outerWidth(true);
var arr_w = $('.arrow_container').eq(0).outerWidth(true);
var cont_num;	// will hold the number of album, etc containers that can be visible on a single row
var album_cont_margin = $('#album_container').outerWidth(true) - $('#album_container').outerWidth();	// total margin with of album container (includes both sides)

$('.popoutmedia').hover(
	function(){
		$(this).toggleClass('hovered');
		$(this).stop().animate({width: finw, height: finh, margin:[-($(this).height()*(0.25) / 2),0,0,0], easing:"easeOutQuint"}, 300, showtext);
	},
	function(){
		$(this).toggleClass('hovered');
		//$(this).stop().animate({width: $(this).width() * 0.8, height: $(this).height() * 0.8,  margin:0, easing:"easeInQuint"}, 300);
		$(this).stop().animate({width:initw, height:inith,  margin:0, easing:"easeInQuint"}, 300);
		$('.poptext').fadeOut(300);
	}
);


function showtext(){
	$('.individual_container:has(.hovered) .poptext').fadeIn(800);	//.delay(800)
	//	***ALERT***		Space above is very important!  Specifies ancestor/descendent relationship.
	//					For more info, see jQuery documentation on selection by hierarchy:  http://api.jquery.com/descendant-selector/
	//	Note:	CSS pseudo-classes also might work
};



$('.arrow').click(function(){
//	$(this).effect("highlight", {color:"#e75d09"});
	if($(this).hasClass('prev'))
		arrow_dir = "left";
	else
		arrow_dir = "right";
	$(this).stop().effect("slide", {direction:arrow_dir, distance:10}); 
	$('.ui-effects-wrapper:has(.arrow)').css("overflow", "visible");	// prevents clipping
});
//KNOWN ISSUE:		If rapidly clicked, some slight migration occurs.



$(window).resize(function(){
	cont_num = Math.floor( ($(this).width() - 2*arr_w - album_cont_margin) / cont_w );
	$('.individual_container:visible').hide();
	$('.individual_container:hidden').slice(0, cont_num).show();	// syntax subtlety:	2nd argument is first not to be selected
});

$(document).ready(function(){
	cont_num = Math.floor( ($(this).width() - 2*arr_w - album_cont_margin) / cont_w );
	$('.individual_container:visible').hide();
	$('.individual_container:hidden').slice(0, cont_num).show();	// syntax subtlety:	2nd argument is first not to be selected

	if($("#verified").val() == "true"){
		$("#dialog").html("Congratulations, you are verified!");
		$("#dialog").dialog();
	}
});



</script>