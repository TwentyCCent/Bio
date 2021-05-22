<?php
// debutPage.php
// Début de chaque page
//include_once("donnees/autoload.php");

//session_start();
//if (isset($_SESSION['mess'])) {    // Message 
//    $mess = $_SESSION['mess'];
//} else {
//    $mess = "";
//}
//if (isset($pageAuthentification)) {
//    session_unset();
//} else {
//    $pageAuthentification = 0;
//}
//if (isset($_SESSION['admin'])) {
//    $admin = $_SESSION['admin'];
//} else {
//    $admin = -1;  // non authentifié
//}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>BIOCOOP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="vue/css/normalize.css" rel="stylesheet" type="text/css"/>
        <link href="../css/normalize.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> 
        <link href="vue/css/style.css?version=7" rel="stylesheet" type="text/css"/>
        <link href="../css/style.css?version=7" rel="stylesheet" type="text/css"/>
    </head>
    <body>      
        <header class='menu'>
            <div class="inner">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="row">
                                <div class="col-8 m-logo">
                                    <div class="row">
                                        <button class="col-2 navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                                        </button>
                                        <a class="col-2 navbar-brand" href="#">BIOCOOP</a>
                                    </div>
                                    <p class='slog' style="white-space: nowrap">La bio qui vous rassemble</p>                   
                                </div>

                                <div class="col-2 offset-1 m-search">
                                    <form class="d-flex">
                                        <input class="form-control me-2" type="search" placeholder="Recherche..." aria-label="Search">
                                        <button class="btn-outline-success" type="submit"><i class="fas fa-search fa-lg" ></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="m-link">
                                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 sm">
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home"></i> Accueil</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Évaluation</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#" tabindex="-1" aria-disabled="">Promotion</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="vue/connect/donation.php">Donation</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="vue/authentification/authentification.php">Se connecter</a>
                                            </li>
                                        </ul>                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <div class="container">

