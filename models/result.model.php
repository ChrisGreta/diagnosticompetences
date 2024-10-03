<?php
    require_once 'connect.db.php';
    
    function getCategories($type="title", $code = null){
        
        try {
            $sql = "SELECT ID_categ,Code_Categ,Libelle_Categorie,`description`  FROM `categorie_questions`";             
            $query = mysqli_query($GLOBALS["conn"], $sql);
            $array_categs = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $array_categs;
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            return false;
        }        
             
    }

    function getResultats($php_SSID){

        try {
            $sql = "SELECT `session_reponse_ID`,`question_ID`,`reponse_ID`,R.Libelle_reponse,R.JSON_points_reponse
                    FROM `session_reponses` SR INNER JOIN reponses R ON R.ID_reponse = SR.reponse_ID
                    WHERE `session_ID`='$php_SSID'";             
            $query = mysqli_query($GLOBALS["conn"], $sql);
            $resultats = mysqli_fetch_all($query, MYSQLI_ASSOC);

            //var_dump($resultats);
            //echo  $sql;
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            return false;
        }        
        return $resultats;
    }

    function analyseResultat($cle_Competence, $points){
        
        try {
            $sql = "SELECT session_resultat_libelle, session_resultat_niveau FROM `session_resultat` WHERE `session_resultat_code` LIKE '$cle_Competence' AND `session_resultat_points_max` >= $points ORDER BY `session_resultat_points_max` ASC LIMIT 0,1;";
            $query = mysqli_query($GLOBALS["conn"], $sql);
            $session_resultat = mysqli_fetch_row($query);
        }catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
            return 0;
        }        
        return $session_resultat;
    }

?>