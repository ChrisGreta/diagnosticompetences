<?php

    define('ROOT_PATH', dirname(__FILE__) );
    define('UPLOAD_FOLDER', "/public/uploads" );
    define('PASSWORD_ADMIN', "9%VBV!7zFkbH" );
    require 'controllers/page-erreur.controller.php';

    $lifetime=72*3600;
    session_set_cookie_params($lifetime);
    session_start();
    $_SESSION['env'] = 'dev'; //prod
    $_SESSION['progress_value'] = '0';
    if($_SESSION['env'] == 'prod'){
        define('DEBUG', false );
    }else{
        define('DEBUG', true );
    }
    
    require 'controllers/dc.controller.php'; 
    $session_id = session_id();

    
    if(empty($_SESSION['user_id'])){
        $_SESSION['user_id']=null;
    }

    $_SESSION['current_session'] = $session_id;
    if(!empty($_GET['session_id'])){
        $_SESSION['current_session'] = $_GET['session_id'];
    }
    if (isset($_GET['page'])){
        require 'controllers/user.controller.php';
        $currentstep = $_GET['page'];  
        switch($_GET['page']){
            case 'home':                   
                    require 'controllers/home.controller.php';
                    homeDisplay($session_id);
                break;   
            /* FORMULAIRE */         
            case 'dc':
                displayDC($_SESSION['current_session']);
                break;
            case 'result':
                if(!empty($_GET['session_id'])){
                    $session_id = $_GET['session_id'];
                    require 'controllers/result.controller.php';    
                    stepResult($session_id);
                }
                break;
            /* USER Action */
            case 'login':
                login();
                break; 
            case 'logout':
                logout();
                break;                 
            case 'register':
                stepRegister();
                break;                 
            case 'passwordReminder':
                passwordReminder();
                break;                     
            case 'dashboard':
                if(empty($_SESSION['user_id'])){
                    login();
                }else{
                    displayDashboard();
                }                
                break;    
            case 'profil':
                displayProfil();
                break; 
            case 'admin':
                require 'controllers/admin.controller.php';                
                adminDisplay();
                break;                                     

        }
    }else{
        require 'controllers/home.controller.php';
        homeDisplay(session_id());
    }

?>