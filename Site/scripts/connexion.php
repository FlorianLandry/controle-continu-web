<?php

    $server = "mysql";
    $host = "localhost:3308";
    $base = "iutraining";
    $user = "root";
    $pass = "";

    $db = new PDO("$server:host=$host;dbname=$base", $user, $pass);
?>