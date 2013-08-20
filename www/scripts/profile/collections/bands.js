Profile.Collections.Bands = Backbone.Collection.extend({
	url : "../../api/artist/bands/" + id,
	initialize : function(){
		this.fetch({reset : true});
	}
})