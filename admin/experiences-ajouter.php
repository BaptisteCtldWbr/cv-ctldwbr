<?php

require_once('../cv-ressources/includes/connexion-bdd.php');
require_once('../cv-ressources/includes/fonctions-donnees.php');

if(isset($_POST['btnAjout'])){
    NTUI();
    if($_POST['valide'] == 1){
        $valide = 1;
    } else {
        $valide = 0;
    }
    
    $ajout = "INSERT INTO `experiences` 
        (`id`, `date-debut`, `icone`, `alt-icone`, `titre`, `titre-detail`, `periode`, `description`, `competences`, `valide`) 
        VALUES (
            NULL, 
            '{$_POST['dateDebut']}', 
            '{$_POST['icone']}',
            '{$_POST['alt-icone']}',
            '{$_POST['titre']}',
            '{$_POST['details']}',
            '{$_POST['periode']}',
            '{$_POST['description']}',
            '{$_POST['competences']}',
            '{$valide}'
        );
    ";

    $result = mysqli_query($lien, $ajout);

    if($result){
        header("Location: experiences.php?msg=ajout-valide");
        die();
    } else {
        header("Location: experiences.php?msg=ajout-rate");
    }
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
    <h1>Ajouter une nouvelle expérience</h1>
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

    <form action="#" method="post" class="grid">
        <fieldset id="general">
            <legend>Général</legend>
            <div class="input">
                <label for="titres">Titre</label>
                <input type="text" name="titre" id="titre" required>
            </div>
            <div class="input">
                <label for="details">Titre détails</label>
                <input type="text" name="details" id="details">
            </div>
            <div class="input">
                <label for="periode">Période</label>
                <input type="text" name="periode" id="periode" required>
            </div>
            <div class="input">
                <label for="dateDebut">Date début</label>
                <input type="date" name="dateDebut" id="dateDebut" required>
            </div>
            <div class="input">
                <input type="checkbox" name="valide" id="valide" value="1">
                <label for="valide">Valide</label>
            </div>
        </fieldset>
        <fieldset id="contenu">
            <legend>Contenu</legend>
            <div class="input">
                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <div class="input">
                <label for="competences">Compétences</label>
                <textarea name="competences" id="competences"></textarea>
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
                            echo "<option value=\"{$fichier}\">{$fichier}</option>";
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="input">
                <label for="alt-icone">Alt de l'icône</label>
                <input type="text" name="alt-icone" id="alt-icone" required>
            </div>
        </fieldset>
        <button type="submit" name="btnAjout">Ajouter à la base de donnée</button>
    </form>

</body>
</html>