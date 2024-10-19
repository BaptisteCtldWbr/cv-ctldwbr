<?php

require_once('cv-ressources/includes/connexion-bdd.php');

$query = "SELECT `url`, `nom-court`, `miniature`, `alt-miniature`, `contexte`, `periode`, `tags`, `description`, `public` FROM portfolio ORDER BY `date`;";

$result = mysqli_query($lien, $query);

if($result){
    $nb_ligne = mysqli_num_rows($result);
} else {
    header("Location: 404.php?erreur=pb-requete");
    die("Problème avec la requête.");
}

if($nb_ligne == 0){
    header("Location: 404.php?erreur=aucun-projet");
    die("Aucun projet retourné.");
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets</title>
</head>
<body>
<h2>Portflio</h2>
<div class="cont-projet">



    <article class="projet univ" style="background-image: url('cv-ressources/img-portfolio/cv-portfolio.png');" title="CV / Portflio : Afin de présenter mon profil et mes atouts, j'ai conçu et développé ce petit site web. Vous pouvez retrouver dessus mon CV : mes expériences et mon contact, avec mon portfolio : les projets que j'ai réalisé récemment."><!--cadre du projet ///// image projet ///// {Titre} : {Description} ({Date})--><a class="sans" href="projets.html"><!--Lien Projet-->
        <h4 class="titre-projet">CV / Portfolio</h4>        <!--Nom Projet-->
        <ul>                                                <!--Tags Projet-->
            <li><i class="bi-filetype-html"></i></li>
            <li><i class="bi-filetype-css"></i></li>
            <li><i class="bi-filetype-php"></i></li>
            <li><i class="bi-filetype-sql"></i></li>
            <li><i class="bi-github"></i></li>
        </ul>
    </a></article>
</div>
</body>
</html>