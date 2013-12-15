<?php

    define('PAGE','editar-bitacora');
    require_once 'includes/configuracion.php';
    $db_server = mysql_connect($db_hostname,$db_username, $db_password);
    if(!$db_server) die("No se pudo establecer conexión con MySQL: " . mysql_error());  

    mysql_select_db($db_database)
        or die("No se puedo establecer conexión con la base de datos: ". mysql_error());

    $id = $_GET['id'];

    if(isset($_POST['slt-odontologo']) &&
        isset($_POST['slt-paciente']) &&
        isset($_POST['txt-date']) &&
        isset($_POST['txt-asistentes']) &&
        isset($_POST['txt-notes'])){
        
        $id_dentist = $_POST['slt-odontologo'];
        $id_patient = $_POST['slt-paciente'];
        $birth = $_POST['txt-date'];
        $birth = date("Y-m-d",strtotime($birth));
        $asistentes = $_POST['txt-asistentes'];
        $notes = $_POST['txt-notes'];

        $query = "UPDATE tbbitacoras SET idOdontologo = '$id_dentist', idPaciente = '$id_patient', fecha = '$birth', asistentes = '$asistentes', notas ='$notes'
        WHERE idBitacora = '$id'";
        

    if(!mysql_query($query,$db_server))
            echo "update falló : $query <br />" .
            mysql_error() . "<br /><br />";
    }
    var_dump($query);
    echo "<script>window.location='consultar-bitacoras.php'</script>";

    mysql_close($db_server); 
?> 