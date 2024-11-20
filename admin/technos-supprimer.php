<?php

require_once('../cv-ressources/includes/connexion-bdd.php');

$id = $_GET['id'];

$delete = "DELETE FROM techno WHERE `techno`.`id` = '{$id}'";
$result = mysqli_query($lien, $delete);

if($result){
    header("Location: technos.php?msg=suppression-validee");
} else {
    header("Location: technos.php?msg=suppression-ratee");
}
?>