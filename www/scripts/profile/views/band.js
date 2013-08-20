Profile.Views.Band = Backbone.View.extend({
	render : function(){
		this.$el.empty().append("<p>"+JSON.stringify(this.model.toJSON())+"</p>");
	}
})