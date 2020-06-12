<?php

session_start();
include("connexion.php");
include("recuperer-reponse.php");
global $db;

$filterReponse = array(
    'id_question' => FILTER_VALIDATE_INT
);

for($i = 1; $i <= $_POST['nombre_reponse']; $i++) {
    $filterReponse = array_merge($filterReponse, array(
        'id_reponse' . $i => FILTER_VALIDATE_INT,
        'valide' . $_POST['id_reponse'.$i] => FILTER_VALIDATE_BOOLEAN
    ));
}

$reponse = filter_input_array(INPUT_POST, $filterReponse);

$id_reponses = array();

for($i = 1; $i <= $_POST['nombre_reponse']; $i++){
    array_push($id_reponses, $reponse['id_reponse'.$i]);
}

$nombreReponsesJustes = 0;

for($i = 1; $i <= $_POST['nombre_reponse']; $i++){
    $verificationreponse = recupererReponse($reponse['id_reponse'.$i])[0];
    if(!isset($reponse['valide'.$reponse['id_reponse'.$i]])){
        $reponse['valide'.$reponse['id_reponse'.$i]] = 0;
    }else{
        $reponse['valide'.$reponse['id_reponse'.$i]] = 1;
    }
    if($reponse['valide'.$reponse['id_reponse'.$i]] == $verificationreponse['juste']){
        $nombreReponsesJustes++;
    }
}

if($nombreReponsesJustes != $_POST['nombre_reponse']){
    echo "TU PEUX MIEUX FAIRE.";
}else{
    echo "ET C'EST REUSSI !";
}

echo "<a href=\"../pages/questionnaire.php\"><input type=\"button\" value=\"Retourner à la liste des questions\"></a>";

?>