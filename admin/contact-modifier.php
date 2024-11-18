<?php

$id = $_GET['id'];

require_once('../cv-ressources/includes/connexion-bdd.php');
require_once('../cv-ressources/includes/fonctions-donnees.php');
NTUI();

if(isset($_POST['btnModif'])){
    if($_POST['valide'] == 1){
        $valide = 1;
    } else {
        $valide = 0;
    }
    
    $modif = "UPDATE `contact` 
        SET 
            `id-bootstrap`  = '{$_POST['idBootstrap']}', 
            `lien`          = '{$_POST['lien']}', 
            `texte`         = '{$_POST['texte']}', 
            `valide`        = '{$valide}'
        WHERE `contact`.`id` = {$id};
    ";

    mysqli_query($lien, $modif);

    if($result){
        header("Location: contact.php?msg=modif-valide");
        die();
    } else {
        header("Location: contact.php?msg=modif-rate");
    }
}

$select = "SELECT * FROM `contact` WHERE id={$id};";
$result = mysqli_query($lien, $select);
$contact = mysqli_fetch_assoc($result);

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
    <h1>Modifier un contact</h1>
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
                <input type="text" name="idBootstrap" id="idBootstrap" required value="<?php echo $contact['id-bootstrap'] ?>">
            </div>
            <div class="input">
                <label for="lien">Lien</label>
                <input type="url" name="lien" id="lien" value="<?php echo $contact['lien'] ?>">
            </div>
            <div class="input">
                <label for="texte">Texte</label>
                <input type="text" name="texte" id="texte" required value="<?php echo $contact['texte'] ?>">
            </div>
            <div class="input">
                <?php

                if($contact['valide'] == 1){
                    echo "<input type=\"checkbox\" name=\"valide\" id=\"valide\" value=\"1\" checked>";
                } else {
                    echo "<input type=\"checkbox\" name=\"valide\" id=\"valide\" value=\"1\">";
                }

                ?>
                <label for="valide">Valide</label>
            </div>
        </fieldset>
        <button type="submit" name="btnModif">Modifier le contact</button>
        <button type="reset">Réinitialiser</button>
    </form>

</body>
</html>