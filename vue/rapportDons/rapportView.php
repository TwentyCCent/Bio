<?php
include ("../include/debutPage.inc.php");
require '../../controleur/DonControleur.php';
require '../../controleur/AssociationControleur.php';
//require '../../controleur/MontantCumulControleur.php';
$cnx = new GestionnaireBDD();
?>

<section class="rapport">
    <form method='post'>
        <table summary="Liste des lots" class='table table-bordered table-striped table-condensed table-responsive'>
            <caption style="caption-side: top; font-size: 1.5em;">
                <label for='listYear'>Rapport d'activité des dons pour l'année : </label>
                
                <script>
                    function yo(index){
                        annee = document.getElementById(index).options[document.getElementById(index).selectedIndex].text;
                        $.ajax({
                            type:   'POST',
                            url:    '../../controleur/DonControleur.php',
                            data:   {option: selectedValue},
                            sucess: function(){
                                //load()
                            }
                        });
                        return (annee);
                    };
                </script>
                
                <select name='listYear' id='listYear' onchange=""><option>2020</option>
                    <?php
                    $lesAnnees = $cnx->readDonsAnnees();
                    foreach ($lesAnnees as $anneeDon) {
                        if ($anneeDon != max($lesAnnees)) {
                            echo "<option value=$anneeDon>$anneeDon</option>";
                        }
                        echo "<option value=$anneeDon selected>$anneeDon</option>";
                    }
                    ?>
                </select>
                </form>
            </caption> 
            <thead>
                <tr>
                    <th>Identifiant lot</th><th>Désignation</th><th>Quantité produit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $donCtrl = new DonControleur();
                $lesDons = $donCtrl->getDons(2021);
                //$lesDons = $donCtrl->getDons();
                $unDon = $lesDons->fetch();
                while ($unDon) {
                    $id = $unDon["id"];
                    $designation = $unDon["designation"];
                    $qte = $unDon["nbrProduits"];
                    echo "<tr><td>$id</td><td>$designation</td><td>$qte</td>";
                    $unDon = $lesDons->fetch();
                }
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
            $assoCtrl = new AssociationControleur();
            $lesAssos = $assoCtrl->getAssos();
            $uneAsso = $lesAssos->fetch();
            while ($uneAsso) {
                $nom = $uneAsso["nom"];
                $adresse = $uneAsso["adresse"];
                echo "<tr><td>$nom</td><td>$adresse</td>";
                $uneAsso = $lesAssos->fetch();
            }
            ?>
        </tbody>
    </table>
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
//            $MtCumulCtrl = new MontantCumulControleur();
//            $lesMontants = $MtCumulCtrl->getMtCumul();

            $lesMontants = $cnx->readMtCumul();
            $unMt = $lesMontants->fetch();
            while ($unMt) {
                $lib = $unMt["libelle"];
                $Mt = $unMt["montant"];
                echo "<tr><td>$lib</td><td>$Mt €</td>";
                $unMt = $lesMontants->fetch();
            }
            ?>
        </tbody>
    </table>
</section>
<?php include ("../include/finPage.inc.php"); ?>
