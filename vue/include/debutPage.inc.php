<?php
// debutPage.php
// Début de chaque page
//include_once("donnees/autoload.php");

session_start();

if (isset($_SESSION['mess'])) {    // Message 
    $mess = $_SESSION['mess'];
} else {
    $mess = "";
}
if (isset($pageAuthentification)) {
    session_unset();
} else {
    $pageAuthentification = 0;
}
if (isset($_SESSION['statut'])) {
    $statut = $_SESSION['statut'];
} else {
    $statut = -1;  // non authentifié
}
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>B to Biocoop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/Biocoop/vue/css/normalize.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> 
        <link href="/Biocoop/vue/css/style.css?version=55" rel="stylesheet" type="text/css"/>
        <link href="/Biocoop/vue/css/StyleCalender.css?version=10" rel="stylesheet" type="text/css"/>
    </head>
    <body onclose="<?php ?>">
        <div class="row ">
            <header class="menu" id="menu" name="menu"><!-- shadow p-0 mb-5 bg-header -->
                <div class="inner">
                    <nav class="navbar navbar-expand-lg ">
                        <div class="container-fluid" style="z-index: 10;">
                            <div class="row" style="width: 100%">
                                <div class="row" style="--bs-gutter-x: 0rem;">
                                    <div class="col-xl-11 col-lg-9 col-md-12 col-sm-12 col-12 m-logo">
                                        <div class="row">
                                            <button class="col-1 navbar-toggler" type="button" id="burger" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                                            </button>
                                            <a class="col-auto navbar-brand" href="/Biocoop" style="font-style: italic;">B to Biocoop</a>
                                        </div>
                                        <p class='slog' style="white-space: nowrap; font-style: italic;">Votre espace Pro</p>                   
                                    </div>
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-0 col-0 m-search">
                                        <form class="d-flex">
                                            <input class="form-control me-2" type="search" placeholder="Recherche..." aria-label="Search">
                                            <button class="btn-outline-success" type="submit"><i class="fas fa-search fa-lg" ></i></button>
                                        </form>
                                    </div>
                                </div>

                                <div class="row">
                                    <?php
                                    $div = '<div class="m-link offset-xl-11 offset-lg-10 offset-md-4 offset-sm-2 offset-1">';
                                    if ($statut == 3) {
                                        $div = '<div class="m-link offset-xl-2 offset-lg-0 offset-md-0 offset-sm-1 offset-1">';
                                    } elseif ($statut == 1 || $statut == 2) {
                                        $div = '<div class="m-link offset-xl-7 offset-lg-6 offset-md-4 offset-sm-2 offset-1">';
                                    }
                                    echo $div;
                                    echo '<div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="width: min-content;">';
                                    echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0" >';
                                    //echo $statut;                               
                                    if ($statut != -1) {
                                        echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="../../"><i class="fas fa-home"></i> Accueil</a></li>';
                                        echo '<li class="nav-item"><a class="nav-link" href="/Biocoop/vue/societaire/evaluation.php">EES</a></li>';
                                    }
                                    if ($statut == 3) {
                                        echo '<li class="nav-item"><a class="nav-link" href="/Biocoop/vue/dirigeant/promotion.php" tabindex="-1" aria-disabled="">Promotion</a></li>';
                                    }
                                    if ($statut == 3) {
                                        echo '<li class="nav-item"><a class="nav-link" href="/Biocoop/vue/dirigeant/donation.php">Donation</a></li>';
                                        echo '<li class="nav-item"><a class="nav-link" href="/Biocoop/vue/authentification/devenirAdherent.php">Créer un compte</a></li>';
                                    }
                                    if ($statut === -1) {
                                        echo '<li class="nav-item"><a class="nav-link" href="/Biocoop/vue/authentification/authentification.php">Connexion</a></li>';
                                    } else {
                                        echo '<li class="nav-item"><a class="nav-link" href="/Biocoop/vue/authentification/deconnexion.php">Déconnexion</a></li>';
                                    }
                                    ?>
                                    </ul>                     
                                </div>
                            </div>
                        </div>
                </div>
        </div>
    </nav>
</div>
</header>
</div>
<div class="row" >




