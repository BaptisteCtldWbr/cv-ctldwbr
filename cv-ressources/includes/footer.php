<div style="height: 200px;" id="bas"></div>
<footer>
    <p>Portfolio fait par mes propres soins !</p>
    <ul id="contact">
        <?php

            require_once('cv-ressources/includes/connexion-bdd.php');


            $queryContact = "SELECT * FROM `contact` WHERE `valide` = 1;";                        //requête : tous les contacts, publics
            $resultContact = mysqli_query($lien, $queryContact);                                  //envoi de la reqûete au SGBDR

            while ($ligne = mysqli_fetch_assoc($resultContact)){                                 //affichage de toutes les technos avec la structure HTML
                if (isset($ligne['lien'])){
                    printf("<li><a href=\"%s\" target=\"_blank\"><i class=\"bi-%s\"></i></a></li>", $ligne['lien'], $ligne['id-bootstrap']);
                } else {
                    printf("<li><i class=\"bi-%s\"></i> %s</li>", $ligne['id-bootstrap'], $ligne['texte']);
                }
            }
            mysqli_free_result($resultContact);

        ?>
    </ul>
</footer>
<a class="haut" href="#" title="Retourner en haut de la page"><i class="bi-arrow-up"></i></a>