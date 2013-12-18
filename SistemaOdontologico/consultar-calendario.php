<?php
	define('PAGE','consultarCalendario');
	define('TITLE','Consultar Calendario');
	$pageConfig = array(
		'plugins'=> array('calendar')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<div id='calendar'></div>
<?php
	require_once 'includes/footer.php';
?>
<html>
<head>
</head>
<body>
<script src='js/vendor/jquery.min.js'></script>
<script src='js/vendor/jquery-ui.custom.min.js'></script>
<script>

	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		var calendar = $('#calendar').fullCalendar({
			editable: true,
			events: "http://localhost/WebBuilders/SistemaOdontologico/events.php",
			selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) {
			 var title = prompt('Agrege el evento:');
			 if (title) {
			 start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
			 end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
			 $.ajax({
			 url: 'http://localhost/WebBuilders/SistemaOdontologico/add_events.php',
			 data: 'title='+ title+'&start='+ start +'&end='+ end ,
			 type: "POST",
			 success: function(json) {

			 }
			 });
			 calendar.fullCalendar('renderEvent',
			 {
			 title: title,
			 start: start,
			 end: end,
			 allDay: allDay
			 },
			 true // make the event "stick"
			 );
			 }
			 calendar.fullCalendar('unselect');
			}
		});	
	});
</script>
</body>
</html>