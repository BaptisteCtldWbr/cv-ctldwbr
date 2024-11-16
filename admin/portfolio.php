<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - CV CTLDWBR</title>
    <?php require_once('head.php') ?>
    <link rel="stylesheet" href="css/tableau.css">
</head>
<body>
    <h1>Portfolio</h1>
    <div id="buttons">
        <a href="deconnexion.php" class="button deconnect">
            <i class="bi bi-person-fill-slash"></i>
              Se déconnecter
        </a>
        <a href="index.php" class="button">
            <i class="bi bi-house-fill"></i>
              Retour
        </a>
        <a href="portfolio-ajouter.php" class="button add">
            <i class="bi bi-database-fill-add"></i>
              Nouveau projet
        </a>
    </div>
    <?php

    if(isset($_GET['msg'])){
        echo "<p class=\"msg\">{$_GET['msg']}</p>";
    }

    require_once('../cv-ressources/includes/connexion-bdd.php');
    require_once('../cv-ressources/includes/fonctions-donnees.php');
    $select = "SELECT * FROM `portfolio`";

    $result = mysqli_query($lien, $select);

    if($result){
        $nb_lignes = mysqli_num_rows($result);
    } else {
        die("<p>Problème avec la requête - Veuillez revenir bientôt, désolé.</p>");
    }
    ?>
    <table>
        <thead>
            <th scope="col">Id.</th>
            <th scope="col">Miniature</th>
            <th scope="col">Nom</th>
            <th scope="col">Nom court</th>
            <th scope="col">URL</th>
            <th scope="col">Contexte</th>
            <th scope="col">Période</th>
            <th scope="col">Tags</th>
            <th scope="col">Description</th>
            <th scope="col">Page contenu</th>
            <th scope="col">Statut</th>
            <th scope="col">Date tri</th>
            <th scope="col">Suggestion</th>
            <th scope="col">Lien 1</th>
            <th scope="col">Lien 2</th>
            <th scope="col">Modif.</th>
        </thead>
        <tbody>
                <?php
                while($projet = mysqli_fetch_assoc($result)){

                    if($projet['tags'] != null){
                        $tags = tagsEtOutils($tagsTableau, $projet['tags']);
                        $listeTags = "<ul class=\"tags\">";
                        foreach($tags as $key => $value){
                            if(substr($value, 0, 3) == "bi-"){
                                $listeTags .= "<li><i class=\"{$value}\" title=\"{$key}\"></i></li>";
                            } else {
                                $listeTags .= "<li><img src=\"../{$value}\" alt=\"{$key}\" title=\"{$key}\"></li>";
                            }
                        }
                        $listeTags .= "</ul>";
                    } else {
                        $listeTags = null;
                    }

                    echo "<tr>
                            <td>{$projet['id']}</td>
                            <td><img src=\"../projets/miniature/{$projet['miniature']}\" alt=\"{$projet['alt-miniature']}\" title=\"{$projet['alt-miniature']}\"></td>
                            <td>{$projet['nom-complet']}</td>
                            <th scope=\"row\">{$projet['nom-court']}</th>
                            <td><a href=\"../projet.php?p={$projet['url']}\" target=\"_blank\">{$projet['url']}</a></td>
                            <td>{$projet['contexte']}</td>
                            <td>{$projet['periode']}</td>
                            <td>{$listeTags}</td>
                            <td>{$projet['description']}</td>
                            <td><a href=\"../projets/{$projet['contenu']}\" target=\"_blank\">{$projet['contenu']}</a></td>
                            <td>{$projet['statut']}</td>
                            <td>{$projet['date']}</td>
                            <td>{$projet['suggestions']}</td>
                            <td><a href=\"{$projet['lien1-lien']}\" target=\"_blank\">{$projet['lien1-nom']}</a></td>
                            <td><a href=\"{$projet['lien2-lien']}\" target=\"_blank\">{$projet['lien2-nom']}</a></td>
                            <td class=\"crud\">
                                <a 
                                    href=\"portfolio-modifier.php?id={$projet['id']}\">
                                        <i class=\"bi bi-pencil-fill\"></i>
                                </a> /
                                <a 
                                    href=\"portfolio-supprimer.php?id={$projet['id']}\" 
                                    onclick=\"javascript:return confirm('Êtes vous sûr de vouloir supprimer le projet {$projet['nom-court']}');\">
                                        <i class=\"bi bi-trash3-fill\"></i>
                                </a>
                            </td>
                        </tr>
                    ";
                }
                ?>
            </tr>
        </tbody>
        <tfoot>
            <th scope="row" colspan="15">Nombre de projets :</th>
            <td><?php echo $nb_lignes ?></td>
        </tfoot>
    </table>
</body>
</html>