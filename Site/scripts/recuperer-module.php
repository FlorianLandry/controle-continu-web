<?php
include ('connexion.php');
function recupererModule(){
    global $db;
    $i = 0;
    $answer = array();
    $sql_command = "SELECT * from module";

    echo $sql_command;

    foreach ($db->query($sql_command) as $tab) {
        $answer[$i] = array(
            'id_module' => $tab['id_module'],
            'nom_module' => $tab['nom_module']
        );
        $i++;
    }
    return $answer;
}
?>