<?php
session_start();
$conn = mysqli_connect("localhost","root","GYQLS1494");
mysqli_select_db($conn, "igiftu");

//$kakao_id = mysqli_real_escape_string($conn, $_SESSION["id"]);
$kakao_id = "999";
$sql = "SELECT * FROM user WHERE kakao_id = '".$kakao_id."'";
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

    <title>iGiftU</title>
    <!-- 부트스트랩 -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">

    <style>s
        body{
            padding:5%;
        }

        .effect img {
          position: relative;
          display: inline-block;
          box-shadow: 0px 0px 20px -5px rgba(0, 0, 0, 0.8);
          border-radius: 50%;
          width: 90px;
          height: 90px;
        }

        .control-label{
            vertical-align: middle;
        }

        .form-group > label {
            margin-top: 7px;
        }

      </style>
  </head>

  <body>

    <h3><span class="glyphicon glyphicon-gift" aria-hidden="true"></span>iGiftU - 회원정보 수정</h3>
    <hr>
    <h4><strong>개인정보</strong></h4>
    <form class="form-horizontal" action="member_edit_2.php" method="post">
      <div class="form-group">
        <div class="col-xs-4 col-sm-2 text-right">
        <div class="effect" id="KakaoThumbnail"><img src="<?php echo $_SESSION['thumb']; ?>"></div>

        </div>
          <div class="col-xs-8 col-sm-8">
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
              <br>
              <input type="text" class="form-control" id="name" name="phone" value="<?php echo $row['phone']; ?>">
          </div>
      </div>
      <hr>
      <h4><strong>환불계좌 정보</strong></h4>
      <div class="form-group">
          <label for="holder" class="col-xs-4 col-sm-2 text-right">예금주</label>
          <div class="col-xs-8 col-sm-8">
              <input type="text" class="form-control" id="holder" name="holder" value="<?php echo $row['holder']; ?>">
          </div>
      </div>

      <div class="form-group">
          <label for="bank" class="col-xs-4 col-sm-2 text-right">은행명</label>
          <div class="col-xs-8 col-sm-8">
              <input type="text" class="form-control" id="bank" name="bank" value="<?php echo $row['bank']; ?>">
          </div>
      </div>

      <div class="form-group">
          <label for="account" class="col-xs-4 col-sm-2 text-right">계좌번호</label>
          <div class="col-xs-8 col-sm-8">
              <input type="text" class="form-control" id="account" name="account_no" value="<?php echo $row['account_no']; ?>">
          </div>
      </div>

        <hr>

      <button type="submit" class="btn btn-default center-block" >수정하기</button>
</form>

    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
