<?php
session_start();
$conn = mysqli_connect("localhost","root","GYQLS1494");
mysqli_select_db($conn, "igiftu");
$kakao_id = mysqli_real_escape_string($conn, $_SESSION["id"]);

$sql = "SELECT * FROM user WHERE kakao_id='".$kakao_id."'"; //개인정보
$result0 = mysqli_query($conn,$sql);
$row0 = mysqli_fetch_assoc($result0);

$sql = "SELECT * FROM purchase_history WHERE kakao_id = '".$kakao_id."'"; // 보낸사람 purchase history
$result1 = mysqli_query($conn,$sql);

$sql = "SELECT * FROM purchase_history  WHERE receiver = '".$kakao_id."'"; //받은 사람 purchase history
$result3 = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->


    <title>IGiftU 마이페이지</title>

    <!-- 부트스트랩 -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">

    <style>
        body{
            margin-top: 55px;
            min-width: 320px;
        }

        .effect img {
          display: inline-block;
          box-shadow: 0px 0px 20px -5px rgba(0, 0, 0, 0.8);
            margin-left: 15px;
          border-radius: 50%;
          width: 60px;
          height: 60px;
        }

        .form-group {
            margin-bottom: 30px;
        }

        #idBox{
            padding: 15px 0 0 0;
            margin-bottom: 5px;
            height: 110px;
        }

        .small{
            font-size: 11px;
            color: darkgray;
        }

        td > img {
            width:100%;
            float: right;
        }

        hr {
            margin-bottom:12px;
        }

        #menuID{
          max-width: 180px;
          margin-left: 0px;
        }

        .tab-content{
      margin-top : 10px;
      }
        
        #profileName{
            font-size: 12px;
            padding-right: 0px;
            width: 200px;
        }
        
        #profileBox{
            padding:0;
        }
        
      </style>


  </head>

  <body>

    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-gift" aria-hidden="true">iGiftU</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav text-right">
            <li class="active"><a href="menu.html">기프트콘</a></li>
            <li><a href="preorder.html">미리주문</a></li>
            <li class="disabled"><a href="#about">기도편지</a></li>
            <li><a href="mypage.html">마이페이지</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav>

    <div id="idBox">
      <div id="profileBox" class="container form-group">
        <div class="col-xs-4 col-sm-3 text-right">
        <div class="effect" id="KakaoThumbnail"><img src="<?php echo $_SESSION['thumb']; ?>"></div>
        </div>
          <div id="profileName" class="col-xs-7 col-sm-7 text-left">
              <table id="profileTable">
                  <tr>
                      <td><b>김경협</b></td>
                  </tr>
                  <tr>
                      <td>Phone</td>
                      <td>&nbsp;&nbsp;01043398728</td>
                  </tr>
                  <tr>
                      <td>Account</td>
                      <td>&nbsp;&nbsp;기업 01043398728</td>
                  </tr>
              </table>
              <br><p class="text-right small"><br><a href="./member_edit_1.php"><span class="glyphicon glyphicon-cog" aria-hidden="true">
                개인정보수정</span></a></p>
          </div>
      </div>
    </div>

    <div role="tabpanel">

  <!-- Nav tabs -->
    <div class="container">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active col-xs-6 text-center"><a href="#Send" aria-controls="Send" role="tab" data-toggle="tab">
          Send <?php echo $result1->num_rows; ?></a></li>
        <li role="presentation" class="col-xs-6 text-center"><a href="#receive" aria-controls="receive" role="tab" data-toggle="tab">
          Receive <?php echo $result3->num_rows; ?></a></li>
      </ul>
    </div>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="Send">
        <div class="container">
        <table class="table">

              <?php
              if($result1->num_rows == "0"){
                echo "주문 내역이 없습니다.";
              } else {
               while($row1 = mysqli_fetch_assoc($result1))  //보낸 사람 purchase_history row1
                {
                  $sql = "SELECT name FROM ".$row1['restaurant']." WHERE menu = '".$row1['menu']."'";   //row['menu'] -> 이미지 번호
                  $result2 = mysqli_query($conn, $sql);
                  $row2 = mysqli_fetch_assoc($result2); // 메뉴 이름
                  echo '<tr><td class="col-xs-5 text-left">'.'<img id='.'"menuID"'." src=".'./'.$row1['restaurant'].'/'.$row1['menu'].".PNG"." alt=".$row2['name'].">";
                  echo '<td id="ItemPrice" class="text-right col-xs-7">';
                  echo  '<h4><strong>'.$row2['name'].'</strong></h4>';
                  echo  '<p class="small">'.$row1['purchase_date'].'</p><hr>받은사람 이름</td></tr>';
                }
              } ?>



        </table>
    </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="receive">
        <div class="container">
        <table class="table">

          <?php
          if($result3->num_rows == "0"){
            echo "주문 내역이 없습니다.";
          } else {
           while($row3 = mysqli_fetch_assoc($result3))
            {
              $sql = "SELECT name FROM ".$row3['restaurant']." WHERE menu = '".$row3['menu']."'";   //row['menu'] -> 이미지 번호
              $result4 = mysqli_query($conn, $sql);
              $row4 = mysqli_fetch_assoc($result4); // 메뉴 이름
              echo '<tr><td class="col-xs-5 text-left">'.'<img id='.'"menuID"'." src=".'./'.$row3['restaurant'].'/'.$row3['menu'].".PNG"." alt=".$row4['name'].">";
              echo '<td id="ItemPrice" class="text-right col-xs-7">';
              echo  '<h4><strong>'.$row4['name'].'</strong></h4>';
              echo  '<p class="small">'.$row3['purchase_date'].'</p><hr>보낸사람 이름</td></tr>';
            }
          } ?>

        </table>
    </div>
    </div>
  </div>
</div>

    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>