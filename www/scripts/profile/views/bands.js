Profile.Views.Bands = Backbone.View.extend({
	initialize : function(){
		this.listenTo(this.collection,'reset',this.render);
	},
	render : function(){
		var that = this;
		this.$el.empty().append("<p>Bands I am a part of : </p>");
		this.collection.each(function(bandmodel){
			var temp = new Profile.Views.Band({model : bandmodel});
			temp.render();
			that.$el.append(temp.el);
		});
		$("#bandWrapper").empty().append(this.el);
	}
})