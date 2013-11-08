//Namespace
var SO = {
	config: {}
};

jQuery(function($) {

	Prototype.checkSession();
	SO.config.user = Prototype.getUser();

	SO.global.init();

	$('a[href="#"]').on('click', function(){ return false; });

});