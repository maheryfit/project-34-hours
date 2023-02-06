<?php
    if (! defined ('BASEPATH')) exit ('No direct script access allowed');
    $this->load->helper('url');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome-all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome5-overrides.min.css'); ?>">
</head>

<body class="page-top">
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
            
            <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/image3.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Creation Categorie</h4>
                                    </div>
                                    <form class="user" method="GET" action="testcreactioncategorie">
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter the categorie" name="categorie"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputPassword" placeholder="Budget mensuel" name="budget"></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <!-- <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div> -->
                                            </div>
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Inserer</button>
                                        <!-- <hr><a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i class="fab fa-google"></i>&nbsp; Login with Google</a><a class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i class="fab fa-facebook-f"></i>&nbsp; Login with Facebook</a> -->
                                        <hr>
                                    </form>
                                    <!-- <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div> -->
                                    <!-- <div class="text-center"><a class="small" href="register.html">Create an Account!</a></div> -->
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
        </div>
    </div>
    </div>
    
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bs-init.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/theme.js'); ?>"></script>

    
</body>

</html>