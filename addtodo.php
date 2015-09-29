<?php
include 'dbmain.php';
//vars for db INSERT
$dbid = 'DEFAULT';
$elementtoadd = $_POST["todo"];
$elementdiscription = $_POST["discription"];

$elementtoadd = urldecode($elementtoadd);
$elementdiscription = urldecode($elementdiscription);

$elementtoadd = str_replace("add=", "", $elementtoadd);
$elementtoadd = str_replace("+", " ", $elementtoadd);
$elementdiscription = str_replace("add=", "", $elementdiscription);
$elementdiscription = str_replace("+", " ", $elementdiscription);
echo $elementtoadd;

//insert into database
$prepdb = $db->prepare("INSERT INTO $tablename (ID, todo, discription) VALUES(:id, :todo, :discription)");
$prepdb->execute(array(':id' => $dbid, ':todo' => $elementtoadd, ':discription' => $elementdiscription));


?>
