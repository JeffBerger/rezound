
/*
 * When the user hits the login button this block is executed, ajax call to our login page to check the username
 * and password.  Open a dialog if there is a problem.
 */
$("#login_user").submit(function(e){
	e.preventDefault();
	
	var path = $("#userloginpath").val(); 
	var data =  $('#login_user').serializeArray();
	
	$("#password_prev").val("");
	$.post(path,data, function(response) {
		
		var text;
		var dataresponse = jQuery.parseJSON(response);

		if(dataresponse.success != "pass"){

			if(dataresponse.success == "fail")
				var text = "<p>Wrong password!</p>";
			if(dataresponse.success == "error")
				var text = dataresponse.error;

			
			$("#dialog").html(text);
			$("#dialog").dialog({title : "Error"});
		}else{
			$("div#panel").slideUp("slow");
			$("#toggle a").toggle();
			$(".navoption").toggle();
		}
	});
		
});

/*
 * If the user signs up then we execute this block.
 */
$("#signup_user").submit(function(e){
	e.preventDefault();
	
	var path = $("#usersignuppath").val(); 
	var data =  $('#signup_user').serializeArray();

	$("#password_new").val("");
	$("#password_retype").val("");
	
	
	$.post(path,data, function(response) {
		var dataresponse = jQuery.parseJSON(response);

		if(dataresponse.success == "error"){
			text = jQuery.parseJSON(dataresponse.error);
			
			$("#dialog").html(text);
			$("#dialog").dialog({title : "Error"});
			
		}else{
			
			$("div#panel").slideUp("slow");
			$("#toggle a").toggle();
			
			text = "<p>We just sent you an email to acctivate your account.  Check your inbox (or spam folder) and follow the link.</p>";
			
			$("#dialog").html(text);
			$("#dialog").dialog({title : "Verify!"});
		}
	});
		
});

/*
 * If an artist signs up we execute this
 */
$("#signup_artist").submit(function(e){
	e.preventDefault();
	
	var path = $("#artistsignuppath").val(); 
	var data =  $('#signup_artist').serializeArray();

	$("#password").val("");
	$("#password_retype").val("");
	
	
	$.post(path,data, function(response) {
		var dataresponse = jQuery.parseJSON(response);

		if(dataresponse.success == "error"){
			text = jQuery.parseJSON(dataresponse.error);
			
			$("#dialog").html(text);
			$("#dialog").dialog({title : "Error"});
			
		}else{
			
			$("div#panel").slideUp("slow");
			$("#toggle a").toggle();
			
			text = "<p>We just sent you an email to acctivate your account.  Check your inbox (or spam folder) and follow the link.</p>";
			
			$("#dialog").html(text);
			$("#dialog").dialog({title : "Verify!"});
		}
	});
		
});

/*
 * If the user pressed on the link to go to the artist login
 */
$("#artistlink").click(function(e){
	e.preventDefault();

	$("#user_reg").toggle();
	$("#art_reg").toggle();
	
//	$("div#panel").animate({
//		height: "350px"
//	}, "slow");
	
});

/*
 * If they press the link to go back to just a user signup
 */
$("#userlink").click(function(e){
	e.preventDefault();
	
	$("#user_reg").toggle();
	$("#art_reg").toggle();
	
//	$("div#panel").animate({
//		height: "300px"
//	}, "slow");
	
});		

/*
 * If the user lost their password prompt them to reset it
 */

$("#lost_password").click(function(e){
	e.preventDefault();
	  $(function() {
	    var username = $( "#username_reset" );
	    $('#lostpw_dialog').show();
	    $( "#lostpw_dialog" ).dialog({
	      autoOpen: false,
	      height: 300,
	      width: 350,
	      modal: true,
	      title: "Reset Password",
	      buttons: {
	    	  "Get a new password" : function(){
	    		  var path = $("#resetpasswordpath").val();
	    		  var opt = { };
	    		  opt["username"] = username.val();
	    		  
	    		  $.post(path,opt,function(reply){
	    			  console.log(reply);
	    			 if(reply == "pass"){
	    				 $( "#lostpw_dialog_msg" ).empty().html("<p id='lostpw_dialog_msg'>Check your email for your new password!</p>");
	    			 } else{
	    				 $( "#lostpw_dialog_msg" ).empty().html("<p id='lostpw_dialog_msg'>I'm sorry but your username is incorrect</p>");
	    			 }
	    		  });
	    	  }

	        },
	        Cancel: function() {
	          $( this ).dialog( "close" );
			$( "#lostpw_dialog_msg" ).empty().html("<p id='lostpw_dialog_msg'>We will send your email a new password</p>");
	      },
	      close: function() {
	       $(this).dialog("close");
			$( "#lostpw_dialog_msg" ).empty().html("<p id='lostpw_dialog_msg'>We will send your email a new password</p>");
	      }
	    });
		$( "#lostpw_dialog" ).dialog( "open" );

	  });
	 
	 
//	text = "<p>We will send you a new password, please input in your email</p>.  Check your inbox (or spam folder) and follow the link.</p>";
//	
//	$("#dialog").html(text);
//	$("#dialog").dialog({title : "Verify!"});	
	
});
/*
 * If they press the logout button
 */
//$("#logout").click(function(e){
//	e.preventDefault();
//	
//	console.log("HEY");
//	
//	FB.logout();
//	console.log("Tried to do FB.logout");
//	window.location.href = $("#logoutpath").val();
//	
//});

/*
 * Put tooltips on everything, which is kind of annoying right now....
 */
$(function() {$("#toppanel").tooltip();});

	
$(document).ready(function() {
	function getFbInfo(){
		var path = $("#fbloginpath").val();
	   	var data = { };
		FB.api('/me', function(res) {
			for(var attribname in res){
				data[attribname] = res[attribname];
			}
//			for(var attribname in response.authResponse){
//				data[attribname] = response.authResponse[attribname];
//			}
			
			$.post(path,data,function(reply){
				if ($('div#panel').is(":visible") || $("#toggle").is(":visible")){
					$("div#panel").slideUp("slow");
					$("#toggle a").toggle();
				}
				if(reply == "fail"){
					text = "<p>I'm sorry but there was a failure logging you in with facebook.  Try again later, if this continues please contact support.</p>";
					$("#dialog").html(text);
					$("#dialog").dialog({title : "Facebook Error!"});
				}
				if($("#logout").is(":hidden")){
					$(".navoption").toggle();
				}
			});
		
		});
	}
	
	// Expand Panel
	$("#open").click(function(){
		$("div#panel").slideDown("slow");
	});	
	
	// Collapse Panel
	$("#close").click(function(){
		$("div#panel").slideUp("slow");	
	});		
	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle a").click(function () {
		$("#toggle a").toggle();
	});
	//<fb:login-button title="Login with Facebook" show-faces="true" width="200" max-rows="1"></fb:login-button> put that somewhere in the header
	$("#fbloginspan").click(function () { 
		FB.login
		
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {
			   	 getFbInfo();
			}else if (response.status === 'not_authorized'){
				 FB.login(function(response) {
				   if (response.authResponse) {
					   	 getFbInfo();
				   }
				});
			}else {
				 FB.login(function(response) {
					   if (response.authResponse) {
						   	 getFbInfo();
					   }
				});
			}
		});
	});
	

		
});