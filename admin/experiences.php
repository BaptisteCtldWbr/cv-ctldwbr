<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expériences - CV CTLDWBR</title>
    <?php require_once('head.php') ?>
    <link rel="stylesheet" href="css/tableau.css">
</head>
<body>
    <h1>Expériences</h1>
    <div id="buttons">
        <a href="deconnexion.php" class="button deconnect">
            <i class="bi bi-person-fill-slash"></i>
              Se déconnecter
        </a>
        <a href="contact-ajouter.php" class="button add">
            <i class="bi bi-database-fill-add"></i>
              Nouveau contact
        </a>
        <a href="index.php" class="button">
            <i class="bi bi-house-fill"></i>
              Retour
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

    require_once('../cv-ressources/includes/connexion-bdd.php');
    require_once('../cv-ressources/includes/fonctions-donnees.php');
    $select = "SELECT * FROM `experiences`";

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
            <th scope="col">Icône</th>
            <th scope="col">Titre</th>
            <th scope="col">Détails</th>
            <th scope="col">Période</th>
            <th scope="col">Date début</th>
            <th scope="col">Description</th>
            <th scope="col">Compétences</th>
            <th scope="col">Visible</th>
            <th scope="col">Modifier</th>
        </thead>
        <tbody>
                <?php
                while($experiences = mysqli_fetch_assoc($result)){
                    if($experiences['valide'] == 1){
                        $valide = "<i class=\"bi bi-eye-fill\"></i>";
                    } else {
                        $valide = "<i class=\"bi bi-eye-slash-fill\"></i>";
                    }

                    echo "<tr>
                            <td>{$experiences['id']}</td>
                            <td><img src=\"../cv-ressources/exp/{$experiences['icone']}\" alt=\"{$experiences['alt-icone']}\" title=\"{$experiences['alt-icone']}\"></td>
                            <td>{$experiences['titre']}</td>
                            <td>{$experiences['titre-detail']}</td>
                            <td>{$experiences['periode']}</td>
                            <td>{$experiences['date-debut']}</td>
                            <td>{$experiences['description']}</td>
                            <td>{$experiences['competences']}</td>
                            <td>{$valide}</td>
                            <td class=\"crud\">
                                <a 
                                    href=\"experiences-modifier.php?id={$experiences['id']}\">
                                        <i class=\"bi bi-pencil-fill\"></i>
                                </a> /
                                <a 
                                    href=\"experiences-supprimer.php?id={$experiences['id']}\" 
                                    onclick=\"javascript:return confirm('Êtes vous sûr de vouloir supprimer l'expérience {$experiences['titre']}');\">
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
            <th scope="row" colspan="9">Nombre de contacts :</th>
            <td><?php echo $nb_lignes ?></td>
        </tfoot>
    </table>
</body>
</html>