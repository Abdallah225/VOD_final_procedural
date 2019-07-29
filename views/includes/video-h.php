<style>
.media{
    overflow: scroll;
    width: 100%;
    overflow-x: hidden;
    overflow-y: hidden;
}
.inner {
    -webkit-transition: 450ms -webkit-transform;
    transition: 450ms -webkit-transform;
    transition: 450ms transform;
    transition: 450ms transform, 450ms -webkit-transform;
    font-size: 0;
    white-space: nowrap;
    margin: 70.3125px 0;
    padding-bottom: 10px;
}
.card1 {
    padding-left:20px;
    position: relative;
    display: inline-block;
    width: 500px;
    height: 250px;
    margin-right: 10px;
    font-size: 20px;
    cursor: pointer;
    -webkit-transition: 450ms all;
    transition: 450ms all;
    -webkit-transform-origin: center left;
    transform-origin: center left;
}
.overlayImage{
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
}


.inner:hover {
  -webkit-transform: translate3d(10.5px, 0, 0);
          transform: translate3d(10.5px, 0, 0);
}
.inner:hover .card1 {
  opacity: 0.2;
}
.inner:hover .card1:hover {
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
  opacity: 1;
}
.card1:hover ~ .card1 {
  -webkit-transform: translate3d(55px, 0, 0);
          transform: translate3d(55px, 0, 0);
}
.card1-details {
  display: none;
  position: absolute;
  top: 60%;
  width: 100%;
  height: 100%;
  background-color: #272727;
  opacity: 0.7;
}
.thevideo{
    display: none;
    position: absolute;
    top: 0;
    left: 0;
}

/* 
  ##Device = Tablets, Ipads (landscape)
  ##Screen = B/w 320px to 1024px
*/

@media (min-width: 120px) and (max-width: 480px){
 .card1{
    width: 200px;
    height: 140.625px;
 }

 .card1-details {
    position: absolute;
    top: 35%;
}
}
/* 
##Device = Low Resolution Tablets, Mobiles (Landscape)
##Screen = B/w 481px to 767px
*/ 

@media (min-width: 481px) and (max-width: 767px) {
.card1{
    width: 355px;
    height: 180px;
 }

}
/* 
##Device = Tablets, Ipads (landscape)
##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {

.card1{
    width: 355px;
    height: 180px;
 }
  
}
@media (min-width: 1025px) and (max-width: 1280px) {

  
}
</style>
<div class="container-fluid">
<div class="titre">
      <h2 style="color;">Action</h2>
  </div>
    <div class="row media">
<?php
    include 'php/connect_db.php';
// recuperation des thematiques
$requete = $conn->query("SELECT * FROM video JOIN episode ON video.id_episode = episode.id");
$row_count = $requete->rowCount();
?>
<?php if($row_count != 0):?>
    <?php $id = 0 ;?>
       <div class="inner">
       <?php
        while($episode = $requete->fetch()){
          $image = $episode['image'];
        ?>
                    <!-- CARD 1 -->
                    <div class="card1 action-<?php echo $episode['id'] ?>" onmouseover='playVideo(this)' id='<?php echo $episode['id'] ?>'">
                        <div class="card1-media">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img class="img-fluid overlayImage" src="data:..asset/images/jpg;base64,<?php echo $image?>" alt="Responsive image" srcset="">
                            <iframe src="https://player.vimeo.com/video/<?php echo $episode['url_demo']?>?api=1&background=1&mute=0" width="640" height="230" frameborder="0" allow="; fullscreen" allowfullscreen id="player1" class="thevideo action-v-<?php echo $episode['id'] ?>"></iframe>
                        </div>
                        <div class="card1-details action-v-<?php echo $episode['id'] ?>">
                        <span class="card1-title">Saison <?php echo $episode['id_saison']?> - Episode <?php echo $episode['id_episode']?></span>
                            <span class="card1-etoil"></span>
                            <span class="card1-time mt-1"><?php echo $episode['duree'] ?></span>
                            <button type="button" onclick="window.location.href='playeur.php?id=<?php echo $episode['id'];?> & name=<?php echo $episode['url'];?>'" class="btn btn-primary btn-lg">REGARDER &nbsp<i class="fas fa-play"></i></button>
                        </div>
                    </div>
                    </div>
                    <!-- FIN CARD 1 -->
        <?php } ?>
        </div>
        <?php endif?> 
    </div>
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