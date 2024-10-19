<?php

require('info-bdd.php');

$lien = mysqli_connect($hote, $user, $m2p, $dbnm);

if(!$lien){
    die('Erreur de connexion ('.mysqli_connect_errno().') '.mysqli_connect_error());
}

//echo 'Succès... '.mysqli_get_host_info($lien)."\n<br>";

?>