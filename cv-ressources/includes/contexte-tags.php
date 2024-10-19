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
    "HTML" => 'filetype-html',
    "CSS" => 'filetype-css',
    'PHP' => 'filetype-php',
    "SQL" => 'filetype-sql',
    "GitHub" =>'github'
);

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
}

?>