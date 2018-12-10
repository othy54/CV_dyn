<?php

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include 'connect_db.php';



try {
$req = $bdd->prepare("SELECT id_rea, title_rea, start_date_rea, end_date_rea, desc_rea FROM realisations WHERE title_rea = :title_rea");
$req->execute(array(':title_rea' => $title_rea));
$resultat = $req->fetch();

echo json_encode($resultat);
session_start();

$_SESSION['id_rea'] = $resultat['id_rea'];


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

