<?php
    require_once 'connect.db.php';

    //lecture des données contenues dans la base
    function read($doid){
        $sql = "SELECT * FROM XXXX
                WHERE dommage_ouvrage.DOID = $doid;";
        $resquery = mysqli_query($GLOBALS["conn"], $sql);
        $DATA = mysqli_fetch_array($resquery, MYSQLI_ASSOC);
        return $DATA;
    }
    
    //mise à jour de la base à partir de la deuxième étape
    function updateSession($ID_reponse,$php_SSID) {
        try {

            $current_question = lastQuestion($php_SSID);
            $sql = 'SELECT JSON_points_reponse  FROM `questions` INNER JOIN `reponses` ON `ID_question`=`ID_Question_reponse` WHERE `ID_question`='.$current_question.' AND ID_reponse='.$ID_reponse.' ;';
            $query = mysqli_query($GLOBALS["conn"], $sql);
            $points_reponse = mysqli_fetch_row($query);

            if($points_reponse != null){
                $points_update = json_decode($points_reponse[0],true);
                //parcours des points obtenus
                $top =1;
                foreach ($points_update as $point) {
                    # code...
                    if($top == 1){
                        $sqlupdate = 'UPDATE `session_reponses` SET  `reponse_ID`='.$ID_reponse.',`categ_reponse_ID`="'.$point['name'].'",`points`='.$point['point'].'  WHERE   `question_ID`='.$current_question.';';                                      
                    }
                    $query = mysqli_query($GLOBALS["conn"], $sqlupdate); 
                    $top++;          
                }

                updateDateSession($php_SSID);
            }else{
                return false;
            }      
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            return false;
        }        
        return true;
    }

    function lastQuestion($php_SSID){
       
        try {
            $sql = "SELECT question_ID  FROM `session_reponses` WHERE `session_ID` LIKE '$php_SSID' and `reponse_ID`=0 ORDER BY `session_reponse_ID` asc LIMIT 0,1";
            $query = mysqli_query($GLOBALS["conn"], $sql);
            $question_id = mysqli_fetch_row($query);
            
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            return 0;
        }        
        return $question_id[0];
    }
 
    
    function lastSession($user_ID){
       
        try {
            $sql = "SELECT `session_id` FROM `utilisateur_session` WHERE `utilisateur_id`=$user_ID ORDER BY `utilisateur_session`.`session_maj` DESC LIMIT 0,1;";
            $query = mysqli_query($GLOBALS["conn"], $sql);
            $session_id = mysqli_fetch_row($query);
            
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            return 0;
        }        
        return $session_id[0];
    }

    function sessionIsValid($php_SSID, $user_ID){
        try {
            $sql = "SELECT `session_id` FROM `utilisateur_session` WHERE `session_id`='$php_SSID' and  `utilisateur_id`='$user_ID' ORDER BY `utilisateur_session`.`session_maj` DESC LIMIT 0,1;";
            $query = mysqli_query($GLOBALS["conn"], $sql);
            $session_id = mysqli_fetch_row($query);
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            return 0;
        }        
        if($session_id==null){
            return false;
        }else{
            return true;
        }
        
    }

    function getProgress($php_SSID, $percent = true){
       
        try {
            $sqlNbRep = "SELECT count(`session_reponse_ID`) as NBREP 
            FROM `session_reponses` 
            WHERE `session_ID` LIKE '$php_SSID' AND `reponse_ID` <> 0";
            
    
            $sql = "SELECT round(($sqlNbRep)/count(*)*100,0) as Progress
            FROM `session_reponses` 
            WHERE `session_ID` LIKE '$php_SSID'"; 
            
            if($percent == false){
                $sql = $sqlNbRep;
            }
            $query = mysqli_query($GLOBALS["conn"], $sql);
            $progress = mysqli_fetch_row($query);
            //echo  $sql;
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            return false;
        }        
        return $progress[0];
    }

    function deleteTest($php_SSID){
        header( "Location: index.php?page=admin" );
        return true;
    }

    function generateTest($php_SSID, $user_ID){
        try {
            if(count(loadQuestion($php_SSID, false))==0){
                $sql_session_reponses = 'INSERT INTO session_reponses SELECT null,"'.$php_SSID.'",`ID_question`,0,0,0 FROM `questions` order by rand();';
                $query = mysqli_query($GLOBALS["conn"], $sql_session_reponses);       
                
                $sql_utilisateur_session = "INSERT INTO `utilisateur_session` (`utilisateur_session_id`, `utilisateur_id`, `session_id`, `session_debut`, `session_maj`) VALUES (NULL, '$user_ID', '$php_SSID', current_timestamp(), current_timestamp());";
                $query = mysqli_query($GLOBALS["conn"], $sql_utilisateur_session);                 
            }
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            return false;
        }  
        return true;
    }

  
    function loadQuestion($php_SSID, $remain=true){
        if($remain == true){
            $sql = 'SELECT ID_question,Libelle_question,ID_reponse,Libelle_reponse,JSON_points_reponse  FROM `questions` INNER JOIN `reponses` ON `ID_question`=`ID_Question_reponse` AND `ID_question` = (SELECT `question_ID` FROM `session_reponses` WHERE `reponse_ID`=0 and `session_ID`="'.$php_SSID.'" LIMIT 0,1) ORDER BY rand();';
        }else{
            $sql = 'SELECT ID_question,Libelle_question,ID_reponse,Libelle_reponse,JSON_points_reponse  FROM `questions` INNER JOIN `reponses` ON `ID_question`=`ID_Question_reponse` AND `ID_question` = (SELECT `question_ID` FROM `session_reponses` WHERE `session_ID`="'.$php_SSID.'" LIMIT 0,1) ORDER BY rand();';
        }
        
        $query = mysqli_query($GLOBALS["conn"], $sql);
        $question = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $question;
    }

   
    function updateDateSession($session_id, $maj = true){
        try {
            if($maj ==true){
                $field= "`session_maj`"; 
            }else{
                $field= "`session_fin`"; 
            }
            $sqlupdate = "UPDATE `utilisateur_session` SET $field = CURRENT_TIME() WHERE `session_id` = '$session_id';";
            $query = mysqli_query($GLOBALS["conn"], $sqlupdate); 
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            return false;
        }  
        return true;
    }


    function getSessions($user_id=null, $session_id=null){
        $sql = "SELECT US.utilisateur_session_id, 
        US.utilisateur_id,US.session_id,count(`session_reponse_ID`) as nb_question,  
        (round(count(`session_reponse_ID`)/133,2)) as progress, 
        DATE_FORMAT(US.session_debut, '%d/%m/%Y %H:%i:%s ') as session_debut, 
        DATE_FORMAT(US.session_maj, '%d/%m/%Y %H:%i:%s ') as session_maj, 
        DATE_FORMAT(US.session_fin , '%d/%m/%Y %H:%i:%s ')  as session_fin,
        U.nom, U.prenom,
        ROUND(time_to_sec((TIMEDIFF(US.session_fin, US.session_debut)))) as duree_secondes
        FROM `session_reponses` SR 
        INNER JOIN `utilisateur_session` US ON US.session_id = SR.session_ID 
        INNER JOIN `utilisateur` U ON U.ID = US.utilisateur_id 
        WHERE SR.reponse_id != 0 ";
        
        if($session_id != null){
            $sql.= " AND US.session_id LIKE '$session_id' ";
            $sql .= "GROUP BY SR.`session_ID`";
            $query = mysqli_query($GLOBALS["conn"], $sql);
            $session_id = mysqli_fetch_row($query);      
            $DATA = array();
            $DATA['utilisateur_session_id']     = $session_id[0];
            $DATA['utilisateur_id']             = $session_id[1];
            $DATA['session_id']                 = $session_id[2];
            $DATA['nb_question']                = $session_id[3];
            $DATA['progress']                   = $session_id[4];
            $DATA['session_debut']              = $session_id[5];
            $DATA['session_maj']                = $session_id[6];
            $DATA['session_fin']                = $session_id[7];
            $DATA['nom']                        = $session_id[8];
            $DATA['prenom']                     = $session_id[9];
            $DATA['duree_secondes']             = $session_id[10];
        }else{
            $sql.= " AND US.utilisateur_id = $user_id ";
            $sql .= "GROUP BY SR.`session_ID` 
            ORDER BY US.session_maj DESC;";

            $resquery = mysqli_query($GLOBALS["conn"], $sql);
            $DATA = mysqli_fetch_all($resquery, MYSQLI_ASSOC);            
        }

        return $DATA;
        
    }
    
