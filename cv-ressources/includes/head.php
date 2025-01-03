<link rel="stylesheet" href="cv-ressources/css/reset.css">
<link rel="stylesheet" href="cv-ressources/css/style.css">
<link rel="shortcut icon" href="cv-ressources/img/favicon.png" type="image/x-icon">

<?php

/* //----------------------------------------
//- ENREGISTREMENT DES INFOS UTILISATEUR -
//----------------------------------------

//- ENREGISTREMENT DES INFORMATIONS - 

date_default_timezone_set("Europe/Paris");
$date   = date("Y-m-d H:i:s");                                          //Format DATETIME reconnu par MySQL
$ip     = $_SERVER['REMOTE_ADDR'];                                      //L'adresse ip déclarée
$uri    = $_SERVER['REQUEST_URI'];                                      //L'URI
$client = $_SERVER['HTTP_USER_AGENT'];                                  //Données du client
if(isset($_GET['l'])){
    $par= $_GET['l'];                                                   //Si il y a un parmètre lien, on l'enregiste
} else {
    $par = null;
}

if(isset($_GET['ip'])){                                                 //Si tests en local, mettre en paramètre d'url ça
    $ip = $_GET['ip'];
}

//- RECUPERATION DE LA DERNIERE CONNEXION -

require_once('cv-ressources/includes/connexion-bdd.php');
$queryIP = "SELECT `date`
    FROM `connexions` 
    WHERE `ip` = \"{$ip}\" 
    ORDER BY `date` DESC 
    LIMIT 1
;";                                                                     //définition de la reqûete pour récupérer le moment de la dernière connexion

$regulier = 0;
$il_y_a = null;

$resultIP = mysqli_query($lien, $queryIP);
if($resultIP){                                                          //S'il y a eu une connexion
    while ($ligne = mysqli_fetch_assoc($resultIP)){
        $regulier = 1;                                                  //alors, la connexion est "régulière"
        $derniere = date_create($ligne['date']);
        $actuelle = date_create($date);
        $intervalle = date_diff($derniere, $actuelle, true);            //et on calcule l'intervalle depuis la dernière connexion
        $il_y_a   = $intervalle->format("%Y-%m-%d %H:%i:%s");
    }
    mysqli_free_result($resultIP);
}

//- TOUTES LES INFORMATIONS RECOLTEES -

//- AJOUT DANS LA BDD -

$queryINSERT = "INSERT INTO `connexions` 
    (`id`, `date`, `ip`, `url`, `client`, `par`, `regulier`, `derniere-connexion`) 
    VALUES (NULL, '{$date}', '{$ip}', '{$uri}', '{$client}', '{$par}', '{$regulier}', '{$il_y_a}')
;";
$resultINSERT = mysqli_query($lien, $queryINSERT);                      //Ajout de la connexion à la BDD


//mysqli_close($lien); */
?>