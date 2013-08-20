<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/account.css">

<div id="wrap">
    <?php echo validation_errors();?>
    <?php if(isset($result)):?>
    	<?php if($result=="fail"){
    		echo "<p>Try Again</p>";
    	}?>
    	<?php if($result=="same_as_old"){
    		echo "<p>You cannot use the same password. Try again</p>";
    	}?>
    	<?php if($result=="pass"){
    		echo "<p>Congratulations! You win!</p>";
    	}?>
    	<?php if($result=="same_email"){
    		echo "<p>You cannot use the same e-mail. Try again</p>";
    	}?>
    <?php endif;?>
    <div id="left_col">
		<h2>User Information</h2>
		
		<ul style="list-style: none;font-size:20px">
			<li>
				<div id="username_button">Change username</div>
				<div id="username_div" hidden>
					<?php echo form_open('account/change_normal');?>
						<p><label for="new_value">New Username</label><input type="text" id="new_value" name="new_value" value=""/></p>
						<input type="hidden" name="field_name" value="Username"/>
						<p><?php echo form_submit('change_username', 'Submit');?>
					<?php echo form_close();?>
				</div>
			</li>
			<li>
				<div id="password_button">Change password</div>
				<div id="password_div" hidden>
					<?php echo form_open('account/change_pass');?>
						<p><label for="password_old">Current Password</label><input type="password" id="password_old" name="password_old" value=""/></p>
						<p><label for="password_new">New Password</label><input type="password" id="password_new" name="password_new" value=""/></p>
						<p><label for="password_retype">Retype Password</label><input type="password" id="password_retype" name="password_retype" value=""/></p>
						<p><?php echo form_submit('change_password','Submit');?>
					<?php  echo form_close();?>
				</div>
			</li>
			<li>
				<div id="email_button">Change e-mail</div>
				<div id="email_div" hidden>
					<?php echo form_open('account/change_email');?>
						<p><label>Type Password</label><input type="password" id="password" name="password" value=""/></p>
						<p><label for="email">New E-mail</label><input type="text" id="email" name="email" value=""/></p>
						<p><label for="email_retype">Retype E-mail</label><input type="text" id="email_retype" name="email_retype" value=""/></p>
						<p><?php echo form_submit('change_email' , 'Submit');?>
					<?php  echo form_close();?>
				</div>
			</li>
			<li>
				<div id="altmail_button">Set alternate e-mail</div>
				<div id="altmail_div" hidden>
					<?php echo form_open('account/change_email');?>
						<p><label>Type Password</label><input type="password" id="password" name="password" value=""/></p>
						<p><label for="email">New E-mail</label><input type="text" id="email" name="email" value=""/></p>
						<p><label for="email_retype">Retype E-mail</label><input type="text" id="email_retype" name="email_retype" value=""/></p>
						<input type="hidden" name="alt" value="something"/>
						<p><?php echo form_submit('change_email' , 'Submit');?>
					<?php  echo form_close();?>
				</div>
			</li>
		</ul>
		
	</div>
	
	<div id="right_col">
		<h2>Billing Information</h2>
		
		<ul style="list-style: none;font-size:20px">
			<li>Manage credit cards</li>
			<li>Manage billing addresses</li>
			<li>Transaction history</li>
			<li>Privacy Policy</li>
		</ul>
		
    </div>
</div>

<div class="clear"></div>



<script  type="text/javascript">

/*
$('#username_button').click(function(){
	$('#username_div').html("HEY");
});
*/

$('#password_button').click(function () {
	if (   $("#password_div").is(":hidden")   ) {
		$("#password_div").slideDown("slow");
	} else {
		$("#password_div").slideUp("slow");
	}
});

$('#username_button').click(function () {
	if (   $("#username_div").is(":hidden")  ){
		$("#username_div").slideDown("slow");
	} else {
		$("#username_div").slideUp("slow");
	}
});

$('#email_button').click(function () {
	if ( $("#email_div").is(":hidden") ){
		$("#email_div").slideDown("slow");
	} else {
		$("#email_div").slideUp("slow");
	}
});

$('#altmail_button').click(function () {
	if ( $("#altmail_div").is(":hidden") ){
		$("#altmail_div").slideDown("slow");
	} else {
		$("#altmail_div").slideUp("slow");
	}
});
</script>