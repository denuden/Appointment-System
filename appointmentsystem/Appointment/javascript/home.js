$(document).ready(function() {

  // dropdown on schedules mobile
  $('#drop-names').click(function() {
    $('.f-drop').slideToggle('fast', function() {
      if ($(this).is(':hidden')) {
        $('ul.drop').hide();
      }
    });
  });

  $('li.d-drop p').click(function() {
    $(this).parent().children('ul.drop').slideToggle('fast');
  });


  // popup windown on schedules mobile
  $('#close-btn').click(function() {
    $('#modal,#overlay').removeClass('active');
  });

  $('.popup-sched-btn').click(function() {
    $('#modal,#overlay').addClass('active');
    let names = $(this).text();
    $.ajax({
      method: 'POST',
      url: '../php/includes/appointment-time.php',
      dataType: 'JSON',
      data: {
        name: names
      },
    }).done(function(data) {
      $('.modal-body ul').empty();
      $.map(data, function(time, i) { // 2 map function so it will return full array and not as an object array
        $.map(time, function(val, i) { //and so can be looped
          $('.modal-body ul').append('<li>' + i + ':&emsp;' + val + '</li>');
        });
      });
    });
  });


  // Desktop Schedule design

  // sets pre-rendered data with css
  $('.desktop-col1 h3:first-child, .desktop-col2 h4:first-child').css({
    background: 'linear-gradient(to right, #79C9FF 50%, #111 50%)',
    backgroundClip: 'text',
    webkitBackgroundClip: 'text',
    backgroundSize: '200% 100%',
    mozBackgroundClip: 'text',
    backgroundPosition: 'left bottom'
  });

  // sets name base on fields
  $('.desktop-col1').on('click', 'h3', function(event) {
    event.preventDefault();
    // resets everytime it is cliked
    $('.desktop-col2').html('');
    $('.desktop-col1 h3').css('backgroundPosition', 'right bottom');


    // Sets color to active field
    $(this).css('background-position', 'left bottom');

    switch ($(this).text()) {
      case 'PEDIATRICS':
        $('.desktop-col2').append('<h4>Dr. Janella Reyes</h4>');
        $('.desktop-col2').append('<h4>Dr. Danilo Garcia</h4>');
        $('.desktop-col2').append('<h4>Dr. Jasmine Santos</h4>');
        break;
      case 'ORTHOPEDICS':
        $('.desktop-col2').append('<h4>Dr. Gabriel Santos</h4>');
        break;
      case 'OB-GYN':
        $('.desktop-col2').append('<h4>Dr. Jessica Smith</h4>');
        break;
      case 'PHYSICAL THERAPIST':
        $('.desktop-col2').append('<h4>Dr. Christian Ocampo</h4>');
        $('.desktop-col2').append('<h4>Dr. Rowena Reyes</h4>');
        break;
      case 'ENT - HNS':
        $('.desktop-col2').append('<h4>Dr. Ramil Torres</h4>');
        break;
      case 'OPTHALMOLOGIST':
        $('.desktop-col2').append('<h4>Dr. Maricar Cruz</h4>');
        break;
    }
  });


  // sets sched base on name
  $('.desktop-col2').on('click', 'h4', function(event) {
    event.preventDefault();
    let name = $(this).text();
    // resets everytime it is cliked
    $('.desktop-col3 .col3-body ul').html('');
    $('.desktop-col2 h4').css('background-position', 'right bottom');

    // Sets color to active field
    $(this).css('background-position', 'left bottom');

    $.ajax({
        method: 'POST',
        url: '../php/includes/appointment-time.php',
        dataType: 'JSON',
        data: {
          name: name
        },
      })
      .done(function(data) {
        $.map(data, function(val, i) { // 2 map function so it will return full array and not as an object array
          $.map(val, function(time, i) { //and so can be looped
            $('.col3-body ul').append('<li>' + time + "</li>");
          });
        });

      })
      .fail(function() {
        console.log("error");
      })

  });


  //get appointment go to page
  $('.btn-get-app').click(function() {
    window.location.href = '../pages/appointment-client.php';
  });


}); // end ready