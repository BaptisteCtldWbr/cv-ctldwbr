<?php

require_once('../cv-ressources/includes/connexion-bdd.php');

$id = $_GET['id'];

$delete = "DELETE FROM experiences WHERE `experiences`.`id` = '{$id}'";
echo $delete;
$result = mysqli_query($lien, $delete);

if($result){
    header("Location: contact.php?msg=experiences-validee");
} else {
    header("Location: contact.php?msg=experiences-ratee");
}
?>