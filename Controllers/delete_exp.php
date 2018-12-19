<?php


include '../Models/connect_db.php';

extract($_POST);
$id = $_POST['id_exp'];

try{

    $sql ="DELETE FROM exp_pro WHERE id_exp = '$id'";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}