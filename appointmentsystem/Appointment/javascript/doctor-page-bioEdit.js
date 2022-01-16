$(document).ready(function() {
  $('#bioEdit').submit(function(e) {
    e.preventDefault();


    let sun = $('#sun').val();
    let mon = $('#mon').val();
    let tue = $('#tue').val();
    let wed = $('#wed').val();
    let thu = $('#thu').val();
    let fri = $('#fri').val();
    let sat = $('#sat').val();
    let bio = $('#bio').val();
    let workAuthorize = $('#work-authorize').val();
    let workExp = $('#work-exp').val();
    let residency = $('#residency').val();
    let internship = $('#internship').val();
    let medschool = $('#medschool').val();
    let license = $('#license').val();
    let boardCert = $('#board-cert').val();
    let otherCert = $('#other-cert').val();
    let workHistory = $('#work-history').val();

    let inputs = [
      '#sun',
      '#mon',
      '#tue',
      '#wed',
      '#thu',
      '#fri',
      '#sat',
      '#bio',
      '#work-authorize',
      '#work-exp',
      '#residency',
      '#internship',
      '#medschool',
      '#license',
      '#board-cert',
      '#other-cert',
      '#work-history'
    ];
    if (sun == '' || mon == '' || tue == '' || wed == '' || thu == '' || fri == '' || sat == '' || bio == '' || workAuthorize == '' || workExp == '' || residency == '' || internship == '' || medschool == '' || license == '' || boardCert == '' || otherCert == '' || workHistory == '') {
      // First if statement makes sure it doesnt get sent to php
      for (i = 0; i < inputs.length; i++) {
        let x = $(inputs[i]).val();
        if (x == '') { //this validation checks every inputs and checks if there is blank, it will turn red.
          //this alone cannot stop ajax from sending to php because it checks every input and even if one input
          //is filled, it still runs the else statement, that is why there is the main validation above.
          $(inputs[i]).css('boxShadow', '0px 0px 0px 1px rgba(235,65,65,1)');
          $('#error').css('opacity', '1');
        } else if (x != '') {
          $(inputs[i]).css('boxShadow', '0px 0px 0px 0px rgba(235,65,65,1)');
        }
      }
      $('form h1').css('display', 'block');
    } else {
      $.ajax({
          url: '../php/includes/doctor-page-bioEdit.inc.php',
          method: 'POST',
          dataType: 'JSON',
          data: {
            sun: sun,
            mon: mon,
            tue: tue,
            wed: wed,
            thu: thu,
            fri: fri,
            sat: sat,
            bio: bio,
            workAuthorize: workAuthorize,
            workExp: workExp,
            residency: residency,
            internship: internship,
            medschool: medschool,
            license: license,
            boardCert: boardCert,
            otherCert: otherCert,
            workHistory: workHistory
          },
        })
        .done(function(data) {
          window.location.replace('../pages/doctor-page-bio.php');
        })
        .fail(function(xhr) {
          console.log("error" + xhr.responseText + xhr.status + xhr.statusText);
        });
    }

  });

  $('#cancel').click(function() {
    window.location.replace('../pages/doctor-page-bio.php');
  });
}); // end ready