<?php ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>I-U-Training</title>
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/theme.css">
        <link rel="stylesheet" href="../css/inscription.css">
        <base target="_parent">
    </head>
    <body>
        <?php include("header.php"); ?>
        <hr/>
        <h1>Inscription</h1>
        <form class="formulaire-inscription" method="post" action="../scripts/ajout-utilisateur.php">
            <div class="style">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" required>
            </div>
            <div class="style">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" required>
            </div>
            <div class="style">
                <label for="date-naissance">Date de naissance</label>
                <input type="date" name="date-naissance" id="date-naissance" required>
            </div>
            <div class="style">
                <label for="mail">Adresse mail</label>
                <input type="email" name="mail" id="mail" required>
                <?php if(!empty($_GET["erreur-mail"])) { echo "<p class=\"erreur\">" . $_GET["erreur-mail"] . "</p>"; }?>
            </div>
            <div class="style">
                <label for="mot-de-passe">Mot de passe</label>
                <input type="password" name="mot-de-passe" id="mot-de-passe" required>
            </div>
            <div class="style">
                <label for="validation-mot-de-passe">Validation du mot de passe</label>
                <input type="password" name="validation-mot-de-passe" id="validation-mot-de-passe" required>
                <?php if(!empty($_GET["erreur-mot-de-passe"])) { echo "<p class=\"erreur\">" . $_GET["erreur-mot-de-passe"] . "</p>"; }?>
            </div>
            <div class="style">
                <input class="bouton" type="submit" name="submit" value="S'inscrire">
                <a class="compte" href="formulaire-connexion.php">Vous possédez déjà un compte.</a>
            </div>
        </form>
        <hr/>
    </body>
</html>