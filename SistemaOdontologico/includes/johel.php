<?php
function display_usuarios_rows(){
	$usuarios = get_usuarios();
	while ($fila = mysql_fetch_assoc($usuarios)) {
		echo '<tr>';
			echo '<td>' . $fila["nombre"]." ".$fila["primerApellido"]." ".$fila["segundoApellido"] . '</td>';
			echo '<td>' . $fila["identificacion"] . '</td>';
			echo '<td>' . $fila["nombreRol"] . '</td>';
			echo '<td>' . $fila["telefonoCasa"] .' / '.$fila["telefonoCelular"]. '</td>';
			echo '<td>' . $fila["correoElectronico"] . '</td>';
			echo '<td>' . $fila["domicilio"] . '</td>';
			$id = $fila['idUsuario'];
			echo '<td><a href="editar-usuario.php?idUsuario=' . $fila['idUsuario'] . '"><i class="icon-edit"></i></a><a href="#!?idUsuario=' . $fila['idUsuario'] . '"><i class="icon-remove item-remove"></i></a></td>';
		echo '</tr>';
	}
}

function get_usuarios(){
	$query = "SELECT  u.idUsuario, u.nombre , u.primerApellido, u.segundoApellido, u.identificacion, r.nombreRol, u.telefonoCasa,
						u.telefonoCelular, u.correoElectronico, u.domicilio
				FROM tbusuarios AS u
				LEFT JOIN tbroles AS r ON (r.idRol = u.idRol)";
	$result = do_query( $query );
	return $result;
}

function display_usuarios_secretaria_rows(){
	$usuarios = get_usuarios_secretaria();
	while ($fila = mysql_fetch_assoc($usuarios)) {
		echo '<tr>';
			echo '<td>' . $fila["nombre"]." ".$fila["primerApellido"]." ".$fila["segundoApellido"] . '</td>';
			echo '<td>' . $fila["identificacion"] . '</td>';
			echo '<td>' . $fila["nombreRol"] . '</td>';
			echo '<td>' . $fila["telefonoCasa"] .' / '.$fila["telefonoCelular"]. '</td>';
			echo '<td>' . $fila["correoElectronico"] . '</td>';
			echo '<td>' . $fila["domicilio"] . '</td>';
			$id = $fila['idUsuario'];
			echo '<td><a href="editar-usuario-paciente.php?idUsuario=' . $fila['idUsuario'] . '"><i class="icon-edit"></i></a><a href="#!?idUsuario=' . $fila['idUsuario'] . '"><i class="icon-remove item-remove"></i></a></td>';
		echo '</tr>';
	}
}

function get_usuarios_secretaria(){
	$query = "SELECT  u.idUsuario, u.nombre , u.primerApellido, u.segundoApellido, u.identificacion, r.nombreRol, u.telefonoCasa,
						u.telefonoCelular, u.correoElectronico, u.domicilio
				FROM tbusuarios AS u
				LEFT JOIN tbroles AS r ON (r.idRol = u.idRol)
				WHERE r.idRol = 2";
	$result = do_query( $query );
	return $result;
}

function display_usuarios_odontologo_rows(){
	$usuarios = get_usuarios_odontologo();
	while ($fila = mysql_fetch_assoc($usuarios)) {
		echo '<tr>';
			echo '<td>' . $fila["nombre"]." ".$fila["primerApellido"]." ".$fila["segundoApellido"] . '</td>';
			echo '<td>' . $fila["identificacion"] . '</td>';
			echo '<td>' . $fila["nombreRol"] . '</td>';
			echo '<td>' . $fila["telefonoCasa"] .' / '.$fila["telefonoCelular"]. '</td>';
			echo '<td>' . $fila["correoElectronico"] . '</td>';
			echo '<td>' . $fila["domicilio"] . '</td>';
			$id = $fila['idUsuario'];
			echo '<td> </td>';
		echo '</tr>';
	}
}

function get_usuarios_odontologo(){
	$query = "SELECT  u.idUsuario, u.nombre , u.primerApellido, u.segundoApellido, u.identificacion, r.nombreRol, u.telefonoCasa,
						u.telefonoCelular, u.correoElectronico, u.domicilio
				FROM tbusuarios AS u
				LEFT JOIN tbroles AS r ON (r.idRol = u.idRol)
				WHERE r.idRol = 2";
	$result = do_query( $query );
	return $result;
}

