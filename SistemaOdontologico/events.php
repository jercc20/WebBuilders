<?php

 $json = array();

 $query = "SELECT * FROM evenement ORDER BY id";
 
 try {
 $bdd = new PDO('mysql:host=localhost;dbname=bdsistemaodontologico', 'root', '');
 } catch(Exception $e) {
 exit('No es posible conectar a la base de datos.');
 }

 $result = $bdd->query($query) or die(print_r($bdd->errorInfo()));
 
 echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));
 
?>