<?php
include ('connexion.php');
function recupererQuestions($id_prof){
    global $db;
    $i = 0;
    $answer = array();
    $sql_command = "SELECT * from question WHERE id_prof=".$id_prof;

    foreach ($db->query($sql_command) as $tab) {
        $answer[$i] = array(
            'id_question' => $tab['id_question'],
            'intitule' => $tab['intitule'],
            'nombre_reponse' => $tab['nombre_reponse'],
            'affichage_correction' => $tab['affichage_correction'],
            'id_module' => $tab['id_module']
        );
        $i++;
    }
return $answer;
}

function recupererQuestion($id_question){
    global $db;
    $answer = array();
    $sql_command = "SELECT * FROM question WHERE id_question=".$id_question;

    foreach ($db->query($sql_command) as $tab) {
        $answer[0] = array(
            'id_question' => $tab['id_question'],
            'intitule' => $tab['intitule'],
            'nombre_reponse' => $tab['nombre_reponse'],
            'affichage_correction' => $tab['affichage_correction'],
            'id_module' => $tab['id_module'],
            'id_prof' => $tab['id_prof']
        );
    }
    return $answer;
}

function recupererDerniereQuestionCreee(){
    global $db;
    $answer = array();
    $sql_command1 = "SELECT MAX(id_question) AS max FROM question";
    $req = $db->query($sql_command1);
    $res = $req->fetch();
    $max = $res['max'];

    $sql_command2 = "SELECT * FROM question WHERE id_question = ".$max;

    foreach ($db->query($sql_command2) as $tab) {
        $answer[0] = array(
            'id_question' => $tab['id_question'],
            'intitule' => $tab['intitule'],
            'nombre_reponse' => $tab['nombre_reponse'],
            'affichage_correction' => $tab['affichage_correction'],
            'id_module' => $tab['id_module'],
            'id_prof' => $tab['id_prof']
        );
    }
    return $answer;
}
?>