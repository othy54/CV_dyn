<?php

session_start();

$id_skill = $_SESSION['id_skill'];

extract($_POST);
foreach ($_POST as $key => $value) {
   $$key = addslashes($value);
}

include '../Models/connect_db.php';

$req = $bdd->prepare("UPDATE skills SET title_skill = :title_skill, desc_skill = :desc_skill  WHERE id_skill = $id_skill");
$req->execute(
    array(
        ':title_skill' => $title_skill,
        ':desc_skill' => $desc_skill
    )
);
