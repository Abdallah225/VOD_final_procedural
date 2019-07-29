<?php
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

      $nom = addslashes($_POST ['nom']);
      $prenom = addslashes($_POST ['prenom']); 
      $ville = addslashes($_POST ['ville']);
      $date_naissance = addslashes($_POST ['date_naissance']);
      $email = addslashes($_POST ['email']);
      $password = sha1($_POST ['password']);
      $password1 = sha1($_POST ['password1']);
      $telephone = $_SESSION['telephone'];
    
  // MISE A JOUR DES INFORMATION LORS DE L'INSCRIPTION
    $inscription = $conn->prepare("INSERT INTO users
    SET nom = ?, prenom = ?, ville = ?, date_naissance = ?, email = ?, password = ?
    WHERE telephone = '$telephone';");
    $inscription ->execute(array($nom, $prenom, $ville, $date_naissance, $email, $password));
    $erreur = "Votre compte a été bien créer";
    header('location: ../login.php');

  }
  

?>
