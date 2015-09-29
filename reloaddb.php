<?php
include 'dbmain.php';

$gettodo = $db->prepare("SELECT ID, todo, discription FROM $tablename");
$gettodo->execute();


$orderObject = array();
$orderObject['header'] = $gettodo->fetchAll();   //or: $statement->fetchAll()[0]
echo json_encode($orderObject);


?>
