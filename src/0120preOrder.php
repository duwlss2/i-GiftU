<?php
session_start();
if((!$_SESSION['admin2']) || ($_SESSION['admin2'] != 'OK~')){
  header('Location: preorder.php');
}

ob_start();
  date_default_timezone_set('Asia/Seoul');
  $conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
  mysqli_select_db($conn, "igiftu");

  $order_time = date("Y-m-d H:i:s", time() - 60*30); //30분 전
  $sell = "0"; //안 판거
  $sql = "SELECT * FROM preorder WHERE (preorder_time > "."'$order_time') && (sell = '$sell') order by preorder_time asc ";
  $result = mysqli_query($conn, $sql); // WHERE time > curdate();
  $time = DATE("h:i:s",time());

  $sql = "SELECT number FROM preorder order by number desc limit 1";  //마지막 쿠폰 번호
  $result2 = mysqli_query($conn, $sql);
  $last_order = mysqli_fetch_assoc($result2);

  if($last_order['number'] == "1" || !$_COOKIE['order'])
  {
    setCookie('order','1'); // 첫번째 주문이 들어오면 쿠키 생성
    echo '<iframe src="preorder_sound.php" width="0" height="0"></iframe>'; //쿠키비교해서 작으면 소리 띄운다.
  } else{
    if($_COOKIE['order'] < $last_order['number']){
      echo '<iframe src="preorder_sound.php" width="0" height="0"></iframe>'; //쿠키비교해서 작으면 소리 띄운다.
      setCookie('order',$last_order['number']);
    }
  }

  ?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  </head>
  <script>
  var now = new Date(<?php echo time(); ?>*1000);
  Number.prototype.zf = function(){return (this > 9 ? '' : '0') + this;};
    function startTime() {
      now.setSeconds(now.getSeconds() + 1);
      var h = now.getHours().zf(), m = now.getMinutes().zf(), s = now.getSeconds().zf();
      document.getElementById('time').innerHTML = h + ':' + m + ':' + s;
      setTimeout('startTime()',1000);
  }
  </script>
  <!-- <script language='javascript'>
    window.setTimeout('window.location.reload()',1000*18); //18초마다 리플리쉬 시킨다 1000이 1초가 된다.
  </script> -->

  <style>
      td{
          padding:0;
      }
      main, footer {padding-left: 300px;}
          @media only screen and (max-width : 992px){main, footer{padding-left: 0;}}
         .topbar{padding-left: 300px}
         @media only screen and (max-width: 992px){.topbar{padding-left:0}}
  </style>

<body onload="startTime()">
      <header>
        <div class="navbar-fixed" style="z-index: 9999;">
          <nav role="navigation" style="background-color:#005e39">
        
            <!-- 제목 태그-->
            <div class="nav-wrapper topbar center-align" style="margin:0;width:100%">
                <a id="logo-container" href="#" class="brand-logo"><div id="time"></div></a>
                
                <ul id="slide-out" class="side-nav fixed">
                    <li><a href="admin_main2.php">전체주문</a></li>
                    <li><a href="preorder_datadelete.php">오늘마감</a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse">
                    <i class="material-icons">menu</i>
                </a>
          </div>
        </nav>
      </div>
    </header>

    <main class="center-align">

        <div class="row">
        <div class="col s12 m5 l3" style="display: inline-block; float: none; padding:5px; padding-top:0; background-color:#c7c7c7">

      <?php
      while($row = mysqli_fetch_assoc($result)){
        $phpdate = strtotime( $row['preorder_time'] );
        $mysqldate = date( 'H:i', $phpdate );
        $number = $row['number'];

        //made여부확인
        $sql3 = "SELECT * FROM preorder WHERE number =" .$number;
        $result3 = mysqli_query($conn, $sql3);
        $row3= mysqli_fetch_assoc($result3);
        $checked = ($row3['made']) ? 'checked = "checked"' : '';
        ?>


            <div class="card-panel" style="padding: 15px; margin:0; margin-top:5px">
              <table>
                  <tr style="border-bottom:1px solid #e7e7e7">
                      <td class="red-text" style="font-size:30px"><b><?php echo $mysqldate ;?>&nbsp;</b>
                              <input type="checkbox" class = "<?php echo 'made'.$number;?>" value="<?php echo $number; ?>" <?php echo $checked; ?> />
                              <label class = "black-text <?php echo 'labelmade'.$number;?>" for="<?php echo 'made'.$number;?>"></label>
                      </td>
                      <td class="right-align" style="font-size:20px"><b>#<?php echo $row['number'];?></b></td>
                  </tr>
                  <tr>
                      <td style="font-size:20px"><b><?php echo $row['menu'];?><?php echo $row['choice'];?>
                        <?php echo $row['amount'];?>잔</b></td>
                      <td rowspan="3" style="font-size:11px; padding:0" class="right-align">
                          <p style="margin-top:0 ;margin-bottom:-8px">
                            <input type="checkbox" class = "<?php echo 'sell'.$number;?>" value="<?php echo $number; ?>" />
                            <label class="red-text <?php echo 'labelsell'.$number;?>" for="<?php echo 'sell'.$number;?>" style="padding-left:24px; font-size:16px"><b>&nbsp;판매</b></label>
                          </p>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2" style="font-size:17px"><?php echo $row['message']; ?></td>
                  </tr>
                  <tr>
                      <td style="font-size:11px"><?php echo $row['user'];?></td>
                      <td style="font-size:11px; padding:0" class="right-align">

                      </td>
                  </tr>
              </table>
            </div>


      <script>
      $(document).ready(function(){
        $('.<?php echo 'labelsell'.$number; ?>').on("click", function(e){
          e.preventDefault();
          var number = $('.<?php echo 'sell'.$number; ?>').val();
          // alert(coupon_no);
          $.ajax({
            type:'POST',
            url:'checkbox.php',
            data: {which:1, number: number},
            success: function(result) {
              location.reload();
              $(this).attr("checked", "checked");
              $(this).prop("checked", true);
              $(this).off("click");

            }
          })
        });

        $('.<?php echo 'labelmade'.$number; ?>').on("click", function(e){
          e.preventDefault();
          var number = <?php echo $number; ?>;
          var obj=$(this);
          $.ajax({
            type:'POST',
            url:'checkbox.php',
            data: {which:2, number: number},
            success: function(result) {
              $(this).off("click");
              if(result === 'cancel'){
                obj.prev().removeAttr("checked");
                obj.prev().prop("checked", false);
                console.log(result);
              }else if(result === 'made'){
                console.log(obj);
                obj.prev().attr("checked", "checked");
                obj.prev().prop("checked", true);
              }// }else alert('관리자에게 문의하세요');
            }
          })
        });
      });
      </script>
    <?php } //while ?>
        </div>
      </div>

    </main>

      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>
