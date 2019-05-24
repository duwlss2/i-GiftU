<?php
session_start();
ob_start();
$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, 'igiftu');

$id = mysqli_real_escape_string($conn, $_GET['id']);

switch($id){
  case '1' : {
    $post_no = mysqli_real_escape_string($conn, $_GET['post_no']);
    $sql = "DELETE from mission_post where post_no = '".$post_no."'";
    $result = mysqli_query($conn, $sql);
    header('Location: http://igiftu.handong.edu/igiftu/Hope_Communityintro.php?start=1#test1');
     break; }
  case '2' : {

    $kakao_id = mysqli_real_escape_string($conn, $_SESSION['id']);
    $sql = "SELECT com_no FROM user WHERE kakao_id = '".$kakao_id."'"; //저장할곳 access
    $result = mysqli_query($conn, $sql);
    $no = mysqli_fetch_array($result);
    $com_no = mysqli_real_escape_string($conn, $no['0']);


    $sql = "DELETE from community where com_no = '".$com_no['0']."'";
    $result = mysqli_query($conn, $sql);
    header('Location: http://igiftu.handong.edu/igiftu/Hope_Communityintro.php?start=2#test2');
    break; }
}


?>
