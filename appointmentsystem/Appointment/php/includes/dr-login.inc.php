<?php
 include '../database/config.php';
 include '../database/db.php';
    $fullname = $_POST['fullname'];
    $pwd = $_POST['pwddr'];
    $rows = array();

      $sql="SELECT * FROM doctors WHERE name=?";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt,$sql)) {
          exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $fullname);
        mysqli_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
          if ($row = mysqli_fetch_assoc($result)) {
            $pwdCheck = password_verify($pwd,$row['pwd']);
            if ($pwdCheck == true ) {
            // if ($pwd ==  $row['pwd']) {
            session_start();
                $_SESSION['name']= $row['name'];
                $_SESSION['drid']= $row['id'];
                $success= ['success'=>'success'];
                echo json_encode($success);
            } elseif($pwdCheck == false ){
              $error = ['pass'=>'password do not match!'];
              echo json_encode($error);
            }

           } else {
              $error = ['nouser'=>'no user detected or empty fields'];
              echo json_encode($error);
           }

      }



 ?>
