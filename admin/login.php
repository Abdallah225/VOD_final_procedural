<?php
    include '../php/connect_db.php';

    //  tableau d'erreur
    $errors = array();
    if (isset($_POST['login'])) {
       $username = addslashes($_POST['username']);
       $password = addslashes($_POST['password']);

       if(empty($username)){
           array_push($errors,'le username est obligatoire');
       }

       if (empty($password)) {
         array_push($error,'le mot de passe est obligatoire');
       }

    } else {
        # code...
    }

    include 'views/login.views.php';
