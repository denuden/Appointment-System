<?php
    include '../php/includes/header.php';
?>
    <script src="../javascript/home.js"></script>
    <link rel="stylesheet" href="../css/contact.css">
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
 <li><a href="<?php echo isset($_SESSION['id']) ? 'notif-appointment-client.php' : '../index.php' ?>">Appointments</a></li>
 <li><a href="about.php">About</a></li>
 <li><a id="tab-active" href="contact.php">Contact Us</a></li>
 <a href="../php/includes/logout.inc.php" class="logout">Logout</a>  <!-- for desktop & tablets-->
</ul>
</div>
<!-- ***************************************** -->
<div class="section">
  <h2>Send us your concerns using our</h2>
  <div class="body">

    <div class="email">
         <img src="../images/mail.png" alt="mail">
        <h4>Email: bodybagclinic@gmail.com</h4>
    </div>
    <div class="tele">
      <img src="../images/tele.png" alt="mail">
        <h4>Telephone#: (02)123-4567 </h4>
    </div>
    <div class="mobi">
      <img src="../images/mobi.png" alt="mail">
      <h4>Mobile#: +63 912 345-6789 </h4>
    </div>
  </div>
</div>



<?php    include '../php/includes/footer.php'; ?>
