<?php


include 'connect_db.php';

extract($_POST);
$job = $_POST['job_exp'];

try{

    $sql ="DELETE FROM exp_pro WHERE job_exp = '$job'";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}