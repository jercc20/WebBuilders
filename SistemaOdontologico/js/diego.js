jQuery(function($) {

	$('.item-remove').on('click', function(){
		SO.utils.showPopUp( $('#odontograma-popup').html() );
	});

	$('.btn-ba').on('click', function(){
		SO.utils.showPopUp( $('#popup-report-search').html() );
	});

	$('.popup-process').on('click', function(){
		SO.utils.showPopUp( $('#process-popup').html() );
	});

	/*$('.printable').click(function (){
		$('#print-this').printArea();
	})*/

	$('.printable').on('click', function(){
		print('#print-this');
	});

	$('#botonpruebafade').click(function(evento) {
		$('#divquesemuestra').fadeIn(2000);
	});
});