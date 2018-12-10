<?php

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include 'connect_db.php';



try {
$req = $bdd->prepare("SELECT id_act, title_act, desc_act FROM activities WHERE title_act = :title_act");
$req->execute(array(':title_act' => $title_act));
$resultat = $req->fetch();

echo json_encode($resultat);
session_start();

$_SESSION['id_act'] = $resultat['id_act'];


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

