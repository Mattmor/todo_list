<?php
include 'dbmain.php';
$elementtodelete = $_POST["todo"];

$elementtodelete = urldecode($elementtodelete);

$prepared = $db->prepare("DELETE FROM $tablename WHERE todo=:todo");
$prepared->bindValue(':todo', $elementtodelete, PDO::PARAM_STR);
$prepared->execute();

?>
