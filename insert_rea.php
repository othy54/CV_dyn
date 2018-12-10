<?php
session_start();

$id = $_SESSION['id_users'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include 'connect_db.php';

try{

    $sql ="INSERT INTO realisations (title_rea, start_date_rea, end_date_rea, desc_rea, users_id_users) VALUES ('".$title_rea."', '".$start_date_rea."', '".$end_date_rea."', '".$desc_rea."', '".$id."');";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
