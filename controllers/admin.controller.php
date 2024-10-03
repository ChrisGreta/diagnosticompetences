<?php
    require "models/admin.model.php";
    require_once "models/dc.model.php";

    function infoAlerts($message, $type){

        switch ($type) {
            case 'error':
                $rtn = '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">'.$message.'</span></div>';
                break;

            case 'success':
            default:
                $rtn = '<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">'.$message.'</span></div>';
                break;
        }
        return $rtn;
    }

    
    function adminDisplay(){


        if(!empty($_GET['deletedc'])){
            if(delete($_GET['deletedc']) == true){
                $message_delete = "Diagnotic'compétences supprimé avec succès";
            }else{
                $message_delete = "Erreur lors de la suppression";
            }
        }
        $title = "Administration";
        require 'views/header.view.php';
        
        if($_SESSION['user_id'] == 1){
            $dcs = getAllSessions();
            require 'views/admin.view.php';
        }else{
            require 'views/templates/user/login.view.php';
        }     
        require 'views/footer.view.php';
    }


    
    function singleDoDisplay(){
        $DATA = read($_GET['doid']);
        echo "<div class=''>";
        require 'views/header.view.php';
        echo "<div class='bg-slate-100 my-12 mx-auto max-w-screen-xl'>
            <h3 class='text-center text-2xl font-medium'>Fiche Dommage Ouvrage n° ".$DATA['DOID']."</h3>";
        require 'views/templates/fiche/s01-coordonnees.view.php';
        require 'views/templates/fiche/s02-maitre-ouvrage.view.php';
        require 'views/templates/fiche/s03-oper-construct.view.php';
        require 'views/templates/fiche/s04-informations-diverses.view.php';
        require 'views/templates/fiche/s04-bis-travaux-annexes.view.php';
        require 'views/templates/fiche/s05-maitrise-oeuvre.view.php';
        require 'views/footer.view.php';
        echo "</div>
        </div>";
    }


    function editDo($doid){
        $_SESSION = read($doid);
        print_r($_SESSION);
        //header("Location: index.php?page=step1&doid=".$_GET['doid']);
    }