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

		var dtOptions = {
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
			},
			aoColumnDefs: []
		};
		if( $('.column-icons').index() > -1 ){
			//Align right in icons column
			$('.data-table').each(function(){
				$(this).find('tr').each(function(){
					$(this).find('td').eq( $(this).find('.column-icons').index() ).addClass('ar');
				});
			});
			dtOptions.aoColumnDefs = [{
				bSortable: false,
				aTargets: [ $('.column-icons').index() ]
			}];
		}

		$('.data-table').dataTable( dtOptions );

		$('.item-remove').on( 'click', function(){
			SO.utils.showPopUp( $('#popup-remove').html() );
		});

		$('#popup').on( 'click', '.btn-accept', function(){
			SO.utils.showPopUp('Ha sido eliminado correctamente.');
		});

	}

	//Datepicker Init
	if( $('.datepicker').length > 0 ){

		$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '<Ant',
			nextText: 'Sig>',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);
		$( ".datepicker" ).datepicker();

	}

	$('a[href="#"]').on('click', function(){ return false; });

});