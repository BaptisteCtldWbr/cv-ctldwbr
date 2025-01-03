<?php

require_once('cv-ressources/includes/connexion-bdd.php');
require_once('cv-ressources/includes/fonctions-donnees.php');

//---------------------------------
//- TRAITEMENT FORMULAIRE CONTACT -
//---------------------------------

$mailEnvoi = "baptiste.catelandwambre@gmail.com";                                               //l'adresse à qui envoyer le message

date_default_timezone_set("Europe/Paris");                                                      //pour que l'heure soit soit l'heure française

if (isset($_POST['envoi'])) {                                                                   //si le bouton envoyé est appuyé, on commence le traitement.
    NTUI();                                                                                     //Never trust user input
    if (isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['msg'])) {                //si toutes les données sont saisies
        $nom = $_POST['nom'];
        $mail = $_POST['mail'];
        $message = $_POST['msg'];
        $date = date("Y-m-d G:i:s");
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {                                        //et que le mail est valide
            $msgErreur = "Email non valide, veuillez réessayer.";
        } else {                                                                                //on envoie le message :
            $sujet = sprintf("[Portfolio CtldWbr] Nouveau message de %s à %s", $nom, $date);    //définition du sujet
            //echo $sujet;
            $headers = "Reply-To: $mail" . "\r\n" . "FROM: $nom <ctldwbr@alwaysdata.net>" . "\r\n" . "cc:$mail";

            $mailOk = mail($mailEnvoi, $sujet, $message, $headers);                             //envoie du mail /!\ pas possible en local
            $query = "INSERT INTO message (`date-heure`, `nom`, `mail`, `message`) VALUES ('{$date}', '{$nom}', '{$mail}', '{$message}');";
            //echo $query;
            $queryOk = mysqli_query($lien, $query);

            if ($mailOk == true && $queryOk == true){
                $msgOk = "Message envoyé ! vous avez reçu une copie par mail avec le sujet : $sujet";   //message de validation.
            } else {
                $msgErreur = "Problème avec l'envoi du message, veuillez réessayer plus tard.";
            }
        }
    } else {
        $msgErreur = "Veuillez remplir tous les champs.";
    }
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - Baptiste Cateland Wambre</title>
    <?php require_once('cv-ressources/includes/head.php'); ?>
    <link rel="stylesheet" href="cv-ressources/css/index-header.css">
    <link rel="stylesheet" href="cv-ressources/css/index-main.css">
    <link rel="stylesheet" href="cv-ressources/css/index-contact.css">
    <link rel="stylesheet" href="cv-ressources/css/index-details.css">
    <link rel="stylesheet" href="cv-ressources/css/index-lk.css">
    <link rel="stylesheet" href="cv-ressources/css/projets.css">
    <meta property="og:title" content="CV - Baptiste Cateland Wambre">
    <meta property="og:description" content="Découvrez mon profil à travers mon CV et mes expériences">
    <meta property="og:type" content="website">
    <meta property="og:image" content="http://catelandwambre.alwaysdata.net/cv-ressources/img/meta-miniature.png">
    <style>
        <?php
        
        $couleur = "SELECT `id`, `couleur` FROM portfolio WHERE statut = 'visi' OR statut = 'term' OR statut = 'cons' ORDER BY `date` DESC;";

        $resultCouleurs = mysqli_query($lien, $couleur);
        while($couleurs = mysqli_fetch_assoc($resultCouleurs)){
            if($couleurs['couleur'] != null){
                echo "#projet-{$couleurs['id']}, #projet-{$couleurs['id']} *{
                        --bleu: #{$couleurs['couleur']} !important;
                    }";
            }
            
        }
        
        ?>
    </style>
</head>

