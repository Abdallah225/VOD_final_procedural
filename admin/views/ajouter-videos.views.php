
<?php include 'partials/_header.php';?>
<!-- Switchery -->
<link href="assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<?php include 'partials/_navbar.php';?>
<?php include 'partials/_sidebar.php';?>
<?php include 'partials/_menufooter.php';?>
<?php include 'partials/_topnavigation.php';?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Video</h3>

            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                <h2>Formulaire d'ajout d'une video </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Réglage 1</a>
                        </li>
                        <li><a href="#">Réglage 2</a>
                        </li>
                    </ul>
                    </li>
                    </li>
                </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" action="ajouter-videos.php" method="post" accept="image/*" enctype="multipart/form-data" >

                        <?php include 'partials/_errors.php';?>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Titre de la video <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="name" placeholder=""  type="text">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">description de la video <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea"  name="description" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Auteur <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="auteur" placeholder=""  type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Durée<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="duree" placeholder=""  type="text">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emission">Saison <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="saison" id="saison" class="form-control col-md-7 col-xs-12">
                                <?php 
                                include './config/database.php';
                                // recuperation de la saison
                                $requete = $conn->query("SELECT * FROM saison");
                                ?>
                                  <option value="">Veuillez selectionner une saison</option>
                                  <?php while($resultat = $requete->fetch()){?>
                                        <option value="<?php echo $resultat['id'];?>"><?php echo $resultat['libelle']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emission">Episode <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="episode" id="episode" class="form-control col-md-7 col-xs-12">
                                <?php 
                                include './config/database.php';
                                // recuperation l'episode
                                $requete = $conn->query("SELECT * FROM episode");
                                ?>
                                  <option value="">Veuillez selectionner une saison</option>
                                  <?php while($resultat = $requete->fetch()){?>
                                        <option value="<?php echo $resultat['id'];?>"><?php echo $resultat['libelle']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emission">Thematique <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="thematique" id="thematique" class="form-control col-md-7 col-xs-12">
                                <?php 
                                include './config/database.php';
                                // recuperation des thematiques
                                $requete = $conn->query("SELECT * FROM thematique");
                                ?>
                                  <option value="">Veuillez selectionner une thematique</option>
                                  <?php while($resultat = $requete->fetch()){?>
                                        <option value="<?php echo $resultat['id'];?>"><?php echo $resultat['libelle']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Lien demo de la video <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="textarea"  name="url_demo" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Lien de la video <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="textarea"  name="url" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">le type de la video <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="type" name="type">
                                <option value=""> selectionnez le type</option>
                                <option value="youtube">youtube</option>
                                <option value="dailymotion">dailymotion</option>
                                <option value="vimeo">vimeo</option>
                                <option value="openload">openload</option>
                                    <option value="openload">lien personnalisé</option>

                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Mots clés</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea"  name="mot_cle" class="form-control col-md-7 col-xs-12"></textarea>
                          </div>
                        </div>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Publier la video <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 offset-md-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="js-switch"  name="status" value="1"> publier
                                </label>
                            </div>
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <!-- <button type="submit" class="btn btn-primary">Cancel</button> -->
                            <input  type="submit" name="enregistrer" value="enregistrer" class="btn btn-success">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
        <div class="pull-right">

        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
</div>

<?php include 'partials/_footer.php';?>
<!-- <script src="assets/vendors/validator/validator.js"></script> -->
<!-- iCheck -->
<!-- Switchery -->
<script src="assets/vendors/switchery/dist/switchery.min.js"></script>
