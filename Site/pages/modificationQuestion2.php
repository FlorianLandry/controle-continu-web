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
<p>Bienvenue sur la suite de la partie modification des questions !</p>
<hr/>

<?php
if(isset($_SESSION['id'])){
    if($_SESSION['statut'] == 'etudiant'){
        echo "ACCES INTERDIT";
    }
    elseif ($_SESSION['statut'] == 'prof'){
        include("../scripts/recuperer-question-prof.php");
        include("../scripts/recuperer-reponse.php");
        $questions = recupererQuestion($_GET['id_question']);
        $question = $questions['0'];
        if($question['id_prof'] == $_SESSION['id']){
            $reponses = recupererReponses($_GET['id_question']);
            $html = "<div class=\"question\">";
            $html .= "<h1>Intitulé : ".$question['intitule']."</h1>";
            $html .= "<form action=\"../scripts/modification-reponses.php\" method=\"post\">";
            $html .= "<input type=\"hidden\" name=\"id_question\" id=\"id_question\" value=\"".$question['id_question']."\">";
            echo $html;
            for($i = 1; $i <= $question['nombre_reponse']; $i++){
                echo "<input type=\"hidden\" id=\"id_reponse".$i."\" name=\"id_reponse".$i."\" value=\"".$reponses[$i]['id_reponse']."\">";
                echo "<label for=\"texte_reponse".$i."\">Réponse N°".$i."</label>";
                echo "<input type=\"text\" name=\"texte_reponse".$i."\" id=\"texte_reponse".$i."\" value=\"".$reponses[$i]['texte_reponse']."\">";
                echo "<label for=\"juste".$i."\">Juste</label>";
                echo "<input type=\"checkbox\" name=\"juste".$i."\" id=\"juste".$i."\" unchecked>";
            }
            echo "<input type=\"hidden\" name=\"nombre_reponse\" id=\"nombre_reponse\" value=\"".$question['nombre_reponse']."\">";
            echo "<input type=\"submit\" value=\"Finaliser la modification des réponses\"></form></div><hr>";
        }else{
            echo "<p>IL NE FAUT PAS CHANGER LA VALEUR DANS L'URL POUR ACCEDER AUX QUESTIONS D'AUTRES PROFESSUERS. C'EST MAL.</p>";
        }

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