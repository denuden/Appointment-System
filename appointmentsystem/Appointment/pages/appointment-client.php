<?php
  include '../php/includes/header.php';

  if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
  }

 ?>
 <script src="../javascript/appointment.js"></script>
 <link rel="stylesheet" href="../css/appointment.css">
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
 <li><a id="tab-active" href="home-client.php">Home</a></li>
 <li><a href="<?php echo isset($_SESSION['id']) ? 'profile-client.php' : '../index.php' ?>">Profile</a></li>
 <li ><a href="<?php echo isset($_SESSION['id']) ? 'notif-appointment-client.php' : '../index.php' ?>">Appointments</a></li>
 <li><a href="about.php">About</a></li>
 <li><a href="contact.php">Contact Us</a></li>
 <a href="../php/includes/logout.inc.php" class="logout">Logout</a>  <!-- for desktop & tablets-->
</ul>
</div>
<!-- ***************************************** -->

 <?php
   $sql = "SELECT * FROM doctors";
   $result = mysqli_query($conn, $sql);
   $doctors = mysqli_fetch_all($result, MYSQLI_ASSOC);
   mysqli_free_result($result);
   mysqli_close($conn);
  ?>

<main>
  <div class="container">
          <img class="prev" src="../images/prev.png" alt="prev" id="prev">
          <img class="next" src="../images/next.png" alt="next" id="next">
    <div class="fields-header">
      <h3>Choose doctor of your choice,</h3>
    </div>
      <div class="fields-body">
<!-- PEDIATRICS -->
        <div class="holder active">
          <h2 id="field-title">PEDIATRICS</h2>
          <hr>
          <div class="field-holder">
            <div class="card">
              <img src="../images/uploads-dr/<?php echo $doctors[0]['imgname']; ?>">
              <h4><?php echo $doctors[0]['name'] ?></h4>
              <p><?php echo $doctors[0]['bio'] ?></p>
            </div>
              <div class="card">
              <img src="../images/uploads-dr/<?php echo $doctors[7]['imgname']; ?>">
              <h4><?php echo $doctors[7]['name'] ?></h4>
              <p><?php echo $doctors[7]['bio'] ?></p>
            </div>
            <div class="card">
              <img src="../images/uploads-dr/<?php echo $doctors[1]['imgname']; ?>">
              <h4><?php echo $doctors[1]['name'] ?></h4>
              <p><?php echo $doctors[1]['bio'] ?></p>
            </div>
          </div>
        </div>
<!-- ORTHOPEDICS -->
        <div class="holder">
          <h2 id="field-title">ORTHOPEDICS</h2>
          <hr>
          <div class="field-holder">
            <div class="card">
              <img src="../images/uploads-dr/<?php echo $doctors[5]['imgname']; ?>">
              <h4><?php echo $doctors[5]['name'] ?></h4>
              <p><?php echo $doctors[5]['bio'] ?></p>
            </div>
          </div>
        </div>
<!-- OB-GYN -->
        <div class="holder">
          <h2 id="field-title">OB-GYN</h2>
          <hr>
          <div class="field-holder">
            <div class="card">
              <img src="../images/uploads-dr/<?php echo $doctors[6]['imgname']; ?>">
              <h4><?php echo $doctors[6]['name'] ?></h4>
              <p><?php echo $doctors[6]['bio'] ?></p>
            </div>
          </div>
        </div>
<!-- PHYSICAL THERAPIST -->
        <div class="holder">
          <h2 id="field-title">PHYSICAL THERAPIST</h2>
          <hr>
          <div class="field-holder">
            <div class="card">
              <img src="../images/uploads-dr/<?php echo $doctors[4]['imgname']; ?>">
              <h4><?php echo $doctors[4]['name'] ?></h4>
              <p><?php echo $doctors[4]['bio'] ?></p>
            </div>
            <div class="card">
              <img src="../images/uploads-dr/<?php echo $doctors[2]['imgname']; ?>">
              <h4><?php echo $doctors[2]['name'] ?></h4>
              <p><?php echo $doctors[2]['bio'] ?></p>
            </div>
          </div>
        </div>
<!-- ENT - HNS -->
        <div class="holder">
          <h2 id="field-title">ENT - HNS</h2>
          <hr>
          <div class="field-holder">
            <div class="card">
              <img src="../images/uploads-dr/<?php echo $doctors[8]['imgname']; ?>">
              <h4><?php echo $doctors[8]['name'] ?></h4>
              <p><?php echo $doctors[8]['bio'] ?></p>
            </div>
          </div>
        </div>
<!-- OPTHALMOLOGIST -->
        <div class="holder">
          <h2 id="field-title">OPTHALMOLOGIST</h2>
          <hr>
          <div class="field-holder">
            <div class="card">
              <img src="../images/uploads-dr/<?php echo $doctors[3]['imgname']; ?>">
              <h4><?php echo $doctors[3]['name'] ?></h4>
              <p><?php echo $doctors[3]['bio'] ?></p>
            </div>
          </div>
        </div>
      </div>
  </div>
</main>

<div class="height">

</div>

<div class="desktop-holder">
  <div class="schedule">
    <h2 id='h2'></h2>
    <br>
    <ul>
    </ul>
  </div>

  <div class="final-selection">
    <h2></h2>
      <div class="final-details">
        <img alt="">
        <div>
          <h4></h4>
          <p></p>
          <h5></h5>
        </div>
      </div>
      <button id="proceed-btn" type="button">Proceed</button>
  </div>
</div>



 <?php include '../php/includes/footer.php'; ?>
