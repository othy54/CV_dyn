<?php
session_start();

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include '../Models/connect_db.php';

$id = $_SESSION['id_users'];

try{

   $sql = "DELETE FROM trainings WHERE users_id_users = '$id'";
   $sql2 = "DELETE FROM exp_pro WHERE users_id_users = '$id'";
   $sql3 = "DELETE FROM realisations WHERE users_id_users = '$id'";
   $sql4 = "DELETE FROM skills WHERE users_id_users = '$id'";
   $sql5 = "DELETE FROM activities WHERE users_id_users = '$id'";
   $sql6 = "UPDATE users SET name_user = NULL, lastname_user = NULL, address_user = NULL, phone_user = NULL, date_birth_user = NULL, cv_title_user = NULL, handicap_user = NULL, obj_career_user = NULL, co_re_user = NULL WHERE id_users = $id"; 

 
    $res = $bdd->exec($sql);
    $res2 = $bdd->exec($sql2);
    $res3 = $bdd->exec($sql3);
    $res4 = $bdd->exec($sql4);
    $res5 = $bdd->exec($sql5);
    $res6 = $bdd->exec($sql6);
    
/*
    $_SESSION['name_user'] = NULL;
    $_SESSION['lastname_user'] = NULL;
    $_SESSION['address_user'] = NULL;
    $_SESSION['phone_user'] = NULL;
    $_SESSION['date_birth_user'] = NULL;
    $_SESSION['cv_title_user'] = NULL;
    $_SESSION['handicap_user'] = NULL;
    $_SESSION['obj_career_user'] = NULL;
*/

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
unset($_SESSION['co_re_user']);

header('Location: ../Views/create_modif_CV.php');