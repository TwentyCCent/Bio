<?php
    /* Chargement des classes nécessaies */

    spl_autoload_register('chargerClasse');
        function chargerClasse($classe) {
            require $classe.".php";
        }

