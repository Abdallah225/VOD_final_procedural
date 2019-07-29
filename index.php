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
session_start();

if (!empty($_SESSION['id']))
{
    // page free
   header('location: page.php?id'.$_SESSION['id']);
}
else
{
     //  page index
     include('partials/_navbar.php');
     include('views/includes/index_home.include.php');
     include('views/includes/index_video.include.php');
     include('partials/_footer.php');
}
       
?>
</body>
</html>