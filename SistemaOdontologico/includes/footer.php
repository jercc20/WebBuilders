		</div>
	</div>
	<footer id="footer">
		<p>&copy; Derechos reservados 2013</p>
	</footer>
	<div id="popup-wrap">
		<section id="popup" class="hide">
			<i class="icon-close close"></i>
			<div id="popup-content"></div>
		</section>
	</div>
	<?php
		if( in_array( 'datatable', $pageConfig['plugins'] ) ):
		?>
		<div id="popup-remove" class="hide">
			<p>¿Está seguro que desea eliminarlo?</p>
			<div class="ac">
				<button class="btn-accept">Aceptar</button>
				<button class="close">Cancelar</button>
			</div>
		</div>
		<?php
		endif;
	?>
	<script src="js/vendor/jquery-2.0.3.min.js"></script>
	<?php
		if( in_array( 'datatable', $pageConfig['plugins'] ) ):
			?>
			<script src="js/vendor/jquery.dataTables.min.js"></script>
			<?php
		endif;
		if( in_array( 'datepicker', $pageConfig['plugins'] ) ):
			?>
			<script src="js/vendor/jquery-ui-1.10.3.datepicker.min.js"></script>
			<?php
		endif;
		if( in_array( 'calendar', $pageConfig['plugins'] ) ):
			?>
			<script src="js/vendor/fullcalendar.min.js"></script>
			<?php
		endif;
	?>
	<script src="js/main.js"></script>
	<script src="js/global.js"></script>
	<script src="js/utils.js"></script>
</body>
</html>
<?php
	global $db_server;
	mysql_close( $db_server );
?>