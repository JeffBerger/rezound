var ItemRouter = Backbone.Router.extend({
	routes: {
		'band/:id' : 'bandInfo',
		'album/:id' : 'albumInfo',
		'venue/:id' : 'venueInfo'
	},
	bandInfo : function(id){
		var bandModel = new ItemModel({id: id, type: 'band'});
		var bandInfoView = new ItemInfoView({model: bandModel});	// instantiate before AJAX to trigger change listener in view (to render)
		bandModel.fetch();
	},
	albumInfo : function(id){
		var albumModel = new ItemModel({id: id, type: 'album'});
		var albumInfoView = new ItemInfoView({model: albumModel});	// instantiate before AJAX to trigger change listener in view (to render)
		albumModel.fetch();
	},
	venueInfo : function(id){
		var venueModel = new ItemModel({id: id, type: 'venue'});
		var venueInfoView = new ItemInfoView({model: venueModel});	// instantiate before AJAX to trigger change listener in view (to render)
		venueModel.fetch();
	}

});