<?php
    include '../php/connect_db.php';

    // recuperation des thematiques
 $requete = $conn->query("SELECT * FROM episode");
 $row_count = $requete->rowCount();
    include 'views/episodes.views.php';
?>
