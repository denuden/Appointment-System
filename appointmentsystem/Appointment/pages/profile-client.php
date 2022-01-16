<?php
    include '../php/includes/header.php';

    if (!isset($_SESSION['id'])) {
      header("Location: ../index.php");
    }
    ?>

    <link rel="stylesheet" href="../css/profile.css">

    <script src="../javascript/profile.js"></script>
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
 <li><a  id="tab-active" href="<?php echo isset($_SESSION['id']) ? 'profile-client.php' : '../index.php' ?>">Profile</a></li>
 <li><a href="<?php echo isset($_SESSION['id']) ? 'notif-appointment-client.php' : '../index.php' ?>">Appointments</a></li>
 <li><a href="about.php">About</a></li>
 <li><a href="contact.php">Contact Us</a></li>
 <a href="../php/includes/logout.inc.php" class="logout">Logout</a>  <!-- for desktop & tablets-->
</ul>
</div>
<!-- ***************************************** -->


<main>
  <div class="holder">
      <?php
$id = $_SESSION['id'];
      $sqlImg = "SELECT * FROM profileimg WHERE userid =?";
      $stmt= mysqli_stmt_init($conn);

        mysqli_stmt_prepare($stmt, $sqlImg);

          mysqli_stmt_bind_param($stmt, "i", $id);
          mysqli_stmt_execute($stmt);
          $resultImg = mysqli_stmt_get_result($stmt);

        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
          echo "<div class='img-frame'>";
            if ($rowImg['status'] == 0) {
                echo "<img src='../images/uploads-user/".$rowImg['imgname']."'>";
            } else{
              echo "<img src='../images/blank-profile.jpg'>";
            }
          echo "</div>";
        }

       ?>
      <form  action='../php/includes/upload.php' method='POST' enctype='multipart/form-data'>
              <input class="custom-file-input" type='file' name='file'>
              <button type='submit' name='submit'>UPLOAD</button>
        </form>
    <h3><?php echo $_SESSION['fname']." ".$_SESSION['mname']." ". $_SESSION['lname']; ?></h3>
    <p><?php echo $_SESSION['sex']; ?></p>
    <p><?php echo $_SESSION['age']; ?></p>
    <p><?php echo $_SESSION['bday']; ?></p>
  </div>

<div class="desktop-holder">
  <div class="holder">
    <h5>Contact Information</h5>
    <p>Username:<b> <?php echo $_SESSION['uid']; ?></b></p>
    <p><?php echo $_SESSION['email']; ?></p>
    <p><?php echo $_SESSION['contact']; ?></p>
    <p><?php echo $_SESSION['address']; ?></p>
  </div>

  <div class="holder">
  <h5>Allergies: </h5>
    <p><?php echo $_SESSION['allergy']; ?></p>
  <h5>Disabilities: </h5>
    <p><?php echo $_SESSION['disable']; ?></p>
  </div>

  <div class="holder">
    <a href="user-changepass.php">Change Password</a>
  </div>
</div>


</main>

<?php include '../php/includes/footer.php'; ?>
