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

                    if(DEBUG == false){
                        echo "<pre>";
                            echo "<br>SQL:<strong>$sqlupdate</strong><br>";
                        echo "</pre>";
                    }
                    $query = mysqli_query($GLOBALS["conn"], $sqlupdate); 
                    $top++;          
                }
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

   

