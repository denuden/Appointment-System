<?php
session_start();
require '../database/config.php';
require '../database/db.php';

$name = $_POST['name'];
$time = $_POST['time'];
  $user_id = $_SESSION['id'];




$sql1 ="SELECT id FROM doctors WHERE name=?";
  $stmt1 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
      exit();
    } else {
      mysqli_stmt_bind_param($stmt1, "s", $name);
      mysqli_stmt_execute($stmt1);
      $result1= mysqli_stmt_get_result($stmt1);
      $id = mysqli_fetch_assoc($result1); // gets the id of doctor by name
      $dc_id = $id['id'];



      //gets the status for the notification
        $sql2 = "SELECT status FROM doctors WHERE id = ?";
        $stmt2= mysqli_stmt_init($conn);

          mysqli_stmt_prepare($stmt2, $sql2);

            mysqli_stmt_bind_param($stmt2, "i", $dc_id);
            mysqli_stmt_execute($stmt2);
            $stats = mysqli_stmt_get_result($stmt2);
        $status = mysqli_fetch_assoc($stats);


        $currStatus = $status['status'] + 1; //current status



      $sql3 = "UPDATE doctors SET status =? WHERE id=?"; //updates status for notifications
      mysqli_query($conn,$sql3);
      $stmt3= mysqli_stmt_init($conn);

        mysqli_stmt_prepare($stmt3, $sql3);

          mysqli_stmt_bind_param($stmt3, "ii",$currStatus ,$dc_id);
          mysqli_stmt_execute($stmt3);


 // insert the data
      $sql4= "INSERT INTO appointment(doctor_id, user_id, timeofappointment) VALUES (?,?,?)";
        $stmt4 = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt4, $sql4)) {
          exit();
        } else {
          mysqli_stmt_bind_param($stmt4, "iis", $dc_id, $user_id,$time);
          mysqli_stmt_execute($stmt4);

          echo json_encode($dc_id);
        }

    }



 ?>
