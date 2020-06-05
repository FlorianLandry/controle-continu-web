<?php
include ('connexion.php');
function recupererParametresQuestionnaire(){
    global $db;
    $answer = array();
    $sql_command = "SELECT * from questionnaire";

    foreach ($db->query($sql_command) as $tab) {
        $answer = array(
            'id_questionnaire' => $tab['id_questionnaire'],
            'module' => $tab['module'],
            'semestre' => $tab['semestre']
        );
    }
    return $answer;
}
?>