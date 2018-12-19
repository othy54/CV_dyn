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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <script src="http://html2canvas.hertzen.com/dist/html2canvas.js"></script>
  <link rel="stylesheet" href="../css/style3.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>

<body>
    
    <div class="maint-container">
    <div class="container-fluid" id="nav-border">

      <div class="row justify-content-end align-items-center">
        
        <div class="btn-group" role="group" style="margin-right : 40px;">
          <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            MENU
          </button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="create_modif_CV.php">Accueil</a>
            <a class="dropdown-item" href="#" id="saveToPDF" >Créer PDF</a>
            <a class="dropdown-item" href="../index.php">Deconnexion</a> 
          </div>
        </div> 
        <div style="margin-right : 40px;">
          <?php echo $_SESSION['mail_user'].' '; ?>
        </div>
      </div>

    </div>

        <div class="container" id="theTabs" style="margin-top: 30px;">
            <div class="row">
                <div class="col-5">
                    <div class="row" style= "font-size: 30px;">
                        <div id="name_user"></div>
                        <div id="lastname_user" style = "margin-left: 5px;"></div>
                    </div>
                    <div class="row">
                        <div id="address_user"></div>
                    </div>
                    <div class="row">
                        <div id="mail_user"></div>
                    </div>
                    <div class="row">
                        <div id="phone_user"></div>
                    </div>
                    <div class="row">
                        <div id="date_birth_user"></div>
                    </div>
                </div>
                <div class="col-7 d-flex justify-content-center align-items-center">
                     <div style="font-size:30px; font-family: serif;">“</div><div id="obj_career_user" style="text-align:justify; font-size: 20px;"></div><div style="font-size:30px; font-family: serif;">”</div>
                
                </div>
            </div>
            <div class="row justify-content-center">
                <div id="cv_title_user" style="font-size:50px;"></div>
            </div>
            <div class="row" style="border-bottom:solid; margin-bottom: 20px;">
                <div style="font-size:30px; ">Formation</div>
            </div>
            <div id="formation_user" class="container">

            </div>

            <div class="row" style="margin-bottom : 20px; border-bottom: solid;">
            
                <div style="font-size:30px;">Expérience Professionnelle</div>
            
            </div>
            <div class="container" id="exp_user"></div>
            <div class="row" style="margin-bottom : 20px; border-bottom: solid;">
            
                <div style="font-size:30px;">Compétences</div>
            
            </div>
            <div class="container" id="skills">
            

            </div>

            <div id="real">
                <div class="row" style="margin-bottom : 20px; border-bottom: solid;">
                
                    <div style="font-size:30px;">Réalisations</div>
                
                </div>
                <div class="container" id="realisations">
                
                </div>
            </div>
            
            <div class="row" style="margin-bottom : 20px; border-bottom: solid;">
            
                <div style="font-size:30px;">Activités</div>
            
            </div>
            <div class="container" id="activities">

            </div>
            <div id="test"></div>
            
        </div>
    </div>

<script>
$(document).ready(function(){
    $.ajax({
        method: "POST",
        url: "../Controllers/view_CV_ctrl.php",
        success : function (data){
            data = JSON.parse(data);
            console.log(data);
            $('#name_user').html(data[0].name_user.replace(/\\/g, ''));
            $('#lastname_user').html(data[0].lastname_user.toUpperCase());
            $('#address_user').html(data[0].address_user.replace(/\\/g, ''));
            $('#mail_user').html(data[0].mail_user.replace(/\\/g, ''));
            $('#phone_user').html(data[0].phone_user.replace(/\\/g, '')); 
            $('#date_birth_user').html(data[0].date_fr.replace(/\\/g, ''));
            $('#obj_career_user').html(data[0].obj_career_user.replace(/\\/g, ''));
            $('#cv_title_user').html(data[0].cv_title_user.replace(/\\/g, ''));
            for(var i = 0; i < data[1].length; i++) {
            $('#formation_user').append('<div class="row"><div>'+ data[1][i].start_date_train_fr +' - '+ data[1][i].end_date_train_fr +'</div><div style="margin-left: 30px;"> '+ data[1][i].dipl_name_train.replace(/\\/g, '') + '</div><div style="margin-left:5px;"> - '+ data[1][i].school_train.replace(/\\/g, '') +' à '+ data[1][i].location_train.replace(/\\/g, '') +'</div></div><br>');
            }
            for(var i = 0; i < data[2].length; i++) {
            $('#exp_user').append('<div class="row"><div>'+ data[2][i].start_date_exp_fr + ' - ' + data[2][i].end_date_exp_fr + '</div><div style="margin-left: 30px;">'+ data[2][i].job_exp.replace(/\\/g, '') +' - '+  data[2][i].firm_name_exp.replace(/\\/g, '') +' à '+ data[2][i].location_exp.replace(/\\/g, '') +'</div><div class="col-12" style="margin-left: 120px; max-width:800px;">' + data[2][i].mission_exp.replace(/\\/g, '') + '</div></div>');
            }
            for(var i=0; i < data[3].length; i++) {
            $('#skills').append('<div class="row">' + data[3][i].title_skill.replace(/\\/g, '') + ' : ' + data[3][i].desc_skill.replace(/\\/g, '') + '</div>');
            }
            for(var i=0; i < data[4].length; i++) {
            $('#activities').append('<div class="row">' + data[4][i].title_act.replace(/\\/g, '') + ' : ' + data[4][i].desc_act.replace(/\\/g, '') + '</div>');
            }
            if (data[5][0] === undefined) {
                $('#real').hide();
            } else {
                for(var i=0; i < data[5].length; i++) {
                    $('#realisations').append('<div class="row"><div>' + data[5][i].start_date_rea_fr + ' - ' + data[5][i].end_date_rea_fr + '</div><div style="margin-left: 30px;">'+ data[5][i].title_rea.replace(/\\/g, '') + '</div></div><div class="col-12" style="margin-left: 120px; max-width:800px;">' + data[5][i].desc_rea.replace(/\\/g, '') + '</div> ' );
                }
            }
         
        }
    });

 
    return false;
});


var doc = new jsPDF();
var source = $('#theTabs').get(0);
//
$(document).ready(function(){
    $('#saveToPDF').on('click', function() {
        
        var specialElementHandlers = {
        '#editor': function(element, renderer){
         return true;  
 }
};

doc.fromHTML(source, 10, 10, {
        'width': 170,
        'elementHandlers': specialElementHandlers
    });
doc.save('CV.pdf');
    });
});


</script>
</body>

</html>

<?php

} else {

  header('Location: ../index.php');
}