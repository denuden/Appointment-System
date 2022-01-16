<?php
  include '../database/config.php';
  include '../database/db.php';
  session_start();
  $id = $_SESSION['id'];
  $pwd = $_POST['pwd'];

  $hashed = password_hash($pwd, PASSWORD_DEFAULT);

  $sql="UPDATE user_client SET pwd=? WHERE id=?";
  $stmt=mysqli_stmt_init($conn);

  mysqli_stmt_prepare($stmt,$sql);
  mysqli_stmt_bind_param($stmt, "si", $hashed,$id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_free_result($stmt);
  echo json_encode($id);
 ?>
