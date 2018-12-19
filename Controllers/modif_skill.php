<?php

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include '../Models/connect_db.php';



try {
$req = $bdd->prepare("SELECT id_skill, title_skill, desc_skill FROM skills WHERE id_skill = :id_skill");
$req->execute(array(':id_skill' => $id_skill));
$resultat = $req->fetch();

echo json_encode($resultat);
session_start();

$_SESSION['id_skill'] = $resultat['id_skill'];


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

