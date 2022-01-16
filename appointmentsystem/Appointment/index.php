<?php
session_start();
 if (isset($_SESSION['id'])) {
     header("Location: pages/home-client.php");
   } elseif (isset($_SESSION['drid'])) {
      header("Location: pages/doctor-page-home.php");
   }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="css/login.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


  <script src="javascript/login.js"></script>
</head>

<body>
  <div class="wrapper">

    <div class="container">
      <header>
        <img src="images/logo.png" alt="calendar logo">
        <div>
          <h1>Web-based Medical Appointment</h1>
          <p>"Make your appointments easier"</p>
        </div>

      </header>
      <div class="sign-in-container">
        <form id="signin-user">
          <h1>Sign In</h1>
          <input type="text" id="uidin" placeholder="Username">
          <input type="password" id="pwdin" placeholder="Password">
          <button type="submit">SIGN IN</button>
          <h5 id="signin-dr">Sign in as Doctor instead</h5>
          <p>fae</p>
        </form>
      </div>

<div class="dr">
  <button type="button" id="close">&times;</button>
  <form id="signin-dr-form">
    <h1>Sign In</h1>
    <input id="fullname" type="text" placeholder="Input FullName with Dr.(*Dr. Ramil Torres)">
    <input id="pwd-dr" type="password"  placeholder="Password">
    <button type="submit">SIGN IN</button> <p id="error"></p>
  </form>
</div>
<div id="overlay"></div>



      <div class="sign-up-container">
        <form id="signup-user">
                  <h1 class="top">Sign Up</h1>
          <input class="input1" type="text" id="fname" placeholder="First Name">
          <input class="input2" type="text" id="lname" placeholder="Last Name">
          <input class="input3" type="text" id="mname" placeholder="Middle Name">
          <input class="input4" type="text" id="uid" placeholder="Username">
          <input class="input5" type="text" id="email" placeholder="Email Address">
          <input class="input6" type="text" id="contact" placeholder="Contact Number">
          <input class="input7" type="text" id="address" placeholder="Address">
          <input class="input8" type="text" id="sex" placeholder="Sex (Male or Female)">
          <input class="input9" type="text" id="age" placeholder="Age">
          <input class="input10" type="date" id="bday" placeholder="Birthdate">
          <input class="input11" type="text" id="allergy" placeholder="Allergies">
          <input class="input12" type="text" id="disable" placeholder="Disabilities">

          <input class="input13" type="password" id="pwd" placeholder="Password">
          <input class="input14" type="password" id="pwd-repeat" placeholder="Re-type Password">

          <button class="input15" type="submit">SIGN UP</button>
          <p class="input16">fwef</p>
        </form>
      </div>
    </div>

  </div> <!-- end wrapper -->

  <footer id="footer">
  </footer>
</body>

</html>
