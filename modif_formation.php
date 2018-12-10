<?php

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include 'connect_db.php';



try {
$req = $bdd->prepare("SELECT id_train, title_train, start_date_train, end_date_train, school_train, location_train, dipl_name_train, dipl_validate_train FROM trainings WHERE title_train = :title_train");
$req->execute(array(':title_train' => $title_train));
$resultat = $req->fetch();

echo json_encode($resultat);
session_start();

$_SESSION['id_train'] = $resultat['id_train'];


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>

