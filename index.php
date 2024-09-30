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
    
    if (isset($_GET['page'])){

        require 'controllers/user.controller.php';
        $currentstep = $_GET['page'];  
        switch($_GET['page']){

            case 'home':                
                    require 'controllers/home.controller.php';
                    homeDisplay();
                break;   
            /* FORMULAIRE */         
            case 'dc':
                require 'controllers/do.controller.php'; 

                if(empty($_SESSION['user_id'])){
                    stepRegister();
                }else{
                    if(!empty($_GET['session_id'])){
                        if($_GET['session_id'] == 'new'){
                            session_regenerate_id();   
                            $php_SSID = session_id();                     
                            generateTest($php_SSID, $_SESSION['user_id']);
                            header("Location: index.php?page=dc&session_id=".$php_SSID);
                        }
    
                        $php_SSID = session_id();    
                    }else{
                        $php_SSID = lastSession($_SESSION['user_id']);
                        header("Location: index.php?page=dc&session_id=".$php_SSID);
                        
                    }
                    displayDC($php_SSID);
                }


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
        homeDisplay();
    }

?>