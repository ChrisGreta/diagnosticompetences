<?php

    require_once 'models/result.model.php';

    function stepResult($session_id){  
        ob_start();
        $title = "Résultat";
        
        $session = getSessions(null, $session_id);
        $resultats = getResultats($session_id);

        $array_result_0 = array();
        foreach ($resultats as $key => $reponse) {
            # code...
            
            foreach (json_decode($reponse['JSON_points_reponse'],true) as $key => $point) {
                # code...
                $array_result_0[$point["name"]][] =$point["point"];
            }
        }
        foreach ($array_result_0 as $code => $result) {
            $somme = 0;
            foreach ($result as $key => $point) {
                $somme+=$point;
            }
            //echo "<hr>".$code.":".$somme."/".count($array_result_0[$code]);            
            //ignore certaines compétences, abandonnées en cours de projet ?
            $categ_exclude = array("CDC","CDA","MAA","CDE","IVQ","GDS","CAD","OSA","IDD","ECO","ESC","DDU");
            if (!in_array($code, $categ_exclude)){
                $array_result[$code]= round($somme/count($array_result_0[$code]),2);
            }
        }

        foreach ($array_result as $code => $points) {
            $point_percent = $points/100;
            $analyseR = analyseResultat($code,$point_percent);
            if(!empty($analyseR)){
                $array_analyse[$code] = [ 
                                'libelle' =>  $analyseR[0],
                                'niveau' =>   $analyseR[1]
                ];
            }

        }

        $str_result_point = implode(',',$array_result);
        $str_code_point = implode('","',array_keys($array_result));


        require('views/result.view.php');
        $content = ob_get_clean();
        require("views/base.view.php");
    }