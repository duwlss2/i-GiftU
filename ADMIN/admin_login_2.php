<?php
session_start();
ob_start();

$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, "igiftu");
$name = mysqli_real_escape_string($conn, $_POST['id']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
 $sql = "SELECT * FROM user WHERE bank='".$name."' AND account_no='".$password."'";
 $result = mysqli_query($conn, $sql);

 if($result->num_rows == "0"){
   echo "다시 시도해주세요.";
   echo '<a href="admin.php">돌아가기</a>';
 } else {
      header('Location: admin_main.php');
      $_SESSION['admin1'] = 'OK';
 }
?>
