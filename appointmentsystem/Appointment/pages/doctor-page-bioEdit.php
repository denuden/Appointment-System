<?php session_start();
  include '../php/database/config.php';
  include '../php/database/db.php';
 if (!isset($_SESSION['drid'])) {
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
    <script src="../javascript/doctor-page-bioEdit.js" charset="utf-8"></script>
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

     <?php
$id = $_SESSION['drid'];
     $sqlImg = "SELECT imgname,imgstatus FROM doctors WHERE id =?";
     $stmt= mysqli_stmt_init($conn);

       mysqli_stmt_prepare($stmt, $sqlImg);

         mysqli_stmt_bind_param($stmt, "i", $id);
         mysqli_stmt_execute($stmt);
         $resultImg = mysqli_stmt_get_result($stmt);

       while ($rowImg = mysqli_fetch_assoc($resultImg)) {
         echo "<div class='img-frame'>";
           if ($rowImg['imgstatus'] == 0) {
               echo "<img src='../images/uploads-dr/".$rowImg['imgname']."'>";
           } else{
             echo "<img src='../images/blank-profile.jpg'>";
           }
         echo "</div>";
       }

      ?>
     <form  action='../php/includes/upload-dr.php' method='POST' enctype='multipart/form-data'>
             <input class="custom-file-input" type='file' name='file'>
             <button type='submit' name='submit'>UPLOAD</button>
       </form>

   <form id="bioEdit">

     <h3>Choose a day when you are available. Leave it blank if not: </h3>
     <input type="text" id="sun" placeholder="Sunday Schedule">
     <input type="text" id="mon" placeholder="Monday Schedule">
     <input type="text" id="tue" placeholder="Tuesday Schedule">
     <input type="text" id="wed" placeholder="Weddnesday Schedule">
     <input type="text" id="thu" placeholder="Thursday Schedule">
     <input type="text" id="fri" placeholder="Friday Schedule">
     <input type="text" id="sat" placeholder="Saturday Schedule">
     <h3>Fill up your Background Information</h3>

     <h2>PERSONAL INFORMATION</h2>
     <div class="desktop-holder">
       <textarea id="bio" rows="8" cols="80" placeholder="Bio"></textarea>
       <textarea id="work-authorize" rows="8" cols="80" placeholder="Work Authorization"></textarea>
      </div>
      <h2>EDUCATION AND EXPERIENCE</h2>
     <div class="desktop-holder">
       <textarea id="work-exp" rows="8" cols="80" placeholder="Work Experience"></textarea>
       <textarea id="residency" rows="8" cols="80" placeholder="Residency"></textarea>
       <textarea id="internship" rows="8" cols="80" placeholder="Internship"></textarea>
       <textarea id="medschool" rows="8" cols="80" placeholder="Medical School"></textarea>
       </div>
       <h2>CERTIFICATIONS AND LICENSURE</h2>
       <div class="desktop-holder">
       <textarea id="license" rows="8" cols="80" placeholder="Licences"></textarea>
       <textarea id="board-cert" rows="8" cols="80" placeholder="Board Certifications"></textarea>
       <textarea id="other-cert" rows="8" cols="80" placeholder="Other Certifications"></textarea>
     </div>
     <h2>WORK HISTORY</h2>
       <textarea id="work-history" rows="8" cols="80" placeholder="Work History"></textarea>

         <input id="submit" type="submit" value="Submit">
     <h1 id="error">Please Fill in All the Fields</h1>
        <a id="cancel" href="doctor-page-bio.php">Cancel</a>
   </form>

 </div>
</body>
</html>
