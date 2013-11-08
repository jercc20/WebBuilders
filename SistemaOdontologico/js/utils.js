(function(util) {

	util.normalize = function(text){
		var from = "ÁÉÍÓÚáéíóúÑñ",
			to   = "AEIOUaeiounn";
		for (var i=0; i<from.length; i++) {
			text = text.replace(from.charAt(i), to.charAt(i));
		}
		return text;
	};

	util.currentFile = function(){
		return window.location.href.split('.')[0].split('/').pop();
	};

	util.localRedirect = function(to){
		window.location = window.location.href.replace( SO.utils.currentFile(), to );
	};

	util.showPopUp = function(msg, type){
		console.log( 'msg: ' + msg ); //TMP
	};

})(SO.utils = {});