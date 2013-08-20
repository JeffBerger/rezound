var ItemModel = Backbone.Model.extend({
	defaults: {
		id: ''
	},
	urlRoot : function(){ return "../../api/item/item_info/" + this.get("type"); }
});
