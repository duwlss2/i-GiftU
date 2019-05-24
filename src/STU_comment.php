<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Seoul');
$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, 'igiftu');

$kakao_id = mysqli_real_escape_string($conn, $_SESSION['id']);
$post_no = mysqli_real_escape_string($conn, $_GET['id']);
$post_date = date("Y-m-d H:i:s");
$post = mysqli_real_escape_string($conn, $_POST['post']);

echo $kakao_id.$post.$date.$post_date.$post_no;

$sql = "INSERT INTO stu_comment (kakao_id,post_date,post_no,post)
VALUES('".$kakao_id."','".$post_date."','".$post_no."','".$post."')";
$result = mysqli_query($conn, $sql);

echo "<script>alert(\"댓글이 등록되었습니다.\");</script>";
header('Location: http://igift.handong.edu/igiftu/STU_post.php?id='.$post_no);

?>
