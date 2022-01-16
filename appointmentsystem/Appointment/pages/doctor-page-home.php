<?php include '../php/includes/header-dr.php'; ?>
<?php
  if (!isset($_SESSION['drid'])) {
      header('Location: ../index.php');
  }
?>
  <link rel="stylesheet" href="../css/doctor-page-home.css">
  <script src="../javascript/doctor-home.js"></script>
  </head>
  <?php include '../php/includes/nav-dr.php'; ?>

  <!-- navigation for desktop with active tab background color -->
  <!-- for desktop & tablets -->
  <div class="desktop">
   <div class="logo-box">
   <img src="../images/logo.png" alt="logo">
   <h1>Web-based Medical Appointment</h1>
  </div>
  <ul>
    <li><a id="tab-active"  href="<?php echo isset($_SESSION['drid']) ? 'doctor-page-home.php' : '../index.php' ?>">Recents</a></li>
    <li><a href="<?php echo isset($_SESSION['drid']) ? 'doctor-page-bio.php' : '../index.php' ?>">Profile</a></li>
    <li><a href="<?php echo isset($_SESSION['drid']) ? 'doctor-page-history.php' : '../index.php' ?>">Appointments History</a></li>
    <li><a href="about-dr.php">About</a></li>
    <li><a href="contact-dr.php">Contact Us</a></li>
   <a href="../php/includes/logout.inc.php" class="logout">Logout</a>  <!-- for desktop & tablets-->
  </ul>
  </div>
  <!-- ***************************************** -->


        <div class="container">
          <h1>Lists of New<i>(Unseen)</i> Requested Appointments</h1>
          <button type="button" id="clear">Clear Notifications</button>
          <!--  -->

            <!--  -->
        </div>

    </div>

    <?php    include '../php/includes/footer.php'; ?>
  </body>
</html>
