<p>Pour ce projet universitaire, il fallait faire de la datavisualisation, c'est à dire mettre en forme des données pour les visualiser efficacement, et avec originalité. Pour cela, nous avons eu deux sujets à traiter : une application interactive en JavaScript et un livre d'artiste fait en borderie.</p>

<h3>Cinémas franciliens</h3>
<p>La première partie concerne donc la conception et le développement d'une application web interactive en JS, il a fallut choisir un jeu de données (jusque là, ça va ce n'est pas très compliqué), puis développer le site web pour donner vies à ces données. Nous avons choisi des données sur les salles de cinémas en Île de France, un jeu de donnée traité par la Région Île de France qui vient du CNC. Nous y avons intégré une carte de ces cinémas grâce au plugin Leaflet, un camembert avec l'origine des films, et une comparaison des compilations entre les départements.</p>
<figure class="siteIntegre">
    <iframe src="https://baptistectldwbr.github.io/SAE303" frameborder="0">https://baptistectldwbr.github.io/SAE303</iframe>
    <figcaption><a href="https://baptistectldwbr.github.io/SAE303" target="_blank">Le site déployé</a> - Pour une expérience optimale, ouvrez-le en grand écran.</figcaption>
</figure>
<p>Je me suis personnellement chargé de la conception de la maquette, des popup ainsi que d'une partie de la comparaison entre les départements.</p>
<p>
    C'est un travail de groupe, que j'ai réalisé avec 
    Abby Baud-Nazebi, 
    <a href="https://www.linkedin.com/in/falou-badiane-b555422a9/" target="_blank">Falou Badiane</i></a> et 
    <a href="https://www.linkedin.com/in/am%C3%AEn-benamaouche-7b75432a9/" target="_blank">Amîn Benamaouche</i></a>.
</p>


<h3>Extrême droite, maintenant tolérable ?</h3>
<p>En parallèle, nous avons eu pour mission de faire un livret d'artiste en broderie pour de la datavisualisation (oui, c'est farfelu !). Et pour cela sujet libre. J'ai donc choisi un sujet qui me tient à cœur : la montée de l'extrême droite. Après avoir fait des recherches sur ce qui se faisait, une planche d'inspiration, et évidemment après avoir cherché les stats, COUTURE !</p>
<script src="cv-ressources/js/galerie.js"></script>
<?php

$broderie = [
    "page1.png" => "Page 1",
    "page2-3.png" => "Page 2-3",
    "page4-5.png" => "Page 4-5",
    "page6-7.png" => "Page 6-7",
    "page8-9.png" => "Page 8-9",
    "page10-11.png" => "Page 10-11",
    "page12-13.png" => "Page 12-13",
    "page14-15.png" => "Page 14-15"
];

afficherGalerie(
    "broderie", 
    $broderie, 
    "projets/sae303/", 
    "projets/sae303/mini/"
);

?>