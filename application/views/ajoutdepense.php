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
                    <li class="nav-item"><a class="nav-link active" href="<?php echo base_url('controlleur_user/versajout'); ?>"><i class="fas fa-tachometer-alt"></i><span>Ajout de depense</span></a></li>
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Depense</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Ajout Depense</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <form class="user" method="GET" action="testajoutdepense">
                                        <div class="mb-3"><input class="form-control form-control-user" type="date" id="exampleInputPassword" name="daty"></div>
                                        
                                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                            <label class="form-label">Categorie&nbsp;
                                                <select name = "type" class="d-inline-block form-select form-select-sm">
                                                    <?php 
                                                            
                                                        for ($i=0; $i < sizeof($data); $i++) 
                                                        { ?>
                                                        <option value="<?php echo $data[$i]['id_categorie']; ?>" selected="">
                                                            <?php echo $data[$i]['nom']; ?>
                                                        </option>

                                                    <?php 
                                                        }  
                                                    ?>
                                                </select>

                                        </div>  
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputPassword" placeholder="Montant" name="montant"></div>
                                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                                <label class="form-label">Beneficiaire&nbsp;
                                                    <select name = "idbenef" class="d-inline-block form-select form-select-sm">
                                                        <?php 
                                                            for ($i=0; $i < sizeof($databenef); $i++) 
                                                            { ?>
                                                            <option value="<?php echo $databenef[$i]['id_beneficiaire']; ?>" selected="">
                                                                <?php echo $databenef[$i]['nom']; ?>
                                                            </option>

                                                        <?php 
                                                            }  
                                                        ?>
                                                    </select>

                                            </div>
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