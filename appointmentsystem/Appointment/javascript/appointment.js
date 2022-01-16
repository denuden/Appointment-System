$(document).ready(function() {
  $('.next').click(function() {

    let currSlide = $('.holder.active');
    let nextSlide = currSlide.next();

    currSlide.fadeOut(400).removeClass('active');
    nextSlide.fadeIn(400).addClass('active');

    if (nextSlide.length == 0) {
      $('.holder').first().fadeIn(400).addClass('active');
    }

  });

  $('.prev').click(function() {

    let currSlide = $('.holder.active');
    let prevSlide = currSlide.prev();

    currSlide.fadeOut(400).removeClass('active');
    prevSlide.fadeIn(400).addClass('active');

    if (prevSlide.length == 0) {
      $('.holder').last().fadeIn(400).addClass('active');
    }
  });


  // for choosing doctor and schedule
  $('.card').click(function() {
    let name = $(this).find('h4').text();
    let img = $(this).find('img').attr('src');

    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
      $('.card').removeClass('active');
      $(this).addClass('active');
    }


    // gets the time out of the database
    $.ajax({
      method: 'POST',
      url: '../php/includes/appointment-time.php',
      dataType: 'JSON',
      data: {
        name: name
      },
    }).done(function(data) {
      $('.schedule ul').empty();
      $.map(data, function(time, i) {
        $.map(time, function(val, i) {
          $('#h2').html('Please choose a time of appointment');
          $('.schedule ul').append('<li class="time">' + i + ':&emsp;' + val + '</li>');
        });
      });
    });
    // sets DOM element to its value to be passed into php later
    $('.final-details img').attr('src', img);
    $('.final-details h4').text(name);
    $('.final-selection h2').text('You have selected to set an appointment with:');

  });

  //  For dynamic schedule changes
  $('.schedule').on('click', '.time', function() {
    let time = $(this).text();

    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
      $('.time').removeClass('active');
      $(this).addClass('active');
    }
    $('.final-details p').text(time);

    $('.final-selection button, .final-details, .final-selection h2').css('opacity', '1'); // this only shows selection after selecting a date

    // checks if schedule is invalid or no time specified
    if ($('.final-details p:contains("—")').length > 0) {
      $('.final-details h5').text('Please choos a valid time(E.G. 9:30 AM)').css('opacity', '1');
    } else {
      $('.final-details h5').text('').css('opacity', '0');
    }
  });

  // checks and sends data to php file
  $('#proceed-btn').click(function() {
    if ($('.final-details h5').text().length < 1) {
      $.ajax({
        url: '../php/includes/getAppointment.php',
        method: 'POST',
        dataType: 'HTML',
        data: {
          name: $('.final-details h4').text(),
          time: $('.final-details p').text()
        },
      }).done(function(data) {
        window.location.replace('notif-appointment-client.php');
        console.log(data);
      }).fail(function(xhr) {
        console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
      });
    }

  });



}); //end ready