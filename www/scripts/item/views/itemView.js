var ItemInfoView = Backbone.View.extend({
	el: $('#item_info'),
	initialize: function(){
		this.listenTo(this.model,'change', this.render);
	},
	render: function(){
		this.$el.empty().append("<p>Item info:  " + JSON.stringify(this.model.toJSON()) + "</p>");
	}
});