function display_select_roles($nombre){
	$roles = get_roles_select();
	echo "<select name='$nombre'>";
	while ($fila = mysql_fetch_row($roles)){
    	echo "<option value='$fila[0]'>$fila[1]</option>";
  	}
	echo "</select>";
};

function get_roles_select(){
	$query ="SELECT idRol, nombreRol FROM tbroles";
	$result = do_query( $query );
	return $result;
};

function display_select_paciente($nombre){
	$roles = get_roles_paciente_select();
	echo "<select name='$nombre'>";
	while ($fila = mysql_fetch_row($roles)){
       	echo "<option value='$fila[0]'>$fila[1]</option>";
  	}
	echo "</select>";
};

function get_roles_paciente_select(){
	$query ="SELECT idRol, nombreRol FROM tbroles WHERE idRol = 2";
	$result = do_query($query); 
	return $result;
};

function display_edit_usuarios_rows(){
	$usuarios = get_usuarios_update();

	$fila = mysql_fetch_assoc($usuarios);
	$idUsuario = $fila['idUsuario'];
	$name = $fila['nombre'];
	$lastname = $fila['primerApellido'];
	$lastname2 = $fila['segundoApellido'];
	$userId = $fila['identificacion'];
	$housePhn = $fila['telefonoCasa'];
	$CellPhn = $fila['telefonoCelular'];
	$email = $fila['correoElectronico'];
	$birth = $fila['fechaNacimiento'];
	$datepickerBirth = do_date_format($birth);
	$impmt = $fila['discapacidad'];
	$role = $fila['idRol'];
	$userPsw = $fila['contrasenna'];
	$alergie = $fila['alergias'];
	$UserAdrs = $fila['domicilio'];

		echo "<section class='form-section fl'>";
		echo "<input type='hidden' name='idUsuario' value='$idUsuario' />";
		echo "<label for='user-name'> Nombre</label>";
		echo "<input id='user-name' name='txt_name' type='text'  required='required' pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' value='$name' />" ;
		echo "<label for='user-lastname'>Primer apellido</label>";
		echo "<input id='user-lastname' name='txt_lastname' required='required' type='text' pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' value='$lastname'/>"; 
		echo "<label for='user-lastname2'> Segundo apellido</label>";
		echo "<input id='user-lastname2' name='txt_lastname2' type='text'  pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' value='$lastname2'/>";
		echo "<label for='user-id'> Identificación</label>";
		echo "<input id='user-id' name='txt_user'  type='text' value='$userId'/>";
		echo "<label for='user-phone'> Teléfono de la casa</label>";
		echo "<input id='user-phone' name='txt_phone' type='text' pattern='\d{8,10}' required='required' value='$housePhn'/>";
		echo "<label for='user-cellphone'> Teléfono celular</label>";
		echo "<input id='user-cellphone' name='txt_cellphone' type='text' value='$CellPhn'/>";
		echo "<label for='user-email'> Correo electrónico</label>";
		echo "<input id='user-email' name='txt_email' type='text'  required='required' value='$email'/>"; 
		echo "<label for='user-birthday'> Fecha de nacimiento</label>";
		echo "<input id='user-birthday' name='txt_birthday' type='text'  required='required' placeholder ='dd/mm/yyyy' class='datepicker' value='$datepickerBirth' />"; 
		echo "</section>";
		echo "<section class='form-section fr'>";
		echo "<label for='user-impairment'>Discapacidad</label>";
		echo "<input type='checkbox' id='user-impairment'  name='txt_impairment' value='$impmt'/>"; 
		echo "<label for='user-role'>Rol</label>";
		display_select_roles('slt-user-role');
		echo "<label for='user-psw'>Contraseña</label>";
		echo "<input id='user-psw' name='txt-user-psw' type='password' />"; 
		echo "<label for='user-cpsw'>Confirmar contraseña</label>";
		echo "<input id='user-cpsw' name='psw-user-pnew' type='password' />";
		echo "<label for='user-alergie'> Alergias</label>";
		echo "<textarea cols='10' rows='10' id='user-alergie' name='txt-user-alergie' pattern='[A-Za-z]+ '>$alergie</textarea>"; 
		echo "<label for='user-adress'> Domicilio</label>";
		echo "<textarea cols='10' rows='10' id='user-adress' name='txt-user-adress' required='required'>$UserAdrs</textarea>";
		echo "</section>";
};

function display_edit_usuarios_paciente_rows(){
	$usuarios = get_usuarios_update();

	$fila = mysql_fetch_assoc($usuarios);
	$idUsuario = $fila['idUsuario'];
	$name = $fila['nombre'];
	$lastname = $fila['primerApellido'];
	$lastname2 = $fila['segundoApellido'];
	$userId = $fila['identificacion'];
	$housePhn = $fila['telefonoCasa'];
	$CellPhn = $fila['telefonoCelular'];
	$email = $fila['correoElectronico'];
	$birth = $fila['fechaNacimiento'];
	$datepickerBirth = do_date_format($birth);
	$impmt = $fila['discapacidad'];
	$role = $fila['idRol'];
	$userPsw = $fila['contrasenna'];
	$alergie = $fila['alergias'];
	$UserAdrs = $fila['domicilio'];

		echo "<section class='form-section fl'>";
		echo "<input type='hidden' name='idUsuario' value='$idUsuario' />";
		echo "<label for='user-name'> Nombre</label>";
		echo "<input id='user-name' name='txt_name' type='text'  required='required' pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' value='$name' />" ;
		echo "<label for='user-lastname'>Primer apellido</label>";
		echo "<input id='user-lastname' name='txt_lastname' required='required' type='text' pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' value='$lastname'/>"; 
		echo "<label for='user-lastname2'> Segundo apellido</label>";
		echo "<input id='user-lastname2' name='txt_lastname2' type='text'  pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' value='$lastname2'/>";
		echo "<label for='user-id'> Identificación</label>";
		echo "<input id='user-id' name='txt_user'  type='text' value='$userId'/>";
		echo "<label for='user-phone'> Teléfono de la casa</label>";
		echo "<input id='user-phone' name='txt_phone' type='text' pattern='\d{8,10}' required='required' value='$housePhn'/>";
		echo "<label for='user-cellphone'> Teléfono celular</label>";
		echo "<input id='user-cellphone' name='txt_cellphone' type='text' value='$CellPhn'/>";
		echo "<label for='user-email'> Correo electrónico</label>";
		echo "<input id='user-email' name='txt_email' type='text'  required='required' value='$email'/>"; 
		echo "<label for='user-birthday'> Fecha de nacimiento</label>";
		echo "<input id='user-birthday' name='txt_birthday' type='text'  required='required' placeholder ='dd/mm/yyyy' class='datepicker' value='$datepickerBirth' />"; 
		echo "</section>";
		echo "<section class='form-section fr'>";
		echo "<label for='user-impairment'>Discapacidad</label>";
		echo "<input type='checkbox' id='user-impairment'  name='txt_impairment' value='$impmt'/>"; 
		echo "<label for='user-role'>Rol</label>";
		display_select_paciente('slt-user-role');
		echo "<label for='user-psw'>Contraseña</label>";
		echo "<input id='user-psw' name='txt-user-psw' type='password' />"; 
		echo "<label for='user-cpsw'>Confirmar contraseña</label>";
		echo "<input id='user-cpsw' name='psw-user-pnew' type='password' />";
		echo "<label for='user-alergie'> Alergias</label>";
		echo "<textarea cols='10' rows='10' id='user-alergie' name='txt-user-alergie' pattern='[A-Za-z]+ '>$alergie</textarea>"; 
		echo "<label for='user-adress'> Domicilio</label>";
		echo "<textarea cols='10' rows='10' id='user-adress' name='txt-user-adress' required='required'>$UserAdrs</textarea>";
		echo "</section>";
};

function get_usuarios_update(){
	$id = ( isset( $_GET['idUsuario'] ) ) ? $_GET['idUsuario'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";
	$result= do_query($query);
	return $result;
}

?>

