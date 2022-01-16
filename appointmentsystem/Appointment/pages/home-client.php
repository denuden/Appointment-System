<?php
    include '../php/includes/header.php';
?>
    <script src="../javascript/home.js"></script>
    <link rel="stylesheet" href="../css/home.css">
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
 <li><a  id="tab-active" href="home-client.php">Home</a></li>
 <li><a href="<?php echo isset($_SESSION['id']) ? 'profile-client.php' : '../index.php' ?>">Profile</a></li>
 <li><a href="<?php echo isset($_SESSION['id']) ? 'notif-appointment-client.php' : '../index.php' ?>">Appointments</a></li>
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
        <h1>Welcome to Body-Bag Clinic</h1>

        <p>"Are you worried about your health? Does it hurt somewhere?
          Do you have allergies?"</p><br>

        <p> <span>We believe that <i style="font-weight:200; color:#C4E8FF;">"Only a life lived in the service to others is worth living"</i>, so
            never worry again and
            get an appointment with us! </span></p>
      </main>

      <div class="section">
        <div class="img-section">
          <img src="../images/bg-section.jpg" >
              <div class="section-overlay"></div>
        </div>

  <div class="card-holder"> <!-- for desktop -->
          <div class="card-section">
              <div class="card-width">
            <div class="header">
              <h3>What is Body-Bag Clinic</h3>
            </div>
            <div class="body">
                <p>Body-Bag Clinic is a mini clinic where everyone
                can come for consultation to our professional Doctors.</p>
                <br>
                <p>This is a clinic with technologies that will ensure
                your health is in good hands!</p>
            </div>
            </div>
          </div>
          <!-- ************** -->


          <div class="card-section">
              <div class="card-width">
            <div class="header">
              <h3>Who is Body-Bag Clinic</h3>
            </div>
            <div class="body">
                <p>We are a group of professionals that is in service for 30 years and counting.</p>
                <br>
                <p>We have been serving this community with our utmost effort. We are not just some
                people who call themselves <i>"professional"</i>.</p>
                <br>
                <p id="span">We are trained for your content!</p>
            </div>
            </div>
          </div>
  <!-- ************** -->
          <div class="card-section">
            <div class="card-width">
            <div class="header">
              <h3>Why is Body-Bag Clinic</h3>
            </div>
            <div class="body">
                <p>Body-Bag Clinic is reliable, and compassionate in dealing with
                everyone's health. We have professional doctors who are reachable and always
              on the call</p>
                <br>
                <p>Since our clinic is also available with online appoinment, it will help all our
                patients in making appointments with hassle free</p>
            </div>
          </div>
          </div>
      </div>
    </div>


        <div class="section-icon">
          <div class="section-icon-holder">
            <div class="card-icon">
                <img src="../images/clock.png" alt="clock">
                <h3>Monday-Saturday 8:00AM - 5:00PM</h3>
                <h3>Sunday 8:00AM - 3:00PM</h3>
                <p>Clinic's Working Hours</p>
            </div>
            <div class="card-icon">
                <img src="../images/phone.png" alt="phone">
                <h3>+63 912 345-6789</h3>
                <h3>(02)123-4567</h3>
                <h3>bodybagclinic@gmail.com</h3>
                <p>Body-Bag Clinic</p>
            </div>
            <div class="card-icon">
                <img src="../images/location.png" id="img"alt="location">
                <h3>#7114 Kundiman Street</h3>
                <p>Sampaloc 1008 Manila</p>
            </div>
          </div>
        </div>



            <!-- Appointment button -->
                  <div class="getAppointmentBtn">
                    <button type="button" class="btn-get-app">GET APPOINTMENT NOW!</button>
                  </div>



      <section class="doctor-fields">
        <h2>PEDIATRICS</h2>
        <div class="holder">
          <div class="card">
            <img src="../images/uploads-dr/<?php echo $doctors[0]['imgname']; ?>">
            <div class="card-info">
              <h4><?php echo $doctors[0]['name'] ?></h4>
              <p><?php echo $doctors[0]['workexp'] ?></p>
              <p><?php echo $doctors[0]['bio'] ?></p>
              <a href="doctor-bio.php?id=<?php echo $doctors[0]['id']; ?>">Read more...</a>
            </div>
          </div>

        <hr id="short-line">

        <div class="card">
          <img src="../images/uploads-dr/<?php echo $doctors[7]['imgname']; ?>">
          <div class="card-info">
            <h4><?php echo $doctors[7]['name'] ?></h4>
            <p><?php echo $doctors[7]['workexp'] ?></p>
            <p><?php echo $doctors[7]['bio'] ?></p>
            <a href="doctor-bio.php?id=<?php echo $doctors[7]['id']; ?>">Read more...</a>
          </div>
        </div>

        <hr id="short-line">

        <div class="card">
          <img src="../images/uploads-dr/<?php echo $doctors[1]['imgname']; ?>">
          <div class="card-info">
            <h4><?php echo $doctors[1]['name'] ?></h4>
            <p><?php echo $doctors[1]['workexp'] ?></p>
            <p><?php echo $doctors[1]['bio'] ?></p>
            <a href="doctor-bio.php?id=<?php echo $doctors[1]['id']; ?>">Read more...</a>
          </div>
        </div>
        <hr id="short-line">
      </div>
      <hr class="desktop-short-line" >

      <!-- ********************* -->


        <h2>ORTHOPEDICS</h2>
          <div class="holder">
        <div class="card">
          <img src="../images/uploads-dr/<?php echo $doctors[5]['imgname']; ?>">
          <div class="card-info">
            <h4><?php echo $doctors[5]['name'] ?></h4>
            <p><?php echo $doctors[5]['workexp'] ?></p>
            <p><?php echo $doctors[5]['bio'] ?></p>
            <a href="doctor-bio.php?id=<?php echo $doctors[5]['id']; ?>">Read more...</a>
          </div>
        </div>
        <hr id="short-line">
      </div>
      <hr class="desktop-short-line" >
      <!-- ********************* -->


        <h2>OB-GYN</h2>
          <div class="holder">
        <div class="card">
          <img src="../images/uploads-dr/<?php echo $doctors[6]['imgname']; ?>">
          <div class="card-info">
            <h4><?php echo $doctors[6]['name'] ?></h4>
            <p><?php echo $doctors[6]['workexp'] ?></p>
            <p><?php echo $doctors[6]['bio'] ?></p>
            <a href="doctor-bio.php?id=<?php echo $doctors[6]['id']; ?>">Read more...</a>
          </div>
        </div>
        <hr id="short-line">
      </div>
      <hr class="desktop-short-line" >
      <!-- ********************* -->

        <h2>PHYSICAL THERAPIST</h2>
          <div class="holder">
        <div class="card">
          <img src="../images/uploads-dr/<?php echo $doctors[4]['imgname']; ?>">
          <div class="card-info">
            <h4><?php echo $doctors[4]['name'] ?></h4>
            <p><?php echo $doctors[4]['workexp'] ?></p>
            <p><?php echo $doctors[4]['bio'] ?></p>
            <a href="doctor-bio.php?id=<?php echo $doctors[4]['id']; ?>">Read more...</a>
          </div>
        </div>
        <hr id="short-line">
        <div class="card">
          <img src="../images/uploads-dr/<?php echo $doctors[2]['imgname']; ?>">
          <div class="card-info">
            <h4><?php echo $doctors[2]['name'] ?></h4>
            <p><?php echo $doctors[2]['workexp'] ?></p>
            <p><?php echo $doctors[2]['bio'] ?></p>
            <a href="doctor-bio.php?id=<?php echo $doctors[2]['id']; ?>">Read more...</a>
          </div>
        </div>
<hr id="short-line">
</div>
<hr class="desktop-short-line" >
<!-- ********************* -->


        <h2>ENT – HNS</h2>
          <div class="holder">
        <div class="card">
          <img src="../images/uploads-dr/<?php echo $doctors[8]['imgname']; ?>">
          <div class="card-info">
            <h4><?php echo $doctors[8]['name'] ?></h4>
            <p><?php echo $doctors[8]['workexp'] ?></p>
            <p><?php echo $doctors[8]['bio'] ?></p>
            <a href="doctor-bio.php?id=<?php echo $doctors[8]['id']; ?>">Read more...</a>
          </div>
        </div>
<hr id="short-line">
</div>
<hr class="desktop-short-line" >
<!-- ********************* -->


        <h2>OPTHALMOLOGIST</h2>
              <div class="holder">
        <div class="card">
          <img src="../images/uploads-dr/<?php echo $doctors[3]['imgname']; ?>">
          <div class="card-info">
            <h4><?php echo $doctors[3]['name'] ?></h4>
            <p><?php echo $doctors[3]['workexp'] ?></p>
            <p><?php echo $doctors[3]['bio'] ?></p>
            <a href="doctor-bio.php?id=<?php echo $doctors[3]['id']; ?>">Read more...</a>
          </div>
        </div>
        <hr id="short-line">
      </div>
      <hr class="desktop-short-line" >

      <!-- ********************* -->
        </section>

