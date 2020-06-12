<?php
session_start();
include('../scripts/connexion.php');
?>
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
<hr/>
<h1>I-U-Training</h1>
<p>Bienvenue sur la partie réponse à la question, tu as une minute pour y répondre, sinon cela comptera comme faux !</p>
<hr/>

<?php
if(isset($_SESSION['id'])){
    if($_SESSION['statut'] == 'etudiant'){
        include('../scripts/recuperer-question-prof.php');
        include('../scripts/recuperer-reponse.php');
        $questions = recupererQuestion($_GET['id_question']);
        $html = "<div class=\"question\">";
        $html .= "<h1>Intitulé : ".$questions[0]['intitule']."</h1>";
        $html .= "<form action=\"../scripts/verification-reponse.php\" method=\"post\">";
        $html .= "<input type=\"hidden\" name=\"id_question\" id=\"id_question\" value=\"".$questions[0]['id_question']."\">";
        echo $html;
        $i = 1;
        foreach(recupererReponses($_GET['id_question']) as $reponses){
            echo "<div class=\"checkbox\"><label for=\"id_reponse".$reponses['id_reponse']."\"'>Réponse N°".$i." : </label>";
            echo "<input type='hidden' id='id_reponse".$i."' name='id_reponse".$i."' value='".$reponses['id_reponse']."'>";
            echo "<label for='valide".$reponses['id_reponse']."'>".$reponses['texte_reponse']."</label>";
            echo "<input type=\"checkbox\" name=\"valide".$reponses['id_reponse']."\" id=\"valide".$reponses['id_reponse']."\" value='".$reponses['id_reponse']."'></div>";
            $i++;
        }
        echo "<input type=\"hidden\" name=\"nombre_reponse\" id=\"nombre_reponse\" value=\"".$questions[0]['nombre_reponse']."\">";
        echo "<input type=\"submit\" value=\"Valider la réponse\"></form></div><hr>";
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