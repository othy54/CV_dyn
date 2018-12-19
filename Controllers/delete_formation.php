<?php


include '../Models/connect_db.php';

extract($_POST);
$id = $_POST['id_train'];

try{

    $sql ="DELETE FROM trainings WHERE id_train = '$id'";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}