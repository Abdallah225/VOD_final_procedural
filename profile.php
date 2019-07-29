<?php 
session_start();
// connexion a la base de donnée
include('php/connect_db.php');
if (isset($_SESSION['id']))
{
    $requser = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $userinfo = $requser->fetch();
    $image = $userinfo['photo_profil'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
   include('partials/_head.php');
   include('partials/_navbar.php');
?>
<title>Profile</title>
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
<br><br><br><br>
<div class="container mt-5">
<h3 class="card-title text-center " style="color:#fff;">Mon profile</h3>
<?php
if(isset($error)){
    echo '<font color="red">'.$error."</font>";    
}
?>
    <div class="row">
      <div class=" mx-auto">
        <div class="card card-signin flex-row">
          <div class="card-img-left d-xs-flex mt-4">
             <img class="md-avatar rounded-circle" src="asset/images/avatar/<?php echo $image?>" width="100" height="100" alt="" srcset="">
          </div>
          <div class="card-body">
            <div class="row">
                <div class=" col-12 col-md-6">
                <P><span id="infos-table">Nom : <?php echo $userinfo['nom']  ?></span></P>  
                </div>
                <div class="col-12 col-md-6">
                <p><span id="infos-table">Prénom : <?php echo $userinfo['prenom']  ?></span></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6">
               <p><span id="infos-table">Date de naissance : <?php echo $userinfo['date_naissance']  ?></span></p>
                </div>
                <div class="col-12 col-md-6">
              <p><span id="infos-table">Ville : <?php echo $userinfo['ville'] ?></span></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 col-md-7">
               <p><span id="infos-table">Adresse E-mail : <?php echo $userinfo['email']  ?></span></p> 
                </div>
                <div class="col-12 col-md-5"> 
               <p><span id="infos-table">Numéro : +225 <?php echo $userinfo['telephone']  ?></span></p> 
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6">
                <p><span id="infos-table">Abonnement : <span style="color:#2ECC71">Oui</span>  (Freemium)</span></p> 
                </div>
                <div class="col-12 col-md-6">
                <a style="color:#fff;" href="abonnement"><input type="button" id="subscription"  class="form-control" id="inputPassword4"  value="Souscrire à un abonnement"></a>
                </div>
            </div>
            <hr>
            <a style="color:#FFF" href="edit_profile"><button type="button" class="btn btn-lg  btn-block text-uppercase" id="edit-user-info">Modifier mes informations</button></a>
          </div>
        </div>
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