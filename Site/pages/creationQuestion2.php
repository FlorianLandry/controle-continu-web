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
<?php include("header.php");
include("../scripts/recuperer-question-prof.php")?>
<hr/>
<h1>I-U-Training</h1>
<p>Bienvenue sur la suite de la partie création des questions ! Vous devez maintenant renseigner les réponses possibles à votre question.</p>
<hr/>

<?php
if(isset($_SESSION['id'])){
    if($_SESSION['statut'] == 'etudiant'){
        echo "ACCES INTERDIT";
    }
    elseif ($_SESSION['statut'] == 'prof'){
        $questions = recupererDerniereQuestionCreee();
        $html = "<div class=\"question\">";
        $html .= "<h1>Intitulé : ".$questions[0]['intitule']."</h1>";
        $html .= "<form action=\"../scripts/ajout-reponses.php\" method=\"post\">";
        $html .= "<input type=\"hidden\" name=\"id_question\" id=\"id_question\" value=\"".$questions[0]['id_question']."\">";
        echo $html;
        for($i = 1; $i <= $questions[0]['nombre_reponse']; $i++){
            echo "<label for=\"texte_reponse".$i."\">Réponse N°".$i."</label>";
            echo "<input type=\"text\" name=\"texte_reponse".$i."\" id=\"texte_reponse".$i."\">";
            echo "<label for=\"juste".$i."\">Juste</label>";
            echo "<input type=\"checkbox\" name=\"juste".$i."\" id=\"juste".$i."\" unchecked>";
        }
        echo "<input type=\"hidden\" name=\"nombre_reponse\" id=\"nombre_reponse\" value=\"".$questions[0]['nombre_reponse']."\">";
        echo "<input type=\"submit\" value=\"Finaliser la création des réponses\"></form></div><hr>";
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