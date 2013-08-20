Profile.Collections.Following = Backbone.Collection.extend({
	url : "../../api/user/user_following/" + id,
	model : Profile.Models.Follow,
	initialize : function(){
		this.fetch({reset : true});
	}
});