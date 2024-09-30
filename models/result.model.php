<?php
    require_once 'connect.db.php';
    
    function getLabels($type="title", $code = null){
            
        $array_labels_title= array(
            "CEF"	=>	"Communication en Français",
            "CLE"	=>	"Communication dans une langue étrangère",
            "CUM"	=>	"Culture mathématique",
            "CUN"	=>	"Culture numérique",
            "AAA"	=>	"Apprendre à apprendre",
            "CIS"	=>	"Compétences interpersonnelles; interculturelles et sociales",
            "EDE"	=>	"Esprit d'entreprise",
            "ECU"	=>	"Expression culturelle"
        );  

        $array_labels_description= array(
            "CEF"	=>	"La communication dans la langue maternelle est la faculté d'exprimer des pensées, sentiments et faits sous forme à la fois orale et écrite (écouter, parler, lire et écrire), et d'avoir des interactions linguistiques appropriées dans toutes les situations de la vie sociale et culturelle, dans l'éducation et la formation, au travail, dans la vie privée et pendant les loisirs.",
            "CLE"	=>	"La communication en langue étrangère partage globalement les mêmes compétences de base que la communication dans la langue maternelle: elle s'appuie sur  l'aptitude à comprendre, exprimer et interpréter des pensées, des sentiments et des faits, sous  forme à la fois orale et écrite (écouter, parler, lire et écrire) dans diverses situations de la vie  en société, au travail, dans la vie privée, pendant les loisirs, dans le cadre de l'éducation et de  la formation, selon les désirs et les besoins.",
            "CUM"	=>	"La culture mathématique est l'aptitude à se servir de l'addition, de la soustraction, de la  multiplication, de la division et des fractions, sous forme de calcul mental et par écrit, pour  résoudre divers problèmes de la vie quotidienne. L'accent est mis davantage sur le processus  et l'activité que sur le savoir. Les compétences mathématiques impliquent, à des degrés  différents, la capacité et la volonté d'utiliser des modes mathématiques de pensée (réflexion  logique et dans l'espace) et de représentation (formules, modèles, constructions,  graphiques/diagrammes). Les compétences scientifiques se réfèrent à la capacité et à la volonté d'employer les  connaissances et méthodologies utilisées pour expliquer le monde de la nature afin de poser  des questions et d'apporter des réponses étayées. La technologie est perçue comme  l'application de ces connaissances et de ces méthodologies pour répondre aux désirs et  besoins de l'homme. Ces deux domaines de compétences supposent une compréhension des  changements induits par l'activité humaine et de la responsabilité de tout individu en tant que  citoyen.",
            "CUN"	=>	"La culture numérique implique l'usage sûr et critique des technologies de la société de l'information (TSI) au travail, dans les loisirs et dans la communication. La condition préalable est la maîtrise des TIC : l'utilisation de l'ordinateur pour obtenir, évaluer,  stocker, produire, présenter et échanger des informations, et pour communiquer et participer  via l'Internet à des réseaux de collaboration.",
            "AAA"	=>	"C'est l'aptitude à entreprendre et poursuivre un  apprentissage. L'individu devrait être capable d'organiser son propre apprentissage, de gérer  son temps et ses informations avec efficacité, tant isolément que collectivement. Il devrait  connaître ses propres méthodes d'apprentissage et ses besoins, les offres d'éducation et de  formation, et être capable de surmonter des obstacles afin d'accomplir son apprentissage avec  succès. Cela suppose acquérir, traiter et assimiler de nouvelles connaissances et aptitudes, et  chercher et utiliser des conseils. “Apprendre à apprendre” amène les apprenants à s'appuyer  sur les expériences d'apprentissage et de vie antérieures de manière à utiliser et appliquer les  nouvelles connaissances et aptitudes dans divers contextes - dans la vie privée et  professionnelle, dans le cadre de l'éducation et de la formation. La motivation et la confiance  dans sa propre capacité sont des éléments fondamentaux.",
            "CIS"	=>	"Ces compétences comprennent toutes les formes de comportement devant être  maîtrisées par un individu pour pouvoir participer de manière efficace et constructive à la vie  sociale et professionnelle, notamment dans des sociétés de plus en plus diversifiées, et pour  résoudre d'éventuels conflits. Les compétences civiques permettent à l'individu de participer  pleinement à la vie civique grâce à la connaissance des notions et structures sociales et  politiques et à une participation civique active et démocratique.",
            "EDE"	=>	"L'esprit d'entreprise se réfère à l'aptitude d'un individu à passer des idées aux  actes. Il suppose de la créativité, de l'innovation et une prise de risques, ainsi que la capacité  de programmer et de gérer des projets en vue de la réalisation d'objectifs. Cette compétence  est un atout pour tout le monde dans la vie de tous les jours, à la maison et en société, pour les  salariés conscients du contexte dans lequel s'inscrit leur travail et en mesure de saisir les  occasions qui se présentent, et elle est le ferment de l'acquisition de qualifications et de  connaissances plus spécifiques dont ont besoin les chefs d'entreprise qui créent une activité  sociale ou commerciale.",
            "ECU"	=>	"Appréciation de l'importance de l'expression créatrice d'idées, d'expériences et  d'émotions sous diverses formes, la musique, les arts du spectacle, la littérature et les arts  visuels."
        );

        if($type == "title"){
            $array_labels = $array_labels_title;
        }else{
            $array_labels = $array_labels_description;
        }
    

        if($code==null){
            return $array_labels;
        }else{
            return $array_labels['code'];
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

?>