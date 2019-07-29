
<?php include 'partials/_header.php';?>
<!-- Switchery -->
<link href="assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<?php include 'partials/_navbar.php';?>
<?php include 'partials/_sidebar.php';?>
<?php include 'partials/_menufooter.php';?>
<?php include 'partials/_topnavigation.php';?>
<?php
    include '../php/connect_db.php';

    if (isset($_POST['uploader'])) {
        $filename=$_FILES["file"]["tmp_name"];
        if($_FILES["file"]["size"] > 0)
        {
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE){


                $sql = "INSERT into thematique (nom,status,idadminuser,datepost) 
                
                    values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$datepost."')";
                    $result = mysqli_query($db, $sql);
                    

              
                if(!isset($result))
                {
                    echo "<script type=\"text/javascript\">
                            alert(\"Fichier non valide: Veuillez télécharger le fichier CSV.\");
                            window.location = \"thematiques-file.php\"
                            </script>";		
                }
                else {
                        echo "<script type=\"text/javascript\">
                        alert(\"La liste des thématiques télécharger avec succes.\");
                        window.location = \"thematiques-file.php\"
                    </script>";
                }
                }
           
            fclose($file);	
        }	
    }
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Charger les thématiques</h3>
            
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                <h2>Formulaire d'ajout des thématiques </h2>
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
                    <form class="form-horizontal form-label-left" action="thematiques-file.php" method="post" accept="image/*" enctype="multipart/form-data" >
                        
                        <?php include 'partials/_errors.php';?>
                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Choisir le fichier <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="file" name="file" class="form-control col-md-7 col-xs-12" type="file">
                            </div>
                        </div>

                    
            
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <!-- <button type="submit" class="btn btn-primary">Cancel</button> -->
                            <input  type="submit" name="uploader" value="uploader" class="btn btn-success">
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

