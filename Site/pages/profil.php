<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/theme.css">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/profil.css">
        <title>Profil</title>
    </head>
    <body>
        <!-- Header -->
        <?php include("header.php"); ?>
        <hr/>

        <h1 class="titre-page">Profil</h1>

        <h2 class="nom"><?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?></h2>

        <div class="informations">
            <p class="adresse-mail"><?php echo $_SESSION['mail']; ?></p>
        </div>

        <hr/>

        <a class="lien-deconnexion" href="../scripts/reponse-deconnexion.php">Se déconnecter</a>
        <br/>
        <!-- Footer -->
        <hr/>
    </body>
</html>