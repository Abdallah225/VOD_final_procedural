<?php
session_start();
include 'connect_db.php';
if(isset($_POST['suivant'])){
    $telephone = htmlspecialchars($_POST['telephone']);
    if(!empty($mail) AND !empty($password)){
        $query = mysqli_query($conn, "SELECT * FROM users WHERE telephone='$telephone'");
        $rows = mysqli_num_rows($query);
        if($rows == 0){
            $array = $query->fetch_assoc();
            $_SESSION['id']= $userinfo['id'];
            $_SESSION['telephone']=$userinfo['telephone'];
            header("location: profile.php");
        }
        else
        {
            $erreur = "Mauvause indentifiant";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent etres complétés!";
    }
}
?>