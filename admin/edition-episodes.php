<?php
    include '../php/connect_db.php';
    
    // recuperation des episode
    $requete = $conn->query("SELECT * FROM episode");

    // tableau d'erreur
    $errors = array();
    $success = false;


    

    if(isset($_POST['supprimer'])){
        $id = $_POST['id'];
        $deletequery = "DELETE FROM episode WHERE id='$id'";       
        $req = $conn->prepare($deletequery);
        $response = $req->execute(array($id)); 
        echo '<script language="Javascript">';
        echo 'document.location.replace("./episodes.php")';
        echo ' </script>';

    }

    include 'views/edition-episodes.views.php';

?>
