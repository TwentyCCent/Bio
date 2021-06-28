<?php include ("../include/debutPage.inc.php"); ?>
<?php 

if($statut != 3){
    header('Location:../authentification/authentification.php');
    exit();
}
?>

<div class="container" style="min-height: 600px;">
    <div class="row" style="min-height: 100%">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 sidebar" style='padding-right: 0px;'>
            <div class="flex-shrink-0 p-3" style="background-color: #c7d5c6; min-height: 100%; ">
                <p class="d-flex align-items-center pb-1 mb-1 link-dark text-decoration-none">
                    <svg class="bi me-2" width="30" height="24"></svg>
                    <span class="fs-4 fw-semibold">PROMOTION</span>
                </p>
                <div class="row d-flex pb-3 mb-3 text-decoration-none border-bottom ">

                    <div class="input-group mb-3 monthPicker">
                        <input type="text" class="form-control MonthYear" id="MonthYear" name="MonthYear" placeholder="<?php echo date('m/Y');?>" aria-label="mm/yyyy" aria-describedby="basic-addon2" readonly>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><i class="col-1 far fa-calendar-check fa-lg" name="calicon" name="calicon" id="calicon" onclick="showCalendarControl('MonthYear');" style="padding-bottom: 2px; margin-top: 3px;"></i></span>
                        </div>
                    </div>
                            <!--                        <input class="col-1 form-control" type="text" id="MonthYear" name="MonthYear" value="mm/yyyy" style="margin-left: 50px; width:125px; text-align: center" readonly autofocus/>
                                                    <i class="col-1 far fa-calendar-check fa-lg" name="calicon" name="calicon" id="calicon" onclick="showCalendarControl('MonthYear');" style="margin-left: 2px; margin-top: 14px;"></i>-->
                </div>

                <ul id="promo" name="promo" class="listePromo list-unstyled ps-0">
                    <!--<li class="mb-1">
                        <button id="boutonPromo" class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                            Coup de coeur de Mai 2020
                        </button>
                        <div class="collapse show" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-dark rounded">Alimentation</a></li>
                                <li><a href="#" class="link-dark rounded">Produit ménager</a></li>
                                <li><a href="#" class="link-dark rounded">Bricolage</a></li>
                                <li><a href="#" class="link-dark rounded">Vêtement</a></li>
                                <li><a href="#" class="link-dark rounded">Jouet</a></li>
                                <li><a href="#" class="link-dark rounded">Alcool</a></li>
                            </ul>
                        </div>
                    </li>
        
                    <li class="mb-2">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                            Nouveauté Mai 2020
                        </button>
                        <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-dark rounded">Alimentation</a></li>
                                <li><a href="#" class="link-dark rounded">Produit ménager</a></li>
                                <li><a href="#" class="link-dark rounded">Bricolage</a></li>
                                <li><a href="#" class="link-dark rounded">Vêtement</a></li>
                                <li><a href="#" class="link-dark rounded">Jouet</a></li>
                                <li><a href="#" class="link-dark rounded">Alcool</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-3">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                            En Mai fait ce qu'il te plaît
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-dark rounded">Alimentation</a></li>
                                <li><a href="#" class="link-dark rounded">Produit ménager</a></li>
                                <li><a href="#" class="link-dark rounded">Bricolage</a></li>
                                <li><a href="#" class="link-dark rounded">Vêtement</a></li>
                                <li><a href="#" class="link-dark rounded">Jouet</a></li>
                                <li><a href="#" class="link-dark rounded">Alcool</a></li>
                            </ul>
                        </div>
                    </li>-->
                </ul>
            </div>
        </div>

        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 contentPromo">
            <div class="row">
                <div class="col-12" style="margin-bottom: 20px;background-color: #ACC8E5;width: 100%; line-height: 200%">
                    <form name="form" method="POST">
                        <div class="row">
                            <!--                        <div class="col-auto">
                                                        <label for="listCateg" class="form-label tri">Trier par catégorie :</label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <select class="form-select input-sm border-bottom tri" name='listCateg' id='listCateg' style="width: 170px;"><option selected>Alimentation</option></select>
                                                    </div>-->
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7 col-7 offset-xl-6 offset-lg-3 offset-md-2 offset-sm-1 offset-1">
                                <label for="listReduc" class="form-label tri" style="white-space: nowrap; padding-left: 20px;">Recherche par pourcentage minimum :</label>
                            </div>
                            <div class="col-auto">
                                <select class="form-select input-sm border-bottom tri" name='listReduc' id='listReduc' style="width: 87px; height: 32px; margin-bottom: 8px;">
                                    <option selected>0%</option>
                                    <option>10%</option>
                                    <option>20%</option>
                                    <option>30%</option>
                                    <option>40%</option>
                                    <option>50%</option>
                                    <option>60%</option>
                                    <option>70%</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h3 id="titlePromo" name="titlePromo" style="font-size: 150%; margin-left: 30px;"></h3>
            <br/>
            <table class="table table-striped table-hover" id="tblPromo" name="tblPromo" style="margin-left: 45px; margin-right: 30px; width: 90%;background-color: whitesmoke;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produit</th>
                        <th scope="col">Validité</th>
                        <th scope="col">Prix Promo*</th>
                        <th scope="col">Prix de Base*</th>
                        <th scope="col">Réduction</th>
                        <th scope="col">Panier</th>
                    </tr>
                </thead>
                <tbody>
                    <!--<tr>
                        <th scope="row">1</th>
                        <td>Carottes</td>
                        <td>03/03/2020</td>
                        <td>03/03/2020</td>
                        <td>1.80</td>
                        <td>2.00</td>
                        <td>10%</td>
                        <td><input type="checkbox" class="custom-control-input" id=""></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>La p'tite Binouz</td>
                        <td>03/03/2020</td>
                        <td>03/03/2020</td>
                        <td>1.80</td>
                        <td>2.00</td>
                        <td>10%</td>
                        <td><input type="checkbox" class="custom-control-input" id=""></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Merguez pack x6</td>
                        <td>03/03/2020</td>
                        <td>03/03/2020</td>
                        <td>1.80</td>
                        <td>2.00</td>
                        <td>10%</td>
                        <td><input type="checkbox" class="custom-control-input" id="customControlInline"></td>
                    </tr>-->
                </tbody>
            </table>
            <div class="row">
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-4 col-4">
                    <p class="comment" style="white-space: nowrap">* Prix H.T. en euros </p>
                </div>
                <div class="col-auto offset-xl-8 offset-lg-7 offset-md-6 offset-sm-4 offset-2">
                    <button type="submit" class="btn btn-primary" style='width: 172px; margin-bottom: 30px;'>Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <?php include ("../include/finPage.inc.php"); ?>
