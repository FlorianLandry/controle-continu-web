<?php
include ('connexion.php');
function recupererModule(){
    global $db;
    $i = 0;
    $answer = array();
    $sql_command = "SELECT * from module";

    foreach ($db->query($sql_command) as $tab) {
        $answer[$i] = array(
            'id_module' => $tab['id_module'],
            'nom_module' => $tab['nom_module']
        );
        $i++;
    }
    return $answer;
}

function recupererModulesEvalues(){
    global $db;
    $i = 0;
    $answer = array();
    $sql_command = "SELECT * from module_evalue";

    foreach ($db->query($sql_command) as $tab) {
        $answer[$i] = array(
            'id_module' => $tab['id_module']
        );
        $i++;
    }
    return $answer;
}

function recupererNomModule($id_module){
    global $db;
    $answer = array();
    $sql_command = "SELECT * FROM module WHERE id_module=".$id_module;

    foreach ($db->query($sql_command) as $tab) {
        $answer[0] = array(
            'id_module' => $tab['id_module'],
            'nom_module' => $tab['nom_module']
        );
    }
    return $answer;
}
?>