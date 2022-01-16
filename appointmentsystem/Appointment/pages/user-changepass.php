<?php session_start();

 if (!isset($_SESSION['id'])) {
    header('Location: ../index.php');
 }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doctor-page-bioEdit.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="../javascript/user-changepass.js" charset="utf-8"></script>
    <title></title>
  </head>
  <body>
    <header>
        <div class="logo-box">
          <img src="../images/logo.png" alt="logo">
          <h1>Web-based Medical Appointment</h1>
        </div>
    </header>
<div class="container">
  <form  id="changepass">
     <h3>Input your new password</h3>
    <input type="password" id="pwd" placeholder="New Password">
    <input type="password" id="repwd" placeholder="Retype Password">

    <input id="submit"type="submit" value="submit">
        <h4 id="error"></h4>
        <a id="cancel" href="profile-client.php">Cancel</a>
      </form>
      <div class="modal" id="modal">
        <h2>Please Login again to continue</h2>
        <a href="../php/includes/logout.inc.php">Login Again</a>
      </div>
      <div id="overlay"></div>
</div>

  </body>
</html>
