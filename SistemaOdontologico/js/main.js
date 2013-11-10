//Namespace
var SO = {
	config: {}
};

jQuery(function($) {

	if( SO.utils.currentFile() == "login" ){
		Prototype.checkLoginSession();
		Prototype.init();

		SO.global.loginInit();
	}
	else {
		Prototype.checkSession();
		SO.config.user = Prototype.getUser();

		SO.global.init();
	}

	$('a[href="#"]').on('click', function(){ return false; });

});