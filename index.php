<?php

require_once('cv-ressources/includes/connexion-bdd.php');

//---------------------------
//- TRAITEMENT FORM CONTACT -
//---------------------------

$mailEnvoi = "baptiste.catelandwambre@gmail.com";                                               //l'adresse à qui envoyer le message

date_default_timezone_set("Europe/Paris");                                                      //pour que l'heure soit soit l'heure française

if (isset($_POST['envoi'])) {                                                                   //si le bouton envoyé est appuyé, on commence le traitement.
    if (isset($_POST['nom']) || isset($_POST['mail']) || isset($_POST['msg'])) {                //si toutes les données sont saisies
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
                $msgOk = "Message envoyé ! vous avez reçu une copie. $sujet";                   //message de validation.
            } else {
                $msgErreur = "Problème avec l'envoi du message, veuillez réessayer plus tard.";
            }
            mysqli_free_result($queryOk);
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
    <link rel="stylesheet" href="cv-ressources/css/reset.css">
    <link rel="stylesheet" href="cv-ressources/css/style.css">
    <link rel="stylesheet" href="cv-ressources/css/index-header.css">
    <link rel="stylesheet" href="cv-ressources/css/index-main.css">
    <link rel="stylesheet" href="cv-ressources/css/index-portfolio.css">
    <link rel="stylesheet" href="cv-ressources/css/index-contact.css">
    <link rel="shortcut icon" href="cv-ressources/favicon.png" type="image/x-icon">
    <meta property="og:title" content="CV - Baptiste Cateland Wambre">
    <meta property="og:description" content="Découvrez mon profil à travers mon CV et mes expériences">
    <meta property="og:type" content="website">
    <meta property="og:image" content="http://catelandwambre.alwaysdata.net/cv-ressources/meta-miniature.png">
</head>

<body>
    <header>
        <div id="header-couleur">
            <section id="moi">
                <div id="moi-pp">
                    <img src="cv-ressources/photo.png" alt="">
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

        <p id="lien-cv">Accéder au CV au format PDF : <a href="cv-pdf.html" target="_blank">cv-catelandwambre.pdf</a><i class="bi-filetype-pdf"></i></p>

        <section id="formations">
            <h2>Expériences et Formations</h2>
            <?php

            $queryExp = "SELECT * FROM `experiences` WHERE `valide` = 1;";                                      //requête : toutes les expériences publiques
            $resultExp = mysqli_query($lien, $queryExp);

            while ($ligne = mysqli_fetch_assoc($resultExp)){                                                    //on les affiche 
                $cheminIcnExp = "cv-ressources/exp/".$ligne['icone'];                                           //définition du chemin d'accès à l'icone
                echo "<article class=\"exp\">";
                    echo "<img src=\"{$cheminIcnExp}\" alt=\"{$ligne['alt-icone']}\" class=\"exp-img\">";        //icone
                    echo "<div class=\"exp-text\">";
                        echo "<h4>" . $ligne['titre'];                                                          //titre
                        if (isset($ligne['titre-detail'])){                                                     //s'il y a des détails
                            echo "<span class=\"exp-det\">{$ligne['titre-detail']}</span>";                     //détails
                        }
                        echo "</h4>";
                        echo "<p class=\"exp-date\">{$ligne['periode']}</p>";                                   //période
                        echo "<p class=\"exp-desc\">{$ligne['description']}</p>";                               //description
                        if (isset($ligne['competences'])){                                                      //s'il y a des compétences
                            echo "<p class=\"exp-comp\">{$ligne['competences']}</p>";                           //compétences
                        }
                    echo "</div>";
                echo "</article>";
            }

            mysqli_free_result($resultExp);

            ?>
        </section>

        <!--<section id="projet">
            <h2 id="projets">Expériences et projets</h2>
            <article class="exp">
                <img src="cv-ressources/exp/cv-web.png" alt="CV sur le web" class="exp-img">
                <div class="exp-text">
                    <h4>Mon CV en HTML</h4>
                    <p class="exp-desc">Développement de mon CV en HTML CSS</p>
                    <p class="exp-comp">HTML - CSS - GitHub - Hébergement</p>
                </div>
            </article>
            <article class="exp">
                <img src="cv-ressources/exp/sae105.png" alt="Illustration de ce site" class="exp-img">
                <div class="exp-text">
                    <h4>Développement en équipe d'un site web <span class="exp-det">Projet universitaire</span></h4>
                    <p class="exp-date">Décembre 2023 et mai 2024</p>
                    <p class="exp-desc">Développement en équipe d'un site web dans le cadre d'un projet universitaire
                    </p>
                    <p class="exp-comp">HTML - CSS - PHP - MySql - GitHub - Hébergement - Travail en équipe</p>
                    <p class="exp-lien"><a href="https://asaf-font.alwaysdata.net/sae203/code" target="_blank">Site web
                            hébergé</a> - <a href="https://github.com/BaptisteCtldWbr/SAE203" target="_blank">Dépôt
                            Github</a></p>
                </div>
            </article>
            <article class="exp">
                <img src="cv-ressources/exp/ahuana.png" alt="Logo " class="exp-img">
                <div class="exp-text">
                    <h4>Protectyo Andina Rumicruz <span class="exp-det">Scouts et Guides de France</span></h4>
                    <p class="exp-date">Été 2024, préparation depuis septembre 2023, témoignage jusqu'en 2025</p>
                    <p class="exp-desc">Projet scout de solidarité et rencontre internationale en Équateur, en partenariat avec <a href="https://ahuana.com" target="_blank">Ahuana</a>, avec le soutien de <a href="https://france-volontaires.org" target="_blank">France Volontaires</a>, dans le cadre de la proposition <a href="https://compagnons.sgdf.fr/experiments-a-letranger/" target="_blank">compagnons</a>.</p>
                    <p class="exp-comp">Gestion de projet et d'équipe - Recherche de financements - Gestion et suivi de budget - Rédaction d'un dossier de camp<br>Mise en place de partenariat - Solidarité internationale - Rencontre internationale - Réalisation d'un documentaire</p>
                    <p class="exp-lien"><a href="https://drive.google.com/file/d/1BYYX7KkHGxkjYFnbCGxCnruPDGyg1EVy/view?usp=drive_link" target="_blank">Dossier d'information - subvention</a> - <a href="https://compart-ou.alwaysdata.net/ahuana" target="_blank">Page de présentation</a></p>
                </div>
            </article>
            <article class="exp">
                <img src="cv-ressources/exp/drone.png" alt="Logo baptiste.drone" class="exp-img">
                <div class="exp-text">
                    <h4>Réalisation de cinématiques au drone</h4>
                    <p class="exp-date">2022 à Aujourd'hui</p>
                    <p class="exp-desc">Par passion, je réalise des cinématiques avec mon drone. Majoritairement de par moi-même, mais aussi pour des court-métrages.</p>
                    <p class="exp-comp">Pilotage de drone stabilisé - Pilotage de drone FPV - Montage Vidéo (DaVinci
                        Resolve) - Étalonnage - Sound Design</p>
                    <p class="exp-lien"><a href="https://www.youtube.com/@baptistedrone" target="_blank">Chaîne
                            YouTube</a> - <a href="https://www.instagram.com/baptiste.drone/" target="_blank">Compte
                            Instagram</a> - <a
                            href="https://www.behance.net/gallery/199966985/baptistedrone-cinmatiques"
                            target="_blank">Projet Behance</a></p>
                </div>
            </article>
            <article class="exp">
                <img src="cv-ressources/exp/talents.png" alt="Logo du festival des talents de l'IUT" class="exp-img">
                <div class="exp-text">
                    <h4>Communication pour un festival <span class="exp-det">Projet universitaire</span></h4>
                    <p class="exp-date">Novembre 2023 à mai 2024</p>
                    <p class="exp-desc">Élaboration et mise en place d’une stratégie de communication</p>
                    <p class="exp-comp">Bases de la communication - Gestion de projet - Réalisation de pastilles de
                        communication - Réalisation d'affiches - Rédaction de contenus</p>
                    <a href="https://www.behance.net/gallery/199938091/Promotion-dun-festival" target="_blank">Pastilles
                        de communication et Affiches (Behance)</a>
                </div>
            </article>
        </section>-->

        <section id="portfolio">
            <h2>Portflio</h2>
            <div class="cont-projet">
                <article class="projet univ" style="background-image: url('cv-ressources/img-portfolio/cv-portfolio.png');" title="CV / Portflio : Afin de présenter mon profil et mes atouts, j'ai conçu et développé ce petit site web. Vous pouvez retrouver dessus mon CV : mes expériences et mon contact, avec mon portfolio : les projets que j'ai réalisé récemment."><!--cadre du projet ///// image projet ///// {Titre} : {Description} ({Date})--><a class="sans" href="projet.php"><!--Lien Projet-->
                        <h4 class="titre-projet">CV / Portfolio</h4> <!--Nom Projet-->
                        <ul> <!--Tags Projet-->
                            <li><i class="bi-filetype-html"></i></li>
                            <li><i class="bi-filetype-css"></i></li>
                            <li><i class="bi-filetype-php"></i></li>
                            <li><i class="bi-filetype-sql"></i></li>
                            <li><i class="bi-github"></i></li>
                        </ul>
                    </a></article>
                <article class="projet scout" style="background-image: url('cv-ressources/img-portfolio/cv-portfolio.png');" title="CV / Portflio : Afin de présenter mon profil et mes atouts, j'ai conçu et développé ce petit site web. Vous pouvez retrouver dessus mon CV : mes expériences et mon contact, avec mon portfolio : les projets que j'ai réalisé récemment."><!--image projet ///// {Titre} : {Description} ({Date})--><a class="sans" href="projets.html"><!--Lien Projet-->
                        <h4 class="titre-projet">CV / Portfolio</h4> <!--Nom Projet-->
                        <ul> <!--Tags Projet-->
                            <li><i class="bi-filetype-html"></i></li>
                            <li><i class="bi-filetype-css"></i></li>
                            <li><i class="bi-filetype-php"></i></li>
                            <li><i class="bi-filetype-sql"></i></li>
                            <li><i class="bi-github"></i></li>
                        </ul>
                    </a></article>
                <article class="projet audiovisuel" style="background-image: url('cv-ressources/img-portfolio/cv-portfolio.png');" title="CV / Portflio : Afin de présenter mon profil et mes atouts, j'ai conçu et développé ce petit site web. Vous pouvez retrouver dessus mon CV : mes expériences et mon contact, avec mon portfolio : les projets que j'ai réalisé récemment."><!--image projet ///// {Titre} : {Description} ({Date})--><a class="sans" href="projets.html"><!--Lien Projet-->
                        <h4 class="titre-projet">CV / Portfolio</h4> <!--Nom Projet-->
                        <ul> <!--Tags Projet-->
                            <li><i class="bi-filetype-html"></i></li>
                            <li><i class="bi-filetype-css"></i></li>
                            <li><i class="bi-filetype-php"></i></li>
                            <li><i class="bi-filetype-sql"></i></li>
                            <li><i class="bi-github"></i></li>
                        </ul>
                    </a></article>
            </div>
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
            
            <form action="#" method="post">
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