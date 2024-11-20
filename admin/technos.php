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
    <h1>Technos</h1>
    <div id="buttons">
        <a href="deconnexion.php" class="button deconnect">
            <i class="bi bi-person-fill-slash"></i>
              Se déconnecter
        </a>
        <a href="technos-ajouter.php" class="button add">
            <i class="bi bi-database-fill-add"></i>
              Nouvelle techno
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
    $select = "SELECT * FROM `techno`";

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
            <th scope="col">Icone</th>
            <th scope="col">Alt Icone</th>
            <th scope="col">Valide</th>
            <th scope="col">Modif.</th>
        </thead>
        <tbody>
                <?php
                while($techno = mysqli_fetch_assoc($result)){
                    if($techno['valide'] == 1){
                        $valide = "<i class=\"bi bi-eye-fill\"></i>";
                    } else {
                        $valide = "<i class=\"bi bi-eye-slash-fill\"></i>";
                    }

                    echo "<tr>
                            <td>{$techno['id']}</td>
                            <td><img src=\"../cv-ressources/techno/{$techno['icone']}\"</td>
                            <td>{$techno['alt-icone']}</td>
                            <td>{$valide}</td>
                            <td class=\"crud\">
                                <a 
                                    href=\"technos-modifier.php?id={$techno['id']}\">
                                        <i class=\"bi bi-pencil-fill\"></i>
                                </a> /
                                <a 
                                    href=\"technos-supprimer.php?id={$techno['id']}\" 
                                    onclick=\"javascript:return confirm('Êtes vous sûr de vouloir supprimer la technotechnos {$techno['icone']} - {$techno['alt-icone']}');\">
                                        <i class=\"bi bi-trash3-fill\"></i>
                                </a>
                            </td>
                        </tr>
                    ";
                    
                }
                ?>
        </tbody>
        <tfoot>
            <th scope="row" colspan="4">Nombre d'Interets :</th>
            <td><?php echo $nb_lignes ?></td>
        </tfoot>
    </table>
</body>
</html>