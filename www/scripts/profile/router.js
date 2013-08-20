Profile.Routers.Router = Backbone.Router.extend({
	routes: {
		'user' : 'userProfile',
		'artist' : 'artistProfile',
		'settings' : 'settingsProfile',
		'newBand' : 'newBand',
		'*path' : 'artistProfile'
	},
	initialize : function(){
		//Instaniate Models
		Profile.Models.user = new Profile.Models.User({ id : id});
		
		//Instantiate Collections
		Profile.Collections.following = new Profile.Collections.Following();
		Profile.Collections.followed = new Profile.Collections.Followed();
		Profile.Collections.bands = new Profile.Collections.Bands();

		//Instantiate Views
		Profile.Views.following = new Profile.Views.Following({collection : Profile.Collections.following});
		Profile.Views.userInfo = new Profile.Views.UserInfo({model : Profile.Models.user});
		Profile.Views.followed = new Profile.Views.Followed({collection : Profile.Collections.followed});
		Profile.Views.bands = new Profile.Views.Bands({collection : Profile.Collections.bands});

	},
	artistProfile : function(){
		$("ul#profileNav li").removeClass("active");
		$("#artistNav").addClass("active");
	},
	userProfile : function(){
		$("ul#profileNav li").removeClass("active");
		$("#userNav").addClass("active");	
	},
	settingsProfile : function(){
		
	},
	newBand : function(){

	}
});
