<?php

$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, "igiftu");
$coupon_no = $_POST['c_no'];
$is_deposit = $_POST['is_deposit'];
$is_used = $POST['is_used'];

if($is_deposit){
  echo "입금";
} else if($is_used){
  echo "사용";
} else{
  $result0 = mysqli_query($conn, "DELETE FROM coupon WHERE coupon_no=$coupon_no");
  $result1 = mysqli_query($conn, "DELETE FROM purchase_history WHERE coupon_no=$coupon_no");
}
 ?>
