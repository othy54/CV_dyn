<?php

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include 'connect_db.php';



try {
$req = $bdd->prepare("SELECT id_skill, title_skill, desc_skill FROM skills WHERE title_skill = :title_skill");
$req->execute(array(':title_skill' => $title_skill));
$resultat = $req->fetch();

echo json_encode($resultat);
session_start();

$_SESSION['id_skill'] = $resultat['id_skill'];


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

