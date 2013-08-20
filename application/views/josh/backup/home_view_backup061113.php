<h1>Artists</h1>
<!-- 
<div id="artist_container" style=width:100%;height:200px>
</div>
 -->

<h1>Albums</h1>

<div id="album_container" style=width:100%;height:150px;padding:25px>
<img id="album_1" class="popoutmedia" src="<?php echo base_url();?>img/featuredalbum.jpg" title="testing" width=150px height=150px />
</div>

<h1>Venues</h1>
<!-- 
<div id="venue_container" style=width:100%;height:200px>
</div>
 -->

<script>


//$('#album_1').mouseover(function(){
$('.popoutmedia').mouseover(function(){
//	$(this).effect("scale", {percent:125, origin:["middle","center"], easing:"easeOutQuint"}, 1000);
//	$(this).toggle({effect:"scale", percent:125, origin:["middle","center"], easing:"easeOutQuint"}, 1000);
//	$(this).toggle("scale", {percent:125, origin:["middle","center"], easing:"easeOutQuint"}, 1000,function(){$(this).show()});
//	$(this).effect("scale",{percent:125, origin:["middle","center"], easing:"easeOutQuint"},"slow",function(){$('#album').css("height:300px;,width:300px")});
	$(this).animate({width: $(this).width() * 1.25, height: $(this).height() * 1.25, margin:[-($(this).height()*(0.25) / 2),0,0,0], easing:"easeOutQuint"}, 300);
});

//$('#album_1').mouseout(function(){
$('.popoutmedia').mouseout(function(){
	$(this).animate({width: $(this).width() * 0.8, height: $(this).height() * 0.8,  margin:0, easing:"easeInQuint"}, 300);
});




//$('#album_1').effect("size", {to:{width:50, height:50}, scale:"content"}, 1000);

//$('#album_1').effect("scale", {percent:50, origin:["middle","middle"]}, 1000);	// there seems to be a difference between "middle" and "center"



//function exitfunc(){
//	$(this).effect("scale", {percent:125, origin:["middle","center"]}, 1);
//	$(this).toggle({effect:"scale", percent:100, origin:["middle","middle"], easing:"easeInQuint"}, 1000);

//};


</script>