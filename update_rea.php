<?php

session_start();

$id_rea = $_SESSION['id_rea'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include 'connect_db.php';

$req = $bdd->prepare("UPDATE realisations SET title_rea = :title_rea, start_date_rea = :start_date_rea, end_date_rea = :end_date_rea, desc_rea = :desc_rea  WHERE id_rea = $id_rea");
$req->execute(
    array(
        ':title_rea' => $title_rea,
        ':start_date_rea' => $start_date_rea,
        ':end_date_rea' => $end_date_rea,
        ':desc_rea' => $desc_rea
    )
);
