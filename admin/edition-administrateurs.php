<?php
    include '../php/connect_db.php';

    // recuperation des episode
    $requete = $conn->query("SELECT * FROM episode");

 

    // recuperation des saison
    $requete = $conn->query("SELECT * FROM saison");
    // tableau d'erreur
    $errors = array();
    $success = false;

    $nom = '';
    $status = '';
    $description = '';
    $thematique = '';
    $chaine = '';
    $idchaine = '';
    $idthematique = '';
    $image = '';
    $id = '';
    $status = 0;

    if(isset($_POST['update'])) {
        // print('deded');
        $id = $_POST['r_i'];
        $nom = addslashes($_POST['r_nom']);
        $image = addslashes($_POST['fileToUpload']);
        $thematique = addslashes($_POST['thematique']);
        $chaine = addslashes($_POST['chaine']);
        $description = addslashes($_POST['r_desc']);


        // die($_POST['status']);
        // verifier si l'emission est publier
        if(isset($_POST['r_status'])){
            $status = addslashes($_POST['r_status']);
        }else {
            $status = 0;
        }




        // validation du nom
        if(empty($nom)){
            array_push($errors,"Le nom de l'emission est obligatoire");
        }

        // validation du thematique
        if(empty($thematique)){
            array_push($errors,"Le nom de la thematique est obligatoire");
        }

        // validation de la chaine
        if(empty($description)){
            array_push($errors,"La chaine  qui diffuse  l'emission est obligatoire");
        }

        // validation du description
        if(empty($description)){
            array_push($errors,"La description de l'emission est obligatoire");
        }


        if (count($errors) == 0) {
            $image_path = $_FILES["fileToUpload"]["tmp_name"];
            if($image_path !=""){
                $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
                $image = base64_encode($img_binary);
                $query = "UPDATE t_emission SET r_nom='$nom',r_image='$image',r_desc='$description',r_ichaine='$chaine',r_ithematique='$thematique',r_status='$status',r_date='$datepost' WHERE r_i='$id'";
            } else {
              $query = "UPDATE t_emission SET r_nom='$nom',r_desc='$description',r_date='$datepost',r_ichaine='$chaine',r_ithematique='$thematique',r_status='$status',r_date='$datepost' WHERE r_i='$id'";
            }



                $updateUser = mysqli_query($db,$query);
                if($updateUser){
                    $success  = true;
                    echo '<script language="Javascript">';
                    echo 'document.location.replace("./episodes.php")';
                    echo ' </script>';
                } else{
                    die(mysqli_error($db));
                }






        } else {
            array_push($errors,"Veuillez remplir correctement le formulaire");
        }

    }

    if(isset($_GET['id'])){
        $id = addslashes($_GET['id']);
        $emissionCheck = mysqli_query($db,"SELECT * FROM t_emission WHERE r_i='$id'");

        // die(var_dump(mysqli_num_rows($emissionCheck)));

        if(mysqli_num_rows($emissionCheck) != 0) {

            while($rows = mysqli_fetch_assoc($emissionCheck)){
              $id = $rows['r_i'];
                $nom = $rows['r_nom'];
                $image = $rows['r_image'];
                $description = $rows['r_desc'];
                $idchaine = $rows['r_ichaine'];
                $idthematique = $rows['r_ithematique'];
                $status = $rows['r_status'];



            }


        }
    }


    if(isset($_POST['supprimer'])){
        $id = $_POST['id'];
        $deletequery = "DELETE FROM t_emission WHERE id='$id'";
        $users = mysqli_query($db,$deletequery);
        echo '<script language="Javascript">';
        echo 'document.location.replace("./administrations.php")';
        echo ' </script>';

    }

    include 'views/edition-administrations.views.php';

?>
