<?php 
session_start();
// connexion a la base de donnée
include('php/connect_db.php');
if (isset($_SESSION['id']))
{
    $requser = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $userinfo = $requser->fetch();
  if(isset($_POST['submit'])){
    //   declaration des variables
    $NewNom = htmlspecialchars($_POST['NewNom']);
    $NewPrenom = htmlspecialchars($_POST['NewPrenom']);
    $Newtelephone = htmlspecialchars($_POST['Newtelephone']);
    $Nville = htmlspecialchars($_POST['Nville']);
    $e_mail = htmlspecialchars($_POST['e_mail']);
    $date = htmlspecialchars($_POST['date']);

    // mise jour du photo de profile
   if(isset($_FILES['photo_profil']) AND !empty($_FILES['photo_profil']['name']))
   {
     $tailleMax = 2097152;
     $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
     if($_FILES['photo_profil']['size'] <= $tailleMax)
     {
        $extensionUpload = strtolower(substr(strrchr($_FILES['photo_profil']['name'], '.'), 1));
        if(in_array($extensionUpload, $extensionsValides))
        {
          $chemin = "asset/images/avatar/".$_SESSION['id'].".".$extensionUpload;
          $resultat = move_uploaded_file($_FILES['photo_profil']['tmp_name'], $chemin);
          if($resultat)
          {
            $insertname = $conn->prepare("UPDATE users SET photo_profil = :photo_profil WHERE id = :id");
            $insertname -> execute(array(
              'photo_profil' => $_SESSION['id'].".".$extensionUpload,
              'id' => $_SESSION['id']
            ));
            header('location: profile?id'.$_SESSION['id']);
          }
          else
          {
            $error = "Erreur durant l'importation de votre photo de profil !";
          }
        }
        else
        {
          $error = "Votre photo de profil ne dois etre au forma jpg, jpeg, gif ou pgn !";
        }
      }
     else
     {
      $error = "Votre photo de profil ne dois pas depasser 2Mo !";
     }
   }

    // mise a jour du nom 
        if(isset($_POST['NewNom']) AND !empty($_POST['NewNom']) AND $_POST['NewNom']!= $_SESSION['nom']);
        {
            $insertname = $conn->prepare("UPDATE users SET nom = ? WHERE id = ?");
            $insertname -> execute(array($NewNom, $_SESSION['id']));
            header('location: profile?id'.$_SESSION['id']);
            
        }
    // mise a jour du prenom
        if(isset($_POST['NewPrenom']) AND !empty($_POST['NewPrenom']) AND $_POST['NewPrenom']!= $_SESSION['prenom']);
        {
            $insertname = $conn->prepare("UPDATE users SET prenom = ? WHERE id = ?");
            $insertname -> execute(array($NewPrenom, $_SESSION['id']));
            header('location: profile?id'.$_SESSION['id']);
            
        }
    // mise a jour du numero de telephone
        if(isset($_POST['Newtelephone']) AND !empty($_POST['Newtelephone']) AND $_POST['Newtelephone']!= $_SESSION['telephone']);
        {   
            $insertname = $conn->prepare("UPDATE users SET telephone = ? WHERE id = ?");
            $insertname -> execute(array($Newtelephone, $_SESSION['id']));
            header('location: profile?id'.$_SESSION['id']);
            
        }
    // mise a jour de la localité
        if(isset($_POST['Nville']) AND !empty($_POST['Nville']) AND $_POST['Nville']!= $_SESSION['ville']);
        {
            $insertname = $conn->prepare("UPDATE users SET ville = ? WHERE id = ?");
            $insertname -> execute(array($Nville, $_SESSION['id']));
            header('location: profile?id'.$_SESSION['id']);
            
        }
    // mise a jour de la date de naissance
        if(isset($_POST['date']) AND !empty($_POST['date']) AND $_POST['date']!= $_SESSION['date_naissance']);
        {
            $insertname = $conn->prepare("UPDATE users SET date_naissance = ? WHERE id = ?");
            $insertname -> execute(array($date, $_SESSION['id']));
            header('location: profile?id'.$_SESSION['id']);
            
        }
    // mise a jour du mail
        if(isset($_POST['e_mail']) AND !empty($_POST['e_mail']) AND $_POST['e_mail']!= $_SESSION['email']);
        {
            if(filter_var($e_mail, FILTER_VALIDATE_EMAIL)){
                $insertname = $conn->prepare("UPDATE users SET email = ? WHERE id = ?");
                $insertname -> execute(array($e_mail, $_SESSION['id']));
                 header('location: profile?id'.$_SESSION['id']);
                
            }
            else
                {
                   $error = "Votre adresse mail n'est pas valide!";
                }  
        }
  }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
   include('partials/_head.php');
   include('partials/_navbar.php');
?>
<title>Motification</title>
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
.card-signin .card-img-left {
  width: 32%;
  /* Link to your background image using in the property below! */
  background-size: cover;
  
}
</style>
<br><br><br><br>
<div class="container mt-5">
<h3 class="card-title text-center " style="color:#fff;">Modifiez mes informations</h3>
<?php
if(isset($error)){
    echo "<div class='alert alert-danger'>".$error."</div>";    
}
?>
    <div class="row">
      <div class="mx-auto">
        <form action="" method="post" enctype="multipart/form-data" >
        <div class="card card-signin flex-row">
          <div class="card-img-left  d-xs-flex mt-4">
            <img class="md-avatar rounded-circle" src="asset/images/avatar/<?php echo $userinfo['photo_profil'] ?>" width="100" height="100" alt="" srcset="">
             <input class="mt-3" type="file" name="photo_profil" id="">
          </div>
          <div class="card-body form-signin">
            <div class="row">
                <div class="form-group col-6">
                    <label for="inputEmail4">Nom</label>
                    <input type="text" name="NewNom"  class="form-control"  value="<?php echo $userinfo['nom'] ?>">
                </div>
                <div class="form-label-group col-6">
                  <label for="inputUserame">Prénom</label>
                  <input type="text"  name="NewPrenom"  class="form-control" value="<?php echo $userinfo['prenom']  ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                  <label for="inputEmail4">Indicatif</label>
                  <input type="text" style="text-align:center" disabled class="form-control"  placeholder="+225">
                </div>
                <div class="form-label-group col-8">
                  <label for="inputUserame">Numéro de téléphone</label>
                  <input type="text"  name="Newtelephone"  class="form-control"value="<?php echo $userinfo['telephone']  ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-label-group col-5">
                  <label for="inputUserame">ville</label>
                  <input type="text" name="Nville"   class="form-control" value="<?php echo $userinfo['ville'] ?>">
                </div>
                <div class="form-label-group col-7">
                  <label for="inputUserame">Date de naissance</label>
                  <input type="date"  name="date"  class="form-control" value="<?php echo $userinfo['date_naissance'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-label-group col-12 col-md-6">
                    <label for="inputPassword4">Abonnement</label>
                    <a style="color:#fff;" href="abonnement"><input type="button" id="subscription"  class="form-control" id="inputPassword4"  value="Souscrire à un abonnement"></a>
                </div>
                <div class="form-label-group col-12 col-md-6">
                  <label for="inputUserame">Adresse E-mail</label>
                  <input type="text" name="e_mail"   class="form-control" value="<?php echo $userinfo['email']  ?>">
                </div>
            </div>
            <br>
              <button class="btn btn-lg  btn-block text-uppercase" name="submit" type="submit">Mettre a jour</button>
              <p class="d-block text-center mt-1 small">Pour changer de mot de passe <a style="color:#fff;" href="#"><span> Cliquez ici </span></a></p>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php 
    
?>
</body>
</html>
<?php 
} else {
    header("location: ./");
}
?>