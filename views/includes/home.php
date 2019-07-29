<style>
section {
  position: relative;
  background-color: black;
  height: 100vh;
  min-height: 25rem;
  width: 100%;
  overflow: hidden;
}
.embed-container {
    position: relative;
      padding-bottom: 56.25%;
      height: 0;
      overflow: hidden;
      max-width: 100%;
  }
  .embed-container img,
  .embed-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

header .container {
  position: relative;
  z-index: 2;
}
</style>
<?php
    include 'php/connect_db.php';
// recuperation des thematiques
$requete = $conn->query("SELECT * FROM video JOIN saison ON video.id_saison = saison.id LIMIT 1 ");
$row_count = $requete->rowCount();
?>
<?php if($row_count != 0):?>
    <?php $id = 0 ;?>
    <?php
        while($episode = $requete->fetch()){
          $image = $episode['image'];
    ?>
<section id="main-image">
<div class="embed-container">
  <img class="img-fluid" src="data:image/jpg;base64,<?php echo $image?>" alt="Responsive image" srcset="" >
  <iframe  src="https://player.vimeo.com/video/<?php echo $episode['url_demo']?>?api=1&background=1&mute=1" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
</div>
  <div class="container h-100">
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-50 text-white">
        <h1 class="display-5">Saison <?php echo $episode['id_saison']?> - Episode<?php echo $episode['id_episode']?></h1>
        <p class="lead mb-0 mt-5"><?php echo $episode['description']?></p>
        <button type="button" id="watch" onclick="window.location.href='login.php'" class="btn btn-primary btn-lg mt-5">REGARDER &nbsp<i class="fas fa-play"></i></button>
      </div>
    </div>
  </div>
</section>
  <?php } ?>
    <?php endif?>