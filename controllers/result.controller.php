<?php

    require_once 'models/result.model.php';

    function stepResult($session_id){  
        ob_start();
        $title = "Résultat";
        require('views/result.view.php');
        $content = ob_get_clean();
        require("views/base.view.php");
    }