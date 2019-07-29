<?php 
    include '../php/connect_db.php';


    // tableau d'erreur
    $errors = array();
    $success = false;

    if(isset($_POST['enregistrer'])){
        // declaration des variables
        $nom = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $date = date('Y-m-d H:i:s');
        // $status = 0;
        $position = htmlspecialchars($_POST['position']);
        // verification sur la status est publié ou pas
        if(isset($_POST['status'])){
            $status = htmlspecialchars($_POST['status']);
        }else {
            $status = 0;
        }

        // verification si tous les champs sont rempli
        if(!empty($_POST['name']) AND !empty($_POST['description']) AND !empty($_POST['position'])){
            // filter la position pour entrer que des integers
            if(filter_var($position, FILTER_VALIDATE_INT)){
                // verification sur le nom du libellé existe dans la base de donnée
                $reqname = $conn->prepare("SELECT * FROM thematique WHERE libelle = ?");
                $reqname ->execute(array($nom));
                $nameexist = $reqname->rowCount();
                if($nameexist == 0){
                    $insertmbr = $conn->prepare("INSERT INTO thematique(libelle, description, position, status, date) VALUES(?, ?, ?, ?, ?)");  
                    $insertmbr ->execute(array($nom, $description, $position, $status, $date));
                }
                else{
                    array_push($errors,"Veuillez choisir un autre nom, car celui-ci deja dans la base de donnée");
                }
            }
            else{
                array_push($errors,"Veuillez entrer un nombre entier");
            }
        }
        else{
            array_push($errors,"Veuillez remplir correctement le formulaire");
        }
    }

    include 'views/ajouter-thematiques.views.php';

?>