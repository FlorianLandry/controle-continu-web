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
<p>Bienvenue sur la partie paramètres du questionnaire !</p>
<hr/>

<?php
if(isset($_SESSION['id'])){
    if($_SESSION['statut'] == 'etudiant'){
        echo "ACCES INTERDIT";
    }
    elseif ($_SESSION['statut'] == 'prof'){
        echo "ACCES INTERDIT";
    }
    elseif ($_SESSION['statut'] == 'admin'){
        echo "ACCES AUTORISE";
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