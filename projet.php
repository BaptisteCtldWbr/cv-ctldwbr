<?php

require_once('cv-ressources/includes/connexion-bdd.php');                       //inclure la connexion au SGBDR

if(!isset($_GET['p']) || empty($_GET['p'])){                                    //verification de l'URL
    header("Location: 404.php?erreur=aucun-selectionne");
    die("Aucun projet sélectionné.");
}

$url= $_GET['p'];                                                               //récupération du projet par l'url

$query = "SELECT * FROM portfolio WHERE `url` = \"{$url}\"";                    //définition de la requête pour avoir les données du projet

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

if($projet['public'] == 0){                                                     //si le projet n'est pas public, on arrête le script.
    header("Location: 404.php?erreur=projet-non-public");
    die();
}

$cheminCompletMiniature = __DIR__ . "/cv-ressources/img-portfolio/" . $projet['miniature'] ;
$cheminMiniature = "cv-ressources/img-portfolio/" . $projet['miniature'] ;
$cheminContenu = "projets/" . $projet['contenu'];

require_once('cv-ressources/includes/contexte-tags.php');                       //tableau contextes et tags, avec leurs fonctions

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

        <div class="pres">
            <div class="pres-texte">
                <h2><?php echo($projet['nom-complet']); ?></h2>                                                                 <!--Nom Projet-->
                <p class="cadre-date"><?php echo($contexte); ?> <span class="chevron">></span> <?php echo($projet['date']); ?></p>  <!--cadre et date Projet-->
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

        <!--Contenu Projet-->
        <!--
        <p>Je suis parti du <a href="cv-pdf.html" target="_blank">CV print</a>, et de l'identité visuelle qui en résultait, que j'avais réalisés pour ma recherche de stage, puis l'ai décliné en page Web. Auquel j'ai rajouté mon portfolio : ça n'as pas de sens pour un apprenti développeur web d'utiliser un outils no-code ! Le site est plus ou moins responsive. J'ai utilisé HTML & CSS, avec PHP et MySQL pour gérer le contenu. J'ai également utilisé l'outil GitHub.</p>
        <p>Normalement, vous avez déjà découvert ce <a href="index.html">site</a>, si vous souhaitez voir son code, voici le dépôt GitHub : <a href="https://github.com/BaptisteCtldWbr/cv-ctldwbr" target="_blank">https://github.com/BaptisteCtldWbr/cv-ctldwbr</a></p>
        <h3>Header - Présentation</h3>
        <figure>
            <img src="cv-ressources/img-projets/cv-header.png" alt="Header du CV">
            <figcaption>Le header du site est conçu comme un réel "à côté" du CV, avec nom, prénom, photo, intitulé, contacts, compétences et centres d'intéret.</figcaption>
        </figure>
        <h3>Formations et expériences</h3>
        <figure>
            <img src="cv-ressources/img-projets/cv-exp.png" alt="La partie expériences">
            <figcaption>Toujours en suivant les standards d'un CV, mes expériences et mes formations.</figcaption>
        </figure>
        <h3>Projets</h3>
        <figure>
            <img src="cv-ressources/img-projets/cv-portfolio.png" alt="Et mes projets">
            <figcaption>Et finalement : mes projets et différentes réalisations. Ce sont des liens qui redirigent vers la page du projet en question.</figcaption>
        </figure>-->
    </main>
    <?php require_once('cv-ressources/includes/footer.php') ?>
</body>
</html>