<?php
session_start();

$id = $_SESSION['id_users'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include 'connect_db.php';

try{

    $sql ="INSERT INTO trainings (title_train, start_date_train, end_date_train, school_train, location_train, dipl_name_train, dipl_validate_train, users_id_users) VALUES ('".$title_train."' , '".$start_date_train."' , '".$end_date_train."' , '".$school_train."' , '".$location_train."' , '".$dipl_name_train."' , '".$dipl_validate_train."', '".$id."');";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
/*

