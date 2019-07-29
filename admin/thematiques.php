<?php 
    include '../php/connect_db.php';
    // recuperation des thematiques
    $requete = $conn->query("SELECT * FROM thematique");
    $row_count = $requete->rowCount();
    
    include 'views/thematiques.views.php';
?>
