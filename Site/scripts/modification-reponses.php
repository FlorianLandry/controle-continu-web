<?php
session_start();
include("connexion.php");
global $db;

    $filterReponse = array(
        'id_question' => FILTER_VALIDATE_INT
    );

    for($i = 1; $i <= $_POST['nombre_reponse']; $i++) {
        $filterReponse = array_merge($filterReponse, array(
            'texte_reponse' . $i => FILTER_SANITIZE_STRING,
            'juste' . $i => FILTER_VALIDATE_BOOLEAN,
        ));
    }

    $reponse = filter_input_array(INPUT_POST, $filterReponse);

    for($i = 1; $i <= $_POST['nombre_reponse']; $i++) {
        $SQL_AJOUTER_REPONSE = "INSERT INTO reponse (texte_reponse, juste, id_question)
                                                VALUES (:texte_reponse".$i.", :juste".$i.", :id_question)";

        $SQL_MODIFIER_REPONSE = "UPDATE reponse SET texte_reponse = :texte_reponse".$i.",
        juste = :juste".$i.",
        id_question = :id_question
        WHERE id_reponse = ".$_POST['id_reponse'.$i];

        $modificationReponse = $db->prepare($SQL_MODIFIER_REPONSE);
        $modificationReponse->bindParam(':texte_reponse'.$i, $reponse['texte_reponse'.$i], PDO::PARAM_STR);
        if(empty($reponse['juste'.$i])) {
            $reponse['juste' . $i] = 0;
        }
        $modificationReponse->bindParam(':juste'.$i, $reponse['juste'.$i], PDO::PARAM_BOOL);
        $modificationReponse->bindParam(':id_question', $reponse['id_question'], PDO::PARAM_INT);
        $modificationReponse->execute();
    }

header("Location: ../pages/accueil.php");

?>