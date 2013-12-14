//Namespace
var SO = {
	config: {}
};

jQuery(function($) {

	if( SO.utils.currentFile() == "login" ){
		SO.global.loginInit();
	}
	else {
		SO.global.init();
	}

	//DataTables Init
	if( $('.data-table').length > 0 ){

		$table = $('.data-table');

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
			$table.each(function(){
				$(this).find('tr').each(function(){
					$(this).find('td').eq( $(this).find('.column-icons').index() ).addClass('ar');
				});
			});
			dtOptions.aoColumnDefs = [{
				bSortable: false,
				aTargets: [ $('.column-icons').index() ]
			}];
		}

		$table.dataTable( dtOptions );

		$table.on( 'click', '.item-remove', function(){
			SO.config.rowToDelete = $(this).parents('tr');
			SO.utils.showPopUp( $('#popup-remove').html() );
		});

		$('#popup').on( 'click', '.btn-accept', function(){
			urlVars = SO.utils.getUrlVars();
			vars = "ajax-call=1&var="+urlVars[0]+
					"&"+urlVars[0]+"="+SO.utils.getUrlVar(urlVars[0]);
			$.ajax({
				type: "POST",
				url: 'includes/functions.php',
				data: vars,
				cache: false,
				success: function( data ){
					if( data == "1" ){
						$('.data-table').dataTable().fnDeleteRow( SO.config.rowToDelete[0]._DT_RowIndex );
						SO.utils.showPopUp('Ha sido eliminado correctamente.');
					}
					else {
						SO.utils.showPopUp( data );
					}
				}
			});
			window.location.hash = "";
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
			dateFormat: 'dd-mm-yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);
		$( ".datepicker" ).datepicker();

	}

	//Forms
	$('form').on( 'submit', function(e){
		e.preventDefault();
		$form = $(this);
		$.ajax({
			type: "POST",
			url: $form.attr('action'),
			data: $form.serialize(),
			cache: false,
			success: function( data ){
				if( data == "1" ){
					SO.utils.showPopUp('Ha sido guardado correctamente.');
				}
				else {
					SO.utils.showPopUp( data );
				}
			}
		});
	});
	$('.form-cancel').on( 'click', function(e){
		e.preventDefault();
		window.back(1);
	});
	$('#select-all-rol').on( 'click', function(){
		$(this).parents('form').find('input:checkbox').prop( 'checked', true );
	});
	$('#unselect-all-rol').on( 'click', function(){
		$(this).parents('form').find('input:checkbox').prop( 'checked', false );
	});
	$('.add-procedure').on( 'click', function(){
		SO.utils.showPopUp( $('#popup-procedure').html() );
	});
	$('#btn-adv-search').on( 'click', function(){
		SO.utils.showPopUp( $('#popup-adv-search').html() );
	});
	$('#popup').on( 'click', '.btn-add', function(){
		$('#delete-procedures').show();
		$items = $(this).parents('#popup').find('.table-procedures input:checked').parents('tr');
		$items.each( function(){
			$(this).append('<td><input type="text" placeholder="Zona" required="required">');
		});
		$('#table-procedures-added').prepend( $items );
		$('#procedure-number').val( $('#table-procedures-added tr').size() );
	});
	$('#popup').on( 'click', 'form .close', function(e){
		e.preventDefault();
	});
	$('#delete-procedures').on( 'click', function(){
		$('#table-procedures-added').find('input:checked').parents('tr').remove();
		if( $('#table-procedures-added tr').size() == 0 ){
			$('#delete-procedures').hide();
		}
	});

	$('a[href="#"]').on('click', function(){ return false; });

});