jQuery(function($) {

	$('.item-view').on('click', function(){
		SO.utils.showPopUp( $('#popup-bitacora').html() );
	});

	$('#item-print').on('click', function(){
		print('#my-table');
});

});

