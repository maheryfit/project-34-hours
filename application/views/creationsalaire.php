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
                    <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('controlleur_admin_user/verscreationcategorie'); ?>"><i class="fas fa-tachometer-alt"></i><span>Création catégorie dépense</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="<?php echo base_url('controlleur_admin_user/verscreationsalaire'); ?>"><i class="fas fa-user"></i><span>Création montant salaire mensuel</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('controlleur_admin_user/versajoututilisateur'); ?>"><i class="fas fa-table"></i><span>Gestion Utilisateurs</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('controlleur_admin_user/versselectusertobenef'); ?>"><i class="far fa-user-circle"></i><span>Gestion Bénéficiaires</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Employee Info</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <form class="user" method="GET" action="testcreationsalaireuser">
                                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                                <label class="form-label">Nom&nbsp;
                                                    <select name = "nomuser" class="d-inline-block form-select form-select-sm">
                                                        <?php 
                                                            
                                                            for ($i=0; $i < sizeof($data); $i++) 
                                                            { ?>
                                                            <option value="<?php echo $data[$i]['nom']; ?>" selected="">
                                                                <?php echo $data[$i]['nom']; ?>
                                                            </option>

                                                        <?php 
                                                            }  
                                                        ?>
                                                    </select>

                                            </div>
                                            <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputPassword" placeholder="Nouveau salaire" name="salaire"></div>
                                            
                                            </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Valider</button>
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