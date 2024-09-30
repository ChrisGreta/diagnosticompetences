<?php

if($_SESSION['env'] == 'dev'){
    define("SERVER",    "localhost");
    define("USER",      "root");
    define("PASSWORD",  "");
    define("BDD",       "dstj2742_diagcomp");
}else{
    define("SERVER",    "localhost");
    define("USER",      "dstj2742_diagcomp");
    define("PASSWORD",  "YNJuzTq/(WqE5lVR");
    define("BDD",       "dstj2742_diagcomp");

}
    


$GLOBALS["conn"] = mysqli_connect(SERVER, USER, PASSWORD, BDD, "3306");
mysqli_set_charset($GLOBALS["conn"], "utf8mb4");
if (mysqli_connect_errno()){
    echo "Erreur de connexion à MySQL: (". mysqli_connect_errno(). ") ". mysqli_connect_error();
    exit();
}
    
    