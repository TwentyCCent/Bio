<?php
include ("../include/debutPage.inc.php");

if($statut != 3){
    header('Location:../authentification/authentification.php');
    exit();
}
?>

<div class="container" style="min-height: 600px;padding-top: 40px; ">
<div class="donation">
    <div class="row" style=" margin-left: -30px">
        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-1">
            <h2 class="labelPage">Rapport d'activité annuel</h2>
        </div>
        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 offset-lg-0 offset-md-0 offset-sm-1 offset-1">
            <form name="form" method="POST">
                <!--        <label for='selectAnnee'>Année : </label>-->
                <select class="form-select input-sm border-bottom" name='selectAnnee' id='selectAnnee' style="width: 228px; margin-left: 10px" autofocus><option>Choisissez une année</option>
                    <?php
                    include("../include/getAnneesDons.php")
                    ?>
                </select>
            </form>
        </div>
    </div>

    <section class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-1 rapport"> 

        <table summary="Liste des lots" class='table table-striped table-hover' name="tblLot" id="tblLot" style="background-color: whitesmoke;">
            <caption >Liste des donations par lot</caption> 
            <thead>
                <tr>
                    <th>Identifiant lot</th><th>Désignation</th><th>Quantité produit</th>
                </tr>
            </thead>
            <tbody >
                <?php
                include("../include/getListeDons.php")
                ?>    
            </tbody>
        </table>

    </section>

    <section class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-1 montant">
        <table summary="MontantCumul" class='table table-striped table-hover' name="tblMt" id="tblMt" style="background-color: whitesmoke;">
            <caption >
                Montants cumulés des donations par catégorie de produit
            </caption> 
            <thead>
                <tr>
                    <th>Catégorie produit</th><th>Montant cumulé</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../include/getMtCumul.php")
                ?>
            </tbody>
        </table>
    </section>

    <section class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-1  listAssos">
        <table summary="Liste des Assos" class='table table-striped table-hover' name="tblAsso" id="tblAsso" style="background-color: whitesmoke;">
            <caption >
                Liste des associations caritatives n'ayant pas bénéficié de donation
            </caption> 
            <thead>
                <tr>
                    <th>Nom</th><th>Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../include/getAssociations.php")
                ?>
            </tbody>
        </table>
    </section>


    <script src="/Biocoop/vue/js/jquery.min.js"></script>
    <script src="/Biocoop/vue/js/event.js"></script>

</div>
<?php include ("../include/finPage.inc.php"); ?>
