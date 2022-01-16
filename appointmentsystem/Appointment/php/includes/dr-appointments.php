<?php
  include '../database/config.php';
  include '../database/db.php';

session_start();
$id = $_SESSION['drid'];

$sql2 = "SELECT status FROM doctors WHERE id = ?";
$stmt= mysqli_stmt_init($conn);

  mysqli_stmt_prepare($stmt, $sql2);

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $query = mysqli_stmt_get_result($stmt);

$st = mysqli_fetch_assoc($query);

$status = $st['status'];


  $sql="SELECT user.fname,user.mname,user.lname,user.age,user.sex,app.timeofappointment,app.timestamp,app.id
  FROM user_client AS user INNER JOIN appointment AS app ON user.id = app.user_id WHERE app.doctor_id =? ORDER BY app.id DESC LIMIT ?";
    //tbl user_client and tbl appointment                 user.id == rbl user_client id primary key
                                                    //    app.user_id == tbl appointment user_id foreignkey
      //user_client == user
      //appointment== app

  $stmt= mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt, $sql);

      mysqli_stmt_bind_param($stmt, "ii", $id,$status);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        echo json_encode($data);

 ?>