<body>
    <header>
        <div id="header-couleur">
            <section id="moi">
                <div id="moi-pp">
                    <img src="cv-ressources/img/DSCF0339.jpg" alt="Photo">
                </div>
                <div id="moi-texte">
                    <h1>Baptiste<br>Cateland--Wambre</h1>
                    <p id="moi-titre">Étudiant en développement web</p>
                    <p id="moi-stage">En recherche de <strong>stage en développement web</strong> à partir du 14 avril
                        2025 pour une durée minimale de 10 semaines !​</p>
                </div>
            </section>
        </div>
    </header>

    <main id="contenu">

        <?php
        require_once('cv-ressources/includes/nav.php');
        ?>

        <p id="lien-cv">Accéder au CV au format PDF : <a href="cv-ressources/cv-catelandwambre.pdf" download="CATELANDWAMBRE-CV.pdf">cv-catelandwambre.pdf</a><i class="bi-filetype-pdf"></i></p>

        <section id="details">
            <h2>Détails</h2>
            <div id="details">
                <article id="contact">
                    <h3>Contact</h3>
                    <ul id="contact">
                        <?php

                        $queryContact = "SELECT * FROM `contact` WHERE `valide` = 1;";                        //requête : tous les contacts, publics
                        $resultContact = mysqli_query($lien, $queryContact);                                  //envoi de la reqûete au SGBDR

                        while ($ligne = mysqli_fetch_assoc($resultContact)){                                 //affichage de toutes les technos avec la structure HTML
                            if ($ligne['lien'] != null){
                                printf("<li><a href=\"%s\" target=\"_blank\"><i class=\"bi-%s\"></i> %s</a></li>", $ligne['lien'], $ligne['id-bootstrap'], $ligne['texte']);
                            } else {
                                printf("<li><i class=\"bi-%s\"></i> %s</li>", $ligne['id-bootstrap'], $ligne['texte']);
                            }
                        }
                        mysqli_free_result($resultContact);

                        ?>
                    </ul>
                </article>
                <div id="competences">
                    <article id="technologies">
                        <h3>Technologies</h3>
                        <div id="techno-flex">
                            <?php

                                $queryTechno = "SELECT * FROM `techno` WHERE `valide` = 1;";                        //requête : toutes les technologies, publiques
                                $resultTechno = mysqli_query($lien, $queryTechno);                                  //envoi de la reqûete au SGBDR

                                while ($ligne = mysqli_fetch_assoc($resultTechno)){                                 //affichage de toutes les technos avec la structure HTML
                                    $cheminIcnTechno = "cv-ressources/techno/".$ligne['icone'];
                                    printf("<img src=\"%s\" alt=\"%s\">", $cheminIcnTechno, $ligne['alt-icone']);
                                }
                                mysqli_free_result($resultTechno);

                            ?>
                        </div>
                    </article>
                    <article id="langues">
                        <h3>Langues</h3>
                        <ul>
                            <?php

                            $queryLangue = "SELECT * FROM `langue` WHERE `valide` = 1;";                           //requête : tous les hobbys, publics
                            $resultLangue = mysqli_query($lien, $queryLangue);                                    //envoi de la reqûete au SGBDR

                            while ($ligne = mysqli_fetch_assoc($resultLangue)){                                    //affichage de tous les hobbys avec la structure HTML
                                printf("<li><span class=\"langue-emoji\">%s</span> %s - <span class=\"niveau-langue\">%s</span></li>", $ligne['emoji'], $ligne['langue'], $ligne['niveau']);
                            }
                            mysqli_free_result($resultLangue);

                            ?>
                        </ul>
                    </article>
                </div>
                <article id="interets">
                    <h3>Centres d'intérêt</h3>
                    <ul>
                        <?php

                        $queryInteret = "SELECT * FROM `interet` WHERE `valide` = 1;";                          //requête : tous les hobbys, publics
                        $resultInteret = mysqli_query($lien, $queryInteret);                                    //envoi de la reqûete au SGBDR

                        while ($ligne = mysqli_fetch_assoc($resultInteret)){                                    //affichage de tous les hobbys avec la structure HTML
                            printf("<li>%s %s</li>", $ligne['emoji'], $ligne['texte']);
                        }
                        mysqli_free_result($resultInteret);

                        ?>
                    </ul>
                </article>
            </div>
        </section>

        <section id="formations">
            <h2>Expériences et Formations</h2>
            <?php

            $queryExp = "SELECT * FROM `experiences` WHERE `valide` = 1 ORDER BY `date-debut` DESC;";           //requête : toutes les expériences publiques
            $resultExp = mysqli_query($lien, $queryExp);

            while ($ligne = mysqli_fetch_assoc($resultExp)){                                                    //on les affiche 
                $cheminIcnExp = "cv-ressources/exp/".$ligne['icone'];                                           //définition du chemin d'accès à l'icone
                echo "<article class=\"exp\">";
                    echo "<img src=\"{$cheminIcnExp}\" alt=\"{$ligne['alt-icone']}\" class=\"exp-img\">";        //icone
                    echo "<div class=\"exp-text\">";
                        echo "<h4>" . $ligne['titre'];                                                          //titre
                        if ($ligne['titre-detail'] != null){                                                     //s'il y a des détails
                            echo "<span class=\"exp-det\">{$ligne['titre-detail']}</span>";                     //détails
                        }
                        echo "</h4>";
                        echo "<p class=\"exp-date\">{$ligne['periode']}</p>";                                   //période
                        echo "<p class=\"exp-desc\">{$ligne['description']}</p>";                               //description
                        if ($ligne['competences'] != null){                                                      //s'il y a des compétences
                            echo "<p class=\"exp-comp\">{$ligne['competences']}</p>";                           //compétences
                        }
                    echo "</div>";
                echo "</article>";
            }

            mysqli_free_result($resultExp);

            ?>
        </section>

        <section id="portfolio">
            <h2>Portflio</h2>

            <?php

            $query = "SELECT `id`, `url`, `nom-complet`, `nom-court`, `miniature`, `alt-miniature`, `contexte`, `periode`, `tags`, `description`, `statut`, `couleur` FROM portfolio WHERE statut = 'visi' OR statut = 'term' OR statut = 'cons' ORDER BY `date` DESC;";

            $result = mysqli_query($lien, $query);                                              //Execution de la reqûete pour avoir les données

            if($result){
                $nb_lignes = mysqli_num_rows($result);
            } else {
                echo "<p>Problème avec la requête - Veuillez revenir bientôt, désolé.</p>";
            }

            if($nb_lignes == 0){                                                                //Gestion des erreurs, affichage du nombre de projet
                echo "<p>Aucun projet publié - Veuillez revenir bientôt, désolé.</p>";
            } else if ($nb_lignes == 1) {
                echo "<p>{$nb_lignes} projet.</p>";
            } else {
                echo "<p>{$nb_lignes} projets.</p>";
            }
            
            ?>
            <div class="cont-projet">
            <?php
            while($projet = mysqli_fetch_assoc($result)){                                       //affichage des projets
                if ($projet['statut'] == "cach" || $projet['statut'] == "cans"){                //deuxième vérification du statut
                } else {
                    echo "<article
                    class=\"projet {$projet['contexte']}\"
                    id=\"projet-{$projet['id']}\"
                    style=\"
                        background-image: url('projets/miniature/{$projet['miniature']}');
                    title=\"{$projet['nom-complet']} : {$projet['description']}\">
                    <a class=\"sans\" href=\"projet.php?p={$projet['url']}\">";
                    echo "<h4 class=\"titre-projet\">{$projet['nom-court']}</h4>";
                    echo "<ul>";
                        $tags = tagsEtOutils($tagsTableau, $projet['tags']);
                        $listeTags= "";
                        foreach($tags as $key => $value){
                            if(substr($value, 0, 3) == "bi-"){
                                $listeTags .= "<li><i class=\"{$value}\" title=\"{$key}\"></i></li>";
                            } else {
                                $listeTags .= "<li><img src=\"{$value}\" alt=\"{$key}\" title=\"{$key}\"></li>";
                            }
                        }
                        echo $listeTags;
                    echo "</ul></a></article>";
                }
            }

            echo "</div>"

            ?>
        </section>

        <section id="contact-form">
            <h2>Me contacter</h2>

            <ul id="contact-liens">
                <?php

                $queryContact = "SELECT * FROM `contact` WHERE `valide` = 1;";                        //requête : tous les contacts, publics
                $resultContact = mysqli_query($lien, $queryContact);                                  //envoi de la reqûete au SGBDR

                while ($ligne = mysqli_fetch_assoc($resultContact)){                                 //affichage de toutes les technos avec la structure HTML
                    if ($ligne['lien'] != null){
                        echo "<li><a href=\"{$ligne['lien']}\" target=\"_blank\"><i class=\"bi-{$ligne['id-bootstrap']}\"></i></a></li>";
                    }
                }
                mysqli_free_result($resultContact);

                ?>
            </ul>

            <?php 
            
            if (isset($msgErreur)) {
                echo "<p class=\"message erreur\">" . $msgErreur . "</p>";
            } else if (isset($msgOk)){
                echo "<p class=\"message valide\">" . $msgOk . "</p>";
            }
            
            ?>
            
            <form action="#contact-form" method="post">
                <div class="contact-champs" id="div-nom">
                    <label for="nom" class="required">Votre nom</label>
                    <input type="text" name="nom" id="nom" placeholder="Prénom Nom..." required>
                </div>
                <div class="contact-champs" id="div-mail">
                    <label for="mail" class="required">Votre mail</label>
                    <input type="email" name="mail" id="mail" placeholder="hello@exemple.fr" required>
                </div>
                <div class="contact-champs" id="div-msg">
                    <label for="msg" class="required">Votre message</label>
                    <textarea name="msg" id="msg" placeholder="Bonjour, je souhaite vous contacter pour ..." required></textarea>
                </div>
                <button type="submit" name="envoi">Envoyer</button>
            </form>
        </section>

        <section id="linkedin">
            <h2><i class="bi bi-linkedin"></i> Posts Linkedin</h2>
            <div id="lk-grid">
            <?php
            
            $selectLK = "SELECT * FROM `posts-lk` WHERE `valide` = 1 ORDER BY 'date' DESC;";
            $resultLK = mysqli_query($lien, $selectLK);

            if($resultLK){
                $nb_lignesLK = mysqli_num_rows($resultLK);
            } else {
                echo "<p>Problème avec la requête - Veuillez revenir bientôt, désolé.</p>";
            }
            if($nb_lignesLK == 0){
                echo "<p>Aucun post publié - Veuillez revenir bientôt, désolé.</p>";
            } else {
                echo "<p>{$nb_lignesLK} posts.</p>";
            }

            while($post = mysqli_fetch_assoc($resultLK)){
                $date = formatDateFr($post['date']);
                echo "<a href=\"{$post['lien-lk']}\" target=\"_blank\"><article>
                    <div class=\"lk-desc\">
                        <h4>{$post['auteur']} <span class=\"lk-date\">&lt;{$date}&gt;</span></h4>
                        <p class=\"text-lk\">{$post['texte']}</p>
                        <p class=\"lien-lk\">Voir plus...</p>
                    </div>
                    <img src=\"cv-ressources/lk-minia/{$post['img']}\" alt=\"{$post['alt-img']}\">
                </article></a>";
            }
            ?>
                
            </div>
        </section>
    </main>
    <?php require_once('cv-ressources/includes/footer.php'); ?>
</body>

</html>