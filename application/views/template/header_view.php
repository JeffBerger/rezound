<!DOCTYPE html>
<html>

	<head>
		<title>ReZound : Free Your Sound</title>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.1/underscore-min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.0.0/handlebars.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>
		<script src="//connect.facebook.net/en_US/all.js"></script>			
	
	
 		<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet"/>
		
		
		
	  	
	  	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
 		<link rel="stylesheet" href="<?php echo base_url();?>css/slide.css" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/rezound.css"/>

		<link href="<?php echo base_url();?>css/vader/jquery-ui-1.10.3.custom.css" rel="stylesheet"/>
		
		<input hidden id="basepath" value="<?php echo base_url(); ?>"></input>
		<input hidden id="fbloginpath" value="<?php echo site_url('login/facebook_login'); ?>"/>
		<input hidden id="userloginpath" value="<?php echo site_url('login/login_user'); ?>"/>
		<input hidden id="usersignuppath" value="<?php echo site_url('login/signup_user'); ?>"/>
		<input hidden id="artistsignuppath" value="<?php echo site_url('login/artist_signup_form'); ?>"/>
		<input hidden id="logoutpath" value="<?php echo site_url('login/logout'); ?>"/>
		<input hidden id="hspath" value="<?php echo base_url();?>highslide/graphics/" />
		<input hidden id="resetpasswordpath" value="<?php echo site_url('login/reset_password'); ?>"/>
		
		<script src="<?php echo base_url();?>scripts/header.js"></script>
		<script src="<?php echo base_url();?>scripts/image_effects.js"></script>	
		
	</head>
	
		<body>
			<div id="fb-root"></div>


	<header>

	<!-- The navigation bar at the top of the page -->
		<div class="tab">
			<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>img/logos/rezound_logo_2_darkbg.gif" height="35px" width="100px"/></a>
			

			
			<ul class="navigation" id="ulbox">
					<li class="navigation navoption" style="display: none" id="logoutopt"><?php echo anchor("login/logout","Logout",'class="navigation" id="logout"') ?></li>
					<li class="navigation navoption" style="display: none"><?php echo anchor("account/profile","My Profile",'class="navigation"') ?></li>
					<li class="navigation navoption" id="toggle">
						<a class="navigation" id="open" class="open" href="#">Log In | Register</a>
						<a class="navigation" id="close" style="display: none;" class="close" href="#">Close Panel</a>			
					</li>
				<li class="navigation"><?php echo anchor("home/about","About",'class="navigation"') ?></li>
				<li class="navigation"><?php echo anchor("music/index","Music",'class="navigation"') ?>
				</li>
	
			</ul>
			
			<?php if($this->session->userdata('login_state')) : ?>
				<script type="text/javascript">
					if($("#logoutopt").is(":hidden"))
						$(".navoption").toggle();
				</script>
			<?php else:?>
				<script type="text/javascript">
					if($("#logoutopt").is(":visible"))
						$(".navoption").toggle();
				</script>
			<?php endif;?>
		</div>
		
	<!-- The slide-down login panel -->
		<div id="toppanel">
			<div id="panel">
				<div class="content clearfix">
				
					<!-- Leftmost area where we can put words and logos -->
					
					<div class="left">
						<h1>Welcome to ReZound</h1>
						<h2>Free Your Sound</h2>	
						<br/>
						<h3>Login or Signup fast with Facebook</h3>
						<h3 id="fbloginspan" class="btn btn-primary" ><i class="icon-facebook"></i>Login with Facebook</h3>
						
					</div>
					
					<!-- The next column where we have our login -->
					
					<div class="left">

							<h1>Member Login</h1>
								<?php echo form_open('/login/login_user',array("id" => "login_user"));?>
									<label class="grey" for="username">Username:</label>
										<input class="field" type="text" title="Your username, unless you changed it this is your email address" id="username_prev" name="username_prev" size="23" value="<?php echo set_value('username_prev');?>"/></p>
									<label class="grey" for="password_prev">Password : </label>
										<input class="field" title="Your password (it is a minimum of 8 characters)" type="password" id="password_prev" name="password_prev" value=""/>
									<label><input name="rememberme" id="rememberme" type="checkbox" title="Do not check this is you are on a shared computer." checked="checked" value="forever" /> &nbsp;Remember me</label>
									<input type="submit" name="submit" value="Login" class="bt_login" id="login_user_submit"/>
								<?php echo form_close();?>
		        			<div class="clear"></div>
							<a class="lost-pwd" href="#" id="lost_password">Lost your password?</a>
					</div>
					
					<!-- The last column where we have our registration form which switches between artist and user-->
					
					<div class="left right" id="registerform">			
						
						<!-- Register Form for users -->
						
						<div id="user_reg">
						<h1>Not a member yet? Sign Up!</h1>			
							<?php echo form_open('/login/signup_user',array("id" => "signup_user"));?>
								<label class="grey" for="username_new">Email : </label>
									<input class="field" title="Your email will be your username until you change it" type="text" id="email" name="email" value="<?php echo set_value('email');?>" size="23"/>
								<label class="grey" for="password_new">Password : </label>
									<input class="field" title="Your password must be at least 8 chars long" type="password" id="password_new" name="password_new" value="" size="23"/>
								<label class="grey" for="password_retype">Retype Password : </label>
									<input class="field" title="Confirm your password" type="password" id="password_retype" name="password_retype" value="" size="23"/>
								<input type="submit" name="submit" value="Register" class="bt_register" id="signup_user_submit" />
							<?php echo form_close();?>	
							
						<div class="clear"></div>
						<a class="Lost-pwd" href="#" id="artistlink">Are you an artist? Signup as one!</a>
						</div>

						<!-- Register Form for users -->
						
						<div id="art_reg" style="display: none">						
						<h1>Sell on ReZound!</h1>
							<?php echo form_open('/login/artist_signup_form',array("id" => "signup_artist"));?>
								<label for="username" class="grey">Username : </label>
									<input class="field" type="text" title="Your username is not your band name, you will be able to join/create a band later.  Your username might be Colonol Keyman and your band later could be Teel." id="username" name="username" value="<?php echo set_value('username');?>"/>
								<label for="email" class="grey">Email : </label>
									<input class="field" title="A valid email address" type="text" id="email" name="email" value="<?php echo set_value('email');?>"/>
								<label for="password" class="grey">Password : </label>
									<input type="password" title="Your password must be at least 8 chars long" id="password" class="field" name="password" value=""/>
								<label for="password_retype" class="grey">Retype Password : </label>
									<input class="field" title="Confirm your password" type="password" id="password_retype" name="password_retype" value=""/>
								<input type="submit" name="submit" value="Register" class="bt_register" id="signup_artist_submit" />
							<?php echo form_close();?>
							
						<div class="clear"></div>
						<a class="Lost-pwd" href="#" id="userlink">Want to just be a user? You can become an artist later.</a></div>
						</div>
						
					</div>
				</div>
		</div> <!-- /login -->	
			
		</div> <!--panel -->
		
		<div id="dialog"></div>
		
		<div id="lostpw_dialog" style="display: none">
			<p id="lostpw_dialog_msg">We will send your email a new password</p>
			<?php echo form_open('/login/login_user',array("id" => "login_user"));?>
			<label class="grey" for="username">Username:</label>
				<input class="field" type="text" title="Your username, unless you changed it this is your email address" id="username_reset" name="username_reset" size="23" value="<?php echo set_value('username_reset');?>"/></p>
			<?php echo form_close();?>
		</div>
		
		<script src="<?php echo base_url();?>scripts/login.js"></script>

	</header>

	<hr id="postheader">

