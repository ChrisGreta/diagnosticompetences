<?php

require_once 'models/user.model.php';


function login(){  
    ob_start();
    $title = "Login";
    $check = null;
    if(!empty($_POST)){
        //var_dump($_POST);
        $check = check_login($_POST['email'], $_POST['password']);

        if($check == null){
            $erreur = "Login/Mot de passe incorrect";
        }
    }

    if($check == null){
        require('views/templates/user/login.view.php');
    }else{        
        $_SESSION['user_id'] = $check['ID'];
        header("Location: index.php?page=dashboard");        
    }


    $content = ob_get_clean();
    require("views/base.view.php");
}

function register(){ 
    
    return register_user($_POST);
}

function passwordReminder($message =""){
    $php_SSID = session_id();
    $erreur = null;
    ob_start();
    $title = "Création de compte";
    require('views/templates/user/password-reminder.view.php'); 
    $content = ob_get_clean();
    require("views/base.view.php");              
}

function stepRegister($message =""){
    $php_SSID = session_id();
    $erreur = null;
    ob_start();
    $title = "Création de compte";
    require('views/templates/user/register.view.php'); 
    $content = ob_get_clean();
    require("views/base.view.php");              
}

function displayDashboard(){  
    ob_start();
    $title = "Dashboard";
    var_dump($_SESSION['user_id']);
    $sessions = getSessions($_SESSION['user_id']);
    require('views/templates/user/dashboard.view.php');

    $content = ob_get_clean();
    require("views/base.view.php");
}