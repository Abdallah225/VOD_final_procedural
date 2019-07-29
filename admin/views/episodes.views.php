<?php include 'partials/_header.php';?>
<?php include 'partials/_navbar.php';?>
<?php include 'partials/_sidebar.php';?>
<?php include 'partials/_menufooter.php';?>
<?php include 'partials/_topnavigation.php';?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Chaines <small>La liste des épisodes</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">

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
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">

                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Libellé</th>
                        <th>image</th>
                        <th>description</th>
                        <th>ID_saison</th>
                        <th>ID_thematique</th>
                        <th>Status</th>
                        <th>Mot clé</th>
                        <th>Date d'ajout</th>
                        <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody>
                   
                 
                <?php if($row_count != 0):?>
                <?php $id = 0 ;?> 
                <?php
                    while($episode = $requete->fetch()){
                        $image = $episode['image'];
                    ?>
                       
                    
                    <tr>
                        <td><?php echo $episode['id'] ?></td>
                        <td><?php echo $episode['libelle']?></td>
                        <td><img class="img-fluid" src="data:..asset/images/jpg;base64,<?php echo $image?>" alt="" srcset="" style="width:70px;height:70px;"> </td>
                        <td><?php echo $episode['description']?></td>
                        <td><?php echo $episode['id_saison']?></td>
                        <td><?php echo $episode['id_thematique']?></td>
                        <td>
                            <?php
                                if($episode['status'] == 1){
                                    echo '<span class="label label-success "> publier</span>';
                                } else{
                                    echo '<span class="label label-danger "> non publier</span>';
                                }
                            ?>
                        </td>
                        <td><?php echo $episode['mots_cle']?></td>
                        <td><?php echo $episode['date']?></td>
                        <td>
                            <form action="edition-episodes.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $episode['id'];?>">
                            <a href="edition-episodes.php?id=<?php echo $episode['id'];?> & name=<?php echo $episode['libelle'];?>"  name="modifier" class="btn btn-warning">
                                <span class="fa fa-edit"></span>
                            </a>
                                

                                <button type="submit" name="supprimer" class="btn btn-danger">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </form>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php endif?>
                    </tbody>
                    </table>
                </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/_footer.php';?>

    <!-- Datatables -->
    <script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script>
        $('#datatable').dataTable({
					dom: "Blfrtip",
					  buttons: [
						{
						  extend: "copy",
						  className: "btn-sm"
						},
						{
						  extend: "csv",
						  className: "btn-sm"
						},
						{
						  extend: "excel",
						  className: "btn-sm"
						},
						{
						  extend: "pdfHtml5",
						  className: "btn-sm"
						},
						{
						  extend: "print",
						  className: "btn-sm"
						},
					  ],
					responsive: true,
                    'order': [[ 1, 'asc' ]],
                    'columnDefs': [
                        { orderable: false, targets: [0] }
                    ]
				});
    </script>
