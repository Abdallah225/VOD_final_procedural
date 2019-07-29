<?php 
session_start();
// connexion a la base de donnée
include('php/connect_db.php');
if (isset($_SESSION['id']) )
{
    $requser = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php
    include('partials/_head.php');
?>
<title>Viensdindin</title>
</head>
<body>
    <?php 
        include('partials/_navbar.php');
        include('views/includes/page_home.include.php');
        include('views/includes/page_video.include.php');
        include('partials/_footer.php')
    ?>
</body>
</html>
<?php 
} else {
    header("location: ./");
}
?>