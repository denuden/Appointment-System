<?php
require '../database/config.php';
require '../database/db.php';


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $bday = $_POST['bday'];
    $allergy = $_POST['allergy'];
    $disable = $_POST['disable'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];


    if (empty($fname) || empty($lname) || empty($mname) || empty($sex) || empty($age) || empty($contact) || empty($uid) ||  empty($email) || empty($bday) || empty($allergy) || empty($disable) ||  empty($address) || empty($pwd) || empty($pwdRepeat)) {
      $error = ['emptyfields' => 'Please fill in all the fields'];
      echo json_encode($error);
      exit();
    } elseif (strlen($age) > 3 || $age <= 0 ) {
      $error = ['ageinvalid' => 'Invalid Age'];
      echo json_encode($error);
      exit();
    } elseif (strlen($contact) !== 11) {
      $error = ['contactnumberistooshortortoolong' => 'Contact Number is too short or too long'];
      echo json_encode($error);
      exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = ['invalidemail' => 'Email is invalid'];
      echo json_encode($error);
      exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/",$uid)) {
      $error = ['invalidusername' => 'Username is invalid'];
      echo json_encode($error);
      exit();
    } elseif ($pwd !== $pwdRepeat) {
      $error = ['passwordnotmatch' => 'Password do not match'];
      echo json_encode($error);
      exit();
    } else {
      $sql = "SELECT uid FROM user_client WHERE uid=?";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $uid);
        mysqli_stmt_execute($stmt);

        $store = mysqli_stmt_store_result($stmt);
        $result= mysqli_stmt_num_rows($stmt);
          if ($result > 0) {
            $error = ['usernametaken' => 'Username already taken'];
            echo json_encode($error);
            exit();
          } else {
            $sql = "INSERT INTO user_client (fname,lname,mname,uid,email,contact,address,sex,age,bday,allergy,disable,pwd) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt= mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
              exit();
            } else {
              $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

              mysqli_stmt_bind_param($stmt, "sssssississss", $fname,$lname,$mname,$uid,$email,$contact,$address,$sex,$age,$bday,$allergy,$disable,$hashedPwd);
              mysqli_stmt_execute($stmt);

              $sql = "SELECT * FROM user_client WHERE uid=?";
              $stmt= mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  exit();
                } else {
                  mysqli_stmt_bind_param($stmt, "s", $uid);
                  mysqli_stmt_execute($stmt);

                  $result = mysqli_stmt_get_result($stmt);
                    if ($row = mysqli_fetch_assoc($result)) {
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

                    $sql = "INSERT INTO profileimg (userid) VALUES (?)";
                    $stmt= mysqli_stmt_init($conn);

                      mysqli_stmt_prepare($stmt, $sql);

                        mysqli_stmt_bind_param($stmt, "i", $row['id']);
                        mysqli_stmt_execute($stmt);
                          exit();
                        } else {
                            exit();
                    }
                }
              exit();
            }
          }
      }
    }
    mysqli_stmt_close($stmt);   //closes everything to save resource
    mysqli_close($conn);





 ?>
