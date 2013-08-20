<div>

<?php if(isset($valid_user) && !$valid_user){
	echo "<p>I'm sorry but you did not yet validate your account.  Please check your email account.</p>";
}?>

<div>
	<p>Login</p>
	<?php echo form_open('/login/login_user');?>
	<p><label for="username_prev">Username/Email : </label><input type="text" id="username_prev" name="username_prev" value="<?php echo set_value('username_prev');?>"/></p>
	<p><label for="password_prev">Password : </label><input type="password" id="password_prev" name="password_prev" value=""/></p>
	<p><?php echo form_submit('login','Login'); ?></p>
	<?php echo form_close();?>
</div>

<div>
<p>Sign up for an account</p>
	<?php echo form_open('/login/signup_user');?>
	<p><label for="username_new">Email : </label><input type="text" id="email" name="email" value="<?php echo set_value('email');?>"/></p>
	<p><label for="password_new">Password : </label><input type="password" id="password_new" name="password_new" value=""/></p>
	<p><label for="password_retype">Retype Password : </label><input type="password" id="password_retype" name="password_retype" value=""/></p>
	<p><?php echo form_submit('signup','Sign Up'); ?></p>
	<?php echo form_close();?>
</div>
	<?php echo validation_errors(); ?>

<div>
<p>Are you an Artist? <?php echo anchor("login/artist_signup","Sign up as a Musician!") ?>.  If you want to see how the site works first, go ahead and sign up as a user.  You can always define yourself as an artist as well as a user later!</p>
</div>

</div>
