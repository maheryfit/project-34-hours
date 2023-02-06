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

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <form method="GET" action="controlleur_commun/versdepensemensuel">
                                <button class="btn btn-primary d-block btn-google w-100" type="submit">Aller a la page</button>
                            </form>
                            <br></br>
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/image2.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Login Admin</h4>
                                    </div>
                                    <form class="user" method="GET" action="controlleur_admin_user/testloginadminetredirect">
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter your name (default = rakoto)" name="nomadmin" value="rakoto"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password (default = rakoto)" name="passwordadmin" value="rakoto"></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <!-- <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div> -->
                                            </div>
                                        </div>
                                        <button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
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
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/image3.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Login utilisateur</h4>
                                    </div>
                                    <form class="user" method="GET" action="controlleur_user/testloginuseretredirect">
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter your name" name="nameuser" value="Jean"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="passworduser" value="jean"></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <!-- <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div> -->
                                            </div>
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
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
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Cedric ETU001381 - Midera ETU001377</span></div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bs-init.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/theme.js'); ?>"></script>

    
</body>

</html>