<?php
// connexion a la base de donnée
include('php/connect_db.php');
if(isset($_POST['submit'])){
    // declaration des variable
    $nom = htmlspecialchars($_POST['nom']);
    $prenom =  htmlspecialchars($_POST['prenom']);
    $telephone= htmlspecialchars($_POST['telephone']);
    $email =  htmlspecialchars($_POST['email']);
    $password = sha1($_POST['password']);
    $password1 = sha1($_POST['password1']);
    // verification sur tous les champs sont rempli
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['telephone']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password1']))
    {
        // verification des caracteres du nom: bloquer si le nom est supperieur a 225 caractere
        $nomlength = strlen($nom);
        if($nomlength <= 225){
            // verification des caracteres du prenom: bloquer si le prenom est supperieur a 225 caractere
            $prenomlength = strlen($prenom);
            if($prenomlength <= 225){
                // filtrer le mail
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    // verification si le numero de telephone existe dans la base de donnée
                    $reqmail = $conn->prepare("SELECT * FROM users WHERE telephone = ?");
                    $reqmail ->execute(array($telephone));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0){
                        // verifier sur les mots de passe sont idem
                        if($password == $password1){
                            $insertmbr = $conn->prepare("INSERT INTO users(nom, prenom, telephone, email, password) VALUES(?, ?, ?, ?, ?)");  
                            $insertmbr ->execute(array($nom, $prenom, $telephone, $email, $password));
                           
                            $erreur = "Votre compte a été bien créer";
                            header('location: login');
                        }
                        else
                        {
                            $erreur = "Vos mot de passe ne correspondent pas"; 
                        }
                    }
                    else
                    {
                        $erreur = "Ce numéro de téléphone existe veillez choisir un autre !";
                    }
                }
                else
                {
                    $erreur = "Votre adresse mail n'est pas valide!";
                }
            }
            else
            {
                $erreur = "Votre prenom ne dois pas depasser 255 caracteres";
            }
        }
        else
        {
            $erreur = "Votre nom ne dois pas depasser 255 caracteres";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent remplir !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include('partials/_head.php');
?>
<title>register</title>
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
    <a id="return" href="./"><i style="color:#fff;" class="fas fa-arrow-left mt-3 ml-3"></i></a>
</div>
<div class="container">
<h3 class="card-title text-center" style="color:#fff;">Veuillez-vous inscrire</h3>
<?php
if(isset($erreur)){
    echo '<font color="red">'.$erreur."</font>";    
}
?>
<div class="row">
    <div class="mx-auto">
    <div class="card card-signin flex-row">
        <div class="card-body">
        <h4 class=" text-center">Informations personelles</h4>
            <hr>
            <form class="form-signin" action="" method="post">
            <div class="row">
                <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="inputEmail4">Nom</label>
                    <input type="text" name="nom"  class="form-control"  value="<?php if(isset($nom)){echo $nom;} ?>">
                </div>
                <div class="form-label-group col-12 col-sm-6 col-md-6 col-lg-6">
                  <label for="inputUserame">Prénom</label>
                  <input type="text"  name="prenom"  class="form-control" value="<?php if(isset($prenom)){echo $prenom;} ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4 col-sm-4 col-md-4">
                  <label for="inputEmail4">Indicatif</label>
                  <input type="text" style="text-align:center" disabled class="form-control"  placeholder="+225">
                </div>
                <div class="form-label-group col-8 col-sm-8 col-md-8 col-lg-8">
                  <label for="inputUserame">Numéro de téléphone</label>
                  <input type="text"  name="telephone"  class="form-control" value="<?php if(isset($telephone)){echo $telephone;} ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-label-group col-8 col-sm-8 col-md-8 col-lg-8">
                  <label for="inputUserame">Adresse E-mail</label>
                  <input type="text" name="email"   class="form-control" value="<?php if(isset($email)){echo $email;} ?>">
                </div>
            </div>
            <div class="row">
              <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                  <label for="inputEmail4">Mot de passe</label>
                  <input type="password" name="password"  class="form-control" >
              </div>
              <div class="form-label-group col-12 col-sm-6 col-md-6 col-lg-6">
                  <label for="inputUserame">Confirmez mot de passe</label>
                  <input type="password" name="password1"  class="form-control">
                </div>
            </div>
            <br>
              <button class="btn btn-lg  btn-block text-uppercase" name="submit" type="submit">S'enregistrer</button>
              <p class="d-block text-center mt-2 small">Avez-vous deja un compte ? <a  style="color:#fff;" href="login"><span> Cliquez ici </span></a></p>
            </form>
        </div>
    </div>
    </div>
</div>
</div>
</body>
</html>