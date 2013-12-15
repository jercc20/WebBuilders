<?php
	define('PAGE','crear-cita');
	define('TITLE','crear-cita');
	$pageConfig = array(
		'plugins'=> array('datepicker')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';

?>
	<h1 class="ac">Crear Cita</h1>
	<form id='proced-box' class='form-add box-wrap' action='includes/insert-cita.php' method='post'>
		<section class="form-section">
			<?php 
				display_crear_cita_rows();
			 ?>
			
			<label for="txt-date">Fecha</label>
			<input id="txt-date" class="datepicker" name="txt_date" type="text" required="required" placeholder="dd/mm/yyyy" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" />

			<label for="hour">Hora</label>
			<select id="hour" name="slt-hour" required="required">
				<option value="">Hora</option>
				<option value="1">01</option>
				<option value="2">02</option>
				<option value="3">03</option>
				<option value="4">04</option>
				<option value="5">05</option>
				<option value="6">06</option>
				<option value="7">07</option>
				<option value="8">08</option>
				<option value="9">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="00">00</option>
			</select>
			<select id="minute" name="slt-minute" required="required">
				<option value="">Minutos</option>
				<option value="00">00</option>
				<option value="05">05</option>
				<option value="10">10</option>
				<option value="15">15</option>
				<option value="20">20</option>
				<option value="25">25</option>
				<option value="30">30</option>
				<option value="35">35</option>
				<option value="40">40</option>
				<option value="45">45</option>
				<option value="50">50</option>
				<option value="55">55</option>
			</select>
			<label for="type">Tipo de cita</label>
				<select id="type" name="slt-cita" required="required">
					<option value="">Seleccione el tipo de cita</option>
					<option value="Normal">Normal</option>
					<option value="Emergencia">Emergencia</option>
				</select>
			<label for="dentist-name">Seleccione el odontologo</label>
			<?php
				menu_desplegable_usuarios(3,1,'slt-odontologo');
			?>
			<label for="notes">Notas</label>
			<textarea id="notes" name="txt-notes"></textarea>
		</section>
		<div class="ac cb">
			<button class="form-cancel">Cancelar</button>
			<input type="reset" value="Limpiar" />
			<input type="submit" value = "Guardar"/>
		</div>
	</form>
<?php
	require_once 'includes/footer.php';
?>