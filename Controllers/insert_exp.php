<?php
session_start();

$id = $_SESSION['id_users'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include '../Models/connect_db.php';

try{

    $sql ="INSERT INTO exp_pro (job_exp, start_date_exp, end_date_exp, firm_name_exp, location_exp, type_contract_exp, mission_exp, users_id_users) VALUES ('".$job_exp."' , '".$start_date_exp."' , '".$end_date_exp."' , '".$firm_name_exp."' , '".$location_exp."' , '".$type_contract_exp."' , '".$mission_exp."', '".$id."');";
    $res = $bdd->exec($sql);

    $req = $bdd->prepare("SELECT * FROM exp_pro WHERE users_id_users = :users_id_users ORDER BY id_exp DESC LIMIT 1");
    $req->execute(array(':users_id_users' => $id));
    $resultat = $req->fetch();

echo json_encode($resultat);    
$_SESSION['id_exp'] = $resultat['id_exp'];
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
