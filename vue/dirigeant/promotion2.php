<?php include ("../include/debutPage.inc.php"); ?>

<div class="promotion">
    <div class="row">
        <div class="col-3 sidebar" style="width: 280px;">
            <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
                <p class="d-flex align-items-center pb-1 mb-1 link-dark text-decoration-none">
                    <svg class="bi me-2" width="30" height="24"></svg>
                    <span class="fs-5 fw-semibold">PROMOTION</span>
                </p>

                <div class="row d-flex pb-3 mb-3 text-decoration-none border-bottom">
                    <div class="row">
                        <input class="col-1 form-control" type="text" id="MonthYear" name="MonthYear" value="mm/yyyy" style="margin-left: 50px; width:125px; text-align: center" readonly autofocus/>
                        <i class="col-1 far fa-calendar-check fa-lg" name="calicon" name="calicon" id="calicon" onclick="showCalendarControl('MonthYear');" style="margin-left: 2px; margin-top: 14px;"></i>
                    </div>
                </div>
                <ul id="promo" class="liste list-unstyled ps-0">
                    <li class="mb-1"> <!-- mb-1 -->
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

<!--                    <script>
                        plus.onclick = function () {
                            ajouterPromo();
                        };

                        function ajouterPromo() {
                            //attribut de la méthode
                            promoText = "ClickMe";
                            productList = ['Electronics Watch', 'House wear Items', 'Kids wear', 'Women Fashion'];
                            var ref = "categorie-collapse";

                            //création élément liste container
                            var listeGr = document.createElement('li');
                            listeGr.setAttribute('class', 'mb-4');

                            //création button représentant la promotion
                            var _button = document.createElement("button");
                            _button.setAttribute("class", "btn btn-toggle align-items-center rounded collapsed");
                            _button.setAttribute("data-bs-toggle", "collapse");
                            _button.setAttribute("data-bs-target", "#" + ref);
                            _button.setAttribute("aria-expanded", false);
                            _button.focus();

                            _button.data = "hi";
                            _button.innerHTML = promoText;
                            listeGr.append(_button);

                            //function sur le bouton
                            _button.onclick = function ()
                            {
                                //alert("hello, world");
                            };



                            //création div collapse liste
                            var newDiv = document.createElement("div");
                            newDiv.setAttribute("class", "collapse show");
                            newDiv.setAttribute("id", ref);

                            //création liste catégorie produit
                            var liste = document.createElement("ul");
                            liste.setAttribute('class', 'btn-toggle-nav list-unstyled fw-normal pb-1 small');
                            liste.setAttribute('id', 'categList');

                            // Ajout de la liste dans la div
                            newDiv.appendChild(liste);

                            //Remplissage de liste
                            for (let i = 0; i < productList.length; i++) {
                                var li = document.createElement('li');
                                var a = document.createElement('a');
                                a.setAttribute('class', 'link-dark rounded');
                                //attribut href à préciser pour trier les ligne de promotion par catégorie de produit
                                a.setAttribute('href', '#');
                                li.append(a);
                                liste.appendChild(li);
                                a.innerHTML = productList[i];
                            }
                            ;

                            listeGr.append(newDiv);
                            promo.append(listeGr);
                        }


                    </script>-->


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
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-9 contentPromo" style="margin-left: 30px;">
            <div class="row">
                <div class="col-sm-12" style="margin-bottom: 15px;">
                    <div class="card" style="background-color: #e9ecef">
                        <form name="form" method="POST">
                            <div class="row" style="margin: 6px;">
                                <div class="col-auto">
                                    <label for="listCateg" class="form-label">Trier par catégorie :</label>
                                </div>
                                <div class="col-auto">
                                    <select class="form-select input-sm border-bottom" name='listCateg' id='listCateg' style="width: 170px;margin-right: 10px;"><option selected>Alimentation</option></select>
                                </div>
                                <div class="col-auto">
                                    <label for="listReduc" class="form-label">Pourcentage de réduction minimum :</label>
                                </div>
                                <div class="col-auto">
                                    <select class="form-select input-sm border-bottom" name='listReduc' id='listReduc' style="width: 100px;"><option selected>20%</option></select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="cardPromo col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Coup de coeur de Mai 2020</h5>
                        </div>    
                        <div class="card-content">
                            <p class="card-text" style="font-size: 1.1em; margin-bottom: 5px;">Beurre 250gr - Réf. : 485963</p>
                            <p class="card-text" style="margin-bottom: 0px; ">1.60€<span style="margin-left: 20px; color: red;"><strike>2.00€ </strike></span></p>
                            <p class="card-text" style="font-size: 0.90em; margin-bottom: 5px; margin-left: 20px;">Soit 20% de réduction</p>
                            <p class="card-text" style="font-size: 0.8em; margin-bottom: 5px;">Valable du 15/05/2020 au 30/05/2020</p>
                            <div class="row g-2" style="margin-bottom: 8px;">
                                <div class="col-auto">
                                    <input class="form-control" type="number" style="width: 100px; height: 38px; margin-right: 15px; margin-top: 0px"/>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-primary" >Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cardPromo col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Coup de coeur de Mai 2020</h5>
                        </div>    
                        <div class="card-content">
                            <p class="card-text" style="font-size: 1.1em; margin-bottom: 5px;">Beurre 250gr - Réf. : 485963</p>
                            <p class="card-text" style="margin-bottom: 0px; ">1.60€<span style="margin-left: 20px; color: red;"><strike>2.00€ </strike></span></p>
                            <p class="card-text" style="font-size: 0.90em; margin-bottom: 5px; margin-left: 20px;">Soit 20% de réduction</p>
                            <p class="card-text" style="font-size: 0.8em; margin-bottom: 5px;">Valable du 15/05/2020 au 30/05/2020</p>
                            <div class="row g-2" style="margin-bottom: 8px;">
                                <div class="col-auto">
                                    <input class="form-control" type="number" style="width: 100px; height: 38px; margin-right: 15px; margin-top: 0px"/>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-primary" >Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cardPromo col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Coup de coeur de Mai 2020</h5>
                        </div>    
                        <div class="card-content">
                            <p class="card-text" style="font-size: 1.1em; margin-bottom: 5px;">Beurre 250gr - Réf. : 485963</p>
                            <p class="card-text" style="margin-bottom: 0px; ">1.60€<span style="margin-left: 20px; color: red;"><strike>2.00€ </strike></span></p>
                            <p class="card-text" style="font-size: 0.90em; margin-bottom: 5px; margin-left: 20px;">Soit 20% de réduction</p>
                            <p class="card-text" style="font-size: 0.8em; margin-bottom: 5px;">Valable du 15/05/2020 au 30/05/2020</p>
                            <div class="row g-2" style="margin-bottom: 8px;">
                                <div class="col-auto">
                                    <input class="form-control" type="number" style="width: 100px; height: 38px; margin-right: 15px; margin-top: 0px"/>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-primary" >Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script src="../js/jquery.min.js"></script>-->
<?php include ("../include/finPage.inc.php"); ?>