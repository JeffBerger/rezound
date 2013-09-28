Test.Models.User = Backbone.Model.extend({

	urlRoot : "//jeff.rezoundmusic.com/api/user/user_info",

	initialize : function(){
		this.fetch();
	}

});