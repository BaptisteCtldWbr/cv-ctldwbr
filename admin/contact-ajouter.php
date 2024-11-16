<?php

require_once('../cv-ressources/includes/connexion-bdd.php');

if(isset($_POST['btnAjout'])){
    if($_POST['valide'] == 1){
        $valide = 1;
    } else {
        $valide = 0;
    }

    $ajout = "INSERT INTO `contact` 
        (`id`, `lien`, `texte`, `id-bootstrap`, `valide`) 
        VALUES (
            NULL, 
            '{$_POST['lien']}', 
            '{$_POST['texte']}',
            '{$_POST['idBootstrap']}',
            '{$valide}'
        );
    ";
    echo $ajout;

    mysqli_query($lien, $ajout);

    if($result){
        header("Location: contact.php?msg=ajout-valide");
        die();
    } else {
        header("Location: contact.php?msg=ajout-rate");
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - CV CTLDWBR</title>
    <?php require_once('head.php') ?>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <h1>Ajouter un nouveau projet</h1>
    <div id="buttons">
        <a href="deconnexion.php" class="button deconnect">
            <i class="bi bi-person-fill-slash"></i>
              Se déconnecter
        </a>
        <a href="../index.php" class="button">
            <i class="bi bi-file-earmark-person-fill"></i>
              Site
        </a>
        <a href="contact.php" class="button">
            <i class="bi bi-house-fill"></i>
              Retour - Contacts
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
                <label for="idBootstrap">Id bootstrap</label>
                <input type="text" name="idBootstrap" id="idBootstrap" required>
            </div>
            <div class="input">
                <label for="lien">Lien</label>
                <input type="url" name="lien" id="lien">
            </div>
            <div class="input">
                <label for="texte">Texte</label>
                <input type="text" name="texte" id="texte" required>
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