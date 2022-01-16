<?php
  session_start();
  session_unset();
  session_destroy();
require '../database/config.php';
  header("Location: ../../index.php");
  exit();
 ?>
