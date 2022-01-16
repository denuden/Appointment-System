<?php
session_start();
include '../database/config.php';
include '../database/db.php';
$drid = $_SESSION['drid'];
$sql = "UPDATE doctors SET status =0 WHERE id=?"; //updates status to 0 because doctor have seen it by opening his account
$stmt= mysqli_stmt_init($conn);

  mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_bind_param($stmt, "i", $drid);
    mysqli_stmt_execute($stmt);

 ?>