<!-- for mobile schedule -->
      <div class="schedule">
        <h2>Schedules</h2>
            <div class="dropdown-drnames">
              <button id="drop-names" type="button">Select Specialization</button>
              <ul class="f-drop">
                <li class="d-drop"><p>PEDIATRICS</p>
                  <ul class="drop">
                    <li class="popup-sched-btn"><?php echo $doctors[0]['name'] ?></li>
                    <li class="popup-sched-btn"><?php echo $doctors[7]['name'] ?></li>
                    <li class="popup-sched-btn"><?php echo $doctors[1]['name'] ?></li>
                  </ul>
                </li>
                <li class="d-drop"><p>ORTHOPEDICS</p>
                  <ul class="drop">
                    <li class="popup-sched-btn"><?php echo $doctors[5]['name'] ?></li>
                    </ul>
                </li>
                <li class="d-drop"><p>OB-GYN</p>
                  <ul class="drop">
                    <li class="popup-sched-btn"><?php echo $doctors[6]['name'] ?></li>
                    </ul>
                </li>
                <li class="d-drop"><p>PHYSICAL THERAPIST</p>
                  <ul class="drop">
                    <li class="popup-sched-btn"><?php echo $doctors[4]['name'] ?></li>
                    <li class="popup-sched-btn"><?php echo $doctors[2]['name'] ?></li>
                  </ul>
                </li>
                <li class="d-drop"><p>ENT – HNS</p>
                  <ul class="drop">
                    <li class="popup-sched-btn"><?php echo $doctors[8]['name']; ?></li>
                  </ul>
                </li>
                <li class="d-drop"><p>OPTHALMOLOGIST</p>
                  <ul class="drop">
                    <li class="popup-sched-btn"><?php echo $doctors[3]['name'] ?></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>

      <div class="modal" id="modal">
        <div class="modal-header">
          <div class="title">List of Weekly Schedule</div>
          <button id="close-btn" class="exit">&times;</button>
        </div>
        <div class="modal-body">
          <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
      </div>
      <div id="overlay"></div>
    <!-- for mobile schedule -->


<!-- for desktop schedule -->


<div class="desktop-sched">
    <div class="desktop-header">
      <h2>Schedules</h2>
      <h5>Select specialization and doctors to see their schedule</h5>
    </div>
    <div class="desktop-body">
        <div class="desktop-col1">
          <h3>PEDIATRICS</h3>
          <h3>ORTHOPEDICS</h3>
          <h3>OB-GYN</h3>
          <h3>PHYSICAL THERAPIST</h3>
          <h3>ENT - HNS</h3>
          <h3>OPTHALMOLOGIST</h3>
        </div>
        <div class="desktop-col2">
          <h4>Dr. Janella Reyes</h4>
          <h4>Dr. Danilo Garcia</h4>
          <h4>Dr. Jasmine Santos</h4>
        </div>
        <div class="desktop-col3">
          <div class="col3-header">
            <ul>
              <li style="color:red;">S</li>
              <li>M</li>
              <li>T</li>
              <li>W</li>
              <li>Th</li>
              <li>F</li>
              <li>S</li>
            </ul>
          </div>
          <div class="col3-body">
            <ul>
              <li>8:00 - 12:00 AM</li>
              <li>1:00 - 4:00 PM</li>
              <li>—</li>
              <li>1:00 - 4:00 PM</li>
              <li>—</li>
              <li>1:00 - 4:00 PM</li>
              <li>—</li>
            </ul>
          </div>
        </div>
    </div>
</div>



<!-- for desktop schedule -->

<!-- Appointment button -->
      <div class="getAppointmentBtn">
        <button type="button" class="btn-get-app" >GET APPOINTMENT NOW!</button>
      </div>
<?php    include '../php/includes/footer.php'; ?>
