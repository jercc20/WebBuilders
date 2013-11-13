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

	$('#item-print').on('click', function(){
		print('#my-table');
});

});