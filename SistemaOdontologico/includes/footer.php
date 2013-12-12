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
	<script src="js/vendor/jquery-2.0.3.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/global.js"></script>
	<script src="js/utils.js"></script>
</body>
</html>
<?php
	global $db_server;
	mysql_close( $db_server );
?>