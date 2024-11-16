<?php

$id = $_GET['id'];

require_once('../cv-ressources/includes/connexion-bdd.php');

if(isset($_POST['btnModif'])){
    $chaineTags = implode(",", $_POST['tags']);
    $chaineSuggestion = implode(",", $_POST['suggestions']);

    $chaineTags = implode(",", $_POST['tags']);
    $chaineSuggestion = implode(",", $_POST['suggestions']);

    $modif = "UPDATE `portfolio` 
        SET 
            `url`           = '{$_POST['url']}', 
            `nom-complet`   = '{$_POST['nom-complet']}', 
            `nom-court`     = '{$_POST['nom-court']}', 
            `miniature`     = '{$_POST['miniature']}', 
            `alt-miniature` = '{$_POST['miniature-alt']}', 
            `contexte`      = '{$_POST['contexte']}', 
            `periode`       = '{$_POST['periode']}', 
            `tags`          = '{$chaineTags}', 
            `description`   = '{$_POST['description']}', 
            `contenu`       = '{$_POST['contenu']}', 
            `date`          = '{$_POST['date']}', 
            `suggestions`   = '{$chaineSuggestion}', 
            `lien1-nom`     = '{$_POST['lien1-texte']}', 
            `lien1-lien`    = '{$_POST['lien1-lien']}', 
            `lien2-nom`     = '{$_POST['lien2-texte']}', 
            `lien2-lien`    = '{$_POST['lien2-lien']}'
        WHERE `portfolio`.`id` = {$id}
    ";

    echo $modif;

    $result = mysqli_query($lien, $modif);

    if($result){
        header("Location: portfolio.php?msg=modif-valide");
        die();
    } else {
        header("Location: portfolio.php?msg=modif-rate");
    }
}

?>