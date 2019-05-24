<?php
session_start();
ob_start();
$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, 'igiftu');
$id = mysqli_real_escape_string($conn, $_GET['id']);
$post_no = mysqli_real_escape_string($conn, $_GET['post_no']);

$sql = "DELETE from stu_post where post_no = '".$post_no."'";
$result = mysqli_query($conn, $sql);
header('Location: http://igift.handong.edu/igiftu/STU_mainPage.php?start=1#test1');



?>
