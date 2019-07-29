<?php
// connexion a la base de donnée
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
    $nom = htmlspecialchars($_POST['nom']);
    $prenom =  htmlspecialchars($_POST['prenom']);
    $ville =  htmlspecialchars($_POST['ville']);
    $telephone= htmlspecialchars($_POST['telephone']);
    $date_naissance =  htmlspecialchars($_POST['date_naissance']);
    $email =  htmlspecialchars($_POST['email']);
    $password = sha1($_POST['password']);
    $password1 = sha1($_POST['password1']);
    // verification sur tous les champs sont rempli
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['telephone']) AND !empty($_POST['ville'])  AND !empty($_POST['date_naissance'])  AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password1']))
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
                            $insertmbr = $conn->prepare("INSERT INTO users(nom, prenom, telephone, ville, date_naissance, email, password) VALUES(?, ?, ?, ?, ?, ?, ?)");  
                            $insertmbr ->execute(array($nom, $prenom, $telephone, $ville, $date_naissance, $email, $password));
                           
                            $erreur = "Votre compte a été bien créer";
                            header('location: login.php');
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