<?php
  session_start();
  $conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
  if (!$conn) {
    die("현재 서버점검 중입니다. 문제 지속시 igiftu@gmail.com으로 문의해주세요.");
  }
  mysqli_select_db($conn, "igiftu");
  date_default_timezone_set('Asia/Seoul');

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
        p{margin:0}
    </style>

    <script type='text/javascript'>
    Kakao.init('afef33752335de3b77ada62abd43237b');
    function kakaolink() {
        var url = "<?php echo $kakao_id.'&no='.$c_no; ?>";
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
<body style="background-color:#f5f5f5">
  <!-- <body style="overflow: hidden"> -->
  <header>
    <nav style="height: 55px">
      <div class="nav-wrapper" style="padding-left:15px; background-color:#005e39">
        <div class="col s12">
          <a href="#!" class="breadcrumb">결제완료  </a>
        </div>
      </div>
    </nav>
  </header>

    <main class="center-align">
        <div class="row" style="margin-bottom:80px; margin-top:100px">
            <div class="col s12 m12 l6" style="display: inline-block; float: none">
               <div class="card hoverable" style="padding: 0 5px 40px">
                    <img class="circle " src="http://igiftu.handong.edu/igiftu/img/moms_background.png" alt="화면" style="width:80px; height:80px; margin-top:-40px">
                    <p style="font-size:16px; margin-top:15px">
                        <b>당신의 소중한 마음이 전달되었습니다.</b>
                    </p>
                
                    <p style="margin-top:45px; font-size:14px">카카오톡으로 메세지 전송이 실패했다면?</p>
                    <p style="font-size:12px; color: #a1a1a1"><b style="font-size:13px;color: #dfaf43">"다시보내기"</b>를 눌러 다시 보내주세요.</p>
                    <p style="font-size:12px; color: #a1a1a1">이 페이지를 떠나면 더 이상 쿠폰을 보낼 수 없습니다.</p>
                </div>
                
            </div>
        </div>
    </main>

    <footer class="navbar-fixed-bottom">
       <table  style="width:100%; height:50px">
           <tr>
               <td style="padding:0; width:50%">
                   <a class="center-align" href="#" onClick = "kakaolink();"><button class="btn waves-effect waves-light" name="action" style="background-color:#dfaf43; height:50px; font-size:18px; border-radius:0; width:100%; color:#f1fff1">다시보내기
                   </button></a>
               </td>
               <td style="padding:0; width:50%">
                   <a class="center-align" href="menu.php"><button class="btn waves-effect waves-light" name="action" style="background-color:#005e39; height:50px; font-size:18px; border-radius:0; width:100%; color: #f1fff1">홈으로 이동
                   </button></a>
               </td>
           </tr>
       </table>
    </footer>

    <script type='text/javascript'> kakaolink(); </script>


      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>
