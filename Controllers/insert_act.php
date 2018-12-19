<?php
session_start();

$id = $_SESSION['id_users'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include '../Models/connect_db.php';

try{

    $sql ="INSERT INTO activities (title_act, desc_act, users_id_users) VALUES ('".$title_act."' , '".$desc_act."', '".$id."');";
    $res = $bdd->exec($sql);

    $req = $bdd->prepare("SELECT * FROM activities WHERE users_id_users = :users_id_users ORDER BY id_act DESC LIMIT 1");
    $req->execute(array(':users_id_users' => $id));
    $resultat = $req->fetch();

echo json_encode($resultat);    
$_SESSION['id_act'] = $resultat['id_act'];
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
