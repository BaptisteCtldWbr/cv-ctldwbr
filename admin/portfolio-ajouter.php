<?php

require_once('../cv-ressources/includes/connexion-bdd.php');
require_once('../cv-ressources/includes/fonctions-donnees.php');

if(isset($_POST['btnAjout'])){
    NTUI();
    if(isset($_POST['tags'])){
        if($_POST['tags'] != null){
            $chaineTags = implode(",", $_POST['tags']);
        } else {
            $chaineTags = null;
        }
    } else {
        $chaineTags = null;
    }

    if(isset($_POST['suggestions'])){
        if($_POST['suggestions'] != null){
            $chaineSuggestion = implode(",", $_POST['suggestions']);
        } else {
            $chaineSuggestion = null;
        }
    } else {
        $chaineSuggestion = null;
    }

    echo $chaineTags;
    echo $chaineSuggestion;


    $ajout = "INSERT INTO `portfolio` 
        (`id`, `url`, `nom-complet`, `nom-court`, `miniature`, `alt-miniature`, `contexte`, `periode`, `tags`, `description`, `contenu`, `statut`, `date`, `suggestions`, `lien1-nom`, `lien1-lien`, `lien2-nom`, `lien2-lien`) 
        VALUES (
            NULL, 
            '{$_POST['url']}', 
            '{$_POST['nom-complet']}', 
            '{$_POST['nom-court']}', 
            '{$_POST['miniature']}', 
            '{$_POST['miniature-alt']}', 
            '{$_POST['contexte']}', 
            '{$_POST['periode']}', 
            '{$chaineTags}',
            '{$_POST['description']}', 
            '{$_POST['contenu']}', 
            '{$_POST['statut']}', 
            '{$_POST['date']}', 
            '{$chaineSuggestion}',
            '{$_POST['lien1-texte']}', 
            '{$_POST['lien1-lien']}', 
            '{$_POST['lien2-texte']}', 
            '{$_POST['lien2-lien']}'
        );
    ";

    mysqli_query($lien, $ajout);

    if($result){
        header("Location: portfolio.php?msg=ajout-valide");
        die();
    } else {
        header("Location: portfolio.php?msg=ajout-rate");
    }
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - CV CTLDWBR</title>
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
        <a href="portfolio.php" class="button">
            <i class="bi bi-house-fill"></i>
              Retour - Portfolio
        </a>
    </div>
    <?php

    if(isset($_GET['msg'])){
        echo "<p class=\"msg\">{$_GET['msg']}</p>";
    }

    $select = "SELECT * FROM `portfolio`";

    $result = mysqli_query($lien, $select);

    if($result){
        $nb_lignes = mysqli_num_rows($result);
    } else {
        die("<p>Problème avec la requête - Veuillez revenir bientôt, désolé.</p>");
    }
    ?>

    <form action="#" method="post" class="grid">
        <fieldset id="general">
            <legend>Général</legend>
            <div class="input">
                <label for="nom-complet">Nom complet</label>
                <input type="text" name="nom-complet" id="nom-complet" required>
            </div>
            <div class="input">
                <label for="nom-court">Nom court</label>
                <input type="text" name="nom-court" id="nom-court" required>
            </div>
            <div class="input">
                <label for="url">URL :</label>
                <input type="text" name="url" id="url" required>
            </div>
        </fieldset>
        <fieldset id="miniatures">
            <legend>Miniature</legend>
            <div class="input">
                <label for="miniature">
                    Miniature
                    <span>Images du dossier <code>projets/miniature/</code></span>
                </label>
                <select name="miniature" id="miniature" required>
                    <option value="" disabled selected>miniature.png</option>
                    <?php

                    $dossier = "../projets/miniature/";
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
                <label for="miniature-alt">Alt de la miniature</label>
                <input type="text" name="miniature-alt" id="miniature-alt" required>
            </div>
        </fieldset>
        <fieldset id="precisions">
            <legend>Précisions</legend>
            <div class="input">
                <label for="contexte">Contexte</label>
                <select name="contexte" id="contexte" >
                    <option value="" disabled selected required>Projet ...</option>
                    <?php 
                    
                    foreach ($contexteTableau as $id => $text){
                        echo "<option value=\"{$id}\">{$text}</option>";
                    }
                    
                    ?>
                </select>
            </div>
            <div class="input">
                <label for="periode">Période</label>
                <input type="text" name="periode" id="periode" required>
            </div>
            <div class="input">
                <label for="tags">Tags</label>
                <ul class="input">
                    <?php 
                    
                    foreach ($tagsTableau as $id => $text){
                        echo "<li>
                                <input type=\"checkbox\" name=\"tags[]\" id=\"{$id}\" value=\"{$id}\">
                                <label for=\"{$id}\">{$id}</label>
                            </li>";
                    }

                    ?>
                </ul>
            </div>
            <div class="input">
                <label for="statut">Statut</label>
                <select name="statut" id="status" >
                    <option value="" disabled selected required>??</option>
                    <?php 
                    
                    foreach ($statutProjetsTableau as $id => $text){
                        echo "<option value=\"{$id}\">{$text}</option>";
                    }
                    
                    ?>
                </select>
            </div>
            <div class="input">
                <label for="date">Date pour le tri</label>
                <input type="date" name="date" id="date" required>
            </div>
        </fieldset>
        <fieldset id="liens">
            <legend>Liens</legend>
            <fieldset>
                <legend>Lien 1</legend>
                <div class="input">
                    <label for="lien1-texte">Lien 1 - texte</label>
                    <input type="text" name="lien1-texte" id="lien1-texte">
                </div>
                <div class="input">
                    <label for="lien1-lien">Lien 1 - lien</label>
                    <input type="url" name="lien1-lien" id="lien1-lien">
                </div>
            </fieldset>
            <fieldset>
                <legend>Lien 2</legend>
                <div class="input">
                    <label for="lien2-texte">Lien 2 - texte</label>
                    <input type="text" name="lien2-texte" id="lien2-texte">
                </div>
                <div class="input">
                    <label for="lien2-lien">Lien 2 - lien</label>
                    <input type="url" name="lien2-lien" id="lien2-lien">
                </div>
            </fieldset>
        </fieldset>
        <fieldset id="contenus">
            <legend>Contenu</legend>
            <div class="input">
                <label for="contenu">
                    Contenu
                    <span>Fichiers web du dossier <code>projets/</code></span>
                </label>
                <select name="contenu" id="contenu" required>
                    <option value="" disabled selected>contenu.html</option>
                    <?php

                    $dossier = "../projets/";
                    $listeFichier = scandir($dossier);
                    $extsWeb = ["html","php"];

                    foreach($listeFichier as $fichier){
                        if(!is_dir($dossier . $fichier)){
                            foreach($extsWeb as $ext){
                                if(pathinfo($fichier, PATHINFO_EXTENSION) == $ext){
                                    echo "<option value=\"{$fichier}\">{$fichier}</option>";
                                }
                            }
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="input">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="5" required></textarea>
            </div>
            <div class="input">
                <label>
                    Suggestions
                    <span>Maximum 3 suggestions</span>
                </label>
                <ul class="input">
                    <?php 
                    
                    $select = "SELECT `id`, `nom-court` FROM `portfolio`;";
                    $result = mysqli_query($lien, $select);

                    while($projet = mysqli_fetch_assoc($result)){
                        echo "<li>
                                <input type=\"checkbox\" name=\"suggestions[]\" id=\"{$projet['id']}\" value=\"{$projet['id']}\">
                                <label for=\"{$projet['id']}\">{$projet['id']} - {$projet['nom-court']}</label>
                            </li>";
                    }

                    ?>
                </ul>
            </div>
        </fieldset>
        <button type="submit" name="btnAjout">Ajouter à la base de donnée</button>
    </form>

</body>
</html>