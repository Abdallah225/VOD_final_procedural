<?php
ob_start (); 
session_start (); 
// connexion a la base de donnée
include('php/connect_db.php');
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
            header('location: page.php?id'.$_SESSION['id']);
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
ob_end_flush (); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php 

include('partials/_head.php');

?>
<title>Login</title>
</head>
<body>
<style>
.card-signin {
    background-color: #595959;
  border: 0;
  border-radius: 2rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
  overflow: hidden;
}
</style>
<div class="container-fluid">
    <a id="return" href="./"><i style="color:#fff;" class="fas fa-arrow-left mt-5 ml-5"></i></a>
</div>
<div class="container">
<h3 class="card-title text-center" style="color:#fff;">Connectez vous</h3>
<?php
if(isset($erreur)){
    echo '<font color="red">'.$erreur."</font>";    
}
?>
<div class="row">
    <div class="mx-auto">
    <div class="card card-signin flex-row my-1">
        <div class="card-body">
            <p class=" text-center">
            Veuille entrez votre numéro de téléphone <br>
            et votre mot de passe pour vous connectez <br>
            </p>
            <hr>
            <form class="form-signin" action="" method="post">
            <div class="row">
                <div class="form-group col-4 col-sm-4 col-md-4">
                    <label for="inputEmail4">Indicatif</label>
                    <input type="text" style="text-align:center" disabled class="form-control" id="inputEmail4" placeholder="+225">
                </div>
                <div class="form-label-group col-8 col-sm-8 col-md-8 col-lg-8">
                <label for="inputUserame">Numéro de téléphone</label>
                <input type="text"  name="telephone" id="inputUserame" class="form-control" placeholder="">
                </div>
            </div>
            
              <hr>
              <div class="form-label-group">
              <label for="inputPassword">Veuillez entrer le Mot de passe</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="" >
              </div>
              <hr>
              <button class="btn btn-lg  btn-block text-uppercase" name="submit" type="submit">Se connecter</button>
              <hr>
              <a style="color:#fff;" class="d-block text-center mt-2 small" href="register">Créer un compte</a>
              <p class="d-block text-center mt-2 small">Un soucis avec votre mot de passe ? <a style="color:#fff;" href="#"><span> Cliquez ici </span></a></p>
            </form>
        </div>
    </div>
    </div>
</div>
</div>
</body>
</html>