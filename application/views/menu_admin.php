<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
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
        
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Cedric ETU001381 - Midera ETU001377</span></div>
            </div>
        </footer>
    </div>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bs-init.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/theme.js'); ?>"></script>
</body>

</html>