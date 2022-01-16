<body>
<div class="wrapper">
      <header>
        <div class="logo-box">
          <a href="home-client.php" class="img-link" ><img class="img-link" src="../images/logo.png" alt="logo"></a>
        <a class="logo-link" href="home-client.php">Web-based Medical Appointment</a>
        </div>

        <nav>
          <div class="side-navbar" id="toggleBar"></div> <!-- for mobile responsiveness-->
          <ul>
            <li><a href="home-client.php">Home</a></li>
            <li><a href="<?php echo isset($_SESSION['id']) ? 'profile-client.php' : '../index.php' ?>">Profile</a></li>
            <li><a href="<?php echo isset($_SESSION['id']) ? 'notif-appointment-client.php' : '../index.php' ?>">Appointments</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li class="logout-sidebar"><a href="../php/includes/logout.inc.php"><button type="button" name="logout" >Logout</button></a></li>
          </ul>
        </nav>
      </header>
