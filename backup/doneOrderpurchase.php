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
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>

    <title>주문완료</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <style>
        header, main, footer {padding-left: 300px;}
        @media only screen and (max-width : 992px){header, main, footer{padding-left: 0;}}
        .navbar-fixed-top,
        .navbar-fixed-bottom {
          position: fixed;
          right: 0;
          left: 0;
          z-index: 1030;
        }
        @media (min-width: 768px) {
          .navbar-fixed-top,
          .navbar-fixed-bottom {
            border-radius: 0;
          }
        }
        .navbar-fixed-bottom {
          bottom: 0;
          margin-bottom: 0;
          border-width: 1px 0 0;
        }
    </style>

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



  </head>
<body>
  <!-- <body style="overflow: hidden"> -->
  <?php require("nevbar.php"); ?>
  <main class="center-align">
    <div class="row" style="margin-bottom:0; margin-top:15px">
      <div class="col s12 m12 l6" style="display: inline-block; float: none">
        <div class="card hoverable">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="https://search.pstatic.net/sunny/?src=https%3A%2F%2Fpixabay.com%2Fstatic%2Fuploads%2Fphoto%2F2013%2F02%2F18%2F18%2F36%2Fchristmas-present-83119_960_720.jpg&type=b400">
          </div>
          <div class="card-content">
            <span style="font-size:18px"><b>주문이 완료되었습니다.</b></span>
          </div>
        </div>
      </div>
    </div>

  <div class="row navbar-fixed-bottom center-align" >
    <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none">
      <a href="menu.php"><button class="btn waves-effect waves-light hoverable col s12 m12 l12" name="action" style="background-color:#005e39; height:50px; font-size:17px; margin-bottom:5px">메뉴로 돌아가기
      </button></a>
    </div>
  </div>
  </main>

    <script type='text/javascript'> kakaolink(); </script>


      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>
