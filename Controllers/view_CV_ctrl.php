<?php

session_start();
$id = $_SESSION['id_users'];


include '../Models/connect_db.php';



try {
/*$req = $bdd->prepare("SELECT users.*, trainings.* , exp_pro.*, activities.*, skills.*, realisations.*
                        FROM users 
                        JOIN trainings ON trainings.users_id_users = users.id_users
                        JOIN exp_pro ON exp_pro.users_id_users = users.id_users
                        LEFT JOIN activities ON activities.users_id_users = users.id_users
                        LEFT JOIN skills ON skills.users_id_users = users.id_users
                        LEFT JOIN realisations ON realisations.users_id_users = users.id_users
                        ");
  */
$req =$bdd->prepare("SELECT *, DATE_FORMAT(date_birth_user, '%d/%m/%Y') AS date_fr FROM users WHERE id_users = :id_users") ;                      
$req->execute(array(':id_users' => $id));
$resultat = $req->fetch();

$req2 =$bdd->prepare("SELECT *, DATE_FORMAT(start_date_train, '%Y') AS start_date_train_fr, DATE_FORMAT(end_date_train, '%Y') AS end_date_train_fr FROM trainings WHERE users_id_users = :id_users ORDER BY start_date_train_fr DESC") ;                      
$req2->execute(array(':id_users' => $id));
$resultat2 = $req2->fetchAll();

$req3 =$bdd->prepare("SELECT *, DATE_FORMAT(start_date_exp, '%Y') AS start_date_exp_fr, DATE_FORMAT(end_date_exp, '%Y') AS end_date_exp_fr FROM exp_pro WHERE users_id_users = :id_users ORDER BY start_date_exp_fr DESC") ;                      
$req3->execute(array(':id_users' => $id));
$resultat3 = $req3->fetchAll();

$req4 =$bdd->prepare("SELECT * FROM skills WHERE users_id_users = :id_users") ;                      
$req4->execute(array(':id_users' => $id));
$resultat4 = $req4->fetchAll();

$req5 =$bdd->prepare("SELECT * FROM activities WHERE users_id_users = :id_users") ;                      
$req5->execute(array(':id_users' => $id));
$resultat5 = $req5->fetchAll();

$req6 =$bdd->prepare("SELECT *, DATE_FORMAT(start_date_rea, '%Y') AS start_date_rea_fr, DATE_FORMAT(end_date_rea, '%Y') AS end_date_rea_fr FROM realisations WHERE users_id_users = :id_users") ;                      
$req6->execute(array(':id_users' => $id));
$resultat6 = $req6->fetchAll();



echo json_encode(array($resultat, $resultat2, $resultat3, $resultat4, $resultat5, $resultat6));


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

