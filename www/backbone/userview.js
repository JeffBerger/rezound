Test.Views.User = Backbone.View.extend({
	el : $('#output'),

	initialize : function(){ //What the view is supposed to do when it is created
		this.listenTo(this.model,'change', this.render);
	},

	render : function(){ //What the view is supposed to do when we want it to display to the user (create itself / refresh itself)
		alert("CHANGE");
	}
})

