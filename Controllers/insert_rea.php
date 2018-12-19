<?php
session_start();

$id = $_SESSION['id_users'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include '../Models/connect_db.php';

try{

    $sql ="INSERT INTO realisations (title_rea, start_date_rea, end_date_rea, desc_rea, users_id_users) VALUES ('".$title_rea."', '".$start_date_rea."', '".$end_date_rea."', '".$desc_rea."', '".$id."');";
    $res = $bdd->exec($sql);

    $req = $bdd->prepare("SELECT * FROM realisations WHERE users_id_users = :users_id_users ORDER BY id_rea DESC LIMIT 1");
    $req->execute(array(':users_id_users' => $id));
    $resultat = $req->fetch();

echo json_encode($resultat);    
$_SESSION['id_rea'] = $resultat['id_rea'];
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
