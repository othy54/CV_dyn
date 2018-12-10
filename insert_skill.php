<?php
session_start();

$id = $_SESSION['id_users'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include 'connect_db.php';

try{

    $sql ="INSERT INTO skills (title_skill, desc_skill, users_id_users) VALUES ('".$title_skill."' , '".$desc_skill."', '".$id."');";
    $res = $bdd->exec($sql);
            
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
