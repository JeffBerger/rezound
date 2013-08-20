<p>Welcome to your profile page! Go to your <?php echo anchor("library/mylibrary","library") ?> or to your <?php echo anchor("account/account_details","Account Details") ?> page</p>
 	

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/profile.css">

<div style=width:350px;float:right>
	<div id="activity">
		<p>This is where friend activity will go.</p>
	</div>

	<div id="friends">
		<p>Friends' profile picture thumbnails</p>
	</div>
</div>

<div style=width:350px>

	<div id="img">
		<img src="<?php echo base_url();?>img/profiledefault.png">
	</div>
	
	
	<!-- <div id="img_library">
		<a href="<?php echo base_url();?>/library/mylibrary"><img class="popout" src="<?php echo base_url();?>img/MyLibrary1.jpg" width=150px height=100px></a>
	</div>
	-->


	<div id="icon_music">
		<h1><i class="icon-music icon-2x"><a href="<?php echo base_url();?>/library/mylibrary"></i> My Library</a></h1>
	</div>

	<div id="icon_cog">
		<h1><i class="icon-cogs icon-2x"><a href="<?php echo base_url();?>/account/account_details"></i> Account Details</a></h1>
	</div>

	<div id="icon_wrench">
		<h1><i class="icon-wrench icon-2x"></i> Preferences</h1>
	</div>

</div>

<div class="clear"></div>




<script src="<?php echo base_url();?>scripts/image_effects.js"></script>		

<script>
image_pop();
</script>


