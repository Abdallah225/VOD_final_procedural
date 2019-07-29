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
<link  rel ="stylesheet" href ="https://cdn.plyr.io/3.5.3/plyr.css"/>
<title>video Play</title>
</head>
<body>
<style>
.plyr__video-embed{
  padding-bottom: 5%;
}
.logovideo{
  position: absolute;
  left:84%;
  top:25px;
}
.opts{
  position: absolute;
}
.return{
  position: absolute;
  left: 20px;
}
.option{
  position: absolute;
  left:84%;
}
i{
  font-size: 200%;
}

</style>
<div class="plyr__video-embed" id="player">
<?php
// recuperation des videos
$id = $_GET['id'];
$requete = $conn->query("SELECT * FROM video WHERE id=$id LIMIT 1");
$row_count = $requete->rowCount();
?>
<?php if($row_count != 0):?>
    
    <?php
       while($episode = $requete->fetch()){
    ?>
    <iframe
        src="https://player.vimeo.com/video/<?php echo $episode['url'];?>?autoplay=1&amp;loop=false&amp;byline=false&amp;portrait=false&amp;title=1&amp;speed=false&amp;transparent=0&amp;gesture=media"
        allowfullscreen
        allowtransparency
        allow="autoplay"
    ></iframe>
    <?php };?>
    <?php endif?>
</div>
<div class="logovideo">
<img class="img-fluid" src="asset/images/Logo_viendindin.png" alt="Responsive image" width="150">
</div>
<div class="opts">
<a class="return" id="return" href="page"><i style="color:#fff;" class="fas fa-arrow-circle-left"></i></a> 
<div class="option">
<!-- <a  id="return" href=""><i class="fas fa-list-ul"></i></a><br><br>
<a  id="return" href=""><i class="fas fa-closed-captioning"></i></a> -->
</div>
</div>
<script src="https://player.vimeo.com/api/player.js"></script>
  <script>
    <!- Your Vimeo SDK player script goes here ->
  </script>
</body>
</html>
<?php 
} else {
    header("location: ./");
}
?>