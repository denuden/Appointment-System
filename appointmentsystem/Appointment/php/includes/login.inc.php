<?php
require '../database/config.php';
require '../database/db.php';


  $uid = $_POST['uid'];
  $pwd = $_POST['pwd'];

  if (empty($uid) || empty($pwd)) {
    $error =['emptyfields'=>'Please fill in all the fields'];
    echo json_encode($error);
    exit();
  } else {
    $sql = "SELECT * FROM user_client WHERE uid=?";
    $stmt= mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $uid);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
          if ($row = mysqli_fetch_assoc($result)) {
            $admin = $row['uid'];
            $pwdCheck = password_verify($pwd, $row['pwd']);

              if ($pwdCheck == false) {
                $error = ['passwordnotmatch' => 'Password do not match'];
                echo json_encode($error);
                exit();
              } elseif ($pwdCheck == true) {
                session_start();
                $_SESSION['id']= $row['id'];
                $_SESSION['fname']= $row['fname'];
                $_SESSION['lname']= $row['lname'];
                $_SESSION['mname']= $row['mname'];
                $_SESSION['uid']= $row['uid'];
                $_SESSION['email']= $row['email'];
                $_SESSION['contact']= $row['contact'];
                $_SESSION['address']= $row['address'];
                $_SESSION['sex']= $row['sex'];
                $_SESSION['age']= $row['age'];
                $_SESSION['bday']= $row['bday'];
                $_SESSION['allergy']= $row['allergy'];
                $_SESSION['disable']= $row['disable'];
                $error = ['success' => 'success'];
                  echo json_encode($error);
                exit();
              }

          } else {
            $error = ['nouser' => 'No user match detected'];
              echo json_encode($error);
            exit();
          }
      }
  }
  mysqli_stmt_close($stmt);   //closes everything to save resource
  mysqli_close($conn);

 ?>
