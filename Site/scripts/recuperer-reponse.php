<?php
include ('connexion.php');

function recupererReponses($id_question){
    global $db;
    $i = 1;
    $answer = array();
    $sql_command = "SELECT * FROM reponse WHERE id_question=".$id_question;

    foreach ($db->query($sql_command) as $tab) {
        $answer[$i] = array(
            'id_reponse' => $tab['id_reponse'],
            'texte_reponse' => $tab['texte_reponse'],
            'juste' => $tab['juste'],
            'id_question' => $tab['id_question']
        );
        $i++;
    }
    return $answer;
}

function recupererReponse($id_reponse){
    global $db;
    $answer = array();
    $sql_command = "SELECT * FROM reponse WHERE id_reponse=".$id_reponse;

    foreach ($db->query($sql_command) as $tab) {
        $answer[0] = array(
            'id_reponse' => $tab['id_reponse'],
            'texte_reponse' => $tab['texte_reponse'],
            'juste' => $tab['juste'],
            'id_question' => $tab['id_question']
        );
    }
    return $answer;
}

?>