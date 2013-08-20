var BandModel = Backbone.Model.extend({
	defaults: {
		id: '',
		type: 'band'
	},
	urlRoot : "../../bands"
});

var AlbumModel = Backbone.Model.extend({
	defaults: {
		id: '',
		type: 'album'
	},
//	urlRoot : "../../album"
//	urlRoot : "/album"
//	urlRoot : "../../api/item/item_info/" + this.type
//	urlRoot : "../../api/item/item_info/" + this.get("type")
	urlRoot : function(){ return "../../api/item/item_info/" + this.get("type"); }
});

var VenueModel = Backbone.Model.extend({
	defaults: {
		id: '',
		type: 'venue'
	},
	urlRoot : "../../venues"
});

