<?php include ("../include/debutPage.inc.php"); ?>

<div class="container" style="min-height: 600px;padding-top: 35px; ">
    <h2 class="col-xl-2 col-lg-4 col-md-4 col-sm-12 col-10 offset-xl-4 offset-lg-3 offset-md-3 offset-sm-2 offset-1" style="margin-bottom: 25px;">Authentification</h2>
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8 col-10 offset-xl-4 offset-lg-3 offset-md-3 offset-sm-2 offset-1 " name="auth" >
            <div class="card shadow" style=' height: 290px; margin-bottom: 20px;'>
                <div class="card-header">
                    <h2 style="font-size: 1.5rem;">Je me connecte</h2>
                </div>
                <div class='saisie' style='text-align: center; margin-top: 15px;'>
                    <div class="col-10 offset-1">
                        <form method="POST">
                            <input type="email" class="form-control cnx"  id="ztMail" name="ztMail" placeholder="Votre adresse mail*">
                            <input class="form-control cnx" type="password" id="ztPassword" name="ztPassword" placeholder="Votre mot de passe*">
                            <p><a href="recupPassword.php" style="font-size: 0.7rem">Vous avez oublié votre mot de passe?</a></p>
                            <input class="btn btn-primary" type="submit" name="btnValider" value="Connexion">  
                        </form> 
                    </div>
                </div>
            </div>
        </div>


<!--        <div class="col-xl-auto col-lg-auto col-md-8 col-sm-12 col-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-2 offset-2" name="adhesion">
            <div class="card" style='width: 320px; height: 310px;'>
                <div class="card-header">
                    <h2 style="font-size: 1.5rem;">Un nouveau sociétaire?</h2>
                </div>

            <div class='saisie' style='padding: 15px;'>
                <div>
                    <img src="../media/biocoop-business-53576_1000x533.jpg" class="rounded mx-auto d-block" alt="" style="width: 280px; height: 150px; margin-bottom: 10px;">
                    <input class="btn btn-primary" type="submit" value="Créer un compte" onclick="location.href = 'devenirAdherent.php'">
                </div>
            </div>
        </div>-->
    </div>
</div>

<?php
include("../include/validAuth.php")
?>


<?php include ("../include/finPage.inc.php"); ?>