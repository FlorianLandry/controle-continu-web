<?php
include ('connexion.php');
function recupererQuestions($id_prof){
    global $db;
    $i = 0;
    $answer = array();
    $sql_command = "SELECT * from question WHERE id_prof=".$id_prof;

    echo $sql_command;

    foreach ($db->query($sql_command) as $tab) {
        $answer[$i] = array(
            'id_question' => $tab['id_question'],
            'intitule' => $tab['intitule'],
            'nombre_reponse' => $tab['nombre_reponse'],
            'affichage_correction' => $tab['affichage_correction'],
            'module' => $tab['module'],
            'semestre' => $tab['semestre']
        );
        $i++;
}
return $answer;
}
?>