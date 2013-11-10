jQuery(function($) {

	$('.item-remove').on('click', function(){
		SO.utils.showPopUp( $('#popup-remove').html() );
});

	$('.btn-accept').on('click', function(){
		SO.utils.showPopUp('Ha sido eliminado');
});

	$('.item-view').on('click', function(){
		SO.utils.showPopUp( $('#popup-bitacora').html() );
});

});

