<?php


include 'connect_db.php';

extract($_POST);
$title = $_POST['title_train'];

try{

    $sql ="DELETE FROM trainings WHERE title_train = '$title'";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}