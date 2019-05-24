<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Seoul');
$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, 'igiftu');

$thing = serialize($_POST['about']);

$kakao_id = mysqli_real_escape_string($conn, $_SESSION['id']);
$date = date("Y-m-d");
$title = mysqli_real_escape_string($conn, $_POST['title']);
$tab_no = $_GET['id']; //이벤트 번호

echo $date;
$sql = "INSERT INTO stu_personal_story (kakao_id,post_date,title,post,tab_no)
VALUES('".$kakao_id."', '".$date."', '".$title."', '" . mysqli_real_escape_string($conn, $thing) . "', '".$tab_no."')";
$result = mysqli_query($conn, $sql);

header('Location: http://igift.handong.edu/igiftu/STU_personal_story.php?id='.$tab_no);


?>
