<script>
window.Profile = {
		Views : { },
		Models : { },
		Collections : { },
		Routers : { }
};

window.id = <?php echo $this->session->userdata('user_id');?>
</script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/profile.css">

<style>
div {
border:2px solid;
};
</style>

<div class="row">
	<div class="col-lg-2">
		<div class="text-center">
			<div id="userInfoWrapper"></div>
		</div>
		<div>
			<p>Artist Graphs</p>
		</div>
		<div class="text-center">
			<p style="font-size: 24px;">Settings</p>
			<i class="icon-gears" style="font-size:120px;"></i>
		</div>
	</div>
	<div class="col-lg-8">
		<div id="bandWrapper">
		</div>
		<div class="row">
			<div class="col-lg-4 col-offset-1">
			<div id="followingWrapper"></div>
			</div>
			<div class="col-lg-4 col-offset-2">
			<div id="followedWrapper"></div>
			</div>
		</div>
	</div>
	<div class="col-lg-2">
		<ul id="profileNav" class="nav nav-pills">
		  <li id="userNav">
		    <a href="#user">User</a>
		  </li>
		  <li id="artistNav" class="active">
		  	<a href="#artist">Artist</a>
		  </li>
		  <li>
		  	<a href="#newBand">Start a Band</a>
		  </li>
		</ul>
		<div>
			User Feed
		</div>
	</div>
</div>
<br/>

<script type="text/template" id="follow">

<p>Userid <%= followed_user_id %> Band <%= followed_band_id %> Venue <%= followed_venue_id %></p>

</script>

<script src="../scripts/profile/models/user.js"></script>
<script src="../scripts/profile/models/follow.js"></script>
<script src="../scripts/profile/models/band.js"></script>

<script src="../scripts/profile/collections/followed.js"></script>
<script src="../scripts/profile/collections/following.js"></script>
<script src="../scripts/profile/collections/bands.js"></script>

<script src="../scripts/profile/views/follow.js"></script>
<script src="../scripts/profile/views/userInfo.js"></script>
<script src="../scripts/profile/views/following.js"></script>
<script src="../scripts/profile/views/followed.js"></script>
<script src="../scripts/profile/views/band.js"></script>
<script src="../scripts/profile/views/bands.js"></script>

<script src="../scripts/profile/router.js"></script>

<script>
$(function(){
	Profile.Routers.router = new Profile.Routers.Router();
	Backbone.history.start();
});

</script>



