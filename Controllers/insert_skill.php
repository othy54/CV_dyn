<?php
session_start();

$id = $_SESSION['id_users'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include '../Models/connect_db.php';

try{

    $sql ="INSERT INTO skills (title_skill, desc_skill, users_id_users) VALUES ('".$title_skill."' , '".$desc_skill."', '".$id."');";
    $res = $bdd->exec($sql);

    $req = $bdd->prepare("SELECT * FROM skills WHERE users_id_users = :users_id_users ORDER BY id_skill DESC LIMIT 1");
    $req->execute(array(':users_id_users' => $id));
    $resultat = $req->fetch();

echo json_encode($resultat);    
$_SESSION['id_skill'] = $resultat['id_skill'];
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
