var ItemRouter = Backbone.Router.extend({
	routes: {
		'band/:id' : 'bandInfo',
		'album/:id' : 'albumInfo',
		'venue/:id' : 'venueInfo'
	},
	albumInfo : function(id){
		var albumModel = new AlbumModel({id: id});
		var albumInfoView = new ItemInfoView({ model : albumModel});	// instantiate before AJAX to trigger change listener in view (to render)
		console.log(albumModel.id + ", " + albumModel.type);
		console.log(albumModel);
		console.log(albumModel.id + ", " + albumModel.attributes.type);
		console.log(albumModel.id + ", " + albumModel.get("type"));
		albumModel.fetch();
		
//		albumInfoView.render();

	}

});