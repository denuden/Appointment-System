$(document).ready(function() {
  // changing Password
  $('#changepass').submit(function(e) {
    e.preventDefault();
    if ($('#pwd').val() == '' || $('#repwd').val() == '') {
      $('#error').text('Please fill in all the fields').css('opacity', '1');
    } else {
      if ($('#pwd').val() !== $('#repwd').val()) {
        $('#error').text('Password do not match').css('opacity', '1');
      } else {
        $.ajax({
            url: '../php/includes/doctor-page-changepass.inc.php',
            method: 'POST',
            dataType: 'HTML',
            data: {
              pwd: $('#pwd').val()
            },
          })
          .done(function(data) {
            $('#modal,#overlay').addClass('active');
            setTimeout(function() {
              $('#modal,#overlay').removeClass('active');
              window.location.replace('../php/includes/logout.inc.php');
            }, 6000);

          })
          .fail(function(xhr) {
            console.log("error" + xhr.responseText);
          })
          .always(function() {
            console.log("complete");
          });
      }
    }
  });


});