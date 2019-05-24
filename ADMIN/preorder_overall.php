<?php
  date_default_timezone_set('Asia/Seoul');
  $conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
  mysqli_select_db($conn, "igiftu");

  $result = mysqli_query($conn, "SELECT * FROM preorder order by preorder_time asc "); // 오늘꺼 다 가져옴
  $time = DATE("h:i:s",time());

  $sql = "SELECT * FROM preorder order by number desc limit 1";  //마지막 쿠폰 번호
  $result2 = mysqli_query($conn, $sql);
  $last_order = mysqli_fetch_assoc($result2);

  $sql = "SELECT total FROM preorder_money order by date desc limit 1";  //어제까지 total
  $result3 = mysqli_query($conn, $sql);
  $total = mysqli_fetch_assoc($result3);
  ?>

<!DOCTYPE html>
<html lang="ko">
  <!-- <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  </head>
  <style>

      td{
          padding:0;
      }
    </style>
<body>
      <p style="margin-bottom : 10px; padding:10px; font-size:15px" class="left-align">
        오늘 전체 주문 : <?php echo  $last_order['number']; ?>건 &emsp;&emsp;&emsp;
        어제까지 총 판매 : <?php echo $total['total']; ?>건 &emsp;&emsp;&emsp;
        <a type = "button" href="preorder_excel.php" style="background-color: #005e39;"class="waves-effect waves-light btn">
        <i class="material-icons left">settings_power</i>예약 주문 내역 저장하기</a>
      </p>

      <table class="bordered">
        <tr>
          <td width = 100px style="padding-left:20px">주문번호</td>
          <td width = 100px style="padding-left:20px">주문시간</td>
          <td width = 160px style="padding-left:30px">메뉴</td>
          <td width = 80px style="padding-left:10px">수량</td>
          <td width = 150px style="padding-left:35px">메세지</td>
          <td width = 100px style="padding-left:10px">판매여부</td>
          <td style="padding-left:20px"><b>주문자 정보</b></td>
        </tr>
      </table>
      <?php
      while($row = mysqli_fetch_assoc($result)){
      $phpdate = strtotime( $row['preorder_time'] );
      $mysqldate = date( 'H:i', $phpdate );?>
        <table class="bordered">
          <tr>
            <td width = 110px style="padding-left:40px"><?php echo $row['number'];?></td>
            <td width = 80px style="padding-left:20px"><?php echo $mysqldate; ?></td>
            <td width = 200px style="padding-left:30px"><?php echo $row['menu'];?></td>
            <td width = 80px style="padding-left:10px"><?php echo $row['amount'];?></td>
            <td width = 150px style="padding-left:20px"><?php echo $row['message']; ?></td>
            <td width = 80px style="padding-left:20px"><p>
              <?php if($row['sell']=="1"){
                 $checked = 'checked="checked"';  //팔았으면 체크해서 나온다.
               } else {
                 $checked = '""';
               } ?>
              <input type="checkbox" id="<?php echo $row['number']; ?>" <?php echo $checked; ?> />
              <label for="<?php echo $row['number']; ?>"></label>
            </p>
          </td>
            <td style="padding-left:20px"><?php echo $row['user'];?></td>
        </table>
    <?php  } ?>

      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>
