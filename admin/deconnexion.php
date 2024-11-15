<?php

session_start();
if(!isset($_SESSION['connecte'])){
    header("Location: connexion.php");
} else {
    session_destroy();
    header("Location: connexion.php");
}

?>