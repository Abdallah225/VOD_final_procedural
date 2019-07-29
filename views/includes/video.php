<style>

.contain {
  width: 100%;
}
.video{
  overflow: scroll;
  width: 100%;
  overflow-x: hidden;
  overflow-y: hidden;
}
.row__inner {
  -webkit-transition: 450ms -webkit-transform;
  transition: 450ms -webkit-transform;
  transition: 450ms transform;
  transition: 450ms transform, 450ms -webkit-transform;
  font-size: 0;
  white-space: nowrap;
  margin: 70.3125px 0;
  padding-bottom: 10px;
}
.tile {
  position: relative;
  display: inline-block;
  width: 250px;
  height: 140.625px;
  margin-right: 10px;
  font-size: 20px;
  cursor: pointer;
  -webkit-transition: 450ms all;
  transition: 450ms all;
  -webkit-transform-origin: center left;
  transform-origin: center left;
}
.tile__img {
  width: 250px;
  height: 140.625px;
  -o-object-fit: cover;
  object-fit: cover;
}
.tile__details {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  font-size: 10px;
  opacity: 0;
  background: -webkit-gradient(linear, left bottom, left top, from(rgba(0,0,0,0.9)), to(rgba(0,0,0,0)));
  background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);
  -webkit-transition: 450ms opacity;
  transition: 450ms opacity;
}
.tile__details:after,
.tile__details:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  display: #000;
}
.tile__details:after {
  margin-top: -25px;
  margin-left: -25px;
  width: 50px;
  height: 50px;
  border: 3px solid #ecf0f1;
  line-height: 50px;
  text-align: center;
  border-radius: 100%;
  background: rgba(0,0,0,0.5);
  z-index: 1;
}
.tile__details:before {
  content: '▶';
  left: 0;
  width: 100%;
  font-size: 30px;
  margin-left: 7px;
  margin-top: -18px;
  text-align: center;
  z-index: 2;
}
.tile:hover .tile__details {
  opacity: 1;
}
.tile__title {
  position: absolute;
  bottom: 0;
  padding: 10px;
}
.row__inner:hover {
  -webkit-transform: translate3d(62.5px, 0, 0);
          transform: translate3d(62.5px, 0, 0);
}
.row__inner:hover .tile {
  opacity: 0.3;
}
.row__inner:hover .tile:hover {
  -webkit-transform: scale(1.5);
          transform: scale(1.5);
  opacity: 1;
}
.tile:hover ~ .tile {
  -webkit-transform: translate3d(125px, 0, 0);
          transform: translate3d(125px, 0, 0);
}
</style>
<div class="contain">

<h3 class=" mt-5" style="color:#fff;">Série Ici c'est babi de CHARLY KODJO</h3>
<div class="row video">
<?php
    include 'php/connect_db.php';
// recuperation des thematiques
$requete = $conn->query("SELECT * FROM video JOIN episode ON video.id_episode = episode.id");
$row_count = $requete->rowCount();
?>
<?php if($row_count != 0):?>
    <?php $id = 0 ;?> 
  <div class="row__inner">
  <?php
        while($episode = $requete->fetch()){
          $image = $episode['image'];
    ?>
    <div class="tile">
      <div class="tile__media">
      <img class="img-fluid overlayImage" src="data:..asset/images/jpg;base64,<?php echo $image?>" alt="Responsive image" srcset="">
      </div>
      <div class="tile__details">
        <div class="tile__title" style="color:#fff;">
         ici c'est babi - Episode <?php echo $episode['id_episode']?>
        </div>
      </div>
    </div>

    <?php } ?>

    
    </div>
    <?php endif?> 
    </div>