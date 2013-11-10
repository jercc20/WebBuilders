jQuery(function($) {

	$('#tb-dates').dataTable();

	$('.item-remove').on('click', function(){
		SO.utils.showPopUp( $('#bitacora-popup').html() );
		//console.log('Hola');
});

	$('.btn-accept').on('click', function(){
		SO.utils.showPopUp('Ha sido eliminado');
});

});

