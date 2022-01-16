<?php
session_start();
 include '../database/config.php';
 include '../database/db.php';

$id = $_SESSION['drid'];

if (isset($_POST['submit'])) {
  $file=$_FILES['file'];

//separetes everything
  $fileName= $file['name'];
  $fileTmp= $file['tmp_name'];
  $fileSize= $file['size'];
  $fileError= $file['error'];
  $fileType= $file['type'];

//separates extension
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));  // the extension E.G.   jpg

  $allowed = ['jpg', 'jpeg', 'png'];

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError ===0) {
      if ($fileSize < 1000000) {
        $fileNameNew = "profile".$id."_".time().".".$fileActualExt;
        $fileDestination= '../../images/uploads-dr/'.$fileNameNew;

        move_uploaded_file($fileTmp, $fileDestination);
        $sql = "UPDATE doctors SET imgstatus=0,imgname=? WHERE id='$id'";
        $stmt= mysqli_stmt_init($conn);

          mysqli_stmt_prepare($stmt, $sql);

            mysqli_stmt_bind_param($stmt, "s", $fileNameNew);
            mysqli_stmt_execute($stmt);
              mysqli_stmt_free_result($stmt);
        header("Location: ../../pages/doctor-page-bio.php");
        exit();
      } else {
        echo "File too large";
      }
    } else{
      echo "There was an error in uploading file";
    }
  }else{
    echo "File not allowed";
  }
}

 ?>
