<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=test_curiculum;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'La base de données n\'est pas disponible, merci de ré-éssayer plus tard';
}

?>