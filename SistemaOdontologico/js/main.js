//Namespace
var SO = {
	config: {}
};

jQuery(function($) {

	if( SO.utils.currentFile() == "login" ){
		Prototype.checkLoginSession();
		Prototype.init();

		SO.global.loginInit();
	}
	else {
		Prototype.checkSession();
		SO.config.user = Prototype.getUser();

		SO.global.init();
	}

	//DataTables Init
	if( $('.data-table').length > 0 ){

		$('.data-table').dataTable({
			"bJQueryUI": true,
			"bLengthChange": false,
			"sPaginationType": "full_numbers",
			"oSearch": {},
			"oLanguage": {
				"sLengthMenu": "Mostrando _MENU_ resultados por pagina",
				"sZeroRecords": "No se encontraron resultados",
				"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ resultados",
				"sInfoEmpty": "",
				"sInfoFiltered": "",
				"sSearch": "Buscar "
			}
		});

		$('.item-remove').on( 'click', function(){
			SO.utils.showPopUp( $('#popup-remove').html() );
		});

		$('#popup').on( 'click', '.btn-accept', function(){
			SO.utils.showPopUp('Ha sido eliminado correctamente.');
		});

	}

	$('a[href="#"]').on('click', function(){ return false; });

});