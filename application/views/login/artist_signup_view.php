<p>Sign up and put your music on ReZound, it costs you nothing!</p>
<div>
<p>Sign up for an account</p>
	<?php echo form_open('/login/artist_signup_form');?>	<p><label for="username">Username : </label><input type="text" id="username" name="username" value="<?php echo set_value('username');?>"/></p>	<p><label for="email">Email : </label><input type="text" id="email" name="email" value="<?php echo set_value('email');?>"/></p>	<p><label for="firstname">First Name : </label><input type="text" id="first_name" name="first_name" value=""/></p>	<p><label for="lastname">Last Name : </label><input type="text" id="last_name" name="last_name" value=""/></p>	<p><label for="address_1">Address : </label><input type="text" id="address_1" name="address_1" value="<?php echo set_value("address_1");?>"/></p>	<p><label for="address_2">Address : </label><input type="text" id="address_2" name="address_2" value="<?php echo set_value("address_2");?>"/></p>	<p><label for="password">Password : </label><input type="password" id="password" name="password" value=""/></p>	<p><label for="password_retype">Retype Password : </label><input type="password" id="password_retype" name="password_retype" value=""/></p>	<p><?php echo form_submit('signup','Sign Up'); ?></p>	<?php echo form_close();?></div>
	<?php echo validation_errors(); ?>