Profile.Views.Followed = Backbone.View.extend({
//	el : $("#followedWrapper"),
	initialize : function(){
		this.listenTo(Profile.Collections.followed,'reset',this.render);
	},
	render : function(){
		var that = this;
		this.$el.empty().append("<p>You are followed by : </p>");
		this.collection.each(function(follow){
			var temp = new Profile.Views.Follow({model : follow});
			temp.render();
			that.$el.append(temp.el);
		});
		$("#followedWrapper").empty().append(this.el);
		
	},
});