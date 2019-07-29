<?php
    include '../php/connect_db.php';

$chaines = mysqli_query($db,"SELECT * FROM t_chaine");

    // tableau d'erreur
    $errors = array();
    $success = false;

    $nom = '';
    $image = '';
    $url = '';
    $description = '';
    $status = '';
    $id = '';

    if(isset($_POST['update'])) {
        // print('deded');
        $id = $_POST['r_i'];
        $status = 0;
        $nom = addslashes($_POST['r_libelle']);
        $image =$_FILES['r_image'];
        $ur = addslashes($_POST['r_uri']);
        $description = addslashes($_POST['r_description']);



        // verifier si la chaine est publier
        if(isset($_POST['status'])){
            $status = addslashes($_POST['status']);
        }else {
            $status = 0;
        }




        // validation du nom
        if(empty($nom)){
            array_push($errors,"Le nom de la chaine est obligatoire");
        }


        // validation du description
        if(empty($description)){
            array_push($errors,"La description de la chaine est obligatoire");
        }


        if (count($errors) == 0) {
            $image_path = $_FILES["r_image"]["tmp_name"];
            if($image_path !=""){
                $img_binary = fread(fopen($image_path, "r"), filesize($image_path));
                $image = base64_encode($img_binary);
                $query = "UPDATE t_chaine SET r_libelle='$nom',r_status='$status',r_description='$description',r_image='$image',r_uri='$url' WHERE r_i='$id'";
            } else {
                $query = "UPDATE t_chaine SET r_libelle='$nom',r_status='$status',r_description='$description',r_uri='$url' WHERE r_i='$id'";
            }



                $updateUser = mysqli_query($db,$query);

                if($updateUser){
                    $success  = true;
                    echo '<script language="Javascript">';
                    echo 'document.location.replace("./chaines.php")';
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

        $chaineCheck = mysqli_query($db,"SELECT * FROM t_chaine WHERE r_i='$id'");

        // die(var_dump(mysqli_num_rows($chaineCheck)));

        if(mysqli_num_rows($chaineCheck) != 0) {
            while($rows = mysqli_fetch_assoc($chaineCheck)){
              $id = $rows['r_i'];
                $nom = $rows['r_libelle'];

                $image = $rows['r_image'];
                $url = $rows['r_uri'];
                $description = $rows['r_description'];
                $status = $rows['r_status'];

            }


        }
    }


    if(isset($_POST['supprimer'])){
        $id = $_POST['r_i'];
        $deletequery = "DELETE FROM t_chaine WHERE r_i='$id'";
        $users = mysqli_query($db,$deletequery);
        echo '<script language="Javascript">';
        echo 'document.location.replace("./saisons.php")';
        echo ' </script>';

    }

    include 'views/edition-saisons.views.php';

?>
