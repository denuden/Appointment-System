 <?php include '../php/includes/header-dr.php';

  if (!isset($_SESSION['drid'])) {
      header('Location: ../index.php');
  }

  $id = $_SESSION['drid'];
  //
  // $sql2 = "SELECT status FROM doctors WHERE id = '$id'";
  // $query= mysqli_query($conn,$sql2);
  // $st = mysqli_fetch_assoc($query);
  // mysqli_free_result($query);
  //
  // $status = $st['status'];

// this one prepares result for every appointment made
    $sql="SELECT user.*, app.* FROM user_client AS user INNER JOIN appointment AS app ON user.id = app.user_id WHERE app.doctor_id =? ORDER BY app.id DESC";
    $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);

          $result = mysqli_stmt_get_result($stmt);
          $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);

          mysqli_free_result($result);

// this one prepares result for every appointment made WHERE confirmation === not yet confirmed
$confirmation ='Not yet confirmed';
    $sql1="SELECT user.*, app.* FROM user_client AS user INNER JOIN appointment AS app ON user.id = app.user_id WHERE app.doctor_id =? AND app.confirmation=? ORDER BY app.id DESC";

    $stmt1 = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt1, $sql1);
      mysqli_stmt_bind_param($stmt1, "is", $id,$confirmation);
      mysqli_stmt_execute($stmt1);

          $result1 = mysqli_stmt_get_result($stmt1);
          $datas1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

          mysqli_free_result($result1);
?>

    <link rel="stylesheet" href="../css/doctor-page-history.css">
    <script src="../javascript/doctor-page-history.js" charset="utf-8"></script>
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
    <li><a href="<?php echo isset($_SESSION['drid']) ? 'doctor-page-home.php' : '../index.php' ?>">Recents</a></li>
    <li><a href="<?php echo isset($_SESSION['drid']) ? 'doctor-page-bio.php' : '../index.php' ?>">Profile</a></li>
    <li><a id="tab-active"  href="<?php echo isset($_SESSION['drid']) ? 'doctor-page-history.php' : '../index.php' ?>">Appointments History</a></li>
    <li><a href="about-dr.php">About</a></li>
    <li><a href="contact-dr.php">Contact Us</a></li>
   <a href="../php/includes/logout.inc.php" class="logout">Logout</a>  <!-- for desktop & tablets-->
  </ul>
  </div>
  <!-- ***************************************** -->

        <div class="container">
          <div class="notconfirmed" id="notconfirmed">
            <h1>Not yet Confirmed Appointments</h1>
                  <?php foreach($datas1 as $data) :  ?>
                    <div class="card">
                      <h4><?php echo $data['fname']." ".$data['mname']." ".$data['lname']; ?></h4>
                      <p><?php echo $data['sex'].", ".$data['age']; ?></p>
                      <h3>Contact Info</h3>
                      <p><?php echo $data['contact']; ?></p>
                      <p><?php echo $data['address']; ?></p>
                      <p><?php echo $data['email']; ?></p>
                      <h3>Allergies</h3>
                      <p><?php echo $data['allergy']; ?></p>
                      <h3>Disabilities</h3>
                      <p><?php echo $data['disable']; ?></p>
                      <h3>Appointment on <br></h3>
                      <h5><?php echo $data['timeofappointment']; ?></h5>
                      <h2>Appointment Status: <?php echo $data['confirmation']; ?></h2>
                      <h6>Created: <?php echo $data['timestamp']; ?></h6>

                      <div class='buttons'>
                      <h6 id='appid'> <?php  echo $data['id']; ?>   </h6>
                      <button class='accept' id='accept' type='button'>Accept</button>
                      <button class='decline' id='decline' type='button'>Decline</button>
                      <button class='confirm' id='confirm' type='button'>Confirm</button>
                      <img src='../images/check.png'>
                      <h3 class='error'>Please select whether accept or decline</h3>
                      </div>
                    </div>
                      <?php endforeach; ?>
          </div>


          <div class="confirmed" id="confirmed">
            <h1>List of All Appointments</h1>
              <p class="yet">No Appointments yet</p>
            <?php foreach($datas as $data) :  ?>
              <div class="card">
                <h4><?php echo $data['fname']." ".$data['mname']." ".$data['lname']; ?></h4>
                <p><?php echo $data['sex'].", ".$data['age']; ?></p>
                <h3>Contact Info</h3>
                <p><?php echo $data['contact']; ?></p>
                <p><?php echo $data['address']; ?></p>
                <p><?php echo $data['email']; ?></p>
                <h3>Allergies</h3>
                <p><?php echo $data['allergy']; ?></p>
                <h3>Disabilities</h3>
                <p><?php echo $data['disable']; ?></p>
                <h3>Appointment on <br></h3>
                <h5><?php echo $data['timeofappointment']; ?></h5>
                <h2>Appointment Status: <?php echo $data['confirmation']; ?></h2>
                <h6>Created: <?php echo $data['timestamp']; ?></h6>
              </div>
                <?php endforeach; ?>
          </div>
        </div>
    </div>
    <?php    include '../php/includes/footer.php'; ?>
  </body>
</html>
