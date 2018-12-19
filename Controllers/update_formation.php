<?php

session_start();

$id_train = $_SESSION['id_train'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include '../Models/connect_db.php';

$req = $bdd->prepare("UPDATE trainings SET title_train = :title_train, start_date_train = :start_date_train, end_date_train = :end_date_train, school_train = :school_train, location_train = :location_train, dipl_name_train = :dipl_name_train, dipl_validate_train = :dipl_validate_train WHERE id_train = $id_train");
$req->execute(
    array(
        ':title_train' => $title_train,
        ':start_date_train' => $start_date_train,
        ':end_date_train' => $end_date_train,
        ':school_train' => $school_train,
        ':location_train' => $location_train,
        ':dipl_name_train' => $dipl_name_train,
        ':dipl_validate_train' => $dipl_validate_train

    )
);
