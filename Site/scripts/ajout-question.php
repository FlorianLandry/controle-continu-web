<?php
    session_start();
    include("connexion.php");
    global $db;

    $filterQuestion = array(
        'intitule' => FILTER_SANITIZE_STRING,
        'id_module' => FILTER_VALIDATE_INT,
        'nombre_reponse' => FILTER_VALIDATE_INT,
        'affichage_correction' => FILTER_SANITIZE_STRING
    );
    $question = filter_input_array(INPUT_POST, $filterQuestion);

    $SQL_AJOUTER_QUESTION = "INSERT INTO question (intitule, nombre_reponse, affichage_correction, id_prof, id_module)
                                        VALUES (:intitule, :nombre_reponse, :affichage_correction, ".$_SESSION['id'].", :id_module)";
    
    $ajoutQuestion = $db->prepare($SQL_AJOUTER_QUESTION);
    $ajoutQuestion->bindParam(':intitule', $question['intitule'], PDO::PARAM_STR);
    $ajoutQuestion->bindParam(':id_module', $question['id_module'], PDO::PARAM_STR);
    $ajoutQuestion->bindParam(':nombre_reponse', $question['nombre_reponse'], PDO::PARAM_INT);
    if(empty($question['affichage_correction'])){
        $question['affichage_correction'] = 0;
    }
    $ajoutQuestion->bindParam(':affichage_correction', $question['affichage_correction'], PDO::PARAM_BOOL);
    $ajoutQuestion->execute();



    header("Location: ../pages/creationQuestion2.php");

?>