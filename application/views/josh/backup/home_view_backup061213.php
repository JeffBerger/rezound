<h1>Artists</h1>
<!-- 
<div id="artist_container" style=width:100%;height:200px>
</div>
 -->

<h1>Albums</h1>

<div>

<?php for($i=1;$i<=5;$i++) : ?>

 	<div class="individual_container" style=width:190px;height:100%;float:left>
 	
 		<div class="text_box_top" style=width:150px;height:45px>
 			<center>
	 		<span class="poptext" hidden>Artist <?php echo $i;?></span>
 			</center>
 		</div>
 		
	 	<div class="image_box" style=width:190px;height:150px>
 			<img id="<?php echo "album_".$i;?>" class="popoutmedia" src="<?php echo base_url();?>img/featuredalbum.jpg" width=150px height=150px />
 		</div>
 		
	 	<div class="text_box_bottom" style=width:150px;height:105px>
 			<center>
 			<br><span class="poptext" hidden>Album <?php echo $i;?> with a really really really really really really long title</span>
 			<!-- Note:  Line break above was needed if using <p> to prevent this div box from shifting down when the text appears. -->
 			</center>
 		</div>
 		
	</div>
 
 <?php endfor;?>
 </div>
 
 <div style="clear: both"></div>
 <br>
 <br>
 
 <div>
 
 <?php for($i=6;$i<=10;$i++) : ?>

 	<div class="individual_container" style="float:left;margin:20px">

 		<div class="text_box_top" style=width:100%;height:100%>
	 		<span class="poptext" style="text-align: center" hidden>Artist <?php echo $i;?></span>
 		</div>
 			<img id="<?php echo "album_".$i;?>" class="popoutmedia" src="<?php echo base_url();?>img/featuredalbum.jpg" width=150px height=150px style="display: block"/>

 			<p class="poptext" hidden>Album <?php echo $i;?> with a really really really really really really long title</p>

	</div>
 
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
// KNOWN ISSUE:		if image moused over many times quickly, erratic resizing and positioning occurs



function showtext(){
	$('.individual_container:has(.hovered) .poptext').fadeIn(800);	//.delay(800)
	//	***ALERT***		Space above is very important!  Specifies ancestor/descendent relationship.
	//					For more info, see jQuery documentation on selection by hierarchy:  http://api.jquery.com/descendant-selector/
};

/*
function hidetext(){
	$('.poptext').hide("fade", 300);
};
*/


//function exitfunc(){
//	$(this).effect("scale", {percent:125, origin:["middle","center"]}, 1);
//	$(this).toggle({effect:"scale", percent:100, origin:["middle","middle"], easing:"easeInQuint"}, 1000);

//};


</script>