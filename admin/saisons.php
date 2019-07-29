<?php
    include '../php/connect_db.php';
// recuperation des thematiques
$requete = $conn->query("SELECT * FROM saison");
$row_count = $requete->rowCount();

    include 'views/saisons.views.php';
?>
