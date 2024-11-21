<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" href="css/favicon.png" type="image/x-icon">

<?php

session_start();
if(!$_SESSION['connecte']){
    header('Location: connexion.php');
}

?>