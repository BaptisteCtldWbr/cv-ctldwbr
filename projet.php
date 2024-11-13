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
    header("Location: index.php#portfolio");                                    //on redirige vers la 404
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

$cheminMiniature = "projets/miniature/" . $projet['miniature'] ;                //Récupération des chemins des médias
$cheminCompletMiniature = __DIR__ . "/" . $cheminMiniature ;                    //Pour la miniature "meta", qui a besoin d'être un chemin absolu
$cheminContenu = "projets/" . $projet['contenu'];

require_once('cv-ressources/includes/fonctions-donnees.php');                   //tableau contextes et tags, avec leurs fonctions

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
    <link rel="stylesheet" href="cv-ressources/css/projets.css">
    <meta property="og:title" content="<?php echo $projet['nom-complet']; ?> - Baptiste Cateland Wambre">                       <!--Nom projet-->
    <meta property="og:description" content="<?php echo $projet['description'] ?>">                                             <!--Description Projet-->
    <meta property="og:type" content="article">
    <meta property="og:image" content="<?php echo $cheminCompletMiniature; ?>">                                                 <!--Image Projet, URL complète-->
</head>
<body>
    <?php include_once('cv-ressources/includes/header.php'); ?>

    <main>

        <?php

        /*
        Vérfication du status du projet
        cons = en contruction
        cach = caché - non public
        cans = en construction et caché
        term = terminé
        visi = visible
        */

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
                    if(substr($value, 0, 3) == "bi-"){                                                                          //si c'est une icone Bootstrap
                        printf("<li><i class=\"%s\"></i>%s</li>", $value, $key);                                                //Affiche l'icone
                    } else {
                        printf("<li><img src=\"%s\" alt=\"%s\">%s</li>", $value, $key, $key);                                   //Ou affiche le logo image
                    }
                }
                ?>
                </ul>
                <p class="desc"><?php echo $projet['description'] ?></p>                                                        <!--Descirption Projet-->
                <?php 
                
                if($projet['lien1-nom'] != null && $projet['lien1-lien'] != null){
                    echo "<ul class=\"lien\">";
                    echo "<li><a href=\"{$projet['lien1-lien']}\" target=\"_blank\">{$projet['lien1-nom']}</a></li>";
                    if($projet['lien2-nom'] != null && $projet['lien2-lien'] != null){
                        echo "<li><a href=\"{$projet['lien2-lien']}\" target=\"_blank\">{$projet['lien2-nom']}</a></li>";
                    }
                    echo "</ul>";
                }
                
                ?>
            </div>
            <div
                class="miniature"
                style="background-image: url('<?php echo $cheminMiniature;?>');"
                >
                <img 
                    src="<?php echo $cheminMiniature; ?>"
                    alt="<?php echo $projet['alt-miniature']; ?>"
                >
            </div>
        </div>
        <div class="content">
        <?php

        require_once($cheminContenu);

        ?>
        </div>
        <?php

        if ($projet['suggestions']!=null){
            echo "<section class=\"projet-similaires\">";
            echo "<h2>Projets similaires</h2>";
            $suggestions = explode(",", $projet['suggestions']);

            echo "<div class=\"cont-projet\">";
            
            foreach($suggestions as $IDsuggestion){
                $selectSuggestions = "SELECT * FROM portfolio WHERE `id` = {$IDsuggestion}";
                $resultSuggestions = mysqli_query($lien, $selectSuggestions);
                $suggestion = mysqli_fetch_assoc($resultSuggestions);
                if ($suggestion['statut'] != "cans" AND $suggestion['statut'] != "cach"){
                    echo "<article
                            class=\"projet {$suggestion['contexte']}\"
                            style=\"background-image: url('projets/miniature/{$suggestion['miniature']}');\"
                            title=\"{$suggestion['nom-court']} : {$suggestion['description']}\">
                            <a class=\"sans\" href=\"projet.php?p={$suggestion['url']}\">";
                            echo "<h4 class=\"titre-projet\">{$suggestion['nom-court']}</h4>";
                            echo "<ul>";
                            $tags = tagsEtOutils($tagsTableau, $suggestion['tags']);
                            foreach($tags as $key => $value){
                                if(substr($value, 0, 3) == "bi-"){
                                    echo "<li><i class=\"{$value}\"></i></li>";
                                } else {
                                    echo "<li><img src=\"{$value}\" alt=\"{$key}\"></li>";
                            }
                        }
                        echo "</ul></a></article>";
                    }
                }
                echo "<div>";
                echo "</section>";
            }
        
            
            ?>
    </main>
    <?php
        require_once('cv-ressources/includes/footer.php');
        mysqli_free_result($result);
        mysqli_close($lien);
    ?>
</body>
</html>