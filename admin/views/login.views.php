<?php include 'partials/_header.php';?>
<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="login.php" method="POST">
              <h1>Connexion</h1>
               <?php include 'partials/_errors.php'; ?>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" required="required" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit" name="login">Je me connecte</button>

              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Mot de passe oublié?
                  <a href="" class="to_register"> Veuillez contacter l'admininstrateur</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Viensdindin</h1>

                </div>
              </div>
            </form>
          </section>
        </div>


      </div>
    </div>
  </body>
</html>
