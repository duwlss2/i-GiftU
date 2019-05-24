<?php
$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, 'igiftu');
$coupon_no = $_POST['c_no'];
$is_deposit = $_POST['is_deposit'];
$is_used = $_POST['is_used'];

if($is_used){
  echo "사용";
} else if($is_deposit){
  $depo = 0;
  echo "입금취소";
} else{
  $depo = 1;
  echo "입금확인";
}

$sql = "UPDATE coupon SET is_deposit=$depo WHERE coupon_no=$coupon_no";
$result = mysqli_query($conn, $sql);
 ?>
