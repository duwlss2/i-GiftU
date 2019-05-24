<?php
$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, 'igiftu');

$number = mysqli_real_escape_string($conn, $_POST['number']);
$restaurant = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE from $restaurant where menu = '".$number."'";
$result = mysqli_query($conn, $sql);

header('Location: admin_main2.php?start=1#menu');
?>
