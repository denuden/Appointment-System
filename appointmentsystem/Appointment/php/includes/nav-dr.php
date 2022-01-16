<body>

  <div class="wrapper">

        <header>
          <div class="logo-box">
            <a href="doctor-page-home.php" class="img-link" ><img class="img-link" src="../images/logo.png" alt="logo"></a>
          <a class="logo-link" href="doctor-page-home.php">Web-based Medical Appointment</a>
          </div>

          <nav>
            <div class="side-navbar" id="toggleBar"></div> <!-- for mobile responsiveness-->
            <ul>
              <li><a href="<?php echo isset($_SESSION['drid']) ? 'doctor-page-home.php' : '../index.php' ?>">Recents</a></li>
              <li><a href="<?php echo isset($_SESSION['drid']) ? 'doctor-page-bio.php' : '../index.php' ?>">Profile</a></li>
              <li><a href="<?php echo isset($_SESSION['drid']) ? 'doctor-page-history.php' : '../index.php' ?>">Appointments History</a></li>
              <li><a href="about-dr.php">About</a></li>
              <li><a href="contact-dr.php">Contact Us</a></li>
              <li class="logout-sidebar"><a href="../php/includes/logout.inc.php"><button type="button" name="logout" >Logout</button></a></li>
            </ul>
          </nav>
        </header>
