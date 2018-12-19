// REMPLISSAGE DES INPUTS
$(document).ready(function(){
  $.ajax({
    method: "POST",
    url: "../Controllers/input_identity.php",
    success: function (data){
      data = JSON.parse(data);
      $('#name_user').val(data.name_user);
      $('#lastname_user').val(data.lastname_user);
      $('#address_user').val(data.address_user);
      $('#phone_user').val(data.phone_user);
      $('#date_birth_user').val(data.date_birth_user);
      $('#cv_title_user').val(data.cv_title_user);
      $('#handicap_user').val(data.handicap_user);
      $('#areaCareer').val(data.obj_career_user);
      $('#mail_user').val(data.mail_user);

    }
  });
});

// MISE A JOUR DE LA TABLE IDENTITE

$(document).ready(function () {
  $("#btn-add-modify-identity").on('click', function () {
    name_user = $('#name_user').val();
    lastname_user = $('#lastname_user').val();
    address_user = $('#address_user').val();
    phone_user = $('#phone_user').val();
    date_birth_user = $('#date_birth_user').val();
    cv_title_user = $('#cv_title_user').val();
    handicap_user = $('#handicap_user').val();
    obj_career_user = $('#areaCareer').val();
    $.ajax({
      method: "POST",
      url: "../Controllers/insert_identity.php",
      data: {
              names: name_user,
              lastname: lastname_user,
              address: address_user,
              phone: phone_user,
              birth: date_birth_user,
              cvtitle: cv_title_user,
              handicap: handicap_user,
              career: obj_career_user
            },
      success: function() {
        const toast = Swal.mixin({
          toast: true,
          position: 'bottom-left',
          showConfirmButton: false,
          timer: 4000
        });
        
        toast({
          type: 'success',
          title: 'Modification effectuée',
        })
      } 
      
      });
    return false;
  });
});

// INSERTION DES DONNEES DE FORMATION

$(document).ready(function () {
  $("#btn-add-formation").on('click', function () {
    
      title_train = $('#title_train').val();
      start_date_train = $('#start_date_train').val();
      end_date_train = $('#end_date_train').val();
      school_train = $('#school_train').val();
      location_train = $('#location_train').val();
      dipl_name_train = $('#dipl_name_train').val();
      dipl_validate_train = $('#dipl_validate_train').val();
      $.ajax({
        method: "POST",
        url: "../Controllers/insert_formation.php",
        data: {
                title_train: title_train,
                start_date_train: start_date_train,
                end_date_train: end_date_train,
                school_train: school_train,
                location_train: location_train,
                dipl_name_train: dipl_name_train,
                dipl_validate_train: dipl_validate_train,
              },
        success: function (data) {
          data = JSON.parse(data);
          $("#here").append('<option value="'+ data.id_train +'" selected>' + data.title_train + '</option>');
          $('.empty').val('');
          const toast = Swal.mixin({
            toast: true,
            position: 'bottom-left',
            showConfirmButton: false,
            timer: 4000
          });
          
          toast({
            type: 'success',
            title: 'Formation ajoutée',
          })
          }
        });
      return false;
    
  });
});

//AJOUT DES INPUT FORMATION A MODIFIER

$(document).ready(function () {
  $("#modifyFormation").on('click', function () {
    var selected = $("#here option:selected").val();
    $.ajax({
      method: "POST",
      url: "../Controllers/modif_formation.php",
      data: { id_train: selected },
      success: function (data) {
        data = JSON.parse(data);
        $('#title_train').val(data.title_train);
        $('#start_date_train').val(data.start_date_train);
        $('#end_date_train').val(data.end_date_train);
        $('#school_train').val(data.school_train);
        $('#location_train').val(data.location_train);
        $('#dipl_name_train').val(data.dipl_name_train);
        $('#dipl_validate_train').val(data.dipl_validate_train);
      }
    });
    return false;
  });
});

//MODIFICATION DE LA TABLE FORMATION

$(document).ready(function () {
  $("#btn-modify-formation").on('click', function () {

    title_train = $('#title_train').val();
    start_date_train = $('#start_date_train').val();
    end_date_train = $('#end_date_train').val();
    school_train = $('#school_train').val();
    location_train = $('#location_train').val();
    dipl_name_train = $('#dipl_name_train').val();
    dipl_validate_train = $('#dipl_validate_train').val();

    $.ajax({
      method: "POST",
      url: "../Controllers/update_formation.php",
      data: {
        title_train: title_train,
        start_date_train: start_date_train,
        end_date_train: end_date_train,
        school_train: school_train,
        location_train: location_train,
        dipl_name_train: dipl_name_train,
        dipl_validate_train: dipl_validate_train
      },
      success: function (data) {
        $("#here option:selected").text(title_train);
        const toast = Swal.mixin({
          toast: true,
          position: 'bottom-left',
          showConfirmButton: false,
          timer: 4000
        });
        
        toast({
          type: 'success',
          title: 'Formation modifiée',
        })
      }
    });
    return false;
  });
});

//SUPPRESSION DES DONNES DE FORMATION

$(document).ready(function () {
  $("#deleteFormation").on('click', function () {
    var sel = $("#here option:selected").val();

    $.ajax({
      method: "POST",
      url: "../Controllers/delete_formation.php",
      data: { id_train: sel },
      success: function (data) {
        $("#here option:selected").remove();
        $('.empty').val('');
        const toast = Swal.mixin({
          toast: true,
          position: 'bottom-left',
          showConfirmButton: false,
          timer: 4000
        });
        
        toast({
          type: 'success',
          title: 'Formation supprimée',
        })

      }
    });
    return false;
  });
});

// INSERTION DES DONNEES D'EXPERIENCE

$(document).ready(function () {
  $("#btn-add-exp").on('click', function () {
    
      job_exp = $("#job_exp").val();
      start_date_exp = $("#start_date_exp").val();
      end_date_exp = $("#end_date_exp").val();
      firm_name_exp = $("#firm_name_exp").val();
      location_exp = $("#location_exp").val();
      type_contract_exp = $("#type_contract_exp").val();
      mission_exp = $("#mission_exp").val();
      $.ajax({
        method: "POST",
        url: "../Controllers/insert_exp.php",
        data: {
          job_exp: job_exp,
          start_date_exp: start_date_exp,
          end_date_exp: end_date_exp,
          firm_name_exp: firm_name_exp,
          location_exp: location_exp,
          type_contract_exp: type_contract_exp,
          mission_exp: mission_exp,
        },
        success: function (data) {
          data = JSON.parse(data);
          $("#select_exp").append('<option value="'+ data.id_exp +'" selected>' + data.job_exp + '</option>');
          $('.empty').val('');

          const toast = Swal.mixin({
            toast: true,
            position: 'bottom-left',
            showConfirmButton: false,
            timer: 4000
          });
          
          toast({
            type: 'success',
            title: 'Expérience ajoutée',
          })
        }
      });
      return false;
  
  });
});

//AJOUT DES INPUT EXPERIENCE A MODIFIER

$(document).ready(function () {
  $("#modifyExperience").on('click', function () {
    var select_exp = $("#select_exp option:selected").val();
    $.ajax({
      method: "POST",
      url: "../Controllers/modif_exp.php",
      data: { id_exp: select_exp },
      success: function (data) {

        data = JSON.parse(data);
        $('#job_exp').val(data.job_exp);
        $('#start_date_exp').val(data.start_date_exp);
        $('#end_date_exp').val(data.end_date_exp);
        $('#firm_name_exp').val(data.firm_name_exp);
        $('#location_exp').val(data.location_exp);
        $('#type_contract_exp').val(data.type_contract_exp);
        $('#mission_exp').val(data.mission_exp);
      }
    });
    return false;
  });
});


//MODIFICATION DE LA TABLE EXPERIENCE

$(document).ready(function () {
  $("#btn-modify-exp").on('click', function () {

    job_exp = $('#job_exp').val();
    start_date_exp = $('#start_date_exp').val();
    end_date_exp = $('#end_date_exp').val();
    firm_name_exp = $('#firm_name_exp').val();
    location_exp = $('#location_exp').val();
    type_contract_exp = $('#type_contract_exp').val();
    mission_exp = $('#mission_exp').val();

    $.ajax({
      method: "POST",
      url: "../Controllers/update_exp.php",
      data: {
        job_exp: job_exp,
        start_date_exp: start_date_exp,
        end_date_exp: end_date_exp,
        firm_name_exp: firm_name_exp,
        location_exp: location_exp,
        type_contract_exp: type_contract_exp,
        mission_exp: mission_exp
      },
      success: function (data) {
        $("#select_exp option:selected").text(job_exp);

        const toast = Swal.mixin({
          toast: true,
          position: 'bottom-left',
          showConfirmButton: false,
          timer: 4000
        });
        
        toast({
          type: 'success',
          title: 'Expérience modifiée',
        })
      }
    });
    return false;
  });
});


//SUPPRESSION DES DONNES DE EXPERIENCE

$(document).ready(function () {
  $("#deleteExperience").on('click', function () {
    var sel_exp = $("#select_exp option:selected").val();

    $.ajax({
      method: "POST",
      url: "../Controllers/delete_exp.php",
      data: { id_exp: sel_exp },
      success: function (data) {
        $("#select_exp option:selected").remove();
        $('.empty').val('');

        const toast = Swal.mixin({
          toast: true,
          position: 'bottom-left',
          showConfirmButton: false,
          timer: 4000
        });
        
        toast({
          type: 'success',
          title: 'Expérience supprimée',
        })

      }
    });
    return false;
  });
});


// INSERTION DES DONNEES COMPETENCES

$(document).ready(function () {
  $("#btn-add-skill").on('click', function () {
    
      title_skill = $('#title_skill').val();
      desc_skill = $('#desc_skill').val();

      $.ajax({
        method: "POST",
        url: "../Controllers/insert_skill.php",
        data: {
          title_skill: title_skill,
          desc_skill: desc_skill
        },
        success: function (data) {
          data = JSON.parse(data);
          $("#select_skill").append('<option value="'+ data.id_skill +'" selected>' + data.title_skill + '</option>');
          $('.empty').val('');

          const toast = Swal.mixin({
            toast: true,
            position: 'bottom-left',
            showConfirmButton: false,
            timer: 4000
          });
          
          toast({
            type: 'success',
            title: 'Compétence ajoutée',
          })
        }
      });
      return false;
  });
});

//AJOUT DES INPUT COMPETENCES A MODIFIER

$(document).ready(function () {
  $("#modifySkill").on('click', function () {
    var select_skill = $("#select_skill option:selected").val();
    $.ajax({
      method: "POST",
      url: "../Controllers/modif_skill.php",
      data: { id_skill: select_skill },
      success: function (data) {
        data = JSON.parse(data);
        $('#title_skill').val(data.title_skill);
        $('#desc_skill').val(data.desc_skill);
      }
    });
    return false;
  });
});


//MODIFICATION DE LA TABLE COMPETENCE

$(document).ready(function () {
  $("#btn-modify-skill").on('click', function () {

    title_skill = $('#title_skill').val();
    desc_skill = $('#desc_skill').val();

    $.ajax({
      method: "POST",
      url: "../Controllers/update_skill.php",
      data: {
        title_skill: title_skill,
        desc_skill: desc_skill
      },
      success: function (data) {
        $("#select_skill option:selected").text(title_skill);

        const toast = Swal.mixin({
          toast: true,
          position: 'bottom-left',
          showConfirmButton: false,
          timer: 4000
        });
        
        toast({
          type: 'success',
          title: 'Compétence modifiée',
        })
      }
    });
    return false;
  });
});

//SUPPRESSION DES DONNES DE COMPETENCES

$(document).ready(function () {
  $("#deleteSkill").on('click', function () {
    var sel_skill = $("#select_skill option:selected").val();

    $.ajax({
      method: "POST",
      url: "../Controllers/delete_skill.php",
      data: { id_skill: sel_skill },
      success: function (data) {
        $("#select_skill option:selected").remove();
        $('.empty').val('');

        const toast = Swal.mixin({
          toast: true,
          position: 'bottom-left',
          showConfirmButton: false,
          timer: 4000
        });
        
        toast({
          type: 'success',
          title: 'Compétence supprimée',
        })

      }
    });
    return false;
  });
});

// INSERTION DES DONNEES REALISATIONS

$(document).ready(function () {
  $("#btn-add-rea").on('click', function () {
    
      title_rea = $('#title_rea').val();
      start_date_rea = $('#start_date_rea').val();
      end_date_rea = $('#end_date_rea').val();
      desc_rea = $('#desc_rea').val();

      $.ajax({
        method: "POST",
        url: "../Controllers/insert_rea.php",
        data: {
          title_rea: title_rea,
          start_date_rea: start_date_rea,
          end_date_rea: end_date_rea,
          desc_rea: desc_rea
        },
        success: function (data) {
          data = JSON.parse(data);
          $("#select_rea").append('<option value="'+ data.id_rea +'" selected>' + data.title_rea + '</option>');
          $('.empty').val('');

          const toast = Swal.mixin({
            toast: true,
            position: 'bottom-left',
            showConfirmButton: false,
            timer: 4000
          });
          
          toast({
            type: 'success',
            title: 'Réalisation ajoutée',
          })
        }
      });
      return false;
  });
});

//AJOUT DES INPUT REALISATIONS A MODIFIER

$(document).ready(function () {
  $("#modifyRealisation").on('click', function () {
    var select_real = $("#select_rea option:selected").val();
    $.ajax({
      method: "POST",
      url: "../Controllers/modif_rea.php",
      data: { id_rea: select_real },
      success: function (data) {
        data = JSON.parse(data);
        $('#title_rea').val(data.title_rea);
        $('#start_date_rea').val(data.start_date_rea);
        $('#end_date_rea').val(data.end_date_rea);
        $('#desc_rea').val(data.desc_rea);
      }
    });
    return false;
  });
});

//MODIFICATION DE LA TABLE REALISATION

$(document).ready(function () {
  $("#btn-modify-rea").on('click', function () {

    title_rea = $("#title_rea").val();
    start_date_rea = $("#start_date_rea").val();
    end_date_rea = $("#end_date_rea").val();
    desc_rea = $("#desc_rea").val();


    $.ajax({
      method: "POST",
      url: "../Controllers/update_rea.php",
      data: {
        title_rea: title_rea,
        start_date_rea: start_date_rea,
        end_date_rea: end_date_rea,
        desc_rea: desc_rea
      },
      success: function (data) {
        $("#select_rea option:selected").text(title_rea);
        const toast = Swal.mixin({
          toast: true,
          position: 'bottom-left',
          showConfirmButton: false,
          timer: 4000
        });
        
        toast({
          type: 'success',
          title: 'Réalisation modifiée',
        })
      }
    });
    return false;
  });
});

//SUPPRESSION DES DONNES DE REALISATION

$(document).ready(function () {
  $("#deleteRealisation").on('click', function () {
    var sel_rea = $("#select_rea option:selected").val();

    $.ajax({
      method: "POST",
      url: "../Controllers/delete_rea.php",
      data: { id_rea: sel_rea },
      success: function (data) {
        $("#select_rea option:selected").remove();
        $('.empty').val('');

        const toast = Swal.mixin({
          toast: true,
          position: 'bottom-left',
          showConfirmButton: false,
          timer: 4000
        });
        
        toast({
          type: 'success',
          title: 'Réalisation supprimée',
        })

      }
    });
    return false;
  });
});

// INSERTION DES DONNEES ACTIVITES

$(document).ready(function () {
  $("#btn-add-act").on('click', function () {
    
      title_act = $("#title_act").val();
      desc_act = $("#desc_act").val();

      $.ajax({
        method: "POST",
        url: "../Controllers/insert_act.php",
        data: {
          title_act: title_act,
          desc_act: desc_act
        },
        success: function (data) {
          data = JSON.parse(data);
          $("#select_act").append('<option value="'+ data.id_act +'" selected>' + data.title_act + '</option>');
          $('.empty').val('');

          const toast = Swal.mixin({
            toast: true,
            position: 'bottom-left',
            showConfirmButton: false,
            timer: 4000
          });
          
          toast({
            type: 'success',
            title: 'Activité ajoutée',
          })
        }
      });
      return false;
  });
});

//AJOUT DES INPUT ACTIVITES A MODIFIER

$(document).ready(function () {
  $("#modifyActivity").on('click', function () {
    var select_act = $("#select_act option:selected").val();
    $.ajax({
      method: "POST",
      url: "../Controllers/modif_act.php",
      data: { id_act: select_act },
      success: function (data) {
        data = JSON.parse(data);
        $('#title_act').val(data.title_act);
        $('#desc_act').val(data.desc_act);
      }
    });
    return false;
  });
});

//MODIFICATION DE LA TABLE ACTIVITE

$(document).ready(function () {
  $("#btn-modify-act").on('click', function () {
    title_act = $('#title_act').val();
    desc_act = $('#desc_act').val();

    $.ajax({
      method: "POST",
      url: "../Controllers/update_act.php",
      data: {
        title_act: title_act,
        desc_act: desc_act
      },
      success: function (data) {
        $("#select_act option:selected").text(title_act);

        const toast = Swal.mixin({
          toast: true,
          position: 'bottom-left',
          showConfirmButton: false,
          timer: 4000
        });
        
        toast({
          type: 'success',
          title: 'Activité modifiée',
        })
      }
    });
    return false;
  });
});


//SUPPRESSION DES DONNES DE ACTIVITE

$(document).ready(function () {
  $("#deleteActivity").on('click', function () {
    var sel_act = $("#select_act option:selected").val();

    $.ajax({
      method: "POST",
      url: "../Controllers/delete_act.php",
      data: { id_act: sel_act },
      success: function (data) {
        $("#select_act option:selected").remove();
        $('.empty').val('');

        const toast = Swal.mixin({
          toast: true,
          position: 'bottom-left',
          showConfirmButton: false,
          timer: 4000
        });
        
        toast({
          type: 'success',
          title: 'Activité supprimée',
        })
      }
    });
    return false;
  });
});

