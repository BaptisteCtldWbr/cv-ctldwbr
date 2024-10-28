<?php
//------------
//- CONTEXTE -
//------------

$contexteTableau = array(                                         //définition du tableau
    'univ'  => "Projet universitaire",
    'scout' => "Projet scout",
    'drone' => "Projet audiovisuel",
    'studio195' => "Projet audiovisuel avec Studio195"
);

function contexte(array $tableau, string $classe) : string{                       //définition de la fonction comparant les clés du tableau au contexte (class) fourni
    foreach($tableau as $key => $value){                    //parcourt du tableau
        if($classe == $key){                                //comparaison entre la clé du tableau et le contexte initial
            return $value;                                  //retourne le contexte à écrire.
        }
    }
}

?>

<?php
//--------
//- TAGS -
//--------

$tagsTableau = array(                                       //définition du tableau avec le texte du tags et son identifiant bootstrap
    "HTML" => 'bi-filetype-html',
    "CSS" => 'bi-filetype-css',
    'PHP' => 'bi-filetype-php',
    "SQL" => 'bi-filetype-sql',
    "GitHub" =>'bi-github',
    "Davinci" => 'cv-ressources/techno/davinci.png',
    "Tournage" => 'bi-camera-reels-fill',
    "Marketing" => 'bi-shop',
    "Communication" => 'bi-chat-right-fill',
    "Gestion de projet" => 'bi-kanban-fill',
    "InDesign" => 'cv-ressources/techno/id.png',
    "Illustrator" => 'cv-ressources/techno/ai.png'
);

/*
-----------------------------
-      ANCIENNE  VERSION      -
- qui ne met pas dans l'ordre -
-----------------------------

function tagsEtOutils(array $tableau, string $tags) : array{                     //définition de la fonction créant un tableau avec les tags et leurs id bootstrap
    $array = explode("," , $tags);                          //séparation des tags en un tableau
    $nb_tags = count($array);                               //nombre de tags dans le tableau

    foreach($tableau as $key => $value){
        for($i=0; $i<$nb_tags; $i++){
            if($array[$i] == $key){                         //comparaison du nom de chaque tags au nom de chaque tags possible, défini dans le tableau 
                $tagsEtId[$key] = $value;                   //création d'un tableau avec tous les tags du projet et leur id bootstrap
            }
        }
    }

    return $tagsEtId;                                       //retourne les tags et leurs id bootstrap.
}*/

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

//---------------------
//- LISTE DES PROJETS -
//---------------------


?>