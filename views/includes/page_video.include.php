<?php
    include 'php/connect_db.php';
// recuperation des thematiques
$requete = $conn->query("SELECT * FROM video JOIN episode ON video.id_episode = episode.id");
$row_count = $requete->rowCount();
?>
<?php if($row_count != 0):?>
    <?php $id = 0 ;?> 
    <div class="container-fluid">
  <div class="titre">
      <h2>Action</h2>
  </div> 
  <div class="row">
  <?php
        while($episode = $requete->fetch()){
          $image = $episode['image'];
    ?>
    <div class="col-12 col-md-4"> 
      <div class="card1 action-<?php echo $episode['id'] ?>" onmouseover='playVideo(this)' id='<?php echo $episode['id'] ?>'>
        <div class="card1-image"><!-- card1 image -->
          <div class="embed-responsive embed-responsive-16by9">
          <img class="img-fluid overlayImage" src="data:..asset/images/jpg;base64,<?php echo $image?>" alt="Responsive image" srcset="">
            <iframe src="https://player.vimeo.com/video/<?php echo $episode['url_demo']?>?api=1&background=1&mute=0" width="640" height="230" frameborder="0" allow="; fullscreen" allowfullscreen id="player1" class="thevideo action-v-<?php echo $episode['id'] ?>"></iframe>
            <div class="card1-content action-v-<?php echo $episode['id'] ?>">
              <span class="card1-title">Saison <?php echo $episode['id_saison']?> - Episode <?php echo $episode['id_episode']?></span>
              <span class="card1-etoil"></span>
              <span class="card1-time mt-1"><?php echo $episode['duree'] ?></span>
              <button type="button" onclick="window.location.href='playeur?id=<?php echo $episode['id'];?> & name=<?php echo $episode['url'];?>'" class="btn btn-primary btn-lg">REGARDER &nbsp<i class="fas fa-play"></i></button>                   
            </div><!-- card1 content --> 
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
 </div>
</div>
<?php endif?> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
 // script pour animer les actions sur les differents video au survol des images des differents films
  function playVideo(element){
    $("#"+element.id).on({
      mouseenter: function(){
      $(".action-v-"+element.id).show();
      },
      mouseleave: function(){
        $(".action-v-"+element.id).hide();
      }
    });
  }
</script>