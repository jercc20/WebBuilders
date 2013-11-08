(function(proto) {

	var user = localStorage.getItem("user"),

	login = {
		init: function(){
			this.users = [ 'admin', 'odontologo', 'secretaria', 'paciente' ];
			this.psw = '22c3fe5696c102fb949d0c460501ac0f';
			this.el = $('#login-form');
			this.el.on( 'submit', $.proxy( this.submit, this ) );
			this.logoutMsg();
		},
		submit: function(e){
			e.preventDefault();
			var user = $('#user-name').val(),
				psw = $('#user-psw').val();
			if( this.checkUser( user ) && this.checkPsw( psw ) ){
				localStorage.setItem( 'user', user );
				SO.utils.showPopUp( 'Listo', 'ok' ); //MSG TMP
				SO.utils.localRedirect('inicio');
			}
			else {
				SO.utils.showPopUp( 'Hubo un error', 'error' ); //MSG TMP
			}
		},
		checkUser: function(user){
			if( this.users.indexOf(user) !== -1 ){
				return true;
			}
			else {
				return false;
			}
		},
		checkPsw: function(psw){
			if( md5().fromUTF8( psw ) === this.psw ){
				return true;
			}
			else {
				return false;
			}
		},
		logoutMsg: function(){
			if( localStorage.getItem( 'logout' ) == "1" ){
				localStorage.removeItem('logout');
				SO.utils.showPopUp( 'Ha cerrado session', 'info' ); //MSG TMP
			}
		}

	};

	proto.init = function(){
		login.init();
	};

	proto.getUser = function(){
		return user;
	};

	proto.checkSession = function(){
		if( user === null || user === '' ){
			SO.utils.localRedirect('login');
		}
	};

	proto.checkLoginSession = function(){
		if( user !== null && user !== '' ){
			SO.utils.localRedirect('inicio');
		}
	};

	proto.logout = function(){
		localStorage.removeItem( 'user' );
		localStorage.setItem( 'logout', '1' );
		SO.utils.localRedirect('login');
	};

	proto.includeMenu = function(){
		var url = 'includes/menu-' + user + '.html';
		$.ajax({
			url: url,
			success: function(data) {
				$('#wrapper').prepend( $(data).filter('#nav-top') );
			},
			dataType: 'html',
			cache: false,
			async: false
		});
	};

})(Prototype = {});