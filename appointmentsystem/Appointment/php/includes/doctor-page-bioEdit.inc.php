<?php
include '../database/config.php';
include '../database/db.php';

session_start();
$id = $_SESSION['drid'];


  $sun = $_POST['sun'];
  $mon = $_POST['mon'];
  $tue = $_POST['tue'];
  $wed = $_POST['wed'];
  $thu = $_POST['thu'];
  $fri = $_POST['fri'];
  $sat = $_POST['sat'];

  $bio = $_POST['bio'];
  $workAuthorize = $_POST['workAuthorize'];
  $workExp = $_POST['workExp'];
  $residency = $_POST['residency'];
  $internship = $_POST['internship'];
  $medschool = $_POST['medschool'];
  $license = $_POST['license'];
  $boardCert = $_POST['boardCert'];
  $otherCert = $_POST['otherCert'];
  $workHistory = $_POST['workHistory'];


if (empty($sun) && empty($mon) && empty($tue) && empty($wed)&& empty($thu) && empty($fri) && empty($sat)&& empty($bio) && empty($workAuthorize) && empty($workExp) && empty($residency)&& empty($internship) && empty($medschool) && empty($license)&& empty($boardCert) && empty($otherCert) && empty($workHistory) ) {
  header('Location: ../../pages/doctor-page-bioEdit.php?error=emptyfields');
  exit();
} else {
  $sql= "UPDATE doctors
  SET
    sun=?,
    mon=?,
    tue=?,
    wed=?,
    thu=?,
    fri=?,
    sat=?,
    bio=?,
    workAuthorize=?,
    workexp=?,
    residency=?,
    internship=?,
    medschool=?,
    license=?,
    boardCert=?,
    otherCert=?,
    workHistory=?
    WHERE id=?";
      $stmt= mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt,$sql);

      mysqli_stmt_bind_param($stmt, "sssssssssssssssssi",$sun,$mon,$tue,$wed,$thu ,$fri ,$sat,$bio,$workAuthorize ,$workExp,$residency,$internship,$medschool,$license,$boardCert,$otherCert,$workHistory,$id);

    mysqli_stmt_execute($stmt);
}

$arr = array('success');
echo json_encode($arr);
// header('Location ../../pages/doctor-page-bio.php');

 ?>
