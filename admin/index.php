<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - CV CTLD WBR</title>
    <?php require_once('head.php') ?>
    <style>
        ul{
            display: grid;
            grid-template-columns: repeat(3, 180px);
            gap: 10px;
            list-style: none;
            padding: 0;
            justify-content: center;
            li{
                background-color: var(--gris1);
                padding: 10px 20px;
                text-align: center;
                a{
                    text-decoration: none;
                    i{
                        color: var(--bleu);
                    }
                }
            }
        }
    </style>
</head>
<body>
    <h1>Administration CV CTLD WBR</h1>
    <div id="buttons">
        <a href="deconnexion.php" class="button deconnect">
            <i class="bi bi-person-fill-slash"></i>
              Se déconnecter
        </a>
        <a href="../index.php" class="button">
            <i class="bi bi-file-earmark-person-fill"></i>
              Site
        </a>
    </div>
    <p>Modifier :</p>
    <ul>
        <li><a href="portfolio.php">    <i class="bi bi-asterisk"></i>      Portfolio   </a></li>
        <li><a href="contact.php">      <i class="bi bi-envelope-fill"></i> Contact     </a></li>
        <li><a href="experiences.php">  <i class="bi bi-award-fill"></i>    Expériences </a></li>
        <li><a href="interet.php">      <i class="bi bi-balloon-fill"></i>  Interêts    </a></li>
        <li><a href="techno.php">       <i class="bi bi-code-slash"></i>    Technos     </a></li>
        <li><a href="message.php">      <i class="bi bi-envelope-fill"></i> Messages    </a></li>
        <li><a href="langue.php">       <i class="bi bi-megaphone-fill"></i> Langues     </a></li>
    </ul>
</body>
</html>