<?php
session_start();

$id = $_SESSION['id_users'];
include '../Models/connect_db.php';



try {
$req = $bdd->prepare("SELECT * FROM users WHERE id_users = :id_users");
$req->execute(array(':id_users' => $id));
$resultat = $req->fetch();


echo json_encode($resultat);


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

