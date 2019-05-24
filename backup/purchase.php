<?php
session_start();

$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, "igiftu");
$kakao_id = mysqli_real_escape_string($conn, $_SESSION["id"]);
$userDB = mysqli_query($conn, "SELECT name, phone, thumbnail FROM user WHERE kakao_id = '".$kakao_id."'");
$user = mysqli_fetch_assoc($userDB);

$_SESSION['menu']=mysqli_real_escape_string($conn, $_GET['id']);
$sql = 'SELECT * FROM '.$_SESSION['restaurant'].' WHERE menu='.$_SESSION['menu'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->


    <title>IGiftU 결제</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <style>
        header, main, footer {padding-left: 300px;}
        @media only screen and (max-width : 992px){header, main, footer{padding-left: 0;}}
      </style>



  </head>
<body>
  <!-- <body style="overflow: hidden"> -->


      <?php require("nevbar.php"); ?>




    <main class="center-align">
      <div class="row">
        <div class="col s12 m12 l6" style="display: inline-block; float: none">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="http://materializecss.com/images/office.jpg">
            </div>
            <div class="card-content activator">
              <span class="activator card-title grey-text text-darken-2 " style="font-size : 18px;" ><b>&emsp;&emsp;메세지 쓰기</b><i class="material-icons right grey-text text-darken-4 ">more_vert</i></span>
            </div>
            <div class="card-reveal" style="opacity:0.94">
              <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                <div class="input-field col s12">
                  <form action="0123checkPurchase.php" method="POST">
		  <i class="material-icons prefix">email</i>
                  <textarea id="message" name="message" class="materialize-textarea" length="100"></textarea>
                  <label for="message" class="left-align">메세지를 입력해주세요</label>
                </div>
            </div>
          </div>
        </div>
      </div>

    <div class="row" style="margin-bottom : -15px; margin-top: -15px">
        <div class="col s12 m12 l6 left-align" style="display: inline-block; float: none">
            <b><p style="margin-left: 5px; font-size: 21px">결제방법</p></b>
        </div>
    </div>
    <div class="row">
      <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none">
        <div class="card-panel" style="padding-top: 5px">
          <table class="bordered">
              <tr style="font-size : 14px">
                  <td class="left-align">상품이름</td>
                  <td class="right-align"><?php echo $row['name']; ?></td>
              </tr>
              <tr style="font-size : 14px">
                  <td class="left-align">상품가격</td>
                  <td class="right-align"><?php echo $row['price']; ?></td>
              </tr>
              <tr style="border-bottom : 0; padding-bottom : 0; font-size: 30px">
                  <td colspan="2" class="center-align"><b>무통장입금</b></td>
              </tr>
              <tr style="border-bottom : 0">
                  <td class="center-align" colspan="2" style="padding-top: 0">
                    <div class="input-field col s6 left-align" style="display: inline-block; float: none; margin-top:-14px">
                      <input id="holder" type="text" name="deposit" class="validate center-align" style="margin:0" placeholder="입금자명">
                    </div>
                 </td>
              </tr>
          </table>
        </div>

        <button class="btn waves-effect waves-light hoverable col s12 m12 l12"
        type="submit" name="action" style="display: inline-block; float: none; margin-top: 16px; height:50px; font-size:22px; background-color:#005e39">결제하기
        </button>
      </form>
      </div>
    </div>

    </main>

    <footer>
        <div style="background-color: #f5f5f5; height : 60px; padding-left: 10px; margin-top:10px; padding-top: 10px;">
            <small>Powered by @CRA,</small>
        </div>
    </footer>

      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>
