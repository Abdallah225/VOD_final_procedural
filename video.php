
<!DOCTYPE html>
<html lang="fr">
<head>
<?php
    include('partials/_head.php');
?>
<link  rel ="stylesheet" href ="https://cdn.plyr.io/3.5.3/plyr.css" />
<title>viensdindin</title>
</head>
<body>
<style>
.plyr__video-embed{
  padding-bottom: 5%;
}
.opts{
  position: absolute;
  left: 10px;
}
</style>
<div class="plyr__video-embed" id="player">
<!-- <a id="return" href="free.php"><i class="fas fa-arrow-left mt-3 ml-3"></i></a> -->

    <iframe
        src="https://player.vimeo.com/video/337474151?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
        allowfullscreen
        allowtransparency
        allow="autoplay"
    ></iframe>
</div>
<div class="opts">
<a href="https://icons8.com/icon/39815/go-back">Go Back icon by Icons8</a>
    <a href=""><img src="thumb-up-button.svg" alt="" srcset=""></a>
    <a href=""><img src="like.svg" alt="" srcset=""></a>
    <a href=""><img src="share.svg" alt="" srcset=""></a>
</div>
<script src="https://player.vimeo.com/api/player.js"></script>
  <script>
     var options = {
    width: 800, 
  };

  var videoPlayer = new Vimeo.Player('myVideo', options);

  videoPlayer.on('play', function() {
    console.log('Played the video');
  });
  </script>
</body>
</html>