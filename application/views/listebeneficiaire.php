<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome-all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome5-overrides.min.css'); ?>">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="<?php echo base_url('controlleur_admin_user/verscreationcategorie'); ?>"><i class="fas fa-tachometer-alt"></i><span>Création catégorie dépense</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('controlleur_admin_user/verscreationsalaire'); ?>"><i class="fas fa-user"></i><span>Création montant salaire mensuel</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('controlleur_admin_user/versajoututilisateur'); ?>"><i class="fas fa-table"></i><span>Gestion Utilisateurs</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('controlleur_admin_user/versselectusertobenef'); ?>"><i class="far fa-user-circle"></i><span>Gestion Bénéficiaires</span></a></li>
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Beneficiaires</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Employee Info</p>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Relation</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        for ($i=0; $i < sizeof($data); $i++) 
                                        { ?>
                                            <tbody>
                                                <tr>
                                                    <!-- <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td> -->
                                                    <td><?php echo $data[$i]['nom']; ?></td>
                                                    <td><?php echo $data[$i]['relation']; ?></td>
                                                    <td>
                                                        <form action="testsupprbenef">
                                                            <input type="hidden" value="<?php echo $data[$i]['id_beneficiaire']; ?>" name="id">
                                                            <button class="btn btn-primary py-0" type="submit">
                                                                <i class="fas fa-remove"></i>
                                                            </button>
                                                        </form>
                                                            
                                                    </td>
                                                </tr>
                                            </tbody>
                                    <?php 
                                        }  
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Relation</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <form class="user" method="GET" action="testajoutbenef">
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputPassword" placeholder="Nouveau beneficiaire" name="nom"></div>
                                        
                                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                            <label class="form-label">User&nbsp;
                                                <select name = "nomuser" class="d-inline-block form-select form-select-sm">
                                                    <?php 
                                                            
                                                        for ($i=0; $i < sizeof($datauser); $i++) 
                                                        { ?>
                                                        <option value="<?php echo $datauser[$i]['id_utilisateur']; ?>" selected="">
                                                            <?php echo $datauser[$i]['nom']; ?>
                                                        </option>

                                                    <?php 
                                                        }  
                                                    ?>
                                                </select>

                                        </div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputPassword" placeholder="Relation" name="relation"></div>
                                        
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Inserer</button>
                                        <hr>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Cedric ETU001381 - Midera ETU001377</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bs-init.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/theme.js'); ?>"></script>
</body>

</html>