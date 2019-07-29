<!DOCTYPE html>
<html lang="en">
<head>
<?php
     include('partials/_head.php');
?>
    <title>Abonnement</title>
</head>
<body>
    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
<style>
.pricing .card {
  border: none;
  border-radius: 1rem;
  transition: all 0.2s;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.pricing hr {
  margin: 1.5rem 0;
}

.pricing .card-title {
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
<section class="pricing py-5">
<div class="container-fluid">
<a id="return" style="color:#fff;" href="page"><i class="fas fa-arrow-left mt-3 ml-3"></i></a>
</div>
  <div class="container ">
  <br>
  <h3>Parks d'Abonnement</h3>
    <div class="row">
      <!-- Free Tier -->
      <div class="mb-5 col-md-4 ">
        <div class="card flex-row">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Freemium</h5>
            <h6 class="card-price text-center">0 F<span class="period">/Mois</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span>3 Films, séries TV par semaine</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dispobible sur votre smarthone, tablette, ordinateur, TV</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Annulation a tout moment </li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>HD disponible</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Ultra HD disponible<</li>
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Souscrire</a>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="mb-5 col-md-4 ">
        <div class="card flex-row">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Premium Plus</h5>
            <h6 class="card-price text-center">1200 F<span class="period">/Semaine</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Films, séries TV en illimité</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dispobible sur votre smarthone, tablette, ordinateur, TV</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Annulation a tout moment </li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>HD disponible</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Ultra HD disponible<</li>
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Souscrire</a>
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="mb-5 col-md-4 ">
        <div class="card flex-row">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Premiem Pro</h5>
            <h6 class="card-price text-center">4000 F<span class="period">/Mois</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Films, séries TV en illimité</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dispobible sur votre smarthone, tablette, ordinateur, TV</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Annulation a tout moment </li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>HD disponible</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Ultra HD disponible<</li>
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Souscrire</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>