<?php 
include ("../include/debutPage.inc.php"); 

if($statut == -1){
    header('Location:../authentification/authentification.php');
    exit();
}
?>

<div class="container" style="padding-top: 30px;padding-left: 120px; padding-right: 120px; ">
    <h2 class="labelEvaluation">Fiche de visite EES</h2>
    <div class="eval" style="margin-top: 20px; margin-bottom: 80px;">
        <form class="row g-3">
            <div class="cardEES col-md-12">
                <div class="card shadow" >
                    <div class="card-header">
                        <h5 class="card-title">Engagement sociétaire</h5>
                    </div>
                    <div class='saisie' style='padding: 15px;'>
                        <div class="row">
                            <div class="col-md-9">
                                <label for="nomEES" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nomEES">
                            </div>
                            <div class="col-md-3">
                                <label for="dateVisite" class="form-label">Date de visite</label>
                                <input type="text" class="form-control" id="dateVisite">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="descriptEES" class="form-label">Description</label>
                            <input type="text" class="form-control" id="descriptEES">
                        </div>
                    </div>
                </div>
            </div>
            <div class="cardEES col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title">Organisme de Certification</h5>
                    </div>
                    <div class='saisie' style='padding: 15px;'>
                        <div class="col-12">
                            <label for="entControl" class="form-label">Raison sociale</label>
                            <input type="text" class="form-control" id="entControl" placeholder="">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="adresseEntControl" class="form-label">Addresse</label>
                                <input type="text" class="form-control" id="adresseEntControl" placeholder="">
                            </div>
                            <div class="col-md-2">
                                <label for="cpEntControl" class="form-label">Code Postal</label>
                                <input type="text" class="form-control" id="cpEntControl">
                            </div>
                            <div class="col-md-4">
                                <label for="villeEntControl" class="form-label">Ville</label>
                                <select id="villeEntControl" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cardEES col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title">Magasin</h5>
                    </div>
                    <div class='saisie' style='padding: 15px;'>
                        <div class="row">
                            <div class="col-6">
                                <label for="magControl" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="magControl" placeholder="">
                            </div>
                            <div class="col-6">
                                <label for="magCode" class="form-label">Code du Magasin(6 lettres)</label>
                                <input type="text" class="form-control" id="magCode" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="adresseMagControl" class="form-label">Addresse</label>
                                <input type="text" class="form-control" id="adresseMagControl" placeholder="">
                            </div>
                            <div class="col-md-2">
                                <label for="cpMagControl" class="form-label">Code Postal</label>
                                <input type="text" class="form-control" id="cpMagControl">
                            </div>
                            <div class="col-md-4">
                                <label for="villeMagControl" class="form-label">Ville</label>
                                <select id="villeMagControl" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="magMail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="magMail">
                        </div>
                    </div>
                </div>
            </div>
            <div class="cardEES col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title">Commentaires</h5>
                    </div>
                    <div class='saisie' style='padding: 15px;'>
                        <div class="col-12">
                            <label for="controlCommentaire" class="form-label">Commentaire de l'organisme de certification</label>
                            <textarea class="form-control" id="controlCommentaire" style="height:120px;"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="magasinCommentaire" class="form-label">Commentaire du magasin sur la mise en oeuvre d'actions correctives</label>
                            <textarea type="text" class="form-control" id="magasinCommentaire" style="height:120px;" ></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 offset-1 offset-md-4">
                <button type="submit" class="btn btn-primary shadow" style='width: 200px; margin-top: 15px;'>Annuler</button>
            </div>
            <div class="col-md-1 offset-1">
                <button type="submit" class="btn btn-primary shadow" style='width: 200px; margin-top: 15px;'>Enregistrer</button>
            </div>
        </form>
    </div>

    <?php include ("../include/finPage.inc.php"); ?>

