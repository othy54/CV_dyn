<?php
session_start();

$id = $_SESSION['id_users'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include 'connect_db.php';

try{

    $sql ="INSERT INTO exp_pro (job_exp, start_date_exp, end_date_exp, firm_name_exp, location_exp, type_contract_exp, mission_exp, users_id_users) VALUES ('".$job_exp."' , '".$start_date_exp."' , '".$end_date_exp."' , '".$firm_name_exp."' , '".$location_exp."' , '".$type_contract_exp."' , '".$mission_exp."', '".$id."');";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
