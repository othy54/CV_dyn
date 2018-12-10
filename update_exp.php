<?php

session_start();

$id_exp = $_SESSION['id_exp'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include 'connect_db.php';

$req = $bdd->prepare("UPDATE exp_pro SET job_exp = :job_exp, start_date_exp = :start_date_exp, end_date_exp = :end_date_exp, firm_name_exp = :firm_name_exp, location_exp = :location_exp, type_contract_exp = :type_contract_exp, mission_exp = :mission_exp WHERE id_exp = $id_exp");
$req->execute(
    array(
        ':job_exp' => $job_exp,
        ':start_date_exp' => $start_date_exp,
        ':end_date_exp' => $end_date_exp,
        ':firm_name_exp' => $firm_name_exp,
        ':location_exp' => $location_exp,
        ':type_contract_exp' => $type_contract_exp,
        ':mission_exp' => $mission_exp

    )
);
