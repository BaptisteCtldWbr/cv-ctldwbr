<?php

require_once('../cv-ressources/includes/connexion-bdd.php');

$id = $_GET['id'];

$delete = "DELETE FROM interet WHERE `interet`.`id` = '{$id}'";
$result = mysqli_query($lien, $delete);

if($result){
    header("Location: interets.php?msg=suppression-validee");
} else {
    header("Location: interets.php?msg=suppression-ratee");
}
?>