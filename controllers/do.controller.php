<?php
    require_once 'models/do.model.php';
    
    function stepDisplay($currentstep){  

        $php_SSID = session_id();
        $erreur = null;
        // Remplissage de la variable $content
        ob_start();
        switch ($currentstep) {   
            case 'step1':
                $title = "Nouvelle session";
                generateTest($php_SSID);
            case 'stepTest':
                if(!empty($_POST['ID_reponse'])){
                    if(updateSession($_POST['ID_reponse'], $php_SSID) == false){
                        $erreur = "Veuillez sélectionner une réponse";
                    }
                } 
                $_SESSION['progress_value'] = getProgress($php_SSID);
                $title = "Questions";
                $question = loadQuestion($php_SSID);
                if(!empty($question)){
                    require('views/templates/form/s1-questions.view.php');
                }else{
                    if($_SESSION['progress_value']==100){
                        header('Location:index.php?page=result');
                    }else{
                        $erreur = "La session de test est invalide";
                        require('views/page-erreur.view.php');
                    }
                }

                break;     
            case 'step3':
                $title = "Formulaire DO-03";
                require('views/templates/form/s3-oper-construct.view.php');
                break;                                       
            default:
                # code...
                break;
        } 
        $content = ob_get_clean();
        require("views/base.view.php");
    }



