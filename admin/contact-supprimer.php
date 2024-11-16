<?php

require_once('../cv-ressources/includes/connexion-bdd.php');

$id = $_GET['id'];

$delete = "DELETE FROM contact WHERE `contact`.`id` = '{$id}'";
echo $delete;
$result = mysqli_query($lien, $delete);

if($result){
    header("Location: contact.php?msg=suppr-validee");
} else {
    header("Location: contact.php?msg=suppr-ratee");
}
?>