<?php
header('Content-Type: text/html; charset=ISO-8859-15');
$string ="here is something %5B %3Edsgsd";
echo $string."<br>";
$string = utf8_decode($string);
echo $string."<br>";

?>
