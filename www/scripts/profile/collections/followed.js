Profile.Collections.Followed = Backbone.Collection.extend({
	url : "../../api/user/user_followed/" + id,
	model : Profile.Models.Follow,
	initialize : function(){
		this.fetch({reset : true});
	}
});