<?php
session_start();

if (isset($_SESSION['id_users'])) {
  

  ?>

<!doctype html>
<html lang="fr">

<head>
  <title>CV Tek</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>

<body>

  <div class="mainContainer">
    <div class="container-fluid" id="nav-border">

      <div class="row justify-content-end align-items-center">

        <div class="btn-group" role="group" style="margin-right : 40px;">
          <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            MENU
          </button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="../index.php">Deconnexion</a>
          </div>
        </div>
        <div style="margin-right : 40px;">
          <?php echo $_SESSION['mail_user'].' '; ?>
        </div>
      </div>

    </div>
    <div class="container" style="margin-top:50px;">
      <div class="row" id="squareCreate">
        <div class="col-10 col-md-6" id="backCreate">
          <h1 class="titre">MyResume</h1>
          <?php

            if (!isset($_SESSION['co_re_user']) || $_SESSION['co_re_user'] == null) {
              echo '<a name="" id="btnCreate" class="btn btn-danger" href="formulaire.php" role="button"> Créez votre CV</a>';
            } else {
              echo '<a name="" id="btnCreate" class="btn btn-danger" href="../Controllers/delete_CV.php" role="button"> Supprimez votre CV</a>';
            }

            if (!isset($_SESSION['co_re_user']) || $_SESSION['co_re_user'] == null) {
              echo '<a name="" id="btnCreate" class="btn btn-primary disabled" href="#" role="button"> Afficher votre CV</a>';
            } else {
              echo '<a name="" id="btnCreate" class="btn btn-primary" href="view_CV.php" role="button"> Afficher votre CV</a>';
            }

            if (!isset($_SESSION['co_re_user']) || $_SESSION['co_re_user'] == null) {
              echo '<a name="" id="btnCreate" class="btn btn-success disabled" href="#" role="button"> Modifier votre CV</a>';
            } else {
              echo '<a name="" id="btnCreate" class="btn btn-success" href="formulaire.php" role="button"> Modifier votre CV</a>';
            }
            ?>

        </div>
      </div>
    </div>
  </div>

  <?php
      ?>

</body>

</html>

<?php



} else {

  header('Location: ../index.php');
}