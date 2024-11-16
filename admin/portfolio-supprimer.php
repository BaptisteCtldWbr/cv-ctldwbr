<?php

require_once('../cv-ressources/includes/connexion-bdd.php');

$projet = $_GET['id'];

$delete = "DELETE FROM portfolio WHERE `portfolio`.`id` = {$projet}";
$result = mysqli_query($lien, $delete);

if($result){
    header("Location: portfolio.php?msg=suppr-validee");
} else {
    header("Location: portfolio.php?msg=suppr-ratee");
}
?>