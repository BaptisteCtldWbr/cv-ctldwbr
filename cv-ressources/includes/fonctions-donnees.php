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