<?php
    include '../php/includes/header.php';

    if (!isset($_SESSION['id'])) {
      header("Location: ../index.php");
    }
    ?>

    <link rel="stylesheet" href="../css/notif-appointmen-client.css">
    </head>

<?php include '../php/includes/nav.php'; ?>

<!-- navigation for desktop with active tab background color -->
<!-- for desktop & tablets -->
<div class="desktop">
 <div class="logo-box">
   <a href="home-client.php" class="img-link" ><img class="img-link" src="../images/logo.png" alt="logo"></a>
  <a class="logo-link" href="home-client.php">Web-based Medical Appointment</a>
</div>
<ul>
 <li><a href="home-client.php">Home</a></li>
 <li><a href="<?php echo isset($_SESSION['id']) ? 'profile-client.php' : '../index.php' ?>">Profile</a></li>
 <li><a id="tab-active" href="<?php echo isset($_SESSION['id']) ? 'notif-appointment-client.php' : '../index.php' ?>">Appointments</a></li>
 <li><a href="about.php">About</a></li>
 <li><a href="contact.php">Contact Us</a></li>
 <a href="../php/includes/logout.inc.php" class="logout">Logout</a>  <!-- for desktop & tablets-->
</ul>
</div>
<!-- ***************************************** -->


<?php
  $id = $_SESSION['id'];

  $sql="SELECT dr.*, app.* FROM doctors AS dr INNER JOIN appointment AS app ON dr.id = app.doctor_id WHERE app.user_id=? ORDER BY app.id DESC";
  $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);

 ?>
<div class="container">
  <h1>Recent Appointments and Schedules</h1>
  <p class="yet">&ensp; No Appointments yet</p>
  <?php foreach($datas as $data) : ?>
    <div class="card">
      <p>1</p>
      <h3><?php echo $data['specialization']; ?></h3>
      <h4><?php echo $data['name']; ?></h4>
      <h3>Appointment on:</h3>
      <h5><?php echo $data['timeofappointment']; ?></h5>
      <h3>Confirmation of Appointment:</h3>
      <h1 class="notif"><?php echo $data['confirmation']; ?></h1>
      <h6>Created: <?php echo $data['timestamp']; ?></h6>
        <div class="message">
            <h2>Please wait for doctor's confirmation, either accept of decline</h2>
        </div>
    </div>
  <?php endforeach; ?>
</div>

<script>
if ($('.card h1:contains()').length > 0) {
  $('.yet').hide();
} else {
  $('.yet').show();
}

$.each($('.notif'),function(index, el) {
  if ($(this).text() === 'Not yet confirmed') {
    $(this).siblings('.card p').css('opacity', '1');
    $(this).parent().find('.message').css('opacity', '1');

  } else {
      $(this).siblings('.card p').css('opacity', '0');
      $(this).parent().find('.message h2').css('opacity', '0');
  }
  console.log($(this).text());
});

</script>

<?php include '../php/includes/footer.php'; ?>
