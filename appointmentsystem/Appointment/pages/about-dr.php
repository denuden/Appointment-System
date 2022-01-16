<?php
    include '../php/includes/header.php';
?>
    <script src="../javascript/home.js"></script>
    <link rel="stylesheet" href="../css/about.css">
    </head>

<?php include '../php/includes/nav-dr.php'; ?>

<!-- navigation for desktop with active tab background color -->
<!-- for desktop & tablets -->
<div class="desktop">
 <div class="logo-box">
   <a href="doctor-page-home.php" class="img-link" ><img class="img-link" src="../images/logo.png" alt="logo"></a>
  <a class="logo-link" href="doctor-page-home.php">Web-based Medical Appointment</a>
</div>
<ul>
  <li><a  href="<?php echo isset($_SESSION['drid']) ? 'doctor-page-home.php' : '../index.php' ?>">Recents</a></li>
  <li><a href="<?php echo isset($_SESSION['drid']) ? 'doctor-page-bio.php' : '../index.php' ?>">Profile</a></li>
  <li><a href="<?php echo isset($_SESSION['drid']) ? 'doctor-page-history.php' : '../index.php' ?>">Appointments History</a></li>
  <li><a id="tab-active" href="about-dr.php">About</a></li>
  <li><a href="contact-dr.php">Contact Us</a></li>
 <a href="../php/includes/logout.inc.php" class="logout">Logout</a>  <!-- for desktop & tablets-->
</ul>
</div>
<!-- ***************************************** -->
<div class="section">
  <div class="text">
    <div class="header">
      <h1>ABOUT US</h1>
    </div>
    <div class="body">
      <p>This website was built for the purpose of project in our HCI.
        Instructed by our instructor, Sir Rey Bautista. This website is about
        web-based appointment clinic where user can make appointments online.
        Every picture present is not owned and will never be published without consent.
        It is only used for project creation.
      </p>
      <br>
      <p>Body-bag Clinic is a clinic that will always be there for you. We are passionate
      people that will always serve our purpose in making you feel better. We have all
    the basic equipments that you need that is being administered by our professional doctors.
  </p>
<br>
  <h3>We have 3 principles in our clinic:</h3>
    </div>
  </div>

  <div class="images">
    <div class="card">
      <div id="overlay"></div>
      <img src="../images/we.jpg" alt="we">
      <div class="text-holder">
        <h2>WE</h2>
        <p>care for you</p>
    </div>
    </div>
    <div class="card">
      <div id="overlay"></div>
      <img src="../images/never.jpg" alt="we">
      <div class="text-holder">
        <h2>NEVER</h2>
        <p>let you down</p>
    </div>
    </div>
    <div class="card">
      <img src="../images/stop.jpg" alt="we">
      <div id="overlay"></div>
      <div class="text-holder">
        <h2>STOP</h2>
        <p>is not our action</p>
      </div>
    </div>
  </div>
</div>




<?php    include '../php/includes/footer.php'; ?>
