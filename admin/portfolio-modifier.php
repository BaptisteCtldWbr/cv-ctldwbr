<?php

$id = $_GET['id'];

require_once('../cv-ressources/includes/connexion-bdd.php');
require_once('../cv-ressources/includes/fonctions-donnees.php');

if(isset($_POST['btnModif'])){
    if(isset($_POST['tags'])){
        if($_POST['tags'] != null){
            $chaineTags = implode(",", $_POST['tags']);
        } else {
            $chaineTags = null;
        }
    } else {
        $chaineTags = null;
    }
    NTUI();
    $couleur = strtoupper(substr($_POST['couleur'], -6));

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
            `lien2-lien`    = '{$_POST['lien2-lien']}',
            `couleur`       = '{$couleur}'
        WHERE `portfolio`.`id` = {$id};
    ";

    $result = mysqli_query($lien, $modif);

    if($result){
        header("Location: portfolio.php?msg=modif-valide");
        die();
    } else {
        header("Location: portfolio.php?msg=modif-rate");
    }
}

$select = "SELECT * FROM `portfolio` WHERE id= {$id};";
$result = mysqli_query($lien, $select);
$projet = mysqli_fetch_assoc($result);

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
    <h1>Modifier un projet</h1>
    <div id="buttons">
        <a href="deconnexion.php" class="button deconnect">
            <i class="bi bi-person-fill-slash"></i>
              Se déconnecter
        </a>
        <a href="portfolio.php" class="button">
            <i class="bi bi-house-fill"></i>
              Retour - Portfolio
        </a>
        <a href="../index.php" class="button">
            <i class="bi bi-file-earmark-person-fill"></i>
              Site
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
                <label for="nom-complet">Nom complet</label>
                <input type="text" name="nom-complet" id="nom-complet" required value="<?php echo $projet['nom-complet']; ?>">
            </div>
            <div class="input">
                <label for="nom-court">Nom court</label>
                <input type="text" name="nom-court" id="nom-court" required value="<?php echo $projet['nom-court']; ?>">
            </div>
            <div class="input">
                <label for="url">URL :</label>
                <input type="text" name="url" id="url" required value="<?php echo $projet['url']; ?>">
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
                    <?php

                    $dossier = "../projets/miniature/";
                    $listeFichier = scandir($dossier);

                    foreach($listeFichier as $fichier){
                        if(!is_dir($dossier . $fichier) AND getimagesize($dossier . $fichier) != false){
                            if($fichier == $projet['miniature']){
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
                <label for="miniature-alt">Alt de la miniature</label>
                <input type="text" name="miniature-alt" id="miniature-alt" required value="<?php echo $projet['alt-miniature']; ?>">
            </div>
        </fieldset>
        <fieldset id="precisions">
            <legend>Précisions</legend>
            <div class="input">
                <label for="contexte">Contexte</label>
                <select name="contexte" id="contexte" required>
                    <?php 
                    
                    foreach ($contexteTableau as $id => $text){
                        if($id == $projet['contexte']){
                            echo "<option value=\"{$id}\" selected>{$text}</option>";
                        } else {
                            echo "<option value=\"{$id}\">{$text}</option>";
                        }
                    }
                    
                    ?>
                </select>
            </div>
            <div class="input">
                <label for="periode">Période</label>
                <input type="text" name="periode" id="periode" required value="<?php echo $projet['periode']; ?>">
            </div>
            <div class="input">
                <label for="tags">Tags</label>
                <ul class="input">
                    <?php 
                    foreach ($tagsTableau as $id => $text){
                        if(str_contains($projet['tags'], $id)){
                            echo "<li>
                                    <input type=\"checkbox\" name=\"tags[]\" id=\"{$id}\" value=\"{$id}\" checked>
                                    <label for=\"{$id}\">{$id}</label>
                                </li>";
                        } else {
                            echo "<li>
                                    <input type=\"checkbox\" name=\"tags[]\" id=\"{$id}\" value=\"{$id}\">
                                    <label for=\"{$id}\">{$id}</label>
                                </li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="input">
                <label for="statut">Statut</label>
                <select name="statut" id="status" required>
                    <option value="" disabled selected>??</option>
                    <?php 
                    
                    foreach ($statutProjetsTableau as $id => $text){
                        if($id == $projet['statut']){
                            echo "<option value=\"{$id}\" selected>{$text}</option>";
                        } else {
                            echo "<option value=\"{$id}\">{$text}</option>";
                        }
                    }
                    
                    ?>
                </select>
            </div>
            <div class="input">
                <label for="date">Date pour le tri</label>
                <input type="date" name="date" id="date" required value="<?php echo $projet['date']; ?>">
            </div>
        </fieldset>
        <fieldset id="liens">
            <legend>Liens</legend>
            <fieldset>
                <legend>Lien 1</legend>
                <div class="input">
                    <label for="lien1-texte">Lien 1 - texte</label>
                    <input type="text" name="lien1-texte" id="lien1-texte" value="<?php echo $projet['lien1-nom']; ?>">
                </div>
                <div class="input">
                    <label for="lien1-lien">Lien 1 - lien</label>
                    <input type="url" name="lien1-lien" id="lien1-lien" value="<?php echo $projet['lien1-lien']; ?>">
                </div>
            </fieldset>
            <fieldset>
                <legend>Lien 2</legend>
                <div class="input">
                    <label for="lien2-texte">Lien 2 - texte</label>
                    <input type="text" name="lien2-texte" id="lien2-texte" value="<?php echo $projet['lien2-nom']; ?>">
                </div>
                <div class="input">
                    <label for="lien2-lien">Lien 2 - lien</label>
                    <input type="url" name="lien2-lien" id="lien2-lien" value="<?php echo $projet['lien2-lien']; ?>">
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
                    <?php

                    $dossier = "../projets/";
                    $listeFichier = scandir($dossier);
                    $extsWeb = ["html","php"];

                    foreach($listeFichier as $fichier){
                        if(!is_dir($dossier . $fichier)){
                            foreach($extsWeb as $ext){
                                if(pathinfo($fichier, PATHINFO_EXTENSION) == $ext){
                                    if ($fichier == $projet['contenu']){
                                        echo "<option value=\"{$fichier}\" selected>{$fichier}</option>";
                                    } else {
                                        echo "<option value=\"{$fichier}\">{$fichier}</option>";
                                    }
                                }
                            }
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="input">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="3" required value="<?php echo $projet['description']; ?>"></textarea>
            </div>
            <div class="input">
                <label>
                    Suggestions
                    <span>Maximum 3 suggestions</span>
                </label>
                <ul class="input">
                    <?php 
                    
                    $selectProjets = "SELECT `id`, `nom-court` FROM `portfolio`;";
                    $resultProjets = mysqli_query($lien, $selectProjets);

                    while($projets = mysqli_fetch_assoc($resultProjets)){
                        if(str_contains($projet['suggestions'], $projets['id'])){
                            echo "<li>
                                    <input type=\"checkbox\" name=\"suggestions[]\" id=\"{$projets['id']}\" value=\"{$projets['id']}\" checked>
                                    <label for=\"{$projets['id']}\">{$projets['id']} - {$projets['nom-court']}</label>
                                </li>";
                        } else {
                            echo "<li>
                                    <input type=\"checkbox\" name=\"suggestions[]\" id=\"{$projets['id']}\" value=\"{$projets['id']}\">
                                    <label for=\"{$projets['id']}\">{$projets['id']} - {$projets['nom-court']}</label>
                                </li>";
                        }
                    }

                    ?>
                </ul>
            </div>
            <div class="input">
                <label for="couleur">Couleur du projet</label>
                <input type="color" name="couleur" id="couleur" value="#<?php echo $projet['couleur']; ?>">
            </div>
        </fieldset>
        <button type="submit" name="btnModif" value="prout" onclick="javascript:return confirm('Êtes vous sûr de vouloir modifier le projet');">Modifier le projet</button>
        <button type="reset">Réinitialiser</button>
    </form>

</body>
</html>