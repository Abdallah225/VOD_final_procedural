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
        $thematique = htmlspecialchars($_POST['thematique']);
        $episode = htmlspecialchars($_POST['episode']);
        $saison = htmlspecialchars($_POST['saison']);
        $mot_cle = htmlspecialchars($_POST['mot_cle']);
        $url = htmlspecialchars($_POST['url']);
        $url_demo = htmlspecialchars($_POST['url_demo']);
        $auteur = htmlspecialchars($_POST['auteur']);
        $duree = htmlspecialchars($_POST['duree']);
        $type = htmlspecialchars($_POST['type']);
        $date = date('Y-m-d H:i:s');

        // verifier si l'episode' est publier
        if(isset($_POST['status'])){
            $status = addslashes($_POST['status']);
        }else {
            $status = 0;
        }
        // validation du nom
        if(empty($nom)){
            array_push($errors,"Le nom de l'épisode est obligatoire");
        }
         // validation du nom
         if(empty($auteur)){
            array_push($errors,"Le nom de l'épisode est obligatoire");
        }
         // validation du nom
         if(empty($duree)){
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
            $reqname = $conn->prepare("SELECT * FROM video WHERE titre = ?");
            $reqname ->execute(array($nom));
            $nameexist = $reqname->rowCount();
            if($nameexist == 0){
                $insertmbr = $conn->prepare("INSERT INTO video( titre, description, auteur, duree, url_demo, url, type, id_saison, date, id_episode, status, id_thematique, mot_cle) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");  
                $insertmbr ->execute(array($nom, $description, $auteur, $duree, $url_demo, $url, $type, $saison,$date, $episode, $status, $thematique, $mot_cle));
                echo "<center>";
                echo "<font color = 'green'>";
                array_push($errors,"information uploder avec succès");
                echo "</font>";
                echo "</center>";
            }else {
                array_push($errors,"Veuillez choisir un autre nom, car celui-ci deja dans la base de donnée");
            }


        } else {
            array_push($errors,"Veuillez remplir correctement le formulaire");
        }






    }
    include 'views/ajouter-videos.views.php';

?>
