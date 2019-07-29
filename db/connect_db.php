<?php
try
{
$conn = new PDO("mysql:host=localhost;dbname=viens-dindin","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
die('ERROR:'.$e->getMessage());
}
?>
