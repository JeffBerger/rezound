
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



//	Enlarge image of featured item upon mouse hover
//function popper(){
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
//};

//Fade in descriptive text corresponding to hovered item
function showtext(){
	$('.individual_container:has(.hovered) .poptext').fadeIn(800);	//.delay(800)
	//	***ALERT***		Space above is very important!  Specifies ancestor/descendent relationship.
	//					For more info, see jQuery documentation on selection by hierarchy:  http://api.jquery.com/descendant-selector/
	//	Note:	CSS pseudo-classes also might work
};


//	Animate a scroll arrow when clicked
//	Scroll through items when a scroll arrow is clicked
$('.arrow').click(function(){
//	animation
//	$(this).effect("highlight", {color:"#e75d09"});
	if($(this).hasClass('prev'))
		arrow_dir = "left";
	else
		arrow_dir = "right";
	$(this).stop().effect("slide", {direction:arrow_dir, distance:10}); 
	$('.ui-effects-wrapper:has(.arrow)').css("overflow", "visible");	// prevents clipping

//	scroll through


});
//KNOWN ISSUE:		If rapidly clicked, some slight migration occurs.
