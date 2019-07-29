<?php
    include 'php/connect_db.php';
// recuperation des thematiques
$requete = $conn->query("SELECT * FROM video JOIN saison ON video.id_saison = saison.id LIMIT 1 ");
$row_count = $requete->rowCount();
?>
<section id="main-image">
  <div class="embed-container">
  <?php if($row_count != 0):?>
    <?php $id = 0 ;?>
    <?php
        while($episode = $requete->fetch()){
          $image = $episode['image'];
    ?>
  <img class="img-fluid" src="data:image/jpg;base64,<?php echo $image?>" alt="Responsive image" srcset="" >
  <iframe  src="https://player.vimeo.com/video/<?php echo $episode['url_demo']?>?api=1&background=1&mute=1" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
  </div>
  <div class=" h-100">
    <div class="d-flex h-100">
      <div class="w-100 text-white">
            <p class="mt-4" id="info-saison-episode">Saison <?php echo $episode['id_saison']?> - Episode<?php echo $episode['id_episode']?>  </p>
            <p class="lead text mt-4" style="color: #fff">
             <?php echo $episode['description']?>
            </p>
            <p class="type-serie mt-4" style="color: #fff ;font-weight: 700;">
                SERIE  &nbsp | &nbsp COMEDIE &nbsp |  &nbsp <?php echo $episode['duree']?>
            </p>
            <button type="button" id="watch" onclick="window.location.href='login'" class="btn btn-primary btn-lg mt-4">REGARDER &nbsp<i class="fas fa-play"></i></button>
      </div>
    </div>
    <?php } ?>
    <?php endif?>
  </div>
</section>
<script src="asset/js/jquery.js"></script>
<script>
$(document).ready(function() {
  $('.box').each(function(i, obj) {
    $(this).on("mouseover", hoverVideo);
    $(this).on("mouseout", hideVideo);
  });
});

function hoverVideo() {
  $(this).find(".overlayImage").hide();
  $(this).find(".thevideo")[0].play();
}

function hideVideo(video) {
  $(this).find(".thevideo")[0].currentTime = 0;
  $(this).find(".thevideo")[0].pause();
  $(this).find(".overlayImage").show();
}
</script>
