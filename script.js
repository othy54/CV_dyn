

// MISE A JOUR DE LA TABLE IDENTITE

$(document).ready(function () {
  $("#form-user").on('submit', function () {
    name_user = $(this).find("input[name=name_user]").val();
    lastname_user = $(this).find("input[name=lastname_user]").val();
    address_user = $(this).find("input[name=address_user]").val();
    phone_user = $(this).find("input[name=phone_user]").val();
    date_birth_user = $(this).find("input[name=date_birth_user]").val();
    cv_title_user = $(this).find("input[name=cv_title_user]").val();
    handicap_user = $(this).find("input[name=handicap_user]").val();
    obj_career_user = $(this).find("textarea[name=obj_career_user]").val();
    $.ajax({
      method: "POST",
      url: "insert_identity.php",
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
      success: function (data) {
        alert(data);
        }
      });
    return false;
  });
});

// INSERTION DES DONNEES DE FORMATION

$(document).ready(function () {
  $("#btn-add-formation").on('click', function () {
    if ($("#here option:selected").text() == $('#title_train').val() || $('#title_train').val() == '') {
      alert('NON');
      return false;

    } else {
      title_train = $("#formformation").find("input[name=title_train]").val();
      start_date_train = $("#formformation").find("input[name=start_date_train]").val();
      end_date_train = $("#formformation").find("input[name=end_date_train]").val();
      school_train = $("#formformation").find("input[name=school_train]").val();
      location_train = $("#formformation").find("input[name=location_train]").val();
      dipl_name_train = $("#formformation").find("input[name=dipl_name_train]").val();
      dipl_validate_train = $("#formformation").find("select[name=dipl_validate_train]").val();
      $.ajax({
        method: "POST",
        url: "insert_formation.php",
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

          $("#here").append('<option>' + title_train + '</option>');
          $('.empty').val('');
          }
        });


      return false;
    }
  });
});

//AJOUT DES INPUT FORMATION A MODIFIER

$(document).ready(function () {
  $("#modifyFormation").on('click', function () {
    var selected = $("#here option:selected").text();
    $.ajax({
      method: "POST",
      url: "modif_formation.php",
      data: { title_train: selected },
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

    title_train = $('#formformation').find("input[name=title_train]").val();
    start_date_train = $('#formformation').find("input[name=start_date_train]").val();
    end_date_train = $('#formformation').find("input[name=end_date_train]").val();
    school_train = $('#formformation').find("input[name=school_train]").val();
    location_train = $('#formformation').find("input[name=location_train]").val();
    dipl_name_train = $('#formformation').find("input[name=dipl_name_train]").val();
    dipl_validate_train = $('#formformation').find("select[name=dipl_validate_train]").val();

    $.ajax({
      method: "POST",
      url: "update_formation.php",
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
      }
    });
    return false;
  });
});

//SUPPRESSION DES DONNES DE FORMATION

$(document).ready(function () {
  $("#deleteFormation").on('click', function () {
    var sel = $("#here option:selected").text();

    $.ajax({
      method: "POST",
      url: "delete_formation.php",
      data: { title_train: sel },
      success: function (data) {
        $("#here option:selected").remove();
        $('.empty').val('');

      }
    });
    return false;
  });
});

// INSERTION DES DONNEES D'EXPERIENCE

$(document).ready(function () {
  $("#btn-add-exp").on('click', function () {
    if ($("#select_exp option:selected").text() == $('#job_exp').val() || $('#job_exp').val() == '') {
      alert('NON');
      return false;

    } else {
      job_exp = $("#form_exp").find("input[name=job_exp]").val();
      start_date_exp = $("#form_exp").find("input[name=start_date_exp]").val();
      end_date_exp = $("#form_exp").find("input[name=end_date_exp]").val();
      firm_name_exp = $("#form_exp").find("input[name=firm_name_exp]").val();
      location_exp = $("#form_exp").find("input[name=location_exp]").val();
      type_contract_exp = $("#form_exp").find("input[name=type_contract_exp]").val();
      mission_exp = $("#form_exp").find("textarea[name=mission_exp]").val();
      $.ajax({
        method: "POST",
        url: "insert_exp.php",
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

          $("#select_exp").append('<option>' + job_exp + '</option>');
          $('.empty').val('');
        }
      });
      return false;
    }
  });
});

//AJOUT DES INPUT EXPERIENCE A MODIFIER

$(document).ready(function () {
  $("#modifyExperience").on('click', function () {
    var select_exp = $("#select_exp option:selected").text();
    $.ajax({
      method: "POST",
      url: "modif_exp.php",
      data: { job_exp: select_exp },
      success: function (data) {

        data = JSON.parse(data);
        console.log(data);
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

    job_exp = $('#form_exp').find("input[name=job_exp]").val();
    start_date_exp = $('#form_exp').find("input[name=start_date_exp]").val();
    end_date_exp = $('#form_exp').find("input[name=end_date_exp]").val();
    firm_name_exp = $('#form_exp').find("input[name=firm_name_exp]").val();
    location_exp = $('#form_exp').find("input[name=location_exp]").val();
    type_contract_exp = $('#form_exp').find("input[name=type_contract_exp]").val();
    mission_exp = $('#form_exp').find("textarea[name=mission_exp]").val();

    $.ajax({
      method: "POST",
      url: "update_exp.php",
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
        console.log(data);
        $("#select_exp option:selected").text(job_exp);
      }
    });
    return false;
  });
});


//SUPPRESSION DES DONNES DE EXPERIENCE

$(document).ready(function () {
  $("#deleteExperience").on('click', function () {
    var sel_exp = $("#select_exp option:selected").text();

    $.ajax({
      method: "POST",
      url: "delete_exp.php",
      data: { job_exp: sel_exp },
      success: function (data) {
        $("#select_exp option:selected").remove();
        $('.empty').val('');

      }
    });
    return false;
  });
});


// INSERTION DES DONNEES COMPETENCES

$(document).ready(function () {
  $("#btn-add-skill").on('click', function () {
    if ($("#select_skill option:selected").text() == $('#title_skill').val() || $('#title_skill').val() == '') {
      alert('NON');
      return false;

    } else {
      title_skill = $("#form_skill").find("input[name=title_skill]").val();
      desc_skill = $("#form_skill").find("textarea[name=desc_skill]").val();

      $.ajax({
        method: "POST",
        url: "insert_skill.php",
        data: {
          title_skill: title_skill,
          desc_skill: desc_skill
        },
        success: function (data) {
          console.log(data);
          $("#select_skill").append('<option>' + title_skill + '</option>');
          $('.empty').val('');
        }
      });
      return false;
    }
  });
});

//AJOUT DES INPUT COMPETENCES A MODIFIER

$(document).ready(function () {
  $("#modifySkill").on('click', function () {
    var select_skill = $("#select_skill option:selected").text();
    $.ajax({
      method: "POST",
      url: "modif_skill.php",
      data: { title_skill: select_skill },
      success: function (data) {
        data = JSON.parse(data);
        console.log(data);
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

    title_skill = $('#form_skill').find("input[name=title_skill]").val();
    desc_skill = $('#form_skill').find("textarea[name=desc_skill]").val();


    $.ajax({
      method: "POST",
      url: "update_skill.php",
      data: {
        title_skill: title_skill,
        desc_skill: desc_skill
      },
      success: function (data) {
        console.log(data);
        $("#select_skill option:selected").text(title_skill);
      }
    });
    return false;
  });
});

//SUPPRESSION DES DONNES DE COMPETENCES

$(document).ready(function () {
  $("#deleteSkill").on('click', function () {
    var sel_skill = $("#select_skill option:selected").text();

    $.ajax({
      method: "POST",
      url: "delete_skill.php",
      data: { title_skill: sel_skill },
      success: function (data) {
        $("#select_skill option:selected").remove();
        $('.empty').val('');

      }
    });
    return false;
  });
});

// INSERTION DES DONNEES REALISATIONS

$(document).ready(function () {
  $("#btn-add-rea").on('click', function () {
    if ($("#select_rea option:selected").text() == $('#title_rea').val() || $('#title_rea').val() == '') {
      alert('NON');
      return false;

    } else {
      title_rea = $("#form_rea").find("input[name=title_rea]").val();
      start_date_rea = $("#form_rea").find("input[name=start_date_rea]").val();
      end_date_rea = $("#form_rea").find("input[name=end_date_rea]").val();
      desc_rea = $("#form_rea").find("textarea[name=desc_rea]").val();

      $.ajax({
        method: "POST",
        url: "insert_rea.php",
        data: {
          title_rea: title_rea,
          start_date_rea: start_date_rea,
          end_date_rea: end_date_rea,
          desc_rea: desc_rea
        },
        success: function (data) {
          console.log(data);
          $("#select_rea").append('<option>' + title_rea + '</option>');
          $('.empty').val('');
        }
      });
      return false;
    }
  });
});

//AJOUT DES INPUT REALISATIONS A MODIFIER

$(document).ready(function () {
  $("#modifyRealisation").on('click', function () {
    var select_real = $("#select_rea option:selected").text();
    $.ajax({
      method: "POST",
      url: "modif_rea.php",
      data: { title_rea: select_real },
      success: function (data) {
        data = JSON.parse(data);
        console.log(data);
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

    title_rea = $("#form_rea").find("input[name=title_rea]").val();
    start_date_rea = $("#form_rea").find("input[name=start_date_rea]").val();
    end_date_rea = $("#form_rea").find("input[name=end_date_rea]").val();
    desc_rea = $("#form_rea").find("textarea[name=desc_rea]").val();


    $.ajax({
      method: "POST",
      url: "update_rea.php",
      data: {
        title_rea: title_rea,
        start_date_rea: start_date_rea,
        end_date_rea: end_date_rea,
        desc_rea: desc_rea
      },
      success: function (data) {
        console.log(data);
        $("#select_rea option:selected").text(title_rea);
      }
    });
    return false;
  });
});

//SUPPRESSION DES DONNES DE REALISATION

$(document).ready(function () {
  $("#deleteRealisation").on('click', function () {
    var sel_rea = $("#select_rea option:selected").text();

    $.ajax({
      method: "POST",
      url: "delete_rea.php",
      data: { title_rea: sel_rea },
      success: function (data) {
        $("#select_rea option:selected").remove();
        $('.empty').val('');

      }
    });
    return false;
  });
});

// INSERTION DES DONNEES ACTIVITES

$(document).ready(function () {
  $("#btn-add-act").on('click', function () {
    if ($("#select_act option:selected").text() == $('#title_act').val() || $('#title_act').val() == '') {
      alert('NON');
      return false;

    } else {
      title_act = $("#form_act").find("input[name=title_act]").val();
      desc_act = $("#form_act").find("textarea[name=desc_act]").val();

      $.ajax({
        method: "POST",
        url: "insert_act.php",
        data: {
          title_act: title_act,
          desc_act: desc_act
        },
        success: function (data) {
          console.log(data);
          $("#select_act").append('<option>' + title_act + '</option>');
          $('.empty').val('');
        }
      });
      return false;
    }
  });
});

//AJOUT DES INPUT ACTIVITES A MODIFIER

$(document).ready(function () {
  $("#modifyActivity").on('click', function () {
    var select_act = $("#select_act option:selected").text();
    $.ajax({
      method: "POST",
      url: "modif_act.php",
      data: { title_act: select_act },
      success: function (data) {
        data = JSON.parse(data);
        console.log(data);
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
    title_act = $('#form_act').find("input[name=title_act]").val();
    desc_act = $('#form_act').find("textarea[name=desc_act]").val();

    $.ajax({
      method: "POST",
      url: "update_act.php",
      data: {
        title_act: title_act,
        desc_act: desc_act
      },
      success: function (data) {
        console.log(data);
        $("#select_act option:selected").text(title_act);
      }
    });
    return false;
  });
});


//SUPPRESSION DES DONNES DE ACTIVITE

$(document).ready(function () {
  $("#deleteActivity").on('click', function () {
    var sel_act = $("#select_act option:selected").text();

    $.ajax({
      method: "POST",
      url: "delete_act.php",
      data: { title_act: sel_act },
      success: function (data) {
        $("#select_act option:selected").remove();
        $('.empty').val('');
      }
    });
    return false;
  });
});

