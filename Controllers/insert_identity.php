<?php
session_start();

$id = $_SESSION['id_users'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include '../Models/connect_db.php';

$req = $bdd->prepare("UPDATE users SET name_user = :names, lastname_user = :lastname, address_user = :adress, phone_user = :phone, date_birth_user = :birth, cv_title_user = :cvtitle, handicap_user = :handicap, obj_career_user = :career, co_re_user = 1 WHERE id_users = :id");
$req->execute(
    array(
        ':names' => $names,
        ':lastname' => $lastname,
        ':adress' => $address,
        ':phone' => $phone,
        ':birth' => $birth,
        ':cvtitle' => $cvtitle,
        ':handicap' => $handicap,
        ':career' => $career,
        ':id' => $id
    )
);

?>