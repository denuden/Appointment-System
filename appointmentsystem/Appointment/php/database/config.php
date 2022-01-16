<?php
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'appointment_db');
  define('DB_HOST', 'localhost');

  // for debugging purposes
  function debug_to_console($data) {
      $output = $data;
      if (is_array($output))
          $output = implode(',', $output);

      echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }
 ?>
