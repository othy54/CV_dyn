<?php


// DECLARATION DES VALEURS


$EMAIL = htmlspecialchars($_POST['mail_user']);
$MDP = password_hash($_POST['keypass_user'], PASSWORD_DEFAULT);
$SECRET = $_POST['secret'];

// CONNEXION BDD

include '../Models/connect_db.php';

// VERIFICATION 

if (isset($SECRET) && $SECRET == "registerGo") {

    $req = $bdd->prepare("SELECT mail_user FROM users WHERE mail_user=:mail_user");
    $req->execute(array(':mail_user' => $EMAIL));


    if ($req->rowCount() > 0) {
        $message = 'Email déjà utilisé';
        header('Location: ../index.php?error="' . $message . '"');

    } else { //INSERTION DES INFORMATIONS
        try {
            $sql = "INSERT INTO users (keypass_user, mail_user) VALUES ('" . $MDP . "', '" . $EMAIL . "');";
            $res = $bdd->exec($sql);

            $req = $bdd->prepare("SELECT id_users, keypass_user, co_re_user FROM users WHERE mail_user=:mail_user");
            $req->execute(array(':mail_user' => $EMAIL));
            $resultat = $req->fetch();
            
            // CONNEXION AU PROFIL

            session_start();
            $_SESSION['id_users'] = $resultat['id_users'];
            $_SESSION['mail_user'] = $EMAIL;
            $_SESSION['co_re_user'] = $resultat['co_re_user'];
            

            header('Location: ../Views/create_modif_CV.php');

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
} elseif (isset($SECRET) && $SECRET == "connexionGo") {

    $req = $bdd->prepare("SELECT id_users, keypass_user, co_re_user FROM users WHERE mail_user=:mail_user");
    $req->execute(array(':mail_user' => $EMAIL));
    $resultat = $req->fetch();

    $isPasswordCorrect = password_verify($_POST['keypass_user'], $resultat['keypass_user']); //Verification HASH

    if (!$resultat) {
        $message = 'Mauvais identifiant ou mot de passe !';
        header('Location: ../index.php?error="' . $message . '"');

    } else {
        if ($isPasswordCorrect) {

            // CONNEXION AU PROFIL
            session_start();
            $_SESSION['id_users'] = $resultat['id_users'];
            $_SESSION['mail_user'] = $EMAIL;
            $_SESSION['co_re_user'] = $resultat['co_re_user'];


            header('Location: ../Views/create_modif_CV.php');

        } else {
            $message = 'Mauvais identifiant ou mot de passe !';
            header('Location: ../index.php?error="' . $message . '"');
        }
    }
}


?>