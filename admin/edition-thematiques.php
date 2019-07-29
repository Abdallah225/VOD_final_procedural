<?php
    include '../php/connect_db.php';

    // recuperation des thematique
    $thematiques = mysqli_query($db,"SELECT * FROM t_thematique");


    // tableau d'erreur
    $errors = array();
    $success = false;
    $nom = '';
    $status = '';
    $description = '';
    $image = '';
    $id = '';

    if(isset($_POST['update'])) {
        // print('deded');
        $id = $_POST['r_i'];
        $status = 0;
        $nom = addslashes($_POST['r_libelle']);

        $description = addslashes($_POST['r_description']);



        // verifier si la thematique est publier
        if(isset($_POST['r_status'])){
            $status = addslashes($_POST['r_status']);
        }else {
            $status = 0;
        }




        // validation du nom
        if(empty($nom)){
            array_push($errors,"Le nom de la thematique est obligatoire");
        }


        // validation du description
        if(empty($description)){
            array_push($errors,"La description de la thematique est obligatoire");
        }


        if (count($errors) == 0) {

            if($image_path !=""){
                $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
                $image = base64_encode($img_binary);
                $query = "UPDATE t_thematique SET r_libelle='$nom',r_status='$status',r_description='$description' WHERE r_i='$id'";
            } else {
                $query = "UPDATE t_thematique SET r_libelle='$nom',r_status='$status',r_description='$description' WHERE r_i='$id'";
            }



                $updateUser = mysqli_query($db,$query);
                if($updateUser){
                    $success  = true;
                    echo '<script language="Javascript">';
                    echo 'document.location.replace("./thematiques.php")';
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
        $thematiqueCheck = mysqli_query($db,"SELECT * FROM t_thematique WHERE r_i='$id'");

        // die(var_dump(mysqli_num_rows($thematiqueCheck)));

        if(mysqli_num_rows($thematiqueCheck) != 0) {
            while($rows = mysqli_fetch_assoc($thematiqueCheck)){
                $nom = $rows['r_libelle'];
                $status = $rows['r_status'];
                $description = $rows['r_description'];

            }


        }
    }


    if(isset($_POST['supprimer'])){
        $id = $_POST['id'];
        $deletequery = "DELETE FROM t_thematique WHERE id='$id'";
        $users = mysqli_query($db,$deletequery);
        echo '<script language="Javascript">';
        echo 'document.location.replace("./thematiques.php")';
        echo ' </script>';

    }

    include 'views/edition-thematiques.views.php';

?>
