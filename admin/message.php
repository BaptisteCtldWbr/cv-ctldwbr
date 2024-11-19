<?php

require_once('../cv-ressources/includes/connexion-bdd.php');

if(isset($_POST['action'])){
    if(str_contains($_POST['action'], "lu")){
        $id = substr($_POST['action'], 3);
        $query = "UPDATE `message` SET `statut` = 'lu' WHERE `message`.`id` = '{$id}';";
        $erreur = "Message {$id} : lu.";
    } else if (str_contains($_POST['action'], "rep")){
        $id = substr($_POST['action'], 4);
        $query = "UPDATE `message` SET `statut` = 'rep' WHERE `message`.`id` = '{$id}';";
        $erreur = "Message {$id} : repondu.";
    } else {
        $id = $_POST['action'];
        $query = "UPDATE `message` SET `statut` = '' WHERE `message`.`id` = '{$id}';";
        $erreur = "Message {$id} : rien.";
    }
    $result = mysqli_query($lien, $query);
    if(!$result){
        $erreur = "Message {$id} : erreur.";
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - CV CTLDWBR</title>
    <?php require_once('head.php') ?>
    <link rel="stylesheet" href="css/tableau.css">
</head>
<body>
    <h1>Messages</h1>
    <div id="buttons">
        <a href="deconnexion.php" class="button deconnect">
            <i class="bi bi-person-fill-slash"></i>
              Se déconnecter
        </a>
        <a href="index.php" class="button">
            <i class="bi bi-house-fill"></i>
              Retour
        </a>
        <a href="../index.php" class="button">
            <i class="bi bi-file-earmark-person-fill"></i>
              Site
        </a>
    </div>
    <?php

    if(isset($erreur)){
        echo "<p class=\"msg\">{$erreur}</p>";
    }

    $select = "SELECT * FROM `message`";

    $result = mysqli_query($lien, $select);

    if($result){
        $nb_lignes = mysqli_num_rows($result);
    } else {
        die("<p>Problème avec la requête - Veuillez revenir bientôt, désolé.</p>");
    }
    ?>
    <table>
        <thead>
            <th scope="col">Id.</th>
            <th scope="col">Date</th>
            <th scope="col">Expéditeur</th>
            <th scope="col">Mail</th>
            <th scope="col">Message</th>
            <th scope="col">Statut</th>
        </thead>
        <tbody>
                <?php
                while($msg = mysqli_fetch_assoc($result)){

                    echo "<tr>
                            <td>{$msg['id']}</td>
                            <td>{$msg['date-heure']}</td>
                            <td>{$msg['nom']}</td>
                            <td><a href=\"mailto:{$msg['mail']}\">{$msg['mail']}</a></td>
                            <td>{$msg['message']}</td>
                            <td class=\"crud crud-message\" title=\"Statut : {$msg['statut']}\">
                                <form action=\"#\" method=\"POST\">";
                                if($msg['statut'] == "lu"){
                                    echo "<button class=\"msg-actif\" type=\"submit\" name=\"action\" value=\"{$msg['id']}\"><i class=\"bi bi-eye-fill\"></i></button>";
                                } else { 
                                    echo "<button type=\"submit\" name=\"action\" value=\"lu-{$msg['id']}\"><i class=\"bi bi-eye-slash-fill\"></i></button>";
                                }
                                if($msg['statut'] == "rep"){
                                    echo "<button class=\"msg-actif\" type=\"submit\" name=\"action\" value=\"{$msg['id']}\"><i class=\"bi bi-send-check-fill\"></i></button>";
                                } else { 
                                    echo "<button type=\"submit\" name=\"action\" value=\"rep-{$msg['id']}\"><i class=\"bi bi-send-dash-fill\"></i></button>";
                                }
                    echo       "</form>
                            </td>
                        </tr>
                    ";
                    
                }
                ?>
        </tbody>
        <tfoot>
            <th scope="row" colspan="5">Nombre de messages :</th>
            <td><?php echo $nb_lignes ?></td>
        </tfoot>
    </table>
</body>
</html>