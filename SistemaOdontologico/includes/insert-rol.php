<?php
	if( $_POST ){
		define('PAGE','crearRol');
		require_once 'functions.php';

		$nombreRol = ( isset( $_POST['txt-role-name'] ) ) ? $_POST['txt-role-name'] : '';
		$permisos = ( isset($_POST['chk-permissions'])) ? $_POST['chk-permissions'] : array();

		/*--Citas--*/
		$registrarCita = ( in_array( 'registrarCita' , $permisos ) ) ? 1 : 0;
		$editarCita = ( in_array( 'editarCita' , $permisos ) ) ? 1 : 0;
		$eliminarCita = ( in_array( 'eliminarCita' , $permisos ) ) ? 1 : 0;
		$consultarCitas = ( in_array( 'consultarCitas' , $permisos ) ) ? 1 : 0;
		$consultarCalendario = ( in_array( 'consultarCalendario' , $permisos ) ) ? 1 : 0;
		/*--Bitácoras--*/
		$registrarBitacora = ( in_array( 'registrarBitacora' , $permisos ) ) ? 1 : 0;
		$editarBitacora = ( in_array( 'editarBitacora' , $permisos ) ) ? 1 : 0;
		$eliminarBitacora = ( in_array( 'eliminarBitacora' , $permisos ) ) ? 1 : 0;
		$consultarBitacoras = ( in_array( 'consultarBitacoras' , $permisos ) ) ? 1 : 0;
		$consultarBitacorasPropias = ( in_array( 'consultarBitacorasPropias' , $permisos ) ) ? 1 : 0;
		/*--Usuarios--*/
		$registrarUsuario = ( in_array( 'registrarUsuario' , $permisos ) ) ? 1 : 0;
		$editarUsuario = ( in_array( 'editarUsuario' , $permisos ) ) ? 1 : 0;
		$eliminarUsuario = ( in_array( 'eliminarUsuario' , $permisos ) ) ? 1 : 0;
		$consultarUsuarios = ( in_array( 'consultarUsuarios' , $permisos ) ) ? 1 : 0;
		$consultarUsuariosPacientes = ( in_array( 'consultarUsuariosPacientes' , $permisos ) ) ? 1 : 0;
		$crearUsuarioPaciente = ( in_array( 'crearUsuarioPaciente' , $permisos ) ) ? 1 : 0;
		$editarUsuarioPaciente = ( in_array( 'editarUsuarioPaciente' , $permisos ) ) ? 1 : 0;
		/*--Roles--*/
		$crearRol = ( in_array( 'crearRol' , $permisos ) ) ? 1 : 0;
		$editarRol = ( in_array( 'editarRol' , $permisos ) ) ? 1 : 0;
		$consultarRoles = ( in_array( 'consultarRoles' , $permisos ) ) ? 1 : 0;
		$eliminarRol = ( in_array( 'eliminarRol' , $permisos ) ) ? 1 : 0;
		/*--Odontogramas--*/
		$registrarOdontograma = ( in_array( 'registrarOdontograma' , $permisos ) ) ? 1 : 0;
		$editarOdontograma = ( in_array( 'editarOdontograma' , $permisos ) ) ? 1 : 0;
		$eliminarOdontograma = ( in_array( 'eliminarOdontograma' , $permisos ) ) ? 1 : 0;
		$consultarOdontogramas = ( in_array( 'consultarOdontogramas' , $permisos ) ) ? 1 : 0;
		/*--Facturas--*/
		$registrarFactura = ( in_array( 'registrarFactura' , $permisos ) ) ? 1 : 0;
		$eliminarFactura = ( in_array( 'eliminarFactura' , $permisos ) ) ? 1 : 0;
		$consultarFacturas = ( in_array( 'consultarFacturas' , $permisos ) ) ? 1 : 0;
		$crearAbono = ( in_array( 'crearAbono' , $permisos ) ) ? 1 : 0;
		$consultarAbonos = ( in_array( 'consultarAbonos' , $permisos ) ) ? 1 : 0;
		/*--Procedimientos--*/
		$registrarProcedimiento = ( in_array( 'registrarProcedimiento' , $permisos ) ) ? 1 : 0;
		$editarProcedimiento = ( in_array( 'editarProcedimiento' , $permisos ) ) ? 1 : 0;
		$eliminarProcedimiento = ( in_array( 'eliminarProcedimiento' , $permisos ) ) ? 1 : 0;
		$consultarProcedimientos = ( in_array( 'consultarProcedimientos' , $permisos ) ) ? 1 : 0;
		/*--Reportes--*/
		$reporteCitas = ( in_array( 'reporteCitas' , $permisos ) ) ? 1 : 0;
		$reporteOdontogramas = ( in_array( 'reporteOdontogramas' , $permisos ) ) ? 1 : 0;
		$reporteBitacoras = ( in_array( 'reporteBitacoras' , $permisos ) ) ? 1 : 0;
		$reporteFacturacion = ( in_array( 'reporteFacturacion' , $permisos ) ) ? 1 : 0;
		$reporteUsuarios = ( in_array( 'reporteUsuarios' , $permisos ) ) ? 1 : 0;
		$reporteProcedimientos = ( in_array( 'reporteProcedimientos' , $permisos ) ) ? 1 : 0;
		/*--Sistema--*/
		$editarInformacion = ( in_array( 'editarInformacion' , $permisos ) ) ? 1 : 0;
		/*--Inicio--*/
		$consultarRecordatorios = ( in_array( 'consultarRecordatorios' , $permisos ) ) ? 1 : 0;

		$query = "SELECT nombreRol FROM tbroles";

		$result = do_query( $query );

		$encontro = false;

		while ($fila = mysql_fetch_row($result)) {

			$nombreRolCom = $fila['0'];

			if ( ! strcmp($nombreRol, $nombreRolCom) ) {
				$encontro = true;
			}
		}

		if ( ! $encontro ) {
			$query = "INSERT INTO tbroles VALUES (NULL, '$nombreRol', $registrarCita, $editarCita, $eliminarCita, $consultarCitas, $registrarBitacora, $editarBitacora, $eliminarBitacora, $consultarBitacoras, $consultarBitacorasPropias, $registrarUsuario, $editarUsuario, $eliminarUsuario, $consultarUsuarios, $consultarUsuariosPacientes, $crearUsuarioPaciente, $editarUsuarioPaciente, $registrarOdontograma, $editarOdontograma, $eliminarOdontograma, $consultarOdontogramas, $registrarFactura, $eliminarFactura, $consultarFacturas, $registrarProcedimiento, $editarProcedimiento, $eliminarProcedimiento, $consultarProcedimientos, $reporteCitas, $reporteOdontogramas, $reporteBitacoras, $reporteFacturacion, $reporteUsuarios, $reporteProcedimientos, $editarInformacion, $crearAbono, $consultarAbonos, $consultarCalendario, $consultarRecordatorios, $consultarRoles, $editarRol, $eliminarRol, $crearRol)";

			$result = do_query( $query );
			if( $result == 1 ){
				echo 'Rol creado con exito';
				js_redirect('consultar-roles.php', 4000);
			}
		}else{
			echo "El nombre ingresado para el rol ya está en uso";
			exit();
		}

		/* ---- */

		global $db_server;
		mysql_close( $db_server );
	}
?>