<?php
require '../database/config.php';
require '../database/db.php';

$name = $_POST['name'];

  $sql = "SELECT sun,mon,tue,wed,thu,fri,sat FROM doctors WHERE name=?";
  $stmt = mysqli_stmt_init($conn);
  $rows = array();
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "error preparing sql";
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $name);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
          $rows[] = $row;
        }
          echo json_encode($rows);
    }

 ?>
