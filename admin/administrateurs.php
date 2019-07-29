<?php 
    include '../ php/connect_db.php';
    // recuperation des thematiques
    $requete = $conn->query("SELECT * FROM saison");
    
    include 'views/administrateurs.views.php';
?>
