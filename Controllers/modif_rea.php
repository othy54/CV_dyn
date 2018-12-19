<?php

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include '../Models/connect_db.php';



try {
$req = $bdd->prepare("SELECT id_rea, title_rea, start_date_rea, end_date_rea, desc_rea FROM realisations WHERE id_rea = :id_rea");
$req->execute(array(':id_rea' => $id_rea));
$resultat = $req->fetch();

echo json_encode($resultat);
session_start();

$_SESSION['id_rea'] = $resultat['id_rea'];


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

