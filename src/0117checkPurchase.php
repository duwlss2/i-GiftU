<?php
session_start();
$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, "igiftu");
// $kakao_id = mysqli_real_escape_string($conn, $_SESSION["id"]);  //주문하는 사람의 카카오 아이디
// $place = mysqli_real_escape_string($conn, $_SESSION['restaurant']); //음식점 이름
// $menu = mysqli_real_escape_string($conn, $_SESSION['menu']);  //메뉴번호
$_SESSION['message'] = mysqli_real_escape_string($conn, $_POST['message']);
$_SESSION['deposit'] = mysqli_real_escape_string($conn, $_POST['deposit']);
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">

    <title>IGiftU 결제확인</title>

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
      </style>
  </head>
<body>
  <!-- <body style="overflow: hidden"> -->

    <header>
      <nav style="height: 50px">
        <div class="nav-wrapper" style="padding-left:15px; background-color:#005e39">
          <div class="col s12">
            <a href="#!" class="breadcrumb">결제</a>
            <a href="#!" class="breadcrumb">입금계좌</a>
          </div>
        </div>
      </nav>
    </header>



    <main class="center-align">

    <div class="row" style="margin-bottom : -20px">
        <div class="col s12 m12 l6 left-align" style="display: inline-block; float: none">
            <p style="margin-left: 5px; font-size:18px; margin-top:15px; margin-bottom:0"><b>지금 바로 입금해주세요.</b></p>
            <p style="margin-left: 5px; margin-top: 0; color:#9e9e9e; margin-bottom:21px"><small>아래계좌로 입금 후 확인 버튼을 누르시면 쿠폰이 발송됩니다.</small></p>
        </div>
    </div>

    <div class="row" style="margin-bottom : 0;">
      <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none">
        <div class="card-panel" style="padding-top: 0px; padding-bottom:0">
            <table class="bordered" style="font-size: 15px">
                <tbody>
                    <tr>
                        <td class="left-align"><b>입금계좌</b></td>
                        <td class="right-align">01043398728</td>
                    </tr>
                    <tr>
                        <td class="left-align"><b>예금주</b></td>
                        <td class="right-align">맘스카페</td>
                    </tr>
                    <tr style="border-bottom : 0">
                        <td class="left-align"><b>금액</b></td>
                        <td class="right-align">3500원</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="card-panel hoverable black-text navbar-fixed-bottom" style="padding-top: 15px; background-color:#dfaf43">
            <span style="font-size:20px"><b>반드시 입금 후 누르세요.</b></span>
            <ul class="center-align" style="margin-top: 4px; font-size:16px">
                <li>입금되지 않은 쿠폰은 자동 삭제 처리됩니다.</li>
            </ul>
            <form action="process2.php" method="post">
              <button class="btn waves-effect waves-light hoverable col s12 m12 l12" type="submit" name="action" style="display: inline-block; float: none; height:54px; font-size: 27px; background-color:#005e39">쿠폰 보내러가기
              </button>
            </form>
        </div>
      </div>
    </div>
    </main>


      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>