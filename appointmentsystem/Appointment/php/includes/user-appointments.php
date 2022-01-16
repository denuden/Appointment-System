<?php
include '../database/config.php';
include '../database/db.php';

$confirm = $_POST['confirm'];
$appid = $_POST['appid'];

  $sql = "UPDATE appointment SET confirmation=? WHERE id=?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
      exit();
  } else {
    mysqli_stmt_bind_param($stmt, "si", $confirm,$appid);
    mysqli_stmt_execute($stmt);
  }

  echo json_encode($confirm);
  echo json_encode($appid);
  mysqli_stmt_free_result($stmt);
 ?>
