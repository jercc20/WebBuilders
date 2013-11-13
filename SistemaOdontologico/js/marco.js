jQuery(function($) {

	$('.item-view').on('click', function(){
		SO.utils.showPopUp( $('#popup-view').html() );
	});

	$('.btn-ba').on('click', function(){
		SO.utils.showPopUp( $('#popup-ub').html() );
});

	$('.add-procedure').on('click', function(){
		SO.utils.showPopUp( $('#popup-procedure').html() );
});

	$('#popup').on( 'click', '.btn-aceptar', function(){
			SO.utils.showPopUp('Ha sido agregado correctamente.');
});

	$('#item-print').on('click', function(){
		print('#my-table');
});

});