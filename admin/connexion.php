<?php

require_once('id.php');

session_start();

if(isset($_POST['id']) AND isset($_POST['m2p'])){
    if($_POST['id'] == $id AND $_POST['m2p'] == $m2p){
        $msg = "Connexion réussie";
        header("Location: index.php");
        $_SESSION['connecte'] = true;
    } else {
        $_SESSION['connecte'] = true;
        $msg = "Mauvais identifiant ou mot de passe";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Administration - CV CTLDWBR</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Connexion</h1>
    <div id="buttons">
        <a href="../index.php" class="button">
            <i class="bi bi-file-earmark-person-fill"></i>
              Site
        </a>
    </div>
    <?php 
    if(isset($msg)){
        echo "<p>{$msg}</p>";
    }
    ?>
    <form action="#" method="post">
        <div class="input">
            <label for="id">Identifiant</label>
            <input type="text" name="id" id="id">
        </div>
        <div class="input">
            <label for="m2p">Mot de passe</label>
            <input type="password" name="m2p" id="m2p">
        </div>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>