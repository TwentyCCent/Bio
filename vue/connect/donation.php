<?php
include ("../include/debutPage.inc.php");
?>

<div class="row">
    <h2 class="col-4">Rapport d'activité annuel</h2>
    <form name="form" method="GET">
        <label for='selectAnnee'>Année : </label>
        <select class="col-1" name='selectAnnee' id='selectAnnee' style="width: min-content;">
            <?php
            include("../include/getAnneesDons.php")
            ?>
        </select>
        <button  class="col-1 " type="submit" name="validAnnee" style="width: min-content;">Valider</button>
    </form>
</div>

<section class="rapport"> 

    <table summary="Liste des lots" class='table table-bordered table-striped table-condensed table-responsive'>
        <caption style="caption-side: top; font-size: 1.5em;">Liste des lots pour l'année</caption> 
        <thead>
            <tr>
                <th>Identifiant lot</th><th>Désignation</th><th>Quantité produit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("../include/getListeDons.php")
            ?>    
        </tbody>
    </table>

</section>

<section class="montant">
    <table summary="MontantCumul" class='table table-bordered table-striped table-condensed table-responsive'>
        <caption style="caption-side: top; font-size: 1.5em;">
            Valeur des marchandises des donations
        </caption> 
        <thead>
            <tr>
                <th>Libellé</th><th>Montant cumulé</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("../include/getMtCumul.php")
            ?>
        </tbody>
    </table>
</section>

<section class="listAssos">
    <table summary="Liste des Assos" class='table table-bordered table-striped table-condensed table-responsive'>
        <caption style="caption-side: top; font-size: 1.5em;">
            Liste des associations caricatives
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


<script src="../js/jquery.min.js"></script>
<script src="../js/event.js"></script>
</form>

<?php include ("../include/finPage.inc.php"); ?>
