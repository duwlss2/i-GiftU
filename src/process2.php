<?php
  session_start();
  date_default_timezone_set('Asia/Seoul');
  $conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
  mysqli_select_db($conn, "igiftu");

  //DB - user table에 추가
  $kakao_id = mysqli_real_escape_string($conn, $_SESSION['id']);
  $menu = mysqli_real_escape_string($conn, $_SESSION['menu']);
  $message = mysqli_real_escape_string($conn, $_SESSION['message']);
  $deposit = mysqli_real_escape_string($conn, $_SESSION['deposit']);
  $date = mysqli_real_escape_string($conn, date('Y-m-d H:i:s'));
  $place = mysqli_real_escape_string($conn, $_SESSION['restaurant']);

  $sql = "INSERT INTO purchase_history (kakao_id,menu,message,purchase_date,deposit_name,restaurant)
          VALUES('".$kakao_id."', '".$menu."', '".$message."', '".$date."', '".$deposit."', '".$place."')";
  $result = mysqli_query($conn, $sql);

  //쿠폰일련번호는 세션에 저장
  $c_no = mysqli_insert_id($conn);
  $_SESSION['coupon_no'] = $c_no;

  //DB - coupon table에 추가
  $sql = "INSERT INTO coupon (coupon_no) VALUES("."$c_no".')';
  $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>

     <!-- 카카오톡 링크보내기 -->
     <script type='text/javascript'>
     function kakaolink() {
         var url = "<?php echo $kakao_id.'&no='.$c_no; ?>";
         Kakao.init('afef33752335de3b77ada62abd43237b');
         Kakao.Link.sendTalkLink({
           label: '소중한 선물이 도착했어요♥',
           image: {
             src: 'http://igiftu.handong.edu/igiftu/img/moms_background.png',
             width: '300',
             height: '200'
           },
           webButton: {
             text: '받은쿠폰 확인하러 가기',
             url: 'http://igiftu.handong.edu/igiftu/coupon2.php?id='+url
           }
         });
       }
     </script>
     <?php
       //echo "";
       //header('Location:menu.php');
     ?>
  </head>
  <body>
    <a href="menu.php"><button id='goback' type="button" name="button">메인페이지</button></a>
    <script type='text/javascript'> kakaolink(); </script>
  </body>
</html>
