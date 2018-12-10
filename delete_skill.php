<?php


include 'connect_db.php';

extract($_POST);
$skill = $_POST['title_skill'];

try{

    $sql ="DELETE FROM skills WHERE title_skill = '$skill'";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}