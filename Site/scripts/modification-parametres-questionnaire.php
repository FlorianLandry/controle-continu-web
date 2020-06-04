<?php
include("connexion.php");
global $db;

$filtresParametres = array(
    'module' => FILTER_SANITIZE_STRING,
    'semestre' => FILTER_VALIDATE_INT,
);
$parametres = filter_input_array(INPUT_POST, $filtresParametres);

$SQL_MODIFIER_PARAMETRES = "UPDATE questionnaire SET module = :module,
        semestre = :semestre
        WHERE id_questionnaire = 1";

$modificationParametres = $db->prepare($SQL_MODIFIER_PARAMETRES);
$modificationParametres->bindParam(':module', $parametres['module'], PDO::PARAM_STR);
$modificationParametres->bindParam(':semestre', $parametres['semestre'], PDO::PARAM_INT);
$modificationParametres->execute();

header("Location: ../pages/accueil.php");
?>