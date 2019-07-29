<?php 
     include '../php/connect_db.php';

    // recuperation des emisssions
    $chaines = mysqli_query($db,"SELECT * FROM chaines");

    // tableau d'erreur
    $errors = array();
    $success = false;

    $lien = '';
    $status = '';
    $chaine = '';
    $image = '';
    $id = '';

    if(isset($_POST['update'])) {
        // print('deded');
        $id = $_POST['id'];
        $status = 0;
        $lien = addslashes($_POST['lien']);
        $chaine = addslashes($_POST['chaine']);
        

        
        
        // verifier si l'emission est publier
        if(isset($_POST['status'])){
            $status = addslashes($_POST['status']);
        }else {
            $status = 0;
        }

        
          
      // validation du lien 
        if(empty($lien)){
            array_push($errors,"Le lien du direct est obligatoire");
        }

        // validation de la chaine 
        if(empty($chaine)){
            array_push($errors,"La chaine  qui diffuse  le direct est obligatoire");
        }

        

        if (count($errors) == 0) {
            
            // die($_POST['status']);
               
            $query = "UPDATE direct SET lien='$lien',status='$status',idchaine='$chaine',datepost='$datepost' WHERE id='$id'";
                $updateUser = mysqli_query($db,$query);

                // die($updateUser);

                if($updateUser){
                    $success  = true;
                    echo '<script language="Javascript">';
                    echo 'document.location.replace("./direct.php")'; 
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
        $nom = addslashes($_GET['nom']);
        $emissionCheck = mysqli_query($db,"SELECT * FROM direct WHERE id='$id'");

        // die(var_dump(mysqli_num_rows($emissionCheck)));

        if(mysqli_num_rows($emissionCheck) != 0) {
            while($rows = mysqli_fetch_assoc($emissionCheck)){
                $lien = $rows['lien'];
                $status = $rows['status'];
                $chaine = $rows['idchaine'];
                $id = $rows['id'];
            }

           
        }
    }


    if(isset($_POST['supprimer'])){
        $id = $_POST['id'];
        $deletequery = "DELETE FROM direct WHERE id='$id'";
        $users = mysqli_query($db,$deletequery);
        echo '<script language="Javascript">';
        echo 'document.location.replace("./lecteurs.php")';
        echo ' </script>';
        
    }

    include 'views/edition-lecteurs.views.php';

?>