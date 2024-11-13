<?php

require_once('cv-ressources/includes/connexion-bdd.php');

//---------------------------------
//- TRAITEMENT FORMULAIRE CONTACT -
//---------------------------------

$mailEnvoi = "baptiste.catelandwambre@gmail.com";                                               //l'adresse à qui envoyer le message

date_default_timezone_set("Europe/Paris");                                                      //pour que l'heure soit soit l'heure française

if (isset($_POST['envoi'])) {                                                                   //si le bouton envoyé est appuyé, on commence le traitement.
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
            $headers = "Reply-To: $mail" . "\r\n" . "FROM: $nom <catelandwambre@alwaysdata.net>" . "\r\n" . "cc:$mail";

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
    <link rel="stylesheet" href="cv-ressources/css/projets.css">
    <link rel="stylesheet" href="cv-ressources/css/index-contact.css">
    <meta property="og:title" content="CV - Baptiste Cateland Wambre">
    <meta property="og:description" content="Découvrez mon profil à travers mon CV et mes expériences">
    <meta property="og:type" content="website">
    <meta property="og:image" content="http://catelandwambre.alwaysdata.net/cv-ressources/img/meta-miniature.png">
</head>

<body>
    <header>
        <div id="header-couleur">
            <section id="moi">
                <div id="moi-pp">
                    <!-- <img src="https://placehold.co/167x250?text=PHOTO" alt=""> -->
                    <img src="cv-ressources/img/DSCF0339.jpg" alt="Photo">
                </div>
                <div id="moi-texte">
                    <h1>Baptiste Cateland--Wambre</h1>
                    <p id="moi-titre">Étudiant en développement web</p>
                    <p id="moi-stage">En recherche de <strong>stage en développement web</strong> à partir du 14 avril
                        2025 pour une durée minimale de 10 semaines​</p>
                    <!--<p id="moi-valeurs">Polyvalent • Rigoureux • Ambitieux • Responsable</p>-->
                </div>
            </section>
            <div id="moi-details">
                <section id="contact">
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
                </section>
                <div id="competences">
                    <section id="technologies">
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
                    </section>
                    <section id="langues">
                        <h3>Langues</h3>
                        <ul>
                            <?php

                            $queryLangue = "SELECT * FROM `langue` WHERE `valide` = 1;";                           //requête : tous les hobbys, publics
                            $resultLangue = mysqli_query($lien, $queryLangue);                                    //envoi de la reqûete au SGBDR

                            while ($ligne = mysqli_fetch_assoc($resultLangue)){                                    //affichage de tous les hobbys avec la structure HTML
                                printf("<li>%s %s - <span class=\"niveau-langue\">%s</span></li>", $ligne['emoji'], $ligne['langue'], $ligne['niveau']);
                            }
                            mysqli_free_result($resultLangue);

                            ?>
                        </ul>
                    </section>
                </div>
                <section id="interets">
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
                </section>
            </div>
            <div id="scroll">
                <a href="#contenu" class="sans">
                    <p>></p>
                </a>
            </div>
        </div>
    </header>

    <main id="contenu">

        <?php
        require_once('cv-ressources/includes/nav.php');
        ?>

        <p id="lien-cv">Accéder au CV au format PDF : <a href="cv-pdf.php" target="_blank">cv-catelandwambre.pdf</a><i class="bi-filetype-pdf"></i></p>

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

            $query = "SELECT `url`, `nom-court`, `miniature`, `alt-miniature`, `contexte`, `periode`, `tags`, `description`, `statut` FROM portfolio WHERE statut = 'visi' OR statut = 'term' OR statut = 'cons' ORDER BY `date` DESC;";

            $result = mysqli_query($lien, $query);

            if($result){
                $nb_lignes = mysqli_num_rows($result);
            } else {
                echo "<p>Problème avec la requête - Veuillez revenir bientôt, désolé.</p>";
            }

            if($nb_lignes == 0){
                echo "<p>Aucun projet public - Veuillez revenir bientôt, désolé.</p>";
            } else if ($nb_lignes == 1) {
                echo "<p>{$nb_lignes} projet.</p>";
            } else {
                echo "<p>{$nb_lignes} projets.</p>";
            }
            
            ?>
            <div class="cont-projet">
            <?php
            require_once('cv-ressources/includes/fonctions-donnees.php');
            while($projet = mysqli_fetch_assoc($result)){
                if ($projet['statut'] == "cach" || $projet['statut'] == "cans"){
                } else {
                    echo "<article
                    class=\"projet {$projet['contexte']}\"
                    style=\"background-image: url('projets/miniature/{$projet['miniature']}');\"
                    title=\"{$projet['nom-court']} : {$projet['description']}\">
                    <a class=\"sans\" href=\"projet.php?p={$projet['url']}\">";
                    echo "<h4 class=\"titre-projet\">{$projet['nom-court']}</h4>";
                    echo "<ul>";
                        $tags = tagsEtOutils($tagsTableau, $projet['tags']);
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

            echo "</div>"

            ?>
        </section>
        <section id="contact-form">
            <h2>Me contacter</h2>

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
    </main>
    <?php require_once('cv-ressources/includes/footer.php'); ?>
</body>

</html>