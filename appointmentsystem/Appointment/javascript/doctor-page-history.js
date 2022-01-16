$(document).ready(function() {

  $('.accept').click(function(e) {

    /* Act on the event accept */
    $(this).addClass('active');
    $(this).siblings('.decline').removeClass('active');

  });
  $('.decline').click(function() {

    /* Act on the event decline */
    $(this).addClass('active');
    $(this).siblings('.accept').removeClass('active');


  });


  // confirm button and for ajax
  $('.confirm').click(function() {
    let btnrealval;

    if (!$(this).siblings('.accept').hasClass('active') && !$(this).siblings('.decline').hasClass('active')) {
      $(this).parent().find('h3.error').css('opacity', '1');
    } else {


      if ($(this).siblings('.accept').hasClass('active')) {
        btnrealval = 'Accept';
      } else if ($(this).siblings('.decline').hasClass('active')) {
        btnrealval = 'Decline';
      }

      $(this).parent().find('h3.error').css('opacity', '0');

      let appid = $(this).parent().find('h6#appid').text();


      $(this).parent().find('img').css({
        opacity: '1',
        marginLeft: '0px'
      });
      $(this).siblings($('#accept,#decline')).attr('disabled', 'true');
      $(this).attr('disabled', 'true');


      $.ajax({
          url: '../php/includes/user-appointments.php',
          type: 'POST',
          dataType: 'JSON',
          cache: false,
          data: {
            confirm: btnrealval,
            appid: appid
          },
        })
        .done(function(data) {

          console.log(data);
        })
        .fail(function(xhr) {
          console.log("error" + xhr.responseText + xhr.status + xhr.statusText);
        }).always(function() {
          console.log(btnrealval);
        })
    }
  });


  if ($('.card h2:contains("Not yet confirmed")').length > 0) {
    $('.notconfirmed h1').show();
    $('.yet').hide();
  } else {
    $('.notconfirmed h1').hide();
    $('.yet').show();
  }

}); // end ready