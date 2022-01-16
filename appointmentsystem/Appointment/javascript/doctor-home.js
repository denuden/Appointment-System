$(document).ready(function() {

  function getResult() {
    $.ajax({
        url: '../php/includes/dr-appointments.php',
        dataType: 'JSON',
        cache: false,
      })
      .done(function(data) {
        $.map(data, function(val, i) {
          $('.container').append(
            "<div class='card'>" +
            "<h4>" + val.fname + " " + val.mname + " " + val.lname + "</h4>" +
            "<p>" + val.sex + ", " + val.age + "</p>" +
            "<p>Schedule: " + val.timeofappointment + "</p>" +
            "<h5>Created: " + val.timestamp + "</h5>" +
            "<div class='buttons'>" +
            "<h6 id='appid'>" + val.id + "</h6>" +
            "<button class='accept' id='accept' type='button'>Accept</button>" +
            "<button class='decline' id='decline' type='button'>Decline</button>" +
            "<button class='confirm' id='confirm' type='button'>Confirm</button>" +
            "<img src='../images/check.png'>" +
            "<h3 class='error'>Please select whether accept or decline</h3>" +
            "</div>"
          );
        });
      })
      .fail(function(xhr) {
        console.log(xhr.responseText + xhr.status + xhr.statusText);
      })
      .always(function() {
        clear(); //this always sets the status of doctor to 0 after getResult runs again
        //so that evrytime someone qeue up appointment req. it gets shown based on
        //the number of user that clicked it  (LIMIT $status)
        setTimeout(getResult, 3000); // purpose of getting data immediately
      });
  }
  getResult(); // calls the function

  // sets status to 0 in doctor table
  function clear() {
    $.ajax({
        url: '../php/includes/clear-notif-dr.php',
      })
      .done(function() {
        console.log("success");
      })
      .fail(function(xhr) {
        console.log("error" + xhr.responseText + xhr.status);
      });
  }

  //clears notfication
  $('#clear').click(function() {
    $('.card').hide();
  });


  $('.container').on('click', '.accept', function(e) {
    e.stopPropagation();
    $(this).addClass('active');
    $(this).siblings('.decline').removeClass('active');


  });
  $('.container').on('click', '.decline', function(e) {
    e.stopPropagation();
    $(this).addClass('active');
    $(this).siblings('.accept').removeClass('active');


  });



  // confirm button and for ajax
  $('.container').on('click', '.confirm', function(event) {
    event.preventDefault();

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
        });
    }
  });


}); //end ready