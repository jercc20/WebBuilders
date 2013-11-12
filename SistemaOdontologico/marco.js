jQuery(function($) {

	$('.item-view').on('click', function(){
		SO.utils.showPopUp( $('#popup-bitacora').html() );
	});

	$('.btn-ba').on('click', function(){
		SO.utils.showPopUp( $('#popup-ub').html() );
});

	$('#item-print').on('click', function(){
		print('#my-table');
});

	$('#popup').on( 'click', '.btn-save', function(){
			SO.utils.showPopUp('Ha sido guardado correctamente.');
		});

});

