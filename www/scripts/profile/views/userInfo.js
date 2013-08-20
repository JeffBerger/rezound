Profile.Views.UserInfo = Backbone.View.extend({
	el : $('#userInfoWrapper'),
	initialize : function(){
		this.listenTo(this.model,'change', this.render);
	},
	render: function(){
		this.$el.empty().append("<p>This is my user data : </p><p>"+JSON.stringify(this.model.toJSON())+"</p>");
	}
});