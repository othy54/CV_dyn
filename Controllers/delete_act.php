<?php


include '../Models/connect_db.php';

extract($_POST);
$id = $_POST['id_act'];

try{

    $sql ="DELETE FROM activities WHERE id_act = '$id'";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}