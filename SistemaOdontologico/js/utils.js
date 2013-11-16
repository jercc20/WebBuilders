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
		window.location = window.location.href.replace( SO.utils.currentFile(), to.split('.')[0] );
	};

	util.showPopUp = function(msg){
		var self = this;
		$('#popup-content').html(msg);
		$('#popup-wrap').show();
		setTimeout(function(){
			$('#popup').removeClass('hide');
			self.popUpCenter();
		}, 500 );
	};

	util.popUpCenter = function(){
		var h = ( $(window).height() - $('#popup').outerHeight() ) / 2;
		$('#popup').css( 'top', h );
	};

	util.getUrlVars = function(){
      var vars = [], hash,
			url = window.location.href;
      var hashes = url.slice(url.indexOf('?') + 1).split('&');
      for(var i = 0; i < hashes.length; i++){
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
      }
      return vars;
    };

    util.getUrlVar = function(name){
      return util.getUrlVars()[name];
    };

})(SO.utils = {});