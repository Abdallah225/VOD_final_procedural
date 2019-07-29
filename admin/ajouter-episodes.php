<?php
    // connexion database
    include '../php/connect_db.php';

        // recuperation des thematiques
        $requete = $conn->query("SELECT * FROM thematique");

    // recuperation des thematiques
    $requete = $conn->query("SELECT * FROM thematique");
    


     // tableau d'erreur
     $errors = array();
     $success = false;
     if(isset($_POST['enregistrer'])) {
        // print('deded');
        $nom = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $thematique = htmlspecialchars($_POST['thematique']);
        $saison = htmlspecialchars($_POST['saison']);
        $mot_cle = htmlspecialchars($_POST['mot_cle']);
        $date = date('Y-m-d H:i:s');
        $image = '';

 

        // verifier si l'episode' est publier
        if(isset($_POST['status'])){
            $status = addslashes($_POST['status']);
        }else {
            $status = 0;
        }
 
        // validation du cover
        if(!isset($_FILES['fileToUpload'])){
            array_push($errors,"L'image de couverture de l'episode' est obligatoire");
        }else {
            $image_path = $_FILES["fileToUpload"]["tmp_name"];
            if($image_path !=""){
                $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
                $image = base64_encode($img_binary);
            }
        }
        // validation du nom
        if(empty($nom)){
            array_push($errors,"Le nom de l'épisode est obligatoire");
        }
        // validation de la saison
        if(empty($saison)){
            array_push($errors,"Veuillez choisir une saison est obligatoire");
        }
        // validation de la thematique
        if(empty($thematique)){
            array_push($errors,"Veuillez choisir une thematique est obligatoire");
        }
        // validation du mot cle
        if(empty($mot_cle)){
            array_push($errors,"Le mot cle est obligatoire");
        }
        // validation de l'episode
        if(empty($description)){
            array_push($errors,"La  description de l'episode' est obligatoire");
        }
        if (count($errors) == 0) {
            // verifier si l'episode existe deja
            $reqname = $conn->prepare("SELECT * FROM episode WHERE libelle = ?");
            $reqname ->execute(array($nom));
            $nameexist = $reqname->rowCount();
            if($nameexist == 0){
                $insertmbr = $conn->prepare("INSERT INTO episode( libelle, image, description, id_saison, id_thematique, status, mots_cle, date) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");  
                $insertmbr ->execute(array($nom, $image, $description,$saison,$thematique, $status, $mot_cle, $date));
            }else {
                array_push($errors,"Veuillez choisir un autre nom, car celui-ci deja dans la base de donnée");
            }


        } else {
            array_push($errors,"Veuillez remplir correctement le formulaire");
        }






    }
    include 'views/ajouter-episode.views.php';

?>
