<?php
session_start();
$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, 'igiftu');

$number = mysqli_real_escape_string($conn, $_POST['number']);
$menu = mysqli_real_escape_string($conn, $_POST['menu']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$restaurant = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "SELECT * FROM $restaurant WHERE menu = '".$number."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($result->num_rows == "0")   //create
  {
    $sql = "INSERT INTO $restaurant (menu,name,price,description) VALUES('".$number."', '".$menu."', '".$price."', '".$description."')";
    $result = mysqli_query($conn, $sql);

  } else                       //edit
  {
    $sql = "UPDATE $restaurant SET name='".$menu."', price='".$price."', description='".$description."' where menu='".$number."'";
    $result = mysqli_query($conn, $sql);
  }
header('Location: admin_main2.php?start=1#menu');
?>
