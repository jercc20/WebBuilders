jQuery(function($) {

	$('.item-view').on('click', function(){
		SO.utils.showPopUp( $('#popup-view').html() );
	});

	$('.btn-ba').on('click', function(){
		SO.utils.showPopUp( $('#popup-ub').html() );
});

	$('#item-print').on('click', function(){
		print('#my-table');
});

});