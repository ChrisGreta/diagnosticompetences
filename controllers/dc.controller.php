<?php
    require_once 'models/dc.model.php';

    function displayDC($php_SSID){  
        ob_start();       
        $title = "Diagnostic'Compétences";
        
        if(empty($_SESSION['user_id'])){
            stepRegister();
        }else{
            if(!empty($_GET['session_id'])){
                if($_GET['session_id'] == 'new'){
                    session_regenerate_id();   
                    $session_id = session_id();                                        
                    generateTest($session_id, $_SESSION['user_id']);
                    $_SESSION['current_session'] = $session_id; 
                    header("Location: index.php?page=dc&session_id=".$session_id);
                }
            }
            /*else{
                $session_id = lastSession($_SESSION['user_id']);
                header("Location: index.php?page=dc&session_id=".$session_id);
            }*/
        }        
        
        if(!empty($_POST['ID_reponse'])){
            if(updateSession($_POST['ID_reponse'], $_SESSION['current_session']) == false){
                $erreur = "Veuillez sélectionner une réponse";
            }
        }

        $_SESSION['progress_value'] = getProgress($_SESSION['current_session']);
        $question = loadQuestion($_SESSION['current_session']);
        if(!empty($question)){
            require('views/templates/form/questions.view.php');
        }else{
            if($_SESSION['progress_value']==100){
               updateDateSession($_SESSION['current_session'], false);
               header("Location:index.php?page=result&session_id=$php_SSID");
            }else{
                $erreur = "La session de test est invalide";
                require('views/page-erreur.view.php');
            }
        }

        $content = ob_get_clean();
        require("views/base.view.php");
    }



