<?php
include ("../include/debutPage.inc.php");
?>


    <section class="rapport"> 
        <form name="form" method="GET" action="">
        <table summary="Liste des lots" class='table table-bordered table-striped table-condensed table-responsive'>
            <caption style="caption-side: top; font-size: 1.5em;">
                <label for='selectAnnee'>Rapport d'activité des dons pour l'année : </label>
                <select name='selectAnnee' id='selectAnnee'>
                    <?php
                    include("../include/getAnneesDons.php")
                    ?>
                </select>
                <button type="submit" name="validAnnee" >Valider</button>
            </caption> 
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
        </form>
    </section>

    <section class="montant">
        <table summary="MontantCumul" class='table table-bordered table-striped table-condensed table-responsive'>
            <caption style="caption-side: top; font-size: 1.5em;">
                Liste des montants cumulés de la valeur des marchandises données
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
