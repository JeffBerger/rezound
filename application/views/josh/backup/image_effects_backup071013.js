
var inith = $('.popoutmedia').eq(0).height();	// initial height of "popoutmedia" images
var initw = $('.popoutmedia').eq(0).width();		// initial width of "popoutmedia" images
var finh = inith * 1.25;	// final height of "popoutmedia" images
var finw = initw * 1.25;	// final width of "popoutmedia" images
var arrow_dir;		// direction that scroll arrow points
/*var win_w = $(window).width(); //	I think this is only evaluated once by the browser, making it useless to store in a variable. */
var cont_w = $('.individual_container').eq(0).outerWidth(true);		// width of individual "popoutmedia" object container
var arr_w = $('.arrow_container').eq(0).outerWidth(true);			// width of scroll arrow container
var cont_num;	// number of album, etc containers that can be visible on a single row
var album_cont_margin = $('#album_container').outerWidth(true) - $('#album_container').outerWidth();	// total margin with of album container (includes both sides)

var list;		// holds list of featured items to be displayed and otherwise manipulated on the homepage


var initmar;		// initial margin
var tempmar = [];	// temporary variable for margin adjustments related to "popoutmedia" animation

$(document).ready(function(){
	// Creates an array (if needed) for the margin specification in order to properly animate the hover function below
	initmar = $('.popoutmedia').eq(0).css('margin');
	if (!$.isArray(initmar))
	{
		tempmar = initmar.split("px");
		for(var i=0; i<tempmar.length; i++)
		{
//			tempmar[i] = $.trim(tempmar[i]);
			tempmar[i] = parseFloat(tempmar[i]);
			
			if(isNaN(tempmar[i]))
				tempmar[i] = 0;
		}
	}
});



//	Enlarge image of featured item upon mouse hover
/*
 * Usage notes:
 * 		- Use "popoutmedia" class on img tag (not div that contains img)
 * 		- MUST explicitly specify image height and width
 */
function image_pop(){
	$('.popoutmedia').hover(
			function(){
//				$(this).toggleClass('hovered');
				$(this).addClass('hovered');
				var fmar = [];
				var maradj = [-($(this).height()*(0.25) / 2),0,0,0];
				for(var i=0; i<tempmar.length; i++)
				{
					fmar[i] = tempmar[i] + maradj[i];
				}
				$(this).stop().animate({width: finw, height: finh, margin:fmar, easing:"easeOutQuint"}, 300, showtext);
			},
			function(){
//				$(this).toggleClass('hovered');
				$(this).removeClass('hovered');				
				//$(this).stop().animate({width: $(this).width() * 0.8, height: $(this).height() * 0.8,  margin:0, easing:"easeInQuint"}, 300);
				$(this).stop().animate({width:initw, height:inith,  margin:initmar, easing:"easeInQuint"}, 300);
				$('.poptext').fadeOut(300);
			}
	);
};

//	Fade in descriptive text corresponding to hovered item
function showtext(){
	$('.individual_container:has(.hovered) .poptext').fadeIn(800);	//.delay(800)
	//	***ALERT***		Space above is very important!  Specifies ancestor/descendent relationship.
	//					For more info, see jQuery documentation on selection by hierarchy:  http://api.jquery.com/descendant-selector/
	//	Note:	CSS pseudo-classes also might work
};


//	Animate a scroll arrow when clicked
//	Scroll through items when a scroll arrow is clicked
//function arrow_ops(){
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
//	$('body').prepend($.isArray(list));
	var target = {};
	if(cont_num < list.length){	// only perform scroll if all elements are not already shown
		if(arrow_dir == "right")
		{
			target = $(this).parents().siblings('div[id*="inner_container"]');
//			$('body').prepend(target.attr('id'));
			target.children(':first-child').remove();
			target.append('<div class="individual_container" style=width:150px;height:100%;margin:20px;float:left>	<div class="text_box_top" style=width:100%;height:45px>	<center>	<span class="poptext" hidden>' + list[0][0] +'</span>	</center>	</div> 	<div class="image_box" style=width:100%;height:150px>	<img class="popoutmedia" src=' + list[0][1] + ' width=150px height=150px />	</div> 	<div class="text_box_bottom" style=width:100%;height:105px>	<center>	<br><span class="poptext" hidden><b>Latest Release:  </b>' + list[0][2] + '</span>	</center>	</div>	</div>');
//			target.append('<div class="individual_container" style=width:150px;height:100%;margin:20px;float:left>	<div class="text_box_top" style=width:100%;height:45px>	<center>	<span class="poptext" hidden>' + list[cont_num + 1][0] +'</span>	</center>	</div> 	<div class="image_box" style=width:100%;height:150px>	<img class="popoutmedia" src=' + list[cont_num + 1][1] + ' width=150px height=150px />	</div> 	<div class="text_box_bottom" style=width:100%;height:105px>	<center>	<br><span class="poptext" hidden><b>Latest Release:  </b>' + list[cont_num + 1][2] + '</span>	</center>	</div>	</div>');
		}
	}

	image_pop();
});
//};
// KNOWN ISSUE:		If rapidly clicked, some slight migration occurs.




