<?php


include '../Models/connect_db.php';

extract($_POST);
$id = $_POST['id_skill'];

try{

    $sql ="DELETE FROM skills WHERE id_skill = '$id'";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}