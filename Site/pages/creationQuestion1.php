<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/theme.css">
        <link rel="stylesheet" type="text/css" href="../css/accueil.css">
        <link rel="stylesheet" href="../css/index.css">
        <base target="_parent">
        <title>I-U-Training</title>

    </head>
    <body>
    <?php include("header.php"); ?>
    <hr/>
    <h1>I-U-Training</h1>
    <p>Bienvenue sur la partie création des questions !</p>
    <hr/>

    <?php
    if(isset($_SESSION['id'])){
        if($_SESSION['statut'] == 'etudiant'){
            echo "ACCES INTERDIT";
        }
        elseif ($_SESSION['statut'] == 'prof'){
            include("../scripts/recuperer-module.php");
            ?>
            <form action="../scripts/ajout-question.php" method="post">
                <label for="intitule">Intitulé de la question : </label>
                <input type="text" name="intitule" id="intitule" value="null">
                <label for="module">Module : </label>
                <select name="module" id="module">
                    <?php
                    foreach (recupererModule() as $modules){
                        echo "<option value=\"".$modules['nom_module']."\">".$modules['nom_module']."</option>";
                    }
                    ?>
                </select>
                <label for="semestre">Semestre : </label>
                <select name="semestre" id="semestre">
                    <?php
                    for($i = 1; $i <= 4; $i++){
                        echo "<option value=\"".$i."\">".$i."</option>";
                    }
                    ?>
                </select>
                <label for="nombre_reponse">Nombre de réponses à cette quesstion (entre 2 et 8) : </label>
                <input type="number" name="nombre_reponse" id="nombre_reponse" value="2" min="2" max="8">
                <label for="affichage_correction">Afficher la correction : </label>
                <input type="checkbox" name="affichage_correction" id="affichage_correction">
                <input type="submit" value="Continuer à la création des réponses">
            </form>
            <a href="./accueil.php"><input type="button" value="Annuler"></a>
            <?php
        }
        elseif ($_SESSION['statut'] == 'admin'){
            echo "ACCES INTERDIT";
        }
        else {
            echo "pas de CO pas d'ACCES";
        }
    }
    else {
        echo "<h1>Veuillez d'abord vous connecter svp</h1>";
    }
    ?>

    </body>
</html>