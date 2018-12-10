<?php

session_start();
$id = $_SESSION['id_users'];


if (isset($id)) {

  ?>


<!doctype html>
<html lang="fr">

<head>
  <title>MyResume</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="style2.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>

<body>



  <div class="mainContainer">
    <div class="container-fluid" id="nav-border">

      <div id="row">
        s
      </div>

    </div>
    <div class="container" style="margin-top: 30px;">
      <div class="row" id="square">
        <div class="col-10" id="theTabs">
          <h1 class="titre">MyResume</h1>

          <!-- ONGLETS DU FORMULAIRE -->

          <div id="tabCenter">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="identite-tab" data-toggle="tab" href="#identity" role="tab"
                  aria-controls="identity" aria-selected="true">Identité</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="formation-tab" data-toggle="tab" href="#formation" role="tab" aria-controls="formation"
                  aria-selected="false">Formations</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="exp-tab" data-toggle="tab" href="#exp" role="tab" aria-controls="exp"
                  aria-selected="false">Expériences Professionnelle</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="competence-tab" data-toggle="tab" href="#competence" role="tab" aria-controls="competence"
                  aria-selected="false">Compétences</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="realisation-tab" data-toggle="tab" href="#realisation" role="tab" aria-controls="contact"
                  aria-selected="false">Réalisations</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="activity-tab" data-toggle="tab" href="#activity" role="tab" aria-controls="contact"
                  aria-selected="false">Activités</a>
              </li>
            </ul>
          </div>

          <!-- ONGLET IDENTITE -->

          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="identity" role="tabpanel" aria-labelledby="identite-tab">
              <form action="#" method="post" id="form-user">
                <div class="row rowLabel">
                  <div class="col">
                    <label for="name_user"> Prénom</label>
                    <input type="text" class="form-control" name="name_user" value="<?php if (isset($_SESSION['name_user'])) {
                                                                                      echo $_SESSION['name_user'];
                                                                                    } ?>">
                  </div>
                  <div class="col">
                    <label for="lastname_user">Nom </label>
                    <input type="text" class="form-control" name="lastname_user" value="<?php if (isset($_SESSION['lastname_user'])) {
                                                                                          echo $_SESSION['lastname_user'];
                                                                                        } ?>">
                  </div>
                </div>

                <div class="row rowLabel">
                  <div class="col">
                    <label for="address_user">Adresse</label>
                    <input type="text" class="form-control" name="address_user" value="<?php if (isset($_SESSION['address_user'])) {
                                                                                        echo $_SESSION['address_user'];
                                                                                      } ?>">
                  </div>
                  <div class="col">
                    <label for="phone_user">Téléphone</label>
                    <input type="text" class="form-control" name="phone_user" value="<?php if (isset($_SESSION['phone_user'])) {
                                                                                      echo $_SESSION['phone_user'];
                                                                                    } ?>">
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col">
                    <label for="mail_user">Email</label>
                    <input type="email" class="form-control" name="mail_user" value="<?php if (isset($_SESSION['mail_user'])) {
                                                                                      echo $_SESSION['mail_user'];
                                                                                    } ?>"
                      disabled>
                  </div>
                  <div class="col">
                    <label for="date_birth_user">Date de naissance</label>
                    <input type="date" class="form-control" name="date_birth_user" value="<?php if (isset($_SESSION['date_birth_user'])) {
                                                                                            echo $_SESSION['date_birth_user'];
                                                                                          } ?>">
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col">
                    <label for="cv_title_user">Titre du CV</label>
                    <input type="text" class="form-control" name="cv_title_user" placeholder="ex : Développeur Web" value="<?php if (isset($_SESSION['cv_title_user'])) {
                                                                                                                            echo $_SESSION['cv_title_user'];
                                                                                                                          } ?>">
                  </div>
                  <div class="col">
                    <label for="handicap_user">Particularités</label>
                    <input type="text" class="form-control" name="handicap_user" value="<?php if (isset($_SESSION['handicap_user'])) {
                                                                                          echo $_SESSION['handicap_user'];
                                                                                        } ?>">
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col">
                    <p>Objectif carrière</p>
                    <textarea id="areaCareer" name="obj_career_user" rows="5" class="form-control"> <?php if (isset($_SESSION['obj_career_user'])) {
                                                                                                      echo $_SESSION['obj_career_user'];
                                                                                                    } ?></textarea>
                  </div>
                </div>
                <input type="submit" value="AJOUTER / MODIFIER" class="btn btn-success">
              </form>
            </div>

            <!-- ONGLET FORMATION  -->


            <div class="tab-pane fade" id="formation" role="tabpanel" aria-labelledby="formation-tab">
              <form action="#" method="post" id="formformation">
                <div class="row rowLabel">
                  <div class="col-12">
                    Vos formations :

                    <select id="here" class="form-control">
                      <?php

                      include 'connect_db.php';

                      $reponse = $bdd->query("SELECT id_train, title_train FROM trainings WHERE users_id_users = $id");
                      while ($donnees = $reponse->fetch()) {
                        echo '<option>' . $donnees['title_train'] . '</option>';
                      }

                      ?>
                    </select>
                    <div>
                      <span class="btn btn-primary mt-1" id="modifyFormation">Modifier</span>
                      <span class="btn btn-danger mt-1" id="deleteFormation">Supprimer</span>
                    </div>
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col col-md-6">
                    <label for="title_train">Formation</label>
                    <input type="text" class="form-control empty" name="title_train" id="title_train" required>
                  </div>
                  <div class="col col-md-3">
                    <label for="start_date_train">Date de début</label>
                    <input type="date" class="form-control empty" name="start_date_train" id="start_date_train">
                  </div>
                  <div class="col col-md-3">
                    <label for="end_date_train">Date de fin </label>
                    <input type="date" class="form-control empty" name="end_date_train" id="end_date_train">
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col">
                    <label for="school_train">Ecole/Université/CFA</label>
                    <input type="text" class="form-control empty" name="school_train" id="school_train">
                  </div>
                  <div class="col">
                    <label for="location_train"> Ville</label>
                    <input type="test" class="form-control empty" name="location_train" id="location_train">
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col-10">
                    <label for="dipl_name_train">Nom du diplôme</label>
                    <input type="text" class="form-control empty" name="dipl_name_train" id="dipl_name_train">
                  </div>
                  <div class="row col-2 justify-content-center align-items-end">
                    <div>
                      <label for="dipl_validate_train"> Obtenu </label>
                      <select class="form-control" name="dipl_validate_train" id="dipl_validate_train">
                        <option value="1" selected>Oui</option>
                        <option value="0">Non</option>
                      </select>
                    </div>
                  </div>
                </div>
                <hr>
                <span class="btn btn-success" id="btn-add-formation"> AJOUTER </span>
                <span class="btn btn-primary" id="btn-modify-formation"> MODIFIER</span>
              </form>
            </div>

                      <!-- ONGLET EXPERIENCE -->


            <div class="tab-pane fade" id="exp" role="tabpanel" aria-labelledby="exp-tab">

              <form action="#" method="post" id="form_exp">
              <div class="row rowLabel">
                  <div class="col-12">
                    Vos expériences :

                    <select id="select_exp" class="form-control">
                      <?php

                      include 'connect_db.php';

                      $reponse = $bdd->query("SELECT id_exp, job_exp FROM exp_pro WHERE users_id_users = $id");
                      while ($donnees = $reponse->fetch()) {
                        echo '<option>' . $donnees['job_exp'] . '</option>';
                      }

                      ?>
                    </select>
                    <div>
                      <span class="btn btn-primary mt-1" id="modifyExperience">Modifier</span>
                      <span class="btn btn-danger mt-1" id="deleteExperience">Supprimer</span>
                    </div>
                  </div>
                </div>

                <div class="row rowLabel">
                  <div class="col-6">
                    <label for="job_exp">Poste</label>
                    <input type="text" class="form-control empty" name="job_exp" id="job_exp">
                  </div>
                  <div class="col-3">
                    <label for="start_date_exp"> Date de début</label>
                    <input type="date" class="form-control empty" name="start_date_exp" id="start_date_exp">
                  </div>
                  <div class="col-3">
                    <label for="end_date_exp"> Date de fin </label>
                    <input type="date" class="form-control empty" name="end_date_exp" id="end_date_exp">
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col-6">
                    <label for="firm_name_exp">Société</label>
                    <input type="text" class="form-control empty" name="firm_name_exp" id="firm_name_exp">
                  </div>
                  <div class="col-3">
                    <label for="location_exp">Ville</label>
                    <input type="text" class="form-control empty" name="location_exp" id="location_exp">
                  </div>
                  <div class="col-3">
                    <label for="type_contract_exp"> Type de contrat </label>
                    <input type="text" class="form-control empty" name="type_contract_exp" id="type_contract_exp">
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col">
                    <p>Missions : </p>
                    <textarea id="mission_exp" name="mission_exp" rows="7" class="form-control empty"></textarea>
                  </div>
                </div>
                <hr>

                <span class="btn btn-success" id="btn-add-exp"> AJOUTER </span>
                <span class="btn btn-primary" id="btn-modify-exp"> MODIFIER</span>

              </form>
            </div>


                  <!-- ONGLET COMPETENCES -->



            <div class="tab-pane fade" id="competence" role="tabpanel" aria-labelledby="competence-tab">
             <form action="#" method="post" id="form_skill">
             <div class="row rowLabel">
                  <div class="col-12">
                    Vos compétences :

                    <select id="select_skill" class="form-control">
                      <?php

                      include 'connect_db.php';

                      $reponse = $bdd->query("SELECT id_skill, title_skill FROM skills WHERE users_id_users = $id");
                      while ($donnees = $reponse->fetch()) {
                        echo '<option>' . $donnees['title_skill'] . '</option>';
                      }

                      ?>
                    </select>
                    <div>
                      <span class="btn btn-primary mt-1" id="modifySkill">Modifier</span>
                      <span class="btn btn-danger mt-1" id="deleteSkill">Supprimer</span>
                    </div>
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col-12">
                    <label for="title_skill">Compétence</label>
                    <input type="text" class="form-control empty" name="title_skill" placeholder="Langues, langages, savoir-faire etc" id="title_skill">
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col-12">
                    <p>Description</p>
                    <textarea id="desc_skill" name="desc_skill" rows="5" class="form-control empty"></textarea>
                  </div>
                </div>
                <hr>
               
                <span class="btn btn-success" id="btn-add-skill"> AJOUTER </span>
                <span class="btn btn-primary" id="btn-modify-skill"> MODIFIER</span>
             </form>
            </div>

                       <!-- ONGLET REALISATIONS -->

            <div class="tab-pane fade" id="realisation" role="tabpanel" aria-labelledby="realisation-tab">

              <form action="#" method="post" id="form_rea">
              <div class="row rowLabel">
                  <div class="col-12">
                    Vos réalisations :

                    <select id="select_rea" class="form-control">
                      <?php

                      include 'connect_db.php';

                      $reponse = $bdd->query("SELECT id_rea, title_rea FROM realisations WHERE users_id_users = $id");
                      while ($donnees = $reponse->fetch()) {
                        echo '<option>' . $donnees['title_rea'] . '</option>';
                      }

                      ?>
                    </select>
                    <div>
                      <span class="btn btn-primary mt-1" id="modifyRealisation">Modifier</span>
                      <span class="btn btn-danger mt-1" id="deleteRealisation">Supprimer</span>
                    </div>
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col-6">
                    <label for="title rea">Réalisation</label>
                    <input type="text" class="form-control empty" name="title_rea" id="title_rea">
                  </div>
                  <div class="col-3">
                    <label for="start_date_rea"> Date de début</label>
                    <input type="date" class="form-control empty" name="start_date_rea" id="start_date_rea">
                  </div>
                  <div class="col-3">
                    <label for="end_date_rea"> Date de fin </label>
                    <input type="date" class="form-control empty" name="end_date_rea" id="end_date_rea">
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col-12">
                    <p>Description</p>
                    <textarea id="desc_rea" name="desc_rea" rows="5" id="desc_rea" class="form-control empty"></textarea>
                  </div>
                </div>
                <hr>
                
                  <span class="btn btn-success" id="btn-add-rea"> AJOUTER </span>
                  <span class="btn btn-primary" id="btn-modify-rea"> MODIFIER</span>
                
              </form>
            </div>

            <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                      
            <div class="row rowLabel">
                  <div class="col-12">
                    Vos activité/loisirs :

                    <select id="select_act" class="form-control">
                      <?php

                      include 'connect_db.php';

                      $reponse = $bdd->query("SELECT id_act, title_act FROM activities WHERE users_id_users = $id");
                      while ($donnees = $reponse->fetch()) {
                        echo '<option>' . $donnees['title_act'] . '</option>';
                      }

                      ?>
                    </select>
                    <div>
                      <span class="btn btn-primary mt-1" id="modifyActivity">Modifier</span>
                      <span class="btn btn-danger mt-1" id="deleteActivity">Supprimer</span>
                    </div>
                  </div>
                </div>
              <form action="#" method="post" id="form_act">
                <div class="row rowLabel">
                  <div class="col-12">
                    <label for="title_act">Activité/Loisir</label>
                    <input type="text" class="form-control empty" name="title_act" id="title_act">
                  </div>
                </div>
                <div class="row rowLabel">
                  <div class="col-12">
                    <p>Description</p>
                    <textarea id="desc_act" name="desc_act" rows="5" class="form-control empty"></textarea>
                  </div>
                </div>
                <hr>
                
                <span class="btn btn-success" id="btn-add-act"> AJOUTER </span>
                <span class="btn btn-primary" id="btn-modify-act"> MODIFIER</span>
                
              </f>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="script.js"></script>

</body>

</html>

<?php

} else {

  header('Location: index.php');
}