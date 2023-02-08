<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Takalo</title>
    <link rel="shortcut icon" href="<?php echo site_url('assets/Takalo-logo/vector/default.svg'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/font.css'); ?> ">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/color.css'); ?> ">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/page.css'); ?> ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" style="width: 10rem;" href="#">
                <img src="<?php echo site_url('assets/Takalo-logo/default.png'); ?>" alt="Picture not found" width="40%">
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3">
                <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link text-uppercase" href="<?= site_url("controlleur_user/vers_gestion_categorie");?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-uppercase" href="<?= site_url("controlleur_user/vers_stat_nb_echange");?>">Suivi d'echange</a></li>
                    <li class="nav-item"><a class="nav-link text-uppercase" href="<?= site_url("controlleur_user/vers_stat_nb_utilisateur");?>">Suivi d'utilisateur</a></li>
                    <li class="nav-item"><a class="nav-link text-uppercase" href="<?= site_url("controlleur_user/vers_stat_nb_utilisateur");?>">Suivi d'utilisateur</a></li>
                </ul>
                <a class="btn ms-md-2" id="discard" role="button" href="<?= site_url("controlleur_user/deconnexion");?>">Déconnexion</a>
            </div>
        </div>
    </nav>