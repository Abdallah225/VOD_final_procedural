<!DOCTYPE html>
<html lang="en">
<head>
<?php
   include('../partials/_head.php');
   
?>
    <title>Contact</title>
</head>
<style>
section.pricing {
  background: #FFF;
}

.pricing .card {
  border: none;
  border-radius: 1rem;
  transition: all 0.2s;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.pricing hr {
  margin: 1.5rem 0;
}

.pricing . {
  margin: 0.5rem 0;
  font-size: 0.9rem;
  letter-spacing: .1rem;
  font-weight: bold;
}

.pricing .card-price {
  font-size: 3rem;
  margin: 0;
}

.pricing .card-price .period {
  font-size: 0.8rem;
}

.pricing ul li {
  margin-bottom: 1rem;
}

.pricing .text-muted {
  opacity: 0.7;
}

.pricing .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  opacity: 0.7;
  transition: all 0.2s;
}

/* Hover Effects on Card */

@media (min-width: 992px) {
  .pricing .card:hover {
    margin-top: -.25rem;
    margin-bottom: .25rem;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
  }
  .pricing .card:hover .btn {
    opacity: 1;
  }
}
</style>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Viensdindin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Accuiel
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Deconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<div class="container-fluid mt-5">
<!-- Search form -->
<h4>Centre d'aide</h4>
<input class="form-control" type="text" placeholder="Search" aria-label="Search">
</div>
<section class="pricing py-5">
  <div class="container-fluid">
  <br>
    <div class="row">
      
      <div class="col-md-3">
            <h5 class=" text-muted text-uppercase text-center">Gérer mon compte</h5>
           <hr>
           <ul class="fa-ul">
            <li><a href=""><span class="fa-li"><i class="fas fa-check"></i></span><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae laboriosam nobis omnis fugiat, voluptates porro harum animi iure magnam veritatis ipsa pariatur! Iure dolore eius temporibus soluta quisquam cum.</strong></li></a>
            <li><a href=""><span class="fa-li"><i class="fas fa-check"></i></span><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque saepe quae porro nostrum quos reprehenderit quis corrupti explicabo. Sint aliquid cum earum, accusamus incidunt itaque delectus unde pariatur? Sequi, quam.</strong></li></a>
            <li><a href=""><span class="fa-li"><i class="fas fa-check"></i></span><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nobis error consectetur explicabo odit sunt animi quibusdam doloremque natus consequatur. Alias vitae distinctio voluptas quos pariatur iusto adipisci ab quo.</strong></li></a> 
            </ul>
      </div>
       
       <div class="col-md-3">
            <h5 class=" text-muted text-uppercase text-center">Lecture impossible</h5>
            <hr>
            <ul class="fa-ul">
            <li><a href=""><span class="fa-li"><i class="fas fa-check"></i></span><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae laboriosam nobis omnis fugiat, voluptates porro harum animi iure magnam veritatis ipsa pariatur! Iure dolore eius temporibus soluta quisquam cum.</strong></li></a>
            <li><a href=""><span class="fa-li"><i class="fas fa-check"></i></span><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque saepe quae porro nostrum quos reprehenderit quis corrupti explicabo. Sint aliquid cum earum, accusamus incidunt itaque delectus unde pariatur? Sequi, quam.</strong></li></a>
            <li><a href=""><span class="fa-li"><i class="fas fa-check"></i></span><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nobis error consectetur explicabo odit sunt animi quibusdam doloremque natus consequatur. Alias vitae distinctio voluptas quos pariatur iusto adipisci ab quo.</strong></li></a> 
            </ul>
      </div>
       
       <div class="col-md-3">
            <h5 class=" text-muted text-uppercase text-center">Questions liées à la facturation</h5>
            <hr>
            <ul class="fa-ul">
            <li><a href=""><span class="fa-li"><i class="fas fa-check"></i></span><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae laboriosam nobis omnis fugiat, voluptates porro harum animi iure magnam veritatis ipsa pariatur! Iure dolore eius temporibus soluta quisquam cum.</strong></li></a>
            <li><a href=""><span class="fa-li"><i class="fas fa-check"></i></span><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque saepe quae porro nostrum quos reprehenderit quis corrupti explicabo. Sint aliquid cum earum, accusamus incidunt itaque delectus unde pariatur? Sequi, quam.</strong></li></a>
            <li><a href=""><span class="fa-li"><i class="fas fa-check"></i></span><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nobis error consectetur explicabo odit sunt animi quibusdam doloremque natus consequatur. Alias vitae distinctio voluptas quos pariatur iusto adipisci ab quo.</strong></li></a> 
            </ul>
      </div>
      <!-- Pro Tier -->
        <div class="col-md-3">
            <h5 class=" text-muted text-uppercase text-center">Liens rapides</h5>
            <hr>
            <ul class="fa-ul">
            <li><a href=""><span class="fa-li"><i class="fas fa-check"></i></span><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae laboriosam nobis omnis fugiat, voluptates porro harum animi iure magnam veritatis ipsa pariatur! Iure dolore eius temporibus soluta quisquam cum.</strong></li></a>
            <li><a href=""><span class="fa-li"><i class="fas fa-check"></i></span><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque saepe quae porro nostrum quos reprehenderit quis corrupti explicabo. Sint aliquid cum earum, accusamus incidunt itaque delectus unde pariatur? Sequi, quam.</strong></li></a>
            <li><a href=""><span class="fa-li"><i class="fas fa-check"></i></span><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nobis error consectetur explicabo odit sunt animi quibusdam doloremque natus consequatur. Alias vitae distinctio voluptas quos pariatur iusto adipisci ab quo.</strong></li></a> 
            </ul>
        </div>
    </div>
  </div>
</section>
<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
    <br>
    <ul class="list-inline  text-right">
            <li class="list-inline-item"><a href="condition.php"><span class="fa-li"></span><strong style="color:#fff;">Conditions d'utilisation</strong></li></a>
            <li class="list-inline-item"><a href="privacy.php"><span class="fa-li"></span><strong style="color:#fff;">Confidentialité</strong></li></a>
            <li class="list-inline-item"><a href=""><span class="fa-li"></span><strong style="color:#fff;">Préférences de cookies</strong></li></a> 
    </ul>
    <br><br>
      <small style="color:#fff;"> Copyright &copy; Faire avec le <i style="color:red;" class="fa fa-heart" aria-hidden="true"></i>  à Babi. Tous droits réservés.</small>
    </div>
  </footer>
</body>
</html>