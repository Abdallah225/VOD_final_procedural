<?php
    include '../php/connect_db.php';

    // recuperation des emisssions
    $emissions = mysqli_query($db,"SELECT * FROM t_emission");
      $thematique = mysqli_query($db,"SELECT * FROM t_thematique");

    // tableau d'erreur
    $errors = array();
    $success = false;

    $nom = '';
    $description = '';
    $url='';
    $type='';
    $emission = '';
    $thematique='';
    $mots_cle = '';
    $id = '';

    if(isset($_POST['update'])) {
        // print('deded');
        $id = $_POST['r_i'];
        $status = 0;
        $nom = addslashes($_POST['r_titre']);
        $description = addslashes($_POST['r_description']);
        $url = addslashes($_POST['r_url']);
        $emission = addslashes($_POST['r_iemission']);

        $mots_cle = addslashes($_POST['r_mots_cle']);




        // verifier si la chaine est publier
        if(isset($_POST['r_status'])){
            $status = addslashes($_POST['r_status']);
        }else {
            $status = 0;
        }

         



        // validation du nom
        if(empty($nom)){
            array_push($errors,"Le nom de la chaine est obligatoire");
        }


        // validation du description
        if(empty($url)){
            array_push($errors,"L' url  de la video est obligatoire");
        }


        if (count($errors) == 0) {
            $query = "UPDATE t_video SET r_titre='$nom',r_description='$description',r_url='$url',r_iemission='$emission',r_mots_cle='$mots_cle' WHERE r_i='$id'";

            $updateUser = mysqli_query($db,$query);

            if($updateUser){
                $success  = true;
                echo '<script language="Javascript">';
                echo 'document.location.replace("./videos.php")';
                echo ' </script>';
            } else{

            }

        } else {
            array_push($errors,"Veuillez remplir correctement le formulaire");
        }






    }

    if(isset($_GET['id'])){
        $id = addslashes($_GET['id']);

        $videoCheck = mysqli_query($db,"SELECT * FROM t_video WHERE r_i='$id'");

        // die(var_dump(mysqli_num_rows($chaineCheck)));

        if(mysqli_num_rows($videoCheck) != 0) {
            while($rows = mysqli_fetch_assoc($videoCheck)){
                $nom = $rows['r_titre'];
                $description = $rows['r_description'];
                $status = $rows['r_status'];
                $url = $rows['r_url'];
                $id = $rows['r_i'];
                $idemission = $rows['r_iemission'];

            }


        }
    }


    if(isset($_POST['supprimer'])){
        $id = $_POST['r_i'];
        $deletequery = "DELETE FROM t_video WHERE r_i='$id'";

        $users = mysqli_query($db,$deletequery);
        echo '<script language="Javascript">';
        echo 'document.location.replace("./videos.php")';
        echo ' </script>';
      }



    include 'views/edition-videos.views.php';

?>
