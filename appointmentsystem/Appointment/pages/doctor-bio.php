<?php
    include '../php/includes/header.php';
?>
    <script src="../javascript/home.js"></script>
    <link rel="stylesheet" href="../css/doctor-bio.css">
    </head>

<?php include '../php/includes/nav.php'; ?>
<?php
 $id = $_GET['id'];

   $sql = "SELECT * FROM doctors WHERE id=?";

   $stmt= mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

   $result = mysqli_stmt_get_result($stmt);
   $doctor = mysqli_fetch_assoc($result);
   mysqli_free_result($result);

 ?>
 <!-- navigation for desktop with active tab background color -->
 <!-- for desktop & tablets -->
 <div class="desktop">
  <div class="logo-box">
  <img src="../images/logo.png" alt="logo">
  <h1>Web-based Medical Appointment</h1>
 </div>
 <ul>
  <li><a  id="tab-active" href="home-client.php">Home</a></li>
  <li><a href="<?php echo isset($_SESSION['id']) ? 'profile-client.php' : '../index.php' ?>">Profile</a></li>
  <li><a href="<?php echo isset($_SESSION['id']) ? 'notif-appointment-client.php' : '../index.php' ?>">Appointments</a></li>
  <li><a href="about-dr.php">About</a></li>
  <li><a href="contact-dr.php">Contact Us</a></li>
  <a href="../php/includes/logout.inc.php" class="logout">Logout</a>  <!-- for desktop & tablets-->
 </ul>
 </div>
 <!-- ***************************************** -->
<main>

  <div class="container">
    <div class="desktop-holder">

    <div class="section1">
          <a class="back" href="home-client.php">←Back</a>
      <img src="../images/uploads-dr/<?php echo $doctor['imgname']; ?>" alt="<?php echo $doctor['name']; ?>">
      <h4><?php echo $doctor['name']; ?></h4>
      <p><i><?php echo $doctor['specialization']; ?></i></p>
      <p><i><?php echo $doctor['sex']; ?></i></p>
        <span>
          <h5>Schedule per week:</h5>
          <p>Sunday: <b><?php echo $doctor['sun']; ?></b></p>
          <p>Monday: <b><?php echo $doctor['mon']; ?></b></p>
          <p>Tuesday: <b><?php echo $doctor['tue']; ?></b></p>
          <p>Wednesday: <b><?php echo $doctor['wed']; ?></b></p>
          <p>Thursday: <b><?php echo $doctor['thu']; ?></b></p>
          <p>Friday: <b><?php echo $doctor['fri']; ?></b></p>
          <p>Satruday: <b><?php echo $doctor['sat']; ?></b></p>
          </span>
    </div>
    <div class="section2">
      <h3>Personal Information</h3>
      <hr>
      <h5>Bio</h5>
      <p><?php echo $doctor['bio']; ?></p>
      <h5>Work Authorization</h5>
      <p><?php echo $doctor['workAuthorize']; ?></p>

      <h3>education and experience</h3>
      <hr>
      <h5>Work experience</h5>
      <p><?php echo $doctor['workexp']; ?></p>
      <h5>residency</h5>
      <p><?php echo $doctor['residency']; ?></p>
      <h5>internship</h5>
      <p><?php echo $doctor['internship']; ?></p>
      <h5>Medical School</h5>
      <p><?php echo $doctor['medschool']; ?></p>

      <h3>certification and licensure</h3>
      <hr>
      <h5>Licenses</h5>
      <p><?php echo $doctor['license']; ?></p>
      <h5>board certifications</h5>
      <p><?php echo $doctor['boardCert']; ?></p>
      <h5>other certifications</h5>
      <p><?php echo $doctor['otherCert']; ?></p>

      <h3>Work history</h3>
      <hr>
      <p><?php echo $doctor['workHistory']; ?></p>
      <br>
    </div>
      </div>
  </div>
</main>

<?php    include '../php/includes/footer.php'; ?>
