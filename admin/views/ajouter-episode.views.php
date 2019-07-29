
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
                <h3>Episodes</h3>
            
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                <h2>Formulaire d'ajout d'une épisode</h2>
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
                    <form class="form-horizontal form-label-left" action="ajouter-episodes.php" method="post" accept="image/*" enctype="multipart/form-data" >
                        
                        <?php include 'partials/_errors.php';?>
                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom de l'épisode <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="name" placeholder="ICI C'EST BABI"  type="text" >
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fileToUpload">Le cover de l'épisode <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="fileToUpload" class="form-control col-md-7 col-xs-12"  name="fileToUpload"   type="file"/>
                            </div>
                        </div>
                        
                    
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Description de l'épisode' <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea"  name="description" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emission">Thematique <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="thematique" id="thematique" class="form-control col-md-7 col-xs-12">
                                  <option value="">Veuillez selectionner une thematique</option>
                                  <?php while($episode = $requete->fetch()){?>
                                        <option value="<?php echo $episode['id'];?>"><?php echo $episode['libelle']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="saison">Saison <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="saison" id="saison" class="form-control col-md-7 col-xs-12">
                                <?php 
                                include './config/database.php';
                                // recuperation saison
                                $requete = $conn->query("SELECT * FROM saison");
                                ?>
                                  <option value="">Veuillez selectionner une Saison</option>
                                    <?php while($episode = $requete->fetch()){?>
                                        <option value="<?php echo $episode['id']?>"><?php echo $episode['libelle']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Mot clé  de l'épisode' <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea"  name="mot_cle" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Publier l'épisode' <span class="required">*</span></label>
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

