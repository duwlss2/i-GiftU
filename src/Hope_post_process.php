<?php
    session_start();
    ob_start();
    date_default_timezone_set('Asia/Seoul');
    $conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
    mysqli_select_db($conn, 'igiftu');

    $kakao_id = mysqli_real_escape_string($conn, $_SESSION['id']);
    $sql = "SELECT com_no FROM user WHERE kakao_id = '".$kakao_id."'"; //글을 쓰는 사람의 com_no를 알아온다
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $com_no = mysqli_real_escape_string($conn, $row['0']);

    $thing = serialize($_POST['about']);

    if($_GET['id'] == '1'){
      $image = serialize($_POST['image']);    //이미지는 id=1일때만 들어온다.
      $date_1 = mysqli_real_escape_string($conn, $_POST['date_1']);
      $date_2 = mysqli_real_escape_string($conn, $_POST['date_2']);
      $title = mysqli_real_escape_string($conn, $_POST['title']);
      // require("HOPE_img.php");

      $sql = "INSERT INTO mission_post (com_no, date_1, date_2,  title, post, main_img) VALUES('" .$com_no. "', '" .$date_1. "', '" .$date_2. "', '".$title."', '" .mysqli_real_escape_string($conn, $thing)."', '".mysqli_real_escape_string($conn, $image)."')";
      $result = mysqli_query($conn, $sql);
      if(!$result){
        echo 'no insert';
      } else if($result){
        header('Location: http://igiftu.handong.edu/igiftu/HOPE_CommunityIntro.php?id='.$com_no);
      }
    } else if($_GET['id'] == '2'){
      $sql = "UPDATE community SET com_intro='".mysqli_real_escape_string($conn, $thing)."' where com_no='".$com_no."'";
      $result = mysqli_query($conn, $sql);
      if($result){
        //header('Location: http://igiftu.handong.edu/igiftu/HOPE_CommunityIntro.php?id='.$com_no);
      }
    }


?>
