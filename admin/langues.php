<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interets - CV CTLDWBR</title>
    <?php require_once('head.php') ?>
    <link rel="stylesheet" href="css/tableau.css">
</head>
<body>
    <h1>Interets</h1>
    <div id="buttons">
        <a href="deconnexion.php" class="button deconnect">
            <i class="bi bi-person-fill-slash"></i>
              Se déconnecter
        </a>
        <a href="langues-ajouter.php" class="button add">
            <i class="bi bi-database-fill-add"></i>
              Nouvelle langue
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
    $select = "SELECT * FROM `langue`";

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
            <th scope="col">Texte</th>
            <th scope="col">Emoji</th>
            <th scope="col">Niveau</th>
            <th scope="col">Valide</th>
            <th scope="col">Modif.</th>
        </thead>
        <tbody>
                <?php
                while($langue = mysqli_fetch_assoc($result)){
                    if($langue['valide'] == 1){
                        $valide = "<i class=\"bi bi-eye-fill\"></i>";
                    } else {
                        $valide = "<i class=\"bi bi-eye-slash-fill\"></i>";
                    }

                    echo "<tr>
                            <td>{$langue['id']}</td>
                            <td>{$langue['emoji']}</td>
                            <td>{$langue['langue']}</td>
                            <td>{$langue['niveau']}</td>
                            <td>{$valide}</td>
                            <td class=\"crud\">
                                <a 
                                    href=\"langues-modifier.php?id={$langue['id']}\">
                                        <i class=\"bi bi-pencil-fill\"></i>
                                </a> /
                                <a 
                                    href=\"langues-supprimer.php?id={$langue['id']}\" 
                                    onclick=\"javascript:return confirm('Êtes vous sûr de vouloir supprimer l\'interet {$langue['emoji']} - {$langue['langue']}');\">
                                        <i class=\"bi bi-trash3-fill\"></i>
                                </a>
                            </td>
                        </tr>
                    ";
                    
                }
                ?>
        </tbody>
        <tfoot>
            <th scope="row" colspan="5">Nombre de langueslangues :</th>
            <td><?php echo $nb_lignes ?></td>
        </tfoot>
    </table>
</body>
</html>