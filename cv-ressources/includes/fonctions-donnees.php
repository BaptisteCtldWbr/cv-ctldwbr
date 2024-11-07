<?php
//------------
//- CONTEXTE -
//------------

$contexteTableau = array(                                         //définition du tableau
    'univ'          => "Projet universitaire",
    'scout'         => "Projet scout",
    'drone'         => "Projet audiovisuel",
    'studio195'     => "Projet audiovisuel avec Studio195",
    'photo'         => "Projet photo"
);

function contexte(array $tableau, string $classe) : string{ //définition de la fonction comparant les clés du tableau au contexte (class) fourni
    $contexte = "";
    foreach($tableau as $key => $value){                    //parcourt du tableau
        if($classe == $key){                                //comparaison entre la clé du tableau et le contexte initial
            $contexte = $value;                             //retourne le contexte à écrire.
        }
    }
    return $contexte;
}

?>

<?php
//--------
//- TAGS -
//--------

$tagsTableau = array(                                       //définition du tableau avec le texte du tags et son identifiant bootstrap
    "HTML"                  => 'bi-filetype-html',
    "CSS"                   => 'bi-filetype-css',
    'PHP'                   => 'bi-filetype-php',
    "SQL"                   => 'bi-filetype-sql',
    "GitHub"                =>'bi-github',
    "Tournage"              => 'bi-camera-reels-fill',
    "Marketing"             => 'bi-shop',
    "Communication"         => 'bi-chat-right-fill',
    "Gestion de projet"     => 'bi-kanban-fill',
    "Budget"                => 'bi-piggy-bank-fill',
    "International"         => 'bi-globe-americas',
    "Photo"                 => 'bi-camera-fill',
    "Davinci"               => 'cv-ressources/techno/davinci.png',
    "InDesign"              => 'cv-ressources/techno/id.png',
    "Illustrator"           => 'cv-ressources/techno/ai.png',
    "Lightroom"             => 'cv-ressources/techno/lr.png',
    "Drone"                 => 'cv-ressources/techno/drone.png',
    "Figma"                 => 'cv-ressources/techno/figma.png'
);

function tagsEtOutils(array $tableau, string $tags){
    $array = explode(",", $tags);
    $nb_tags = count($array);

    for($i=0; $i<$nb_tags; $i++){
        foreach($tableau as $key => $value){
            if($array[$i] == $key){
                $tagsEtId[$key] = $value;
            }
        }
    }

    return $tagsEtId;
}

?>

<?php

function afficherGalerie(string $idGalerie, array $images, string $cheminSrc, string $cheminMinia){
    /*Nécessite 
        - un tableau avec comme clé le nom du fichier et comme valeur son nom
        - le chemin relatif depuis projet.php pour le dossier des photos tailles normales
        - le chemin relatif depuis projet.php pour le dossier des photos tailles miniatures
        NB : Les deux dossiers doivent avoir les mêmes photos avec le même nom mais la minia avec une tailles plus petite.
    */
    $titre1 = array_values($images)[0];                             //Titre de la première image
    $src1 = $cheminSrc . array_keys($images)[0];                    //Chemin relatif vers la photo
    $taille = count($images);                                       //Nb de photos

    echo "<div class=\"galerie\" id=\"{$idGalerie}\">";             //Structure HTML
    echo    '<figure class="photo-galerie">';                       //Grande photo
    echo        "<img src=\"{$src1}\" alt=\"{$titre1}\">";
    echo        "<figcaption>{$titre1}</figcaption>";
    echo        "<p class=\"cliquer-photo\">Cliquez sur une des {$taille} photos pour l'afficher.</p>";
    echo    '</figure>';
    echo    '<ul class="galerie-mini">';
    foreach($images as $key => $val){
        echo    "<li>";                                             //Création de chaque miniatures
        echo        "<a data-chemin_photo=\"{$cheminSrc}{$key}\" title=\"{$val}\">";
        echo            "<img src=\"{$cheminMinia}{$key}\" alt=\"{$val}\">";
        echo        "</a>";
        echo    "</li>";
    }
    echo    '</ul>';
    echo    '<script>';                                             //Gestion du JS en PHP (appel de la fonction)
    echo        "let galerie{$idGalerie} = document.getElementById(\"{$idGalerie}\");";
    echo        "galeriephoto(galerie{$idGalerie});";
    echo    '</script>';
    echo '</div>';
}

?>