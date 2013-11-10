jQuery(function($) {

	$('#tb-dates').dataTable();



});

	$('.item-remove').on('click', function(){
 	SO.utils.showPopUp('#user-delete-popup').html();
}

$('.btn-accept').on('click', function()){
	So.utils.showPopUp("El usuario ha sido eliminado");
}

