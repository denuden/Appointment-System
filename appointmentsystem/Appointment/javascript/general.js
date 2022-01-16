$(document).ready(function() {
  let toggleBarStatus = false;

  $('#toggleBar').click(function(event) {
    if (toggleBarStatus === false) {
      $('nav ul').css({
        width: '200px',
        visibility: 'visible'
      });
      $('nav ul li a, nav .logout-sidebar').css({
        opacity: '1'
      });

      toggleBarStatus = true;
    } else if (toggleBarStatus === true) {
      $('nav ul').css({
        width: '0px',
        visibility: 'hidden'
      });
      $('nav ul li a, nav .logout-sidebar').css({
        opacity: '0'
      });
      toggleBarStatus = false;
    }
  });


}); // end ready