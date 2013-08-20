Profile.Views.Follow = Backbone.View.extend({
	template : _.template($("#follow").html()),
	render : function(){
		this.$el.empty().append("<p>"+JSON.stringify(this.model.toJSON())+"</p>");
	}
});