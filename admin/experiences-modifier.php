<?php

$id = $_GET['id'];

require_once('../cv-ressources/includes/connexion-bdd.php');
require_once('../cv-ressources/includes/fonctions-donnees.php');

if(isset($_POST['btnAjout'])){
    NTUI();
    
    if($_POST['valide'] == 1){
        $valide = 1;
    } else {
        $valide = 0;
    }
    $modif = "UPDATE `experiences` SET
        `date-debut`    = '{$_POST['dateDebut']}',
        `icone`         = '{$_POST['icone']}',
        `alt-icone`     = '{$_POST['alt-icone']}',
        `titre`         = '{$_POST['titre']}',
        `titre-detail`  = '{$_POST['details']}',
        `periode`       = '{$_POST['periode']}',
        `description`   = '{$_POST['description']}',
        `competences`   = '{$_POST['competences']}',
        `valide`        = '{$valide}'
        WHERE `id` = '{$id}';
    ";
    echo $modif;

    mysqli_query($lien, $modif);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expérience - CV CTLDWBR</title>
    <?php require_once('head.php') ?>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <h1>Modifier une expérience</h1>
    <div id="buttons">
        <a href="deconnexion.php" class="button deconnect">
            <i class="bi bi-person-fill-slash"></i>
              Se déconnecter
        </a>
        <a href="../index.php" class="button">
            <i class="bi bi-file-earmark-person-fill"></i>
              Site
        </a>
        <a href="experiences.php" class="button">
            <i class="bi bi-house-fill"></i>
              Retour - Expériences
        </a>
    </div>
    <?php

    if(isset($_GET['msg'])){
        echo "<p class=\"msg\">{$_GET['msg']}</p>";
    }

    $select = "SELECT * FROM `experiences` WHERE id={$id};";
    $result = mysqli_query($lien, $select);
    $experiences = mysqli_fetch_assoc($result);

    ?>

    <form action="#" method="post" class="grid">
        <fieldset id="general">
            <legend>Général</legend>
            <div class="input">
                <label for="titres">Titre</label>
                <input type="text" name="titre" id="titre" required value="<?php echo $experiences['titre']?>">
            </div>
            <div class="input">
                <label for="details">Titre détails</label>
                <input type="text" name="details" id="details" value="<?php echo $experiences['titre-detail']?>">
            </div>
            <div class="input">
                <label for="periode">Période</label>
                <input type="text" name="periode" id="periode" required value="<?php echo $experiences['periode']?>">
            </div>
            <div class="input">
                <label for="dateDebut">Date début</label>
                <input type="date" name="dateDebut" id="dateDebut" required value="<?php echo $experiences['date-debut']?>">
            </div>
            <div class="input">
                <?php
                
                if($experiences['valide'] == 1){
                    echo "<input type=\"checkbox\" name=\"valide\" id=\"valide\" value=\"1\" checked>";
                } else {
                    echo "<input type=\"checkbox\" name=\"valide\" id=\"valide\" value=\"1\" checked>";
                }
                
                ?>
                
                <label for="valide">Valide</label>
            </div>
        </fieldset>
        <fieldset id="contenu">
            <legend>Contenu</legend>
            <div class="input">
                <label for="description">Description</label>
                <textarea name="description" id="description" value="<?php echo $experiences['description']?>"></textarea>
            </div>
            <div class="input">
                <label for="competences">Compétences</label>
                <textarea name="competences" id="competences" value="<?php echo $experiences['competences']?>"></textarea>
            </div>
        </fieldset>
        <fieldset id="icone">
            <legend>Icône</legend>
            
            <div class="input">
                <label for="icone">
                    Icône
                    <span>Images du dossier <code>cv-ressources/exp/</code></span>
                </label>
                <select name="icone" id="icone" required>
                    <option value="" disabled selected>icône.png</option>
                    <?php

                    $dossier = "../cv-ressources/exp/";
                    $listeFichier = scandir($dossier);

                    foreach($listeFichier as $fichier){
                        if(!is_dir($dossier . $fichier) AND getimagesize($dossier . $fichier) != false){
                            if($fichier == $experiences['icone']){
                                echo "<option value=\"{$fichier}\" selected>{$fichier}</option>";
                            } else {
                                echo "<option value=\"{$fichier}\">{$fichier}</option>";
                            }
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="input">
                <label for="alt-icone">Alt de l'icône</label>
                <input type="text" name="alt-icone" id="alt-icone" required value="<?php echo $experiences['alt-icone']?>">
            </div>
        </fieldset>
        <button type="submit" name="btnAjout">Modifier</button>
    </form>

</body>
</html>