<?php

session_start();

$id_act = $_SESSION['id_act'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include '../Models/connect_db.php';

$req = $bdd->prepare("UPDATE activities SET title_act = :title_act, desc_act = :desc_act  WHERE id_act = $id_act");
$req->execute(
    array(
        ':title_act' => $title_act,
        ':desc_act' => $desc_act
    )
);
