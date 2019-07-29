<?php
    include '../php/connect_db.php';

 // recuperation des thematiques
 $requete = $conn->query("SELECT * FROM video");
 $row_count = $requete->rowCount();

    include 'views/videos.views.php';
?>
