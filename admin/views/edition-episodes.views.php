
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
                <h3>saisons</h3>
            
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                <h2>Formulaire de mise à jour des épisode</h2>
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
                    <form class="form-horizontal form-label-left" action="edition-episodes.php" method="post" accept="image/*" enctype="multipart/form-data" >
                        
                        <?php include 'partials/_errors.php';?>
                        
                        <input type="hidden" name="id" value="<?php echo $id?>">

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom de l'épisode <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               
                                <input id="name" class="form-control col-md-7 col-xs-12" value="<?php echo $nom?>" data-validate-length-range="2" data-validate-words="1" name="name" placeholder="journal TV"  type="text">
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fileToUpload">Le cover de l'épisode
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="fileToUpload" class="form-control col-md-7 col-xs-12"  name="fileToUpload"   type="file"/>
                                <img src="data:image/jpg;base64,<?php echo $image?>" alt="" style="width:70px;height:70px;">
                                
                            </div>
                        </div>
                        
                    
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Description de l'épisode <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea"  required="required" name="description" class="form-control col-md-7 col-xs-12"> <?php echo $description?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thematique">Thematique<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="thematique" id="chaine" class="form-control col-md-7 col-xs-12">
                                    <?php while($thematique = $requete->fetch()):?>
                                        
                                        <?php if($thematique['id'] == $idchaine):?>
                                            <option value="<?php echo $thematique['id']?>" selected="selected"><?php echo $thematique['libelle']?></option>
                                        <?php else:?>
                                            <option value="<?php echo $thematique['id']?>"><?php echo $thematique['libelle']?></option>
                                        <?php endif ?>
                                       
                                    <?php endwhile?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thematique">Saison <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="saison" id="saison" class="form-control col-md-7 col-xs-12">
                                <?php 
                                include './config/database.php';
                                // recuperation saison
                                $requete = $conn->query("SELECT * FROM saison");
                                ?>
                                    <?php while($saison = $requete->fetch()):?>
                                        
                                        <?php if($saison['id'] == $idsaison):?>
                                            <option value="<?php echo $saison['id']?>" selected="selected"><?php echo $saison['libelle']?></option>
                                        <?php else:?>
                                            <option value="<?php echo $saison['id']?>"><?php echo $saison['libelle']?></option>
                                        <?php endif ?>
                                       
                                    <?php endwhile?>
                                </select>
                            </div>
                        </div>
                 
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Publier l'émission <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 offset-md-3">
                            <div class="checkbox">
                                <label>
                                    <?php if($status == 1): ?>
                                        <input type="checkbox" class="js-switch"  name="status" value="1" checked="checked"> publier
                                    <?php else:?>
                                    <input type="checkbox" class="js-switch"  name="status" value="0" > publier
                                    <?php endif?>
                                </label>
                            </div>
                            </div>
                        </div>
                        
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <!-- <button type="submit" class="btn btn-primary">Cancel</button> -->
                            <input  type="submit" name="update" value="mettre à jour" class="btn btn-success">
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

