window.fbAsyncInit = function() {
    FB.init({
		appId      : '177199599114192', // App ID
		channelUrl : '//www.westphalianarms.com/ReZound/channel.html', // Channel File
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		xfbml      : true  // parse XFBML
    });
// Additional init code here
};