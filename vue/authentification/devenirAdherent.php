<?php include ("../include/debutPage.inc.php"); ?>

<div class="container" style="min-height: 600px; ">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 offset-xl-2 offset-lg-2 offset-md-2 offset-sm-2 offset-1 card shadow" style="min-width: 360px; margin-top: 50px; margin-bottom: 30px;">
        <div class="card-header">
            <h2 style="font-size: 1.5rem;">Demande d'ouverture d'un compte sociétaire</h2>
        </div>
        <div class="row" style='padding: 20px; text-align: center'>
            <div class='col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10  offset-xl-1 offset-lg-0 offset-md-2 offset-sm-1 offset-0 saisie' >
<!--                <iframe name="votar" style="display:none;"></iframe>target="votar"-->
                <form method="POST" >
                    <div class="d-flex align-items-center justify-content-center login-container">
                        <div class="row">
                            <div class="form-check col-1" style="margin-left: -45px">
                                <input class="form-check-input" type="radio" name="prefix" value="Mme" class="input-radio-custom" data-validate="{'validate-one-required-by-name':true}"/>
                                <label for="Mme" class="label"><span></span> Mme </label>
                            </div>
                            <div class="form-check col-auto">
                                <input class="form-check-input" type="radio" name="prefix" value="M." class="input-radio-custom" data-validate="{'validate-one-required-by-name':true}" style="margin-left: 20px;"/>
                                <label for="M." class="label" style="margin-left: 10px;"><span></span> M </label>
                            </div>
                        </div>
                    </div>

                    <input class="form-control creation" type="text" id="ztNom" name="ztNom" placeholder="Nom*" required autofocus />

                    <input class="form-control creation" type="text" id="ztPrenom" name="ztPrenom" placeholder="Prénom*" required />

                    <input class="form-control creation" type="text" id="ztMail" name="ztMail" placeholder="Adresse mail*" required />

                    <input class="form-control creation" type="text" id="ztCodeMag" name="ztCodeMag" placeholder="Identifiant du magasin*" required />

                    <input class="form-control creation" type="password" id="ztPassword" name="ztPassword" placeholder="Mot de passe*" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?=(.*[0-9]){2,}).{8,}$" title="8 caractères dont une majuscule, une minuscule, deux chiffre et un caractère spécial" required>
                    <input class="form-control creation" type="password" id="ztConfirmPass" name="ztConfirmPass" placeholder="Confirmez votre mot de passe*" />

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ees" name="ees" title="Souhaite participer aux commisions EES" />
                        <label for="newsLetter"><span style="font-size: 0.8rem; white-space: nowrap;">Souhaite participer aux commisions EES</span></label>
                    </div>
                    <input class="btn btn-primary shadow" type="submit" id="btnValid" name="btnValid" value="Valider la demande" style="margin-left: 135px;margin-top: 15px">  
                </form>
            </div>
            <div class='col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 offset-xl-2 offset-lg-2 offset-md-2 offset-sm-0 offset-0 saisieIMG' style=''>
                <img class="img-responsive"  src="../media/imgNouveauSocietaire.PNG" alt=""/>
            </div>
        </div>
    </div>   
    <?php
//        if (isset($_GET["mess"])) {
//            $mess = $_GET["mess"];
//            echo "<p>$mess</p>";
//        }
    include("../include/creerAdhesion.php")
    ?>



    <?php include ("../include/finPage.inc.php"); ?>