<?php
    // connexion database
    include '../php/connect_db.php';

     // tableau d'erreur
     $errors = array();
     $success = false;
     if(isset($_POST['enregistrer'])) {
        // print('deded');
        $nom = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $url = htmlspecialchars($_POST['url']);
        $mot_cle = htmlspecialchars($_POST['mot_cle']);
        $image = '';
        $date_post = date('Y-m-d H:i:s');

 

        // verification sur la status est publié ou pas
        if(isset($_POST['status'])){
            $status = htmlspecialchars($_POST['status']);
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
        // validation de l'url'
        if(empty($url)){
            array_push($errors,"L'url de la saison est obligatoire");
        }
        // validation de la saison
        if(empty($description)){
            array_push($errors,"La  description de l'episode' est obligatoire");
        }
         // validation du mot cle
         if(empty($mot_cle)){
            array_push($errors,"Le mot cle est obligatoire");
        }
        if (count($errors) == 0) {
            // verifier si la chaine existe deja
            $reqname = $conn->prepare("SELECT * FROM saison WHERE libelle = ?");
            $reqname ->execute(array($nom));
            $nameexist = $reqname->rowCount();
            if($nameexist == 0){
                $insertmbr = $conn->prepare("INSERT INTO saison( libelle,description, image, status, date_post, mot_cle, url) VALUES(?, ?, ?, ?, ?, ?, ?)");  
                $insertmbr ->execute(array($nom, $description, $image, $status,$date_post, $mot_cle, $url));
            }else {
                array_push($errors,"Veuillez choisir un autre nom, car celui-ci deja dans la base de donnée");
            }


        } else {
            array_push($errors,"Veuillez remplir correctement le formulaire");
        }






    }
    include 'views/ajouter-saisons.views.php';

?>
