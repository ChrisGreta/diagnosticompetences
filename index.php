<?php

    define('ROOT_PATH', dirname(__FILE__) );
    define('UPLOAD_FOLDER', "/public/uploads" );
    define('PASSWORD_ADMIN', "9%VBV!7zFkbH" );
    require 'controllers/page-erreur.controller.php';



    $lifetime=72*3600;
    session_set_cookie_params($lifetime);
    session_start();
    $_SESSION['env'] = 'dev'; //prod
    

    //update `session_reponses` set `session_ID`="g7t06ajnujsrbp4vrmfctv002q" where `session_ID`=(select `session_ID` from `session_reponses` ORDER BY `session_reponse_ID` DESC limit 0,1);

    
    $_SESSION['progress_value'] = '0';
    if($_SESSION['env'] == 'prod'){
        define('DEBUG', false );
    }else{
        define('DEBUG', true );
    }

    if (isset($_GET['page'])){
        $currentstep = $_GET['page'];  
        switch($_GET['page']){

            case 'home':                
                    require 'controllers/home.controller.php';
                    homeDisplay($currentstep);
                break;   
            /* FORMULAIRE */         
            case 'step0':
                require 'controllers/user.controller.php';
                if(!empty($_POST)){            
                    $res = register();
                    if($res === true){
                        require 'controllers/do.controller.php'; 
                        stepDisplay('step1');
                    }else{
                        stepRegister($res);
                    }
                }else{
                    stepRegister();
                }
                break;               
            case 'step1': 
                session_regenerate_id();
            case 'stepTest':           
                require 'controllers/do.controller.php';    
                stepDisplay($currentstep);
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
                require 'controllers/user.controller.php';                
                login();
                break; 
            case 'register':
                require 'controllers/user.controller.php';                
                stepRegister();
                break;                 
            case 'passwordReminder':
                require 'controllers/user.controller.php';                
                passwordReminder();
                break;                     
            case 'dashboard':
                require 'controllers/user.controller.php';                
                displayDashboard();
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