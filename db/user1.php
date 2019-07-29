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
    $nom = htmlspecialchars($_POST['nom']);
    $prenom =  htmlspecialchars($_POST['prenom']);
    $vile =  htmlspecialchars($_POST['ville']);
    $number= htmlspecialchars($_POST['tel ']);
    $date_naissance =  htmlspecialchars($_POST['date_naissance']);
    $email =  htmlspecialchars($_POST['email']);
    $password = sha1($_POST['password']);
    $password1 = sha1($_POST['password1']);

    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['tel']) AND !empty($_POST['ville']) AND !empty($_POST['date_naissance']) AND !empty($_POST['mail']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password1'])){
       

        $nomlength = strlen($nom);
        if($nomlength <= 225)
        {
            if($mail == $mail1)
            {   
                if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {
                    if($password == $password1)
                    {
                        $insertmbr = $conn->prepare("INSERT INTO  users
                        SET id=?, nom = ?, prenom = ?, tel= ?, ville = ?, date_naissance = ?, email = ?, password = ?
                        WHERE id = '';");
                        $insertmbr ->execute(array($nom, $prenom, $ville, $date_naissance, $mail, $password));
                        $erreur = "Votre compte a été bien créer";
                        header('location: ../login.php');
                        }
                        else
                        {
                            $erreur = " Ce mail existe essayer un autre";
                        }
                    }
                    else
                    {
                        $erreur = "Vos mot de passe ne correspondent pas";
                    }
                }
                else
                {
                    $erreur = "Votre adresse mail n'est pas valide!";
                }
               
            }
            else
            {
                $erreur = "Vos adresses Email ne correspondent pas";
            }
        }
        else
        {
            $erreur = "Votre nom ne dois pas depasser 255 caracteres";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent etre rempli";
    }

?>