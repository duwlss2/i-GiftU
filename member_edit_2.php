<?php
session_start();
$conn = mysqli_connect("localhost","root","GYQLS1494");
mysqli_select_db($conn, "igiftu");
//$kakao_id = mysqli_real_escape_string($conn, $_SESSION["id"]);
$kakao_id ="999";
$name = mysqli_real_escape_string($conn, $_POST['name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$holder = mysqli_real_escape_string($conn, $_POST['holder']);
$bank = mysqli_real_escape_string($conn, $_POST['bank']);
$account_no = mysqli_real_escape_string($conn, $_POST['account_no']);


$sql = "UPDATE user SET name='".$name."', phone='".$phone."', holder='".$holder."' ,
bank='".$bank."', account_no='".$account_no."' where kakao_id='".$kakao_id."'";
$result = mysqli_query($conn, $sql);

header('Location: http://localhost:81/igiftu/login/member_edit_1.php');
?>
