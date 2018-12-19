<?php
session_start();

$id = $_SESSION['id_users'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}


include '../Models/connect_db.php';

try{

    $sql ="INSERT INTO trainings (title_train, start_date_train, end_date_train, school_train, location_train, dipl_name_train, dipl_validate_train, users_id_users) VALUES ('".$title_train."' , '".$start_date_train."' , '".$end_date_train."' , '".$school_train."' , '".$location_train."' , '".$dipl_name_train."' , '".$dipl_validate_train."', '".$id."');";
    $res = $bdd->exec($sql);

    $req = $bdd->prepare("SELECT id_train, title_train, start_date_train, end_date_train, school_train, location_train, dipl_name_train, dipl_validate_train FROM trainings WHERE users_id_users = :users_id_users ORDER BY id_train DESC LIMIT 1");
    $req->execute(array(':users_id_users' => $id));
    $resultat = $req->fetch();

echo json_encode($resultat);    
$_SESSION['id_train'] = $resultat['id_train'];
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


