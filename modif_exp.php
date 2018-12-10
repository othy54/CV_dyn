<?php

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include 'connect_db.php';



try {
$req = $bdd->prepare("SELECT id_exp, job_exp, start_date_exp, end_date_exp, firm_name_exp, location_exp, type_contract_exp, mission_exp FROM exp_pro WHERE job_exp = :job_exp");
$req->execute(array(':job_exp' => $job_exp));
$resultat = $req->fetch();

echo json_encode($resultat);
session_start();

$_SESSION['id_exp'] = $resultat['id_exp'];


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}



/*
job_exp, start_date_exp, end_date_exp, firm_name_exp, location_exp, type_contract_exp, mission_exp, users_id_users