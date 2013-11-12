jQuery(function($) {

	$('#tb-dates').dataTable();

	$('.item-remove').on('click', function(){
		SO.utils.showPopUp( $('#popup-remove').html() );
});

	$('.btn-accept').on('click', function(){
		SO.utils.showPopUp('Ha sido eliminado');
});
	$('#item-print').on('click', function(){
		print('#my-table');
});

});

