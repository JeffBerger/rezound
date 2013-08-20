

<style>
div {
border:2px solid;
};
</style>


<!-- 	for Bootstrap 3 -->
<div class="container">

	<div class="row">

		<div id="item_art" class="col-lg-3">Item art</div>
			
		<div id="item_info" class="col-lg-6">Item info</div>

		<div id="item_extra" class="col-lg-3">Item extra</div>
		
	</div>
	
</div>



<!-- 	for Bootstrap 2.3.2
<div class="container-fluid">

	<div class="row-fluid">

		<div id="item_art" class="span3"></div>
			
		<div id="item_info" class="span6"></div>

		<div id="item_extra" class="span3"></div>
		
	</div>
	
</div>
 -->


 <div style="clear: both"></div>
 <br>
 <br>

 
 
<script src="<?php echo base_url();?>/scripts/item/models/itemModel.js"></script>
<script src="<?php echo base_url();?>/scripts/item/routers/itemRouter.js"></script>
<script src="<?php echo base_url();?>/scripts/item/views/itemView.js"></script>



<script>
$(function(){
	var router = new ItemRouter();
	Backbone.history.start();
});

</script>



