<?php
 
/* VALUES */
$id=$_POST['id'];
$title=$_POST['title'];
$start=$_POST['start'];
$end=$_POST['end'];
 
// connexion à la base de données
 try {
 $bdd = new PDO('mysql:host=localhost;dbname=bdsistemaodontologico', 'root', '');
 } catch(Exception $e) {
 exit('No es posible conectar a la base de datos.');
 }
 
$sql = "UPDATE evenement SET title=?, start=?, end=? WHERE id=?";
$q = $bdd->prepare($sql);
$q->execute(array($title,$start,$end,$id));
 
?>