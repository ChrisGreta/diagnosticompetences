<?php
    require_once 'models/user.model.php';

    function homeDisplay(){

        // Titre personnalisé
        $title = "Diagnosti'Compétences Accueil";

        // Remplissage de la variable $content
        ob_start();

        require('views/home.view.php');

        $content = ob_get_clean();
        require("views/base.view.php");
    }

