<?php
  session_start();
  $conn = mysqli_connect("127.0.0.1", "root", "dnwnchdnjf206");
  mysqli_select_db($conn, "igiftu");
  $kakao_id = mysqli_real_escape_string($conn, $_SESSION["id"]);

  $sql = "SELECT * FROM user WHERE kakao_id='".$kakao_id."'"; //개인정보
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  ?>


<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->


    <title>회원정보수정</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  </head>
<body>
  <!-- <body style="overflow: hidden"> -->

    <header>
     <div class="navbar-fixed" style="z-index: 9999;">
          <nav role="navigation" style="background-color: #005e37">
            <div class="nav-wrapper container center-align" style="font-size:25px">개인정보수정
            </div>
          </nav>
      </div>
    </header>



    <main class="center-align">

        <form class="form-horizontal" action="member_edit.php" method="POST">

        <div class="row">
          <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none">

              <div class="row valign-wrapper" style="margin:0">
                <div class="col s3 m2 l2" style="padding-right:0; margin-top:30px">
                  <img src="<?php echo $_SESSION['thumb']; ?>" alt="카카오톡 프로필사진" class="circle responsive-img"> <!-- notice the "circle" class -->
                </div>
                <div class="col s9 m8 l7">
                        <?php echo $row['name']; ?>
                </div>
              </div>
          </div>
        </div>
        <div class="row" style="margin-bottom : -5px; margin-top: -10px">
            <div class="col s12 m12 l6 left-align" style="display: inline-block; float: none">
                <p style="margin:0; font-size:22px"><b>개인정보</b></p>
            </div>
        </div>

        <div class="row" style="margin-bottom:5px">
          <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none">
                휴대폰:<input id="phone" name="phone_no" type="text" style="margin:5px" value="<?php echo $row['phone']; ?>">
            </div>
        </div>

        <div class="row" style="margin-bottom : -5px; margin-top: -10px">
            <div class="col s12 m12 l6 left-align" style="display: inline-block; float: none">
                <p style="margin:0; font-size:22px"><b>계좌정보</b></p>
            </div>
        </div>

        <div class="row" style="margin-bottom:5px">
          <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none">
                <label for="name">예금주명:<input id="name" name="holder" type="text" style="margin:5px" value="<?php echo $row['holder']; ?>"></label>
                환불은행:<input id="bank" name="bank" type="text" style="margin:5px" value="<?php echo $row['bank']; ?>">
                환불계좌:<input id="account" name="account_no" type="text" style="margin:5px" value="<?php echo $row['account_no']; ?>">
            </div>
        </div>


        <div class="row" style="background-color: #e7e7e7">
          <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none">
                계좌정보가 필요한 이유!!<br>
                ~~~ 설명 들어갈곳 ~~~<br>
                <a type="submit" class="waves-effect waves-light btn-large" style="background-color:#005735; margin-bottom:20px; margin-top:10px">수정하기</a>
          </div>
        </div>
        </form>
    </main>

      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>
