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
<p>Bienvenue sur la partie accès aux questionnaire !</p>
<hr/>

<?php
if(isset($_SESSION['id'])){
    if($_SESSION['statut'] == 'etudiant'){
        include('../scripts/recuperer-question-etudiant.php');
        if($_SESSION['questionnaire_charge'] == 0){
            $_SESSION['questions'] = recupererIDQuestionsAleatoires();
            $_SESSION['questionnaire_charge'] = 1;
        }

        for($i = 0; $i < 10; $i++){
            $id = $_SESSION['questions'][$i];?>
            <div class="question">
                <form action="question.php" method="get">
                    <input type="hidden" id="id_question" name="id_question" value="<?= $id ?>">
                    <input type="submit" value="Question N°<?= $i+1 ?>">
                </form>
            </div>
        <?php
        }
    }
    elseif ($_SESSION['statut'] == 'prof'){
        echo "ACCES INTERDIT";
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