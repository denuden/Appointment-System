$(document).ready(function() {
  $('#signin-dr').click(function() {
    $('.dr,#overlay').addClass('active');

  });

  $('#close').click(function() {
    $('.dr,#overlay').removeClass('active');

  });

  // signing in as doctor
  $('#signin-dr-form').submit(function(e) {
    e.preventDefault();
    let fullname = $('#fullname').val();
    let pwddr = $('#pwd-dr').val();
    $.ajax({
      url: 'php/includes/dr-login.inc.php',
      method: 'POST',
      dataType: 'JSON',
      data: {
        fullname: fullname,
        pwddr: pwddr
      },
    }).done(function(data) {
      $.map(data, function(val, index) {
        switch (index) {
          case 'pass':
            $('#error').text(val);
            break;
          case 'nouser':
            $('#error').text(val);
            break;
          case 'success':
            window.location.replace('pages/doctor-page-home.php');
            break;
        }
      });
    }).fail(function(xhr) {
      console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
    });
  });


  // sign up as user
  $('#signup-user').submit(function(e) {
    e.preventDefault();


    let fname = $('#fname').val();
    let mname = $('#mname').val();
    let lname = $('#lname').val();
    let uid = $('#uid').val();
    let email = $('#email').val();
    let contact = $('#contact').val();
    let address = $('#address').val();
    let sex = $('#sex').val();
    let age = $('#age').val();
    let bday = $('#bday').val();
    let allergy = $('#allergy').val();
    let disable = $('#disable').val();
    let pwd = $('#pwd').val();
    let pwdrepeat = $('#pwd-repeat').val();


    $.ajax({
        url: 'php/includes/signup.inc.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
          fname: fname,
          lname: lname,
          mname: mname,
          uid: uid,
          email: email,
          contact: contact,
          address: address,
          sex: sex,
          age: age,
          bday: bday,
          allergy: allergy,
          disable: disable,
          pwd: pwd,
          pwdrepeat: pwdrepeat
        },
      })
      .done(function(data) {

        $.map(data, function(val, index) {

          switch (index) {
            case 'emptyfields':
              $('#signup-user p').css('opacity', '1').text(val);
              console.log(val);
              break;
            case 'ageinvalid':
              $('#signup-user p').css('opacity', '1').text(val);
              break;
            case 'contactnumberistooshortortoolong':
              $('#signup-user p').css('opacity', '1').text(val);
              break;
            case 'invalidemail':
              $('#signup-user p').css('opacity', '1').text(val);
              break;
            case 'invalidusername':
              $('#signup-user p').css('opacity', '1').text(val);
              break;
            case 'passwordnotmatch':
              $('#signup-user p').css('opacity', '1').text(val);
              break;
            case 'usernametaken':
              $('#signup-user p').css('opacity', '1').text(val);
              break;
            case 'success':
              window.location.replace('pages/profile-client.php');
              break;
          }
        });
      })
      .fail(function(xhr) {
        console.log("error" + xhr.responseText + xhr.status);
      });


  });



  // sign up as user
  $('#signin-user').submit(function(e) {
    e.preventDefault();
    let uid = $('#uidin').val();
    let pwd = $('#pwdin').val();


    $.ajax({
        url: 'php/includes/login.inc.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
          uid: uid,
          pwd: pwd
        },
      })
      .done(function(data) {

        $.map(data, function(val, index) {

          switch (index) {
            case 'emptyfields':
              $('#signin-user p').css('opacity', '1').text(val);
              console.log(val);
              break;
            case 'passwordnotmatch':
              $('#signin-user p').css('opacity', '1').text(val);
              break;
            case 'nouser':
              $('#signin-user p').css('opacity', '1').text(val);
              break;
            case 'success':
              window.location.replace('pages/profile-client.php');
              break;
          }
        });
      })
      .fail(function(xhr) {
        console.log("error" + xhr.responseText + xhr.status);
      });
  });
}); // end ready