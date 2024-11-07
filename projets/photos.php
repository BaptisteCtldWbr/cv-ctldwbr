<script src="cv-ressources/js/galerie.js"></script>

<h3 class="jop">JOP 2024 : Para PingPong</h3>
<p>Pour les Jeux Paralympiques, je suis allé voir plusieurs matchs de para PingPong le 1<sup>er</sup> septembre, de 8<sup>e</sup> et de 16<sup>e</sup> de finale.</p>

<?php

$photos = [
    "240901-ParaPingPong-01.jpg" =>  "Le stade de l'Arena Bercy pour le Ping Pong",
    "240901-ParaPingPong-02.jpg" =>  "Flaura Vautier fait son service, face à Nada Matic",
    "240901-ParaPingPong-03.jpg" =>  "Le duel Faith Obazuaye vs Tian Chiau Wen",
    "240901-ParaPingPong-04.jpg" =>  "Mateo Boheas face à Ivan Karpov",
    "240901-ParaPingPong-05.jpg" =>  "Claudio Massad face à Krisztian Gardos",
    "240901-ParaPingPong-06.jpg" =>  "Igor Mistzal fait son service face à Bunpot Sillapakong",
    "240901-ParaPingPong-07.jpg" =>  "Luka Bakic fait son service contre Funamaya Mahiro",
    "240901-ParaPingPong-08.jpg" =>  "Jose Manuel Ruiz fait son service face à Manuel Echaveguren",
    "240901-ParaPingPong-09.jpg" =>  "Ivan Karpov face à Mateo Boheas",
    "240901-ParaPingPong-10.jpg" =>  "Le drapeau des supporters",
    "240901-ParaPingPong-11.jpg" =>  "Mateo Boheas fait (encore) son service face à Ivan Karpov",
    "240901-ParaPingPong-12.jpg" =>  "Borna Zohil face à Victor Farinloye",
    "240901-ParaPingPong-13.jpg" =>  "Claudio Massad face à Krisztian Gardos",
    "240901-ParaPingPong-14.jpg" =>  "Lucie Hautiere face à Tomono Yuri"
];
$cheminSrc = "projets/photos/jo-para-pingpong/";
$cheminMinia = "projets/photos/jo-para-pingpong/mini/";

afficherGalerie("Parapingpong", $photos, $cheminSrc, $cheminMinia);
afficherGalerie("Parapingpong2", $photos, $cheminSrc, $cheminMinia);

?>