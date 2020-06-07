<?php
    session_start();
    include("connexion.php");
    global $db;

    $filterQuestion = array(
        'intitule' => FILTER_SANITIZE_STRING,
        'module' => FILTER_SANITIZE_STRING,
        'semestre' => FILTER_VALIDATE_INT,
        'nombre_reponse' => FILTER_VALIDATE_INT,
        'affichage_correction' => FILTER_SANITIZE_STRING
    );
    $question = filter_input_array(INPUT_POST, $filterQuestion);


    $SQL_MODIFIER_QUESTION = "UPDATE question SET intitule = :intitule,
        nombre_reponse = :nombre_reponse,
        affichage_correction = :affichage_correction,
        id_prof = ".$_SESSION['id'].",
        module = :module,
        semestre = :semestre
        WHERE id_question = ".$_POST['id_question'];

    $modificationQuestion = $db->prepare($SQL_MODIFIER_QUESTION);
    $modificationQuestion->bindParam(':intitule', $question['intitule'], PDO::PARAM_STR);
    $modificationQuestion->bindParam(':module', $question['module'], PDO::PARAM_STR);
    $modificationQuestion->bindParam(':semestre', $question['semestre'], PDO::PARAM_INT);
    $modificationQuestion->bindParam(':nombre_reponse', $question['nombre_reponse'], PDO::PARAM_INT);
    if(empty($question['affichage_correction'])){
        $question['affichage_correction'] = 0;
    }
    $modificationQuestion->bindParam(':affichage_correction', $question['affichage_correction'], PDO::PARAM_BOOL);
    $modificationQuestion->execute();

    header("Location: ../pages/modificationQuestion2.php?id_question=".$_POST['id_question']);

?>