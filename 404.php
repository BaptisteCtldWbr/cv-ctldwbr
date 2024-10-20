<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Baptiste Cateland Wambre</title>
    <?php require_once('cv-ressources/includes/head.php') ?>

</head>
<body>
    <?php require_once('cv-ressources/includes/header.php') ?>

    <?php

    if(!isset($_GET['erreur']) || empty($_GET['erreur'])){
        $msg = "La page n'existe pas. &#x1F63F;";
    } else {

        $erreur = $_GET['erreur'];

        switch ($erreur){
            case "aucun-selectionne" :
                $msg = "Aucun projet selectionné, la page n'existe pas. &#x1F63F;";
                break;
            case "projet-n-existe-pas" :
                $msg = "Ce projet n'existe pas, ou pas encore... &#x1F609;";
                break;
            case "pb-requete" :
                $msg = "Problème avec la base de donnée &#x1F63F;";
                break;
            case "projet-non-public" :
                $msg = "Le projet est privé, désolé... &#x1F63F;";
                break;
            case "aucun-projet" :
                $msg = "Il n'ya aucun projet public, revenez plus tard... &#x1F63F;";
                break;
            default :
                $msg = "La page n'hexiste pas. &#x1F63F;";
                break;
        }
    }

    ?>
    <main>
        <h2 style="font-size: 2em;">Erreur</h2>
        <p  style="font-size: 1.3em;"><?php echo $msg; ?> <a href="index.php">Retour à l'accueil</a></p>
    </main>
    <?php require_once('cv-ressources/includes/footer.php'); ?>
</body>
</html>