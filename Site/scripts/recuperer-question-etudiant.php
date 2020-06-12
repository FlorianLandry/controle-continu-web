<?php
include ('connexion.php');
function recupererIDQuestionsAleatoires(){
    global $db;

    $sql_command1 = "SELECT MAX(id_question) AS max FROM question";
    $req = $db->query($sql_command1);
    $res = $req->fetch();
    $max = $res['max'];

    $sql_command1 = "SELECT MIN(id_question) AS min FROM question";
    $req = $db->query($sql_command1);
    $res = $req->fetch();
    $min = $res['min'];
    $i = 0;
    $id_questions = array();
    while ($i < 10)
    {
        $image = rand($min, $max);

        if (!in_array($image, $id_questions)) {
            $id_questions[] = $image;
            $i++;
        }
    }

    return $id_questions;
}





?>