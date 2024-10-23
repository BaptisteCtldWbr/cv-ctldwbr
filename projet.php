<?php

require_once('cv-ressources/includes/connexion-bdd.php');                       //inclure la connexion au SGBDR

if(!isset($_GET['p']) || empty($_GET['p'])){                                    //verification de l'URL
    header("Location: 404.php?erreur=aucun-selectionne");
    die("Aucun projet sélectionné.");
}

$url= $_GET['p'];                                                               //récupération du projet par l'url

$query = "SELECT * FROM portfolio WHERE `url` = \"{$url}\";";                    //définition de la requête pour avoir les données du projet

$result = mysqli_query($lien, $query);                                          //exection de la requête

if($result){                                                                    //si c'est ok,
    $nb_ligne = mysqli_num_rows($result);
} else {
    header("Location: 404.php?erreur=pb-requete");
    die("Problème avec la requête.");                                           //sinon, on arrête les frais et on redirige vers la 404
}

if($nb_ligne == 0){                                                             //s'il n'y pas de projets
    header("Location: 404.php?erreur=projet-n-existe-pas");                     //on redirige vers la 404
    die("Aucun projet retourné.");
} else if ($nb_ligne>1){                                                        //s'il y a trop de projets
    header('Location: 404.php?erreur=trop-de-projet');                          //on redirige vers la 404
    die("{$nb_ligne} projets retournés. Il doit y en avoir qu'un.");
}

$projet = mysqli_fetch_assoc($result);                                          //on assigne le résultat de la requête au tableau $projet.

/* NOUVEAU : avec visibilité et statut.
if($projet['public'] == 0){                                                     //si le projet n'est pas public, on arrête le script.
    header("Location: 404.php?erreur=projet-non-public");
    die();
}*/

$cheminCompletMiniature = __DIR__ . "/cv-ressources/img-portfolio/" . $projet['miniature'] ;
$cheminMiniature = "cv-ressources/img-portfolio/" . $projet['miniature'] ;
$cheminContenu = "projets/" . $projet['contenu'];

require_once('cv-ressources/includes/fonctions-donnees.php');                       //tableau contextes et tags, avec leurs fonctions

$contexte = contexte($contexteTableau, $projet['contexte']);                    //on récupère le texte associé au contexte

$tags = tagsEtOutils($tagsTableau, $projet['tags']);                            //on récupère les tags et leurs id bootstrap

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $projet['nom-court']; ?> - BaptisteCtldWbr</title>
    <?php require_once('cv-ressources/includes/head.php'); ?>
    <link rel="stylesheet" href="cv-ressources/css/projet.css">
    <meta property="og:title" content="<?php echo $projet['nom-complet']; ?> - Baptiste Cateland Wambre">                       <!--Nom projet-->
    <meta property="og:description" content="<?php echo $projet['description'] ?>">                                             <!--Description Projet-->
    <meta property="og:type" content="article">
    <meta property="og:image" content="<?php echo $cheminCompletMiniature; ?>">                                                 <!--Image Projet, URL complète-->
</head>
<body>
    <?php include_once('cv-ressources/includes/header.php'); ?>

    <main>

        <?php

        switch ($projet['statut']) {
            case "cons" :
                echo "<p class=\"projet-statut\"><i class=\"bi bi-cone-striped\"></i>Projet en cours, revenez plus tard !</p>";
                break;
            case "cach" :
                echo "<p class=\"projet-statut\"><i class=\"bi bi-eye-slash-fill\"></i>Projet non public, n'hésitez à découvir les autres ! <a href=\"index.php#portfolio\"><i class=\"bi bi-arrow-right-short\"></i>Mes projets</a></p>";
                die();
                break;
            case "cans" :
                echo "<p class=\"projet-statut\"><i class=\"bi bi-cone-striped\"></i>Projet en cours, revenez plus tard !</p>";
                echo "<p class=\"projet-statut\"><i class=\"bi bi-eye-slash-fill\"></i>Projet non public, n'hésitez à découvir les autres ! <a href=\"index.php#portfolio\"><i class=\"bi bi-arrow-right-short\"></i>Mes projets</a></p>";
                die();
                break;
            case "term" :
                break;
            case "visi" :
                break;
            default :
                die("problème avec le statut du projet, revenez plus tard, désolé.");
                break;
        }
        
        ?>
        <div class="pres">
            <div class="pres-texte">
                <h2><?php echo($projet['nom-complet']); ?></h2>                                                                 <!--Nom Projet-->
                <p class="cadre-date">                                                                                          <!--cadre et date Projet-->
                    <?php echo($contexte); ?> 
                    <span class="chevron"> > </span> 
                    <?php
                    
                    echo($projet['periode']); 
                    
                    if($projet['statut']=="term"){
                        echo "<span class=\"chevron\"> > </span>";
                        echo "Projet terminé";
                    }
                    
                    ?>
                </p>
                <ul>
                <?php                                                                                                           //Tags
                foreach($tags as $key => $value){
                    printf("<li><i class=\"bi-%s\"></i>%s</li>", $value, $key);                                                 //impression avec la structure Front
                }                
                ?>
                </ul>
                <p class="desc"><?php echo $projet['description'] ?></p>                                                        <!--Descirption Projet-->
                <?php $projet['alt-miniature'] ?>
            </div>
            <img src="<?php echo $cheminMiniature ?>" alt="<?php echo $projet['alt-miniature']; ?>">                            <!--Image Projet-->
        </div>
        
        <?php

        require_once($cheminContenu);

        ?>
    </main>
    <?php
        require_once('cv-ressources/includes/footer.php');
        mysqli_free_result($result);
        mysqli_close($lien);
    ?>
</body>
</html>