jQuery(function($) {

	if ($("#tb-dates").length > 0) {
		$('#tb-dates').dataTable();
	};

	$('.item-remove').on('click', function(){
		SO.utils.showPopUp( $('#odontograma-popup').html() );
	});

	$('#advance-search').on('click', function(){
		SO.utils.showPopUp( $('#popup-report-odontograma').html() );
	});


	$('.popup-process').on('click', function(){
		SO.utils.showPopUp( $('#process-popup').html() );
	});

	$('.printable').click(function (){
		$('#print-this').printArea();
	})

});