Profile.Models.User = Backbone.Model.extend({
	urlRoot : "../../api/user/user_info",
	initialize : function(){
		this.fetch();
	}
});