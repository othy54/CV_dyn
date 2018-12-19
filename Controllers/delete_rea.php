<?php


include '../Models/connect_db.php';

extract($_POST);
$id = $_POST['id_rea'];

try{

    $sql ="DELETE FROM realisations WHERE id_rea = '$id'";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}