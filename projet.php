<?php

require_once('cv-ressources/includes/connexion-bdd.php');                       //inclure la connexion au SGBDR

$url= $_GET['p'];                                                               //récupération du projet par l'url

$query = "SELECT * FROM portfolio WHERE `url` = \"{$url}\"";                    //définition de la requête pour avoir les données du projet
//echo $query;

$result = mysqli_query($lien, $query);                                          //exection de la requête

if($result){                                                                    //si c'est ok,
    $nb_ligne = mysqli_num_rows($result);
    printf("SELECT a retourné %d de lignes. <br>", $nb_ligne);                  //on écrit le nombre de lignes 
} else {
    die();                                                                      //sinon, on arrête les frais
}

/*if($nb_ligne=0){
    header("Location: 404.php");
} else if ($nb_ligne>1){
    header('Location: projets.php');
}*/

$projet = mysqli_fetch_assoc($result);

echo "<pre>";
print_r($projet);
echo "</pre>";

require_once('cv-ressources/includes/contexte-tags.php');

$contexte = contexte($contexteTableau, $projet['contexte']);
echo "contexte = {$contexte}";

$tags = tagsEtOutils($tagsTableau, $projet['tags']);

echo "<pre>";
print_r($tags);
echo "</pre>";

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV et Portfolio Web - BaptisteCtldWbr</title>
    <link rel="stylesheet" href="cv-ressources/css/reset.css">
    <link rel="stylesheet" href="cv-ressources/css/style.css">
    <link rel="stylesheet" href="cv-ressources/css/projet.css">
    <link rel="shortcut icon" href="cv-ressources/favicon.png" type="image/x-icon">
    <meta property="og:title" content="CV et Portfolio Web - Baptiste Cateland Wambre">                                         <!--Nom projet-->
    <meta property="og:description" content="Découvrez mon profil à travers mon CV et mes expériences">                         <!--Description Projet-->
    <meta property="og:type" content="article">
    <meta property="og:image" content="http://catelandwambre.alwaysdata.net/cv-ressources/meta-miniature.png">                  <!--Image Projet, URL complète-->
</head>
<body>
    <?php include_once('cv-ressources/includes/header.php'); ?>

    <main>

        <div class="pres">
            <div class="pres-texte">
                <h2><?php echo($projet['nom-complet']); ?></h2>                                                                                    <!--Nom Projet-->
                <p class="cadre-date"><?php echo($contexte); ?> <span class="chevron">></span> <?php echo($projet['date']); ?></p>                      <!--cadre et date Projet-->
                <ul>                                                                                                            <!--Tags et outils-->
                    <li><i class="bi-filetype-html"></i>HTML</li>
                    <li><i class="bi-filetype-css"></i>CSS</li>
                    <li><i class="bi-filetype-php"></i>PHP</li>
                    <li><i class="bi-filetype-sql"></i>MySQL</li>
                    <li><i class="bi-github"></i>Github</li>
                </ul>
                <p class="desc">Afin de présenter mon profil et mes atouts, j'ai conçu et développé ce petit site web. Vous pouvez retrouver dessus mon CV : mes expériences et mon contact, avec mon portfolio : les projets que j'ai réalisé récemment.</p>                                                        <!--Descirption Projet-->
            </div>
            <img src="cv-ressources/img-portfolio/cv-portfolio.png" alt="Un bout de code du portfolio / CV">                    <!--Image Projet-->
        </div>

        <!--Contenu Projet-->
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
        </figure>
    </main>
</body>
</html>