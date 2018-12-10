<?php


include 'connect_db.php';

extract($_POST);
$rea = $_POST['title_rea'];

try{

    $sql ="DELETE FROM realisations WHERE title_rea = '$rea'";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}