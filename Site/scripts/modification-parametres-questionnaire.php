<?php
include("connexion.php");
global $db;

$sql_command = "SELECT MAX(id_module) AS max FROM module";
$req = $db->query($sql_command);
$res = $req->fetch();
$max = $res['max'];

$filtresParametres = array();

for($i = 1; $i <= $max; $i++) {
    $filtresParametres = array_merge($filtresParametres, array(
        'evaluation_module' . $i => FILTER_VALIDATE_BOOLEAN
    ));
}

$parametres = filter_input_array(INPUT_POST, $filtresParametres);

$SQL_SUPPRIMER_PARAMETRES = "DELETE FROM module_evalue";
$suppressionParametres = $db->prepare($SQL_SUPPRIMER_PARAMETRES);
$suppressionParametres->execute();

for($i = 1; $i <= $max; $i++) {
    $SQL_MODIFIER_PARAMETRES = "INSERT INTO module_evalue (id_module) VALUES (:id_module)";

    $modificationParametres = $db->prepare($SQL_MODIFIER_PARAMETRES);
    if(empty($parametres['evaluation_module'.$i])) {
        $parametres['evaluation_module'.$i] = 0;
    }else{
        $modificationParametres->bindParam(':id_module', $i, PDO::PARAM_INT);
        $modificationParametres->execute();
    }

}

header("Location: ../pages/accueil.php");
?>