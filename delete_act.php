<?php


include 'connect_db.php';

extract($_POST);
$act = $_POST['title_act'];

try{

    $sql ="DELETE FROM activities WHERE title_act = '$act'";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}