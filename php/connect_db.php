<?php
// $servername = "bd01.cloud4africa.net";
// $username = "c3168_Viensdin";
// $password = "Instant2deVie2019";
// try
// {
// $conn = new PDO("mysql:host=$servername;dbname=c3168_vod", $username, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// }
// catch(Exception $e)
// {
// die('ERROR:'.$e->getMessage());
// }
 $servername = "localhost";
 $username = "root";
 $password = "";
 try
 {
 $conn = new PDO("mysql:host=$servername;dbname=viens-dindin;charset=utf8", $username, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 }
 catch(Exception $e)
 {
 die('ERROR:'.$e->getMessage());
 }
?>
