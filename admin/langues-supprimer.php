<?php

require_once('../cv-ressources/includes/connexion-bdd.php');

$id = $_GET['id'];

$delete = "DELETE FROM langue WHERE `langue`.`id` = '{$id}'";
$result = mysqli_query($lien, $delete);

if($result){
    header("Location: langues.php?msg=suppression-validee");
} else {
    header("Location: langues.php?msg=suppression-ratee");
}
?>