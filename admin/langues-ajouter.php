<?php

require_once('../cv-ressources/includes/connexion-bdd.php');
require_once('../cv-ressources/includes/fonctions-donnees.php');

if(isset($_POST['btnAjout'])){
    if($_POST['valide'] == 1){
        $valide = 1;
    } else {
        $valide = 0;
    }
    $langue = htmlspecialchars($_POST['langue']);
    $niveau = htmlspecialchars($_POST['niveau']);

    $ajout = "INSERT INTO `langue` 
        (`id`, `emoji`, `langue`, `niveau`, `valide`) 
        VALUES (
            NULL, 
            '{$_POST['emoji']}', 
            '{$langue}',
            '{$niveau}',
            '{$valide}'
        );
    ";

    $result = mysqli_query($lien, $ajout);

    if($result){
        header("Location: langues.php?msg=ajout-valide");
        die();
    } else {
        header("Location: langues.php?msg=ajout-rate");
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interets - CV CTLDWBR</title>
    <?php require_once('head.php') ?>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <h1>Ajouter un nouvel interet</h1>
    <div id="buttons">
        <a href="deconnexion.php" class="button deconnect">
            <i class="bi bi-person-fill-slash"></i>
              Se déconnecter
        </a>
        <a href="../index.php" class="button">
            <i class="bi bi-file-earmark-person-fill"></i>
              Site
        </a>
        <a href="interets.php" class="button">
            <i class="bi bi-house-fill"></i>
              Retour - Interets
        </a>
    </div>
    <?php

    if(isset($_GET['msg'])){
        echo "<p class=\"msg\">{$_GET['msg']}</p>";
    }
    ?>

    <form action="#" method="post">
        <fieldset id="general">
            <div class="input">
                <label for="emoji">Emoji<span>Liste des émojis : <a href="https://emojiterra.com/country-flags/" target="_blank">emojiterra</a></span></label>
                <input type="text" name="emoji" id="emoji" required>
            </div>
            <div class="input">
                <label for="langue">Langue</label>
                <input type="text" name="langue" id="langue" required>
            </div>
            <div class="input">
                <label for="niveau">Niveau</label>
                <input type="text" name="niveau" id="niveau" required>
            </div>
            <div class="input">
                <input type="checkbox" name="valide" id="valide" value="1">
                <label for="valide">Valide</label>
            </div>
        </fieldset>
        <button type="submit" name="btnAjout">Ajouter à la base de donnée</button>
    </form>

</body>
</html>