<?php

$contextes = array(
    'univ'  => "Projet universitaire",
    'scout' => "Projet scout",
    'drone' => "Projet audiovisuel",
    'studio195' => "Projet audiovisuel avec Studio195"
);

function contexte($tableau, $classe){
    foreach($tableau as $key => $value){
        //echo "test avec $classe : {$key} => {$value} <br>";
        if($classe == $key){
            return $value;
        }
    }
}

/*echo contexte($contextes, "univ"). "<br>";
echo contexte($contextes, "studio195"). "<br>";
echo contexte($contextes, "drone"). "<br>";
echo contexte($contextes, "scout"). "<br>";*/

?>