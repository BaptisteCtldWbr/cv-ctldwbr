<link rel="stylesheet" href="css/style.css">

<?php

session_start();
if(!$_SESSION['connecte']){
    header('Location: connexion.php');
}

?>