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

        <hr/>


        <?php
        if(isset($_SESSION['id'])){
            echo "<p>Bienvenue ".$_SESSION['prenom']." sur le site d'entraînement I-U-Training !</p><hr>";
            if($_SESSION['statut'] == 'etudiant'){
                ?>
                <p>Pour accéder au questionnaire, je vous prie de cliquer sur le bouton ci-dessous !</p>
                <a href="./questionnaire.php"><input type="button" value="Accéder au questionnaire"></a>
                <?php
            }
            elseif ($_SESSION['statut'] == 'prof'){
                include('../scripts/recuperer-question-prof.php');
                foreach (recupererQuestions($_SESSION['id']) as $questions){
                    $html = "<div class=\"question\">";
                    $html .= "<h1>Intitulé : ".$questions['intitule']."</h1>";
                    $html .= "<p> Nombre de réponses : ".$questions['nombre_reponse']."</p>";
                    $html .= "<p> Affichage de la correction : ";
                    if($questions['affichage_correction'] == 1){
                        $html .= "oui";
                    }
                    else{
                        $html .= "non";
                    }
                    $html .= "</p>";
                    $html .= "<p> Module : ".$questions['module']."</p>";
                    $html .= "<p> Semestre : ".$questions['semestre']. "ème</p>";
                    $html .= "</div>";
                    $html .= "<hr>";
                    echo $html;
                }
                ?>
                    <p>Pour créer une question, cliquez sur le bouton ci-dessous.</p>
                    <a href="./creationQuestion1.php"><input type="button" value="Créer une nouvelle question"></a>
                <?php
            }
            elseif ($_SESSION['statut'] == 'admin'){
                include('../scripts/recuperer-parametres-questionnaire.php');
                echo "<h1>Paramètres Actuels</h1>";
                $parametres = recupererParametresQuestionnaire();
                ?>
                <p>Semestre testé : <?= $parametres['semestre']?> </p>
                <p>Modules testés : <?= $parametres['module']?> </p>
                <hr>
                <p>Pour modifier les paramètres du questionnaire, veuillez cliquer sur le bouton ci-dessous : </p>
                <a href="./parametresQuestionnaire.php"><input type="button" value="Modifier les paramètres"></a>
                <?php
            }
            else {
                echo "ce n'est pas normal du tout, vous êtes connecté, mais n'avez pas de statut. Contactez l'administrateur.";
            }
        }
        else {
            echo "<p>Bienvenue sur le site d'entraînement I-U-Training !</p><hr>";
            echo "<h1>Veuillez d'abord vous connecter svp</h1>";
        }
        ?>


        <hr/>

    </body>
</html>