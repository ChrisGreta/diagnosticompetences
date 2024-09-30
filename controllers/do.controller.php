<?php
    require_once 'models/dc.model.php';

    function displayDC($php_SSID){  
        ob_start();
        $title = "Diagnostic'Compétences";
        if(!empty($_POST['ID_reponse'])){
            if(updateSession($_POST['ID_reponse'], $php_SSID) == false){
                $erreur = "Veuillez sélectionner une réponse";
            }
        } 
        $_SESSION['progress_value'] = getProgress($php_SSID);
        $question = loadQuestion($php_SSID);
        if(!empty($question)){
            require('views/templates/form/questions.view.php');
        }else{
            if($_SESSION['progress_value']==100){
                header('Location:index.php?page=result');
            }else{
                $erreur = "La session de test est invalide";
                require('views/page-erreur.view.php');
            }
        }



        $content = ob_get_clean();
        require("views/base.view.php");
    }



