<?php
    require_once 'connect.db.php';

    function getListDO(){
        $boardsql = "SELECT * from utilisateur_session;";

        $resquery = mysqli_query($GLOBALS["conn"], $boardsql);
        $boardata = mysqli_fetch_all($resquery, MYSQLI_ASSOC);

        return $boardata;

         //return array( 1 => "DO156415", 2 => "DO564456");
    }


    function getAllResultats($page){

        try {
            $sql = "SELECT `session_reponse_ID`,`question_ID`,`reponse_ID`,R.Libelle_reponse,R.JSON_points_reponse
                    FROM `session_reponses` SR INNER JOIN reponses R ON R.ID_reponse = SR.reponse_ID
                    WHERE `session_ID`='$php_SSID'";             
            $query = mysqli_query($GLOBALS["conn"], $sql);
            $resultats = mysqli_fetch_all($query, MYSQLI_ASSOC);
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            return false;
        }        
        return $resultats;
    }


    function getAllSessions($page = 0){
        $sql = "SELECT US.utilisateur_session_id,US.utilisateur_id,US.session_id, U.nom, count(`session_reponse_ID`) as nb_question,  (round(count(`session_reponse_ID`)/133,2)) as progress, US.session_debut, US.session_maj 
        FROM `session_reponses` SR 
        INNER JOIN `utilisateur_session` US ON US.session_id = SR.session_ID 
        INNER JOIN `utilisateur` U ON U.ID = US.utilisateur_id 
        WHERE SR.reponse_id != 0 ";
        
        $sql .= "GROUP BY SR.`session_ID` 
                 ORDER BY US.session_maj DESC ";
        if($page==0){
            $sql .= " LIMIT 0,20;";
        }else{
            $sql .= " LIMIT $page*20,$page*20+20;";
        }
        $resquery = mysqli_query($GLOBALS["conn"], $sql);
        $DATA = mysqli_fetch_all($resquery, MYSQLI_ASSOC);
        return $DATA;
        
    }


    function delete($php_SSID){
        try {
            $sql_utilisateur_session = "DELETE FROM `utilisateur_session` WHERE `utilisateur_session`.`session_id` = '$php_SSID';";
            $query = mysqli_query($GLOBALS["conn"], $sql_utilisateur_session);       
            
            $sql_session_reponses = "DELETE FROM `session_reponses` WHERE `session_reponses`.`session_ID` = '$php_SSID';";
            $query = mysqli_query($GLOBALS["conn"], $sql_session_reponses);   

            
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            return false;
        }  
        return true;
    }
    