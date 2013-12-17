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

	util.redirect = function(to, delay){
		if( delay > 0 ){
			setTimeout(function(){
				window.location = to;
			}, delay );
		}
		else {
			window.location = to;
		}
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

    util.uploadFile = function(e) {
		this.file = e.target.files[0];
		this.input = $('#txt-file');
		this.img = $('#img-preview');
		this.prog = $('#file-progress');
		var self = this;

		var xhr = new XMLHttpRequest();
		var formData = new FormData();
		formData.append("file", self.file);

        xhr.addEventListener("error", function(e) {
            util.showPopUp("Hubo un problema subiendo el archivo.");
            self.prog.val(0).addClass('hide');
            self.img.removeClass('hide');
        }, false);

        xhr.addEventListener("load", function(e) {
			if( e.target.response == "0" )
				util.showPopUp("Hubo un problema subiendo el archivo.");
			else if( e.target.response == "2" )
				util.showPopUp("El archivo ya existe.");
			else {
				$file = 'imgs/' + self.file.name;
				self.input.val( $file );
				self.img.attr('src', $file);
			}
            self.prog.val(0).addClass('hide');
            self.img.removeClass('hide');
        });

        xhr.upload.addEventListener("progress", function(e) {
            if (e.lengthComputable) {
                self.prog.val(e.total);
                self.prog.val(e.loaded);
            }
        }, false);

        self.prog.val(0).removeClass('hide');
        self.img.addClass('hide');

        xhr.open('POST', 'includes/upload-file.php', true);
        xhr.send(formData);
    };

})(SO.utils = {});