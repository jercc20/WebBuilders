jQuery(function($) {

	$('.item-remove').on('click', function(){
		SO.utils.showPopUp( $('#popup-remove').html() );
});

	$('.btn-accept').on('click', function(){
		SO.utils.showPopUp('Ha sido eliminado');
});
	$('#item-print').on('click', function(){
		print('#my-table');
});
	
	$('.btn-ba').on('click', function(){
		SO.utils.showPopUp( $('#popup-ub').html() );
});

});

