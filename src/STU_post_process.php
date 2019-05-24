<?php
    session_start();
    ob_start();
    date_default_timezone_set('Asia/Seoul');
    $conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
    mysqli_select_db($conn, 'igiftu');

    $tab_name = mysqli_real_escape_string($conn, $_GET['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    echo $_POST['image'].'<br><br>';
    //var_dump($_POST['image']);
    //echo gettype($_POST['image']);
    $image = serialize($_POST['image']);
    $thing = serialize($_POST['about']);
    $date = date("Y-m-d");

    //$decoded = json_decode($_POST['image']);
    //echo var_dump($decoded);
    //echo '<br><br>from json: '.$decoded->ops[0]->insert->image;
    //echo '$decoded: '.$decoded.'<br>';
    //echo '<br>from json: '.var_dump($decoded->insert).'<br>';

    $sql = "INSERT INTO stu_post (tab_name, main_img, title, post, post_date)
    VALUES('" .$tab_name. "', '".mysqli_real_escape_string($conn, $image)."', '" .$title."', '".mysqli_real_escape_string($conn, $thing)."', '".$date."')";
    $result1 = mysqli_query($conn, $sql);
    if(!$result1){
      echo 'no insert';
    }

    if($result1){
      $post_no = mysqli_insert_id($conn);
      // $sql = "SELECT post_no FROM stu_post order by post_no desc limit 1";
      // $result2 = mysqli_query($conn, $sql);
      // $row2 = mysqli_fetch_assoc($result2)
      header('Location: http://igift.handong.edu/igiftu/STU_post.php?id='.$post_no);
    } else {
      //echo "<script>
      //    alert('게시물을 올리지 못했습니다. igift@gmail.com으로 문의주세요.');
      //    history.back(-1);
      //  </script>";
       exit();
    }
?>
