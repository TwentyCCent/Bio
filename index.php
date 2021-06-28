

<?php include ("vue/include/debutPage.inc.php"); ?>
<div class="container" style="min-height: 600px;padding-top: 170px; padding-bottom: 50px; ">
    <?php
    //echo $mess;
    ?>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 offset-xl-2 offset-lg-1 offset-md-1 offset-sm-1 offset-0" style="background-color: #10706C;width: 500px;padding-top: 15px;">
            <h3>Lorem Ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 offset-xl-0 offset-lg-1 offset-md-1 offset-sm-1 offset-0 containerCarroussel" style="width: 500px; z-index: 2; padding-left: 0px; --bs-gutter-x: 0rem;">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" >
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" style="">
                    <div class="carousel-item active" style="">
                        <img src="vue/media/Poulehouse-debarque650x366.jpg" class="img-responsive d-block w-100" alt=""/>
                    </div>
                    <div class="carousel-item" style=";">
                        <img src="vue/media/Pub_poulehouse650x366.png" class="img-responsive d-block w-100" alt=""/>
                    </div>
                    <div class="carousel-item" style="">
                        <img src="vue/media/poulehouse-4-650x366.jpg" class="img-responsive d-block w-100" alt=""/>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <?php include ("vue/include/finPage.inc.php"); ?>
