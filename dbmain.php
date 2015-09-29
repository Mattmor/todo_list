<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$db = new pdo('mysql:host=localhost;dbname=mattvilv_todo;charset=utf8', 'mattvilv_root', 'M)9HH]B2,A*0');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$tablename = "todo";
?>
