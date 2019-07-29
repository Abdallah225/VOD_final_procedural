<?php 
session_start();
// connexion a la base de donnée
include('php/connect_db.php');
if (isset($_SESSION['id']))
{
    $requser = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
   include('partials/_head.php');
   include('partials/_navbar.php');
?>
<title>register</title>
</head>
<body>
<style>
body{
    background-color: #272727;
    font-family: 'Nunito', sans-serif;
    margin: 0;
    padding: 0;
}
.card-signin {
    background-color: #272727;
  border: 0;
  border-radius: 2rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
  overflow: hidden;
}
.card-signin .card-img-left {
  width: 28%;
  /* Link to your background image using in the property below! */
  background-size: cover;
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
}
</style>
<br><br><br><br>
<div class="container-fluid mt-5">
<a id="return" href="profile.php"><i class="fas fa-arrow-left mt-3 ml-3"></i></a>
</div>
<div class="container">
<h3 class="card-title text-center " style="color:#fff;">Modifiez mes informations</h3>
<?php
if(isset($error)){
    echo '<font color="red">'.$error."</font>";    
}
?>
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row">
          <div class="card-img-left d-none d-md-flex">
             <img src="asset/images/addphoto.png" width="150" height="150" alt="" srcset="">
          </div>
          <div class="card-body">
            <div class="row">
                <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                Nom : <span id="infos-table"><?php echo $userinfo['nom']  ?></span>  
                </div>
                <div class="form-label-group col-12 col-sm-6 col-md-6 col-lg-6">
                Prénoms : <span id="infos-table"><?php echo $userinfo['prenom']  ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4 col-sm-4 col-md-4">
               <p> Date de naissance : <span id="infos-table"><?php echo $userinfo['date_naissance']  ?></span></p>
                </div>
                <div class="form-label-group col-8 col-sm-8 col-md-8 col-lg-8">
              <p>  Ville : <span id="infos-table"><?php echo $userinfo['ville'] ?></span></p>
                </div>
            </div>
            <div class="row">
                <div class="form-label-group col-12 col-sm-6 col-md-6 col-lg-6">
               <p> Adresse E-mail : <span id="infos-table"><?php echo $userinfo['email']  ?></span></p> 
                </div>
                <div class="form-label-group col-12 col-sm-6 col-md-6 col-lg-6">
               <p> numero : <span id="infos-table"><?php echo $userinfo['telephone']  ?></span></p> 
                </div>
            </div>
            <div class="row">
                <div class="form-label-group col-12 col-sm-5 col-md-5 col-lg-5">
                <p>Abonnement : <span id="infos-table"> <span style="color:#2ECC71">Oui</span>  (Premium)</span></p> 
                </div>
            </div>
            <a href="edit_profile.php"><button type="button" class="btn btn-light" id="edit-user-info">Modifier mes infos</button></a>
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