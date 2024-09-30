<?php
    require_once 'connect.db.php';

    //lecture des données contenues dans la base
    function check_login($email, $password){
        $password = htmlspecialchars($password);
        $sql = "SELECT ID FROM `utilisateur` where `email` ='$email' and `pass`=MD5('$password');";
        $resquery = mysqli_query($GLOBALS["conn"], $sql);
        $DATA = mysqli_fetch_array($resquery, MYSQLI_ASSOC);
        return $DATA;
    }

    //lecture des données contenues dans la base
    function check_email($email){
        $sql = "SELECT ID FROM `utilisateur` where `email` ='$email';";
        $resquery = mysqli_query($GLOBALS["conn"], $sql);
        $DATA = mysqli_fetch_array($resquery, MYSQLI_ASSOC);
        if($DATA==null){
            return false;
        }else{
            return true;
        }
    }

    //Nom de l'utilisateur connecté
    function get_infos($user_id){
        $sql = "SELECT ID,nom,prenom,email FROM `utilisateur` where `id` ='$user_id';";
        $resquery = mysqli_query($GLOBALS["conn"], $sql);
        $DATA = mysqli_fetch_array($resquery, MYSQLI_ASSOC);
        if($DATA==null){
            return false;
        }else{
            return $DATA;
        }
    }    



    function register_user($array_post){
        // Escape user inputs for security
        $first_name = mysqli_real_escape_string($GLOBALS["conn"], $array_post['nom']);
        $last_name = mysqli_real_escape_string($GLOBALS["conn"], $array_post['prenom']);
        $email = mysqli_real_escape_string($GLOBALS["conn"], $array_post['email']);
        $password = mysqli_real_escape_string($GLOBALS["conn"], $array_post['password']);
        //var_dump(check_email($email));
        if(check_email($email) == false){
            if($array_post['password']!=$array_post['confirm_password']){
                return 'Les 2 mots de passes ne sont pas identiques !';
            }else{
                $sql = " INSERT INTO `utilisateur` (`ID`, `nom`,`prenom`, `email`, `pass`) VALUES (NULL,'$first_name', '$last_name', '$email', MD5('$password'));";
                if(mysqli_query($GLOBALS["conn"], $sql)){
                    $last_id = mysqli_insert_id($GLOBALS["conn"]);
                    return $last_id;
                } else{
                    return "Erreur lors de la création " . mysqli_error($link);
                }
            }
        }else{
            $rtn =  "Cet email est déjà utilisé !";
            $rtn .= "<br /><a href='index.php?page=passwordReminder'> 👉 <u>Rappel de mot de passe</u></a>";
            return $rtn;
        }

    }    

    function getDashboard(){
        
    }

    function getSessions($user_id){
        $sql = "SELECT US.utilisateur_id,US.session_id,count(`session_reponse_ID`) as nb_question,  (1-round(count(`session_reponse_ID`)/133,2)) as progress, US.session_debut, US.session_maj 
        FROM `session_reponses` SR INNER JOIN `utilisateur_session` US ON US.session_id = SR.session_ID 
        WHERE US.utilisateur_id = $user_id and SR.reponse_id = 0 GROUP BY SR.`session_ID`
        ORDER BY US.session_maj DESC;";
        $resquery = mysqli_query($GLOBALS["conn"], $sql);
        $DATA = mysqli_fetch_all($resquery, MYSQLI_ASSOC);
        return $DATA;
        
    }
    