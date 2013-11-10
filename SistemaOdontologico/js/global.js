(function(global) {

	global.init = function(){
		menu.init();
		footer.init();
	};

	global.loginInit = function(){
		footer.init();
	};

	var menu = {
		init: function(){
			Prototype.includeMenu();
			this.el = $('#main-menu');
			this.icon = $('#menu-icon');
			this.iconActive();
			this.el.on({
				mouseenter: $.proxy( this.iconOnHover, this ),
				mouseleave: $.proxy( this.iconActive, this )
			}, "> li > a");
			this.el.on({
				mouseenter: this.accountEnter,
				mouseleave: this.accountLeave
			}, "#account");
			$('#logout').on( 'click', Prototype.logout );
			$('#username').text( SO.config.user );
		},
		iconOnHover: function(e){
			this.iconChange( $(e.target) );
		},
		iconActive: function(){
			this.iconChange( $('> li.active', this.el) );
		},
		iconChange: function(item){
			this.icon
				.removeClass()
				.addClass( 'icon-' + SO.utils.normalize( item.text() ).toLowerCase() );
		},
		accountEnter: function(){
			$('i:eq(1)', this).removeClass().addClass('icon-arrow-up');
		},
		accountLeave: function(){
			$('i:eq(1)', this).removeClass().addClass('icon-arrow-down');
		}
	};

	var footer = {
		init: function(){
			this.closePopUp();
		},
		closePopUp: function(){
			$('#popup-wrap, #popup .close').on('click', function(){
				$('#popup').addClass('hide');
				setTimeout(function(){
					$('#popup-wrap').hide();
				}, 500 );
			});
			$('#popup').on('click', function(e){
				e.stopPropagation();
			});
		}
	};

})(SO.global = {});