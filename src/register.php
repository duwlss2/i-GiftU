<?php
  session_start();
  ?>


<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->


    <title>IGiftU 회원가입</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  </head>
<body>
  <!-- <body style="overflow: hidden"> -->

    <header>
     <div class="navbar-fixed" style="z-index: 9999;">
          <nav role="navigation" style="background-color: #005735">
            <div class="nav-wrapper container center-align" style="font-size:25px">회원가입
            </div>
          </nav>
      </div>
    </header>



    <main class="center-align">


        <div class="row" style="margin-bottom : -10px; margin-top:15px">
            <div class="col s12 m12 l6 left-align" style="display: inline-block; float: none">
                <p style="margin:0; font-size:22px"><b>개인정보*</b></p>
            </div>
        </div>

        <form class="form-horizontal" action="extraprocess.php" method="POST">

        <div class="row">
          <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none">

              <div class="row valign-wrapper" style="margin:0">
                <div class="col s3 m2 l2" style="padding-right:0; margin-top:30px;">
                  <img src="<?php echo $_SESSION['thumb']; ?>" alt="카카오톡 프로필사진" class="circle responsive-img"> <!-- notice the "circle" class -->
                </div>
                <div class="col s9 m8 l7">
                        <input id="name" name="name" type="text" style="margin:5px" placeholder="실명">
                        <input id="name" name="phone" type="text" style="margin:5px" placeholder="핸드폰 번호('-'없이)">
                </div>
              </div>
          </div>
        </div>

        <div class="row" style="margin-bottom : -5px; margin-top: -10px">
            <div class="col s12 m12 l6 left-align" style="margin-top:30px; display: inline-block; float: none">
                <p style="margin:0; font-size:22px"><b>환불계좌정보</b></p>
            </div>
        </div>

        <div class="row" style="margin-bottom:5px">
          <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none">
                <input id="name" name="holder" type="text" style="margin:5px" placeholder="예금주">
                <input id="name" name="bank" type="text" style="margin:5px" placeholder="은행명">
                <input id="name" name="account_no" type="text" style="margin:5px" placeholder="계좌번호">
                <br><br>
                <div style="margin-left:30px">
                    <input type="checkbox" id="chigup"><label for="chigup" style="line-height:23px; padding-left:26px; color:black; font-size:18px">개인정보 수집 및 이용</label><a href="register_check.html" style="font-size:10px; color:#aaa; margin-left:10px" target="_blank">약관보기</a>
                </div>
            </div>
        </div>


        <div class="row">
          <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none ">
                <button type="submit" class="waves-effect waves-light btn-large" style="width:50%; font-size:17px; margin-bottom:20px; margin-top:20px; background-color:#003c1f; height:50px">가입하기</a>
            </div>
        </div>
        </form>
    </main>

      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script>  $(document).ready(function(){
    $('.collapsible').collapsible();
    });</script>
  </body>
</html>