Profile.Views.Following = Backbone.View.extend({
//	el : $("#followingWrapper"),
	initialize : function(){
		this.listenTo(Profile.Collections.following,'reset',this.render);
	},
	render : function(){
		var that = this;
		this.$el.empty().append("<p>You are following : </p>");
		this.collection.each(function(follow){
			var temp = new Profile.Views.Follow({model : follow});
			temp.render();
			that.$el.append(temp.el);
		});
		$("#followingWrapper").empty().append(this.el);
		
	},
});