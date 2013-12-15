<?php
	if( $_POST ){
		define('PAGE','editar-rol');
		require_once 'functions.php';

		$nombreRol = ( isset( $_POST['txt-role-name'] ) ) ? $_POST['txt-role-name'] : '';
		$permisos = ( isset($_POST['chk-permissions'])) ? $_POST['chk-permissions'] : array();

		/*--Inicio--*/
		/*--Citas--*/
		$registrarCita = ( in_array( 'registrarCita' , $permisos ) ) ? 1 : 0;
		$editarCita = ( in_array( 'editarCita' , $permisos ) ) ? 1 : 0;
		$eliminarCita = ( in_array( 'eliminarCita' , $permisos ) ) ? 1 : 0;
		$consultarCita = ( in_array( 'consultarCita' , $permisos ) ) ? 1 : 0;
		$ingresarSeccionCitas = ( in_array( 'ingresarSeccionCitas' , $permisos ) ) ? 1 : 0;
		/*--Bitácoras--*/
		$registrarBitacora = ( in_array( 'registrarBitacora' , $permisos ) ) ? 1 : 0;
		$editarBitacora = ( in_array( 'editarBitacora' , $permisos ) ) ? 1 : 0;
		$eliminarBitacora = ( in_array( 'eliminarBitacora' , $permisos ) ) ? 1 : 0;
		$consultarBitacora = ( in_array( 'consultarBitacora' , $permisos ) ) ? 1 : 0;
		$consultarBitacoraPropia = ( in_array( 'consultarBitacoraPropia' , $permisos ) ) ? 1 : 0;
		$ingresarSeccionBitacoras = ( in_array( 'ingresarSeccionBitacoras' , $permisos ) ) ? 1 : 0;
		/*--Usuarios--*/
		$registrarUsuario = ( in_array( 'registrarUsuario' , $permisos ) ) ? 1 : 0;
		$editarUsuario = ( in_array( 'editarUsuario' , $permisos ) ) ? 1 : 0;
		$eliminarUsuario = ( in_array( 'eliminarUsuario' , $permisos ) ) ? 1 : 0;
		$consultarUsuario = ( in_array( 'consultarUsuario' , $permisos ) ) ? 1 : 0;
		$consultarUsuarioPaciente = ( in_array( 'consultarUsuarioPaciente' , $permisos ) ) ? 1 : 0;
		$crearUsuarioPaciente = ( in_array( 'crearUsuarioPaciente' , $permisos ) ) ? 1 : 0;
		$editarUsuarioPaciente = ( in_array( 'editarUsuarioPaciente' , $permisos ) ) ? 1 : 0;
		$ingresarSeccionUsuarios = ( in_array( 'ingresarSeccionUsuarios' , $permisos ) ) ? 1 : 0;
		/*--Odontograma--*/
		$registrarOdontograma = ( in_array( 'registrarOdontograma' , $permisos ) ) ? 1 : 0;
		$editarOdontograma = ( in_array( 'editarOdontograma' , $permisos ) ) ? 1 : 0;
		$eliminarOdontograma = ( in_array( 'eliminarOdontograma' , $permisos ) ) ? 1 : 0;
		$consultarOdontogramas = ( in_array( 'consultarOdontogramas' , $permisos ) ) ? 1 : 0;
		$ingresarSeccionOdontogramas = ( in_array( 'ingresarSeccionOdontogramas' , $permisos ) ) ? 1 : 0;
		/*--Facturas--*/
		$registrarFactura = ( in_array( 'registrarFactura' , $permisos ) ) ? 1 : 0;
		$editarFactura = ( in_array( 'editarFactura' , $permisos ) ) ? 1 : 0;
		$eliminarFactura = ( in_array( 'eliminarFactura' , $permisos ) ) ? 1 : 0;
		$consultarFacturas = ( in_array( 'consultarFacturas' , $permisos ) ) ? 1 : 0;
		$ingresarSeccionFacturas = ( in_array( 'ingresarSeccionFacturas' , $permisos ) ) ? 1 : 0;
		/*--Procedimientos--*/
		$registrarProcedimiento = ( in_array( 'registrarProcedimiento' , $permisos ) ) ? 1 : 0;
		$editarProcedimiento = ( in_array( 'editarProcedimiento' , $permisos ) ) ? 1 : 0;
		$eliminarProcedimiento = ( in_array( 'eliminarProcedimiento' , $permisos ) ) ? 1 : 0;
		$consultarProcedimiento = ( in_array( 'consultarProcedimiento' , $permisos ) ) ? 1 : 0;
		$ingresarSeccionProcedimientos = ( in_array( 'ingresarSeccionProcedimientos' , $permisos ) ) ? 1 : 0;
		/*--Reportes--*/
		$reporteCitas = ( in_array( 'reporteCitas' , $permisos ) ) ? 1 : 0;
		$reporteOdontogramas = ( in_array( 'reporteOdontogramas' , $permisos ) ) ? 1 : 0;
		$reporteBitacoras = ( in_array( 'reporteBitacoras' , $permisos ) ) ? 1 : 0;
		$reporteFacturacion = ( in_array( 'reporteFacturacion' , $permisos ) ) ? 1 : 0;
		$reporteUsuarios = ( in_array( 'reporteUsuarios' , $permisos ) ) ? 1 : 0;
		$reporteProcedimientos = ( in_array( 'reporteProcedimientos' , $permisos ) ) ? 1 : 0;
		/*--Sistema--*/
		$editarInformacion = ( in_array( 'editarInformacion' , $permisos ) ) ? 1 : 0;
		$ingresarSeccionConfiguracion = ( in_array( 'ingresarSeccionConfiguracion' , $permisos ) ) ? 1 : 0;

		$query = "UPDATE tbroles SET registrarCita = $registrarCita, editarCita = $editarCita, eliminarCita = $eliminarCita, consultarCita = $consultarCita, ingresarSeccionCitas = $ingresarSeccionCitas, registrarBitacora = $registrarBitacora, editarBitacora = $editarBitacora, eliminarBitacora = $eliminarBitacora, consultarBitacora = $consultarBitacora, consultarBitacoraPropia = $consultarBitacoraPropia, ingresarSeccionBitacoras = $ingresarSeccionBitacoras, registrarUsuario = $registrarUsuario, editarUsuario = $editarUsuario, eliminarUsuario = $eliminarUsuario, consultarUsuario = $consultarUsuario, consultarUsuarioPaciente = $consultarUsuarioPaciente, crearUsuarioPaciente = $crearUsuarioPaciente, editarUsuarioPaciente = $editarUsuarioPaciente, ingresarSeccionUsuarios = $ingresarSeccionUsuarios, registrarOdontograma = $registrarOdontograma, editarOdontograma = $editarOdontograma, eliminarOdontograma = $eliminarOdontograma, consultarOdontogramas = $consultarOdontogramas, ingresarSeccionOdontogramas = $ingresarSeccionOdontogramas, registrarFactura = $registrarFactura, editarFactura = $editarFactura, eliminarFactura = $eliminarFactura, consultarFacturas = $consultarFacturas, ingresarSeccionFacturas = $ingresarSeccionFacturas, registrarProcedimiento = $registrarProcedimiento, editarProcedimiento = $editarProcedimiento, eliminarProcedimiento = $eliminarProcedimiento, consultarProcedimiento = $consultarProcedimiento, ingresarSeccionProcedimientos = $ingresarSeccionProcedimientos, reporteCitas = $reporteCitas, reporteOdontogramas = $reporteOdontogramas, reporteBitacoras = $reporteBitacoras, reporteFacturacion = $reporteFacturacion, reporteUsuarios = $reporteUsuarios, reporteProcedimientos = $reporteProcedimientos, editarInformacion = $editarInformacion, ingresarSeccionConfiguracion = $ingresarSeccionConfiguracion WHERE nombreRol = '$nombreRol'";

		$result = do_query( $query );
		if( $result == 1 ){
			echo 'Rol creado con exito';
			js_redirect('consultar-roles.php', 4000);
		}

		/* ---- */

		global $db_server;
		mysql_close( $db_server );
	}
?>


