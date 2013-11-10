jQuery(function($) {

	$('#tb-dates').dataTable();

	$('.item-remove').on('click', function(){
		SO.utils.showPopUp( $('#bitacora-popup').html() );
});

	$('.btn-accept').on('click', function(){
		SO.utils.showPopUp('Ha sido eliminado');
});

	$('.item-view').on('click', function(){
		SO.utils.showPopUp( $('#bitacora-patient-popup').html() );
});

});

