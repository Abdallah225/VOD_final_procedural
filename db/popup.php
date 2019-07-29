<?php
// connexion a la base de donnée
session_start();
try
{
$conn = new PDO("mysql:host=localhost;dbname=viens-dindin","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
die('ERROR:'.$e->getMessage());
}
if(isset($_POST['submit'])){
    // declaration des variable
    $telephone= htmlspecialchars($_POST['telephone']);
    $password = sha1($_POST['password']);
    // verification sur tous les champs sont rempli
    if(!empty($_POST['telephone']) AND !empty($_POST['password']))
    {
        $requiser = $conn->prepare("SELECT * FROM users  WHERE telephone = ? AND password = ?");
        $requiser->execute(array($telephone, $password));
        $userexiste = $requiser->rowCount();
        if($userexiste == 1)
        {
            $userinfo = $requiser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['ville'] = $userinfo['ville'];
            $_SESSION['telephone'] = $userinfo['telephone'];
            $_SESSION['date_naissance'] = $userinfo['date_naissance'];
            $_SESSION['email'] = $userinfo['email'];
            header('location: free.php');
        }
        else
        {
            $erreur = "Mauvais numero ou mot de passe !";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent remplir !";
    }
    
}
?>