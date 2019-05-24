<?php
session_start();
date_default_timezone_set('Asia/Seoul');

$conn = mysqli_connect("127.0.0.1", "root", "dnwnchdnjf206");
mysqli_select_db($conn, "igiftu");
$kakao_id = mysqli_real_escape_string($conn, $_SESSION["id"]);

$result = mysqli_query($conn, "SELECT * FROM preorder WHERE kakao_id = '".$kakao_id."'"); // 예약주문

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

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <style>

        header, main, footer {padding-left: 300px;}
        @media only screen and (max-width : 992px){header, main, footer{padding-left: 0;}}
        td{padding:0}
        .tabs .tab a:hover, .tabs .tab a.active{color:#6a5a49 !important}
        .tab a{color:rgba(106,90,73, 0.7) !important}
        .indicator{background-color:#6a5a49 !important}
        .card a:not(.btn):not(.btn-large):not(.btn-floating):hover .card-action {color: rgba(0,94,57,0.7)}
        .card a:not(.btn):not(.btn-large):not(.btn-floating) .card-action {color: #005e39}

    </style>
  </head>
<body style="background-color:#eee">
  <!-- <body style="overflow: hidden"> -->
      <?php require("nevbar.php"); ?>
    <main class="center-align">
      <div class="row" style="margin-bottom:-10px">
          <div class="col s12 m8 l6" style="display: inline-block; float: none">
            <div class="card-panel white z-depth-1" style="padding: 5px; padding-right:0">
              <div class="row valign-wrapper" style="margin:0">
                <div class="col s3 m3 l2">
                  <img src="<?php echo $_SESSION['thumb']; ?>" alt="" class="circle" style="width:100%"> <!-- 카카오톡 사진이 들어갈 자리 -->
                </div>
                <div class="col s9 m9 l10" style="font-size: 13px">
                  <table>
                      <tr>
                          <td style="font-size: 17px"><b><?php echo $row0['name']; ?></b></td>
                          <td class="right-align" style="font-size:9px; margin-right:-5px"><i onclick="window.location.href='edit_userinfo.php'" class="tiny material-icons">settings</i></td>
                      </tr>
                      <tr>
                          <td>Phone</td>
                          <td class="left-align"><?php echo $row0['phone']; ?></td>
                      </tr>
                      <tr>
                          <td>Bank</td>
                          <td class="left-align"><?php echo $row0['bank'].$row0['account_no']; ?></td>
                      </tr>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>

        <div class="row">
             <div class="col s12 l7" style="display: inline-block;  float: none">
                  <ul class="tabs" style="background-color:#eee;">
                    <li class="tab col s4"><a href="#Reserve" style="font-size:16px">예약주문</a></li>
                      <li class="tab col s4"><a href="#Receive" style="font-size:16px">받은쿠폰</a></li>
                      <li class="tab col s4"><a href="#Send" style="font-size:16px">보낸쿠폰</a></li>

                  </ul>
             </div>
             <div id="Receive" class="col s12 l7" style="display: inline-block; float: none; padding-top:6px">
                  <?php
                  if($result3->num_rows == "0"){
                    echo "받은 내역이 없습니다.";
                  } else {
                   while($row3 = mysqli_fetch_assoc($result3))
                    {
                      $sql = "SELECT name FROM ".$row3['restaurant']." WHERE menu = 3";   //row['menu'] -> 이미지 번호
                      $result4 = mysqli_query($conn, $sql);
                      $row4 = mysqli_fetch_assoc($result4); // 메뉴 이름
                      $sql = "SELECT name FROM user WHERE kakao_id = '".$row3['kakao_id']."'";
                      $res = mysqli_query($conn, $sql);
                      $name = mysqli_fetch_assoc($res);

                      $phpdate = strtotime( $row3['purchase_date'] );
                      $mysqldate = date( 'Y-m-d H:i', $phpdate ); ?>

                      <div class="card horizontal" style="min-width:300px;width:100%; max-width:400px; display: inline-block; float: none; margin:0">
                           <div style="display:flex">
                                <div class="card-image" style="width:96px; display:block">
                                  <img src="img/<?php echo $row3['restaurant']; ?>/<?php echo $row3['menu']; ?>.PNG" alt="<?php echo $row4['name']; ?>" style="height:101px">
                                </div>
                                <div class="card-stacked" style="display:block">
                                  <div class="card-content" style="padding:15px">
                                        <p style="font-size:17px"><b><?php echo $row4['name']; ?></b></p>
                                       <p style="font-size:11px;color:#a1a1a1"><?php echo $mysqldate; ?> <?php echo $name['name']; ?></p>
                                  </div>
                                  <a href= "http://igiftu.handong.edu/igiftu/coupon2.php?id=<?php echo $row3['kakao_id']; ?>&no=<?php echo $row3['coupon_no']; ?>" style="margin:0">
                                      <div class="card-action" style="height:30px; padding:5px; font-size:12px">
                                        쿠폰페이지 바로가기
                                      </div>
                                  </a>
                                </div>
                            </div>
                      </div>
                    <?php             }
                              } ?>
            </div>

            <div id="Send" class="col s12 l7" style="display: inline-block; float: none;padding-top:6px">
                  <?php
                  if($result1->num_rows == "0"){
                    echo "보낸 내역이 없습니다.";
                  } else {
                   while($row1 = mysqli_fetch_assoc($result1))
                    {
                      $sql = "SELECT name FROM ".$row1['restaurant']." WHERE menu = '".$row1['menu']."'";   //row['menu'] -> 이미지 번호
                      $result2 = mysqli_query($conn, $sql);
                      $row2 = mysqli_fetch_assoc($result2); // 메뉴 이름

                      $sql = "SELECT name FROM user WHERE kakao_id = '".$row1['kakao_id']."'";
                      $res2 = mysqli_query($conn, $sql);
                      $name2 = mysqli_fetch_assoc($res2);

                      $phpdate = strtotime( $row1['purchase_date'] );
                      $mysqldate1 = date( 'Y-m-d H:i', $phpdate ); ?>

                      <div class="card horizontal" style="min-width:300px;width:100%; max-width:400px; display: inline-block; float: none; margin:0">
                           <div style="display:flex">
                                <div class="card-image" style="width:96px; display:block">
                                  <img src="img/<?php echo $row1['restaurant']; ?>/<?php echo $row1['menu']; ?>.PNG" alt="<?php echo $row2['name']; ?>" style="height:101px">
                                </div>
                                <div class="card-stacked" style="display:block">
                                  <div class="card-content" style="padding:15px">
                                       <p style="font-size:17px"><b><?php echo $row2['name']; ?></b></p>
                                       <p style="font-size:11px;color:#a1a1a1"><?php echo $mysqldate1; ?> <?php echo $name2['name']; ?></p>
                                  </div>
                                  <a href= "http://igiftu.handong.edu/igiftu/coupon2.php?id=<?php echo $row1['kakao_id']; ?>&no=<?php echo $row1['coupon_no']; ?>" style="margin:0">
                                      <div class="card-action" style="height:30px; padding:5px; font-size:12px">
                                        쿠폰페이지 바로가기
                                      </div>
                                  </a>
                                </div>
                            </div>
                      </div>
                    <?php             }
                              } ?>
            </div>

            <div id="Reserve" class="col s12 l6" style="display: inline-block; float: none; padding-top:6px">

                <?php
                if($result->num_rows == "0"){
                  echo "주문 내역이 없습니다.";
                } else {
                  while($preorder = mysqli_fetch_assoc($result)){
                 $phpdate = strtotime( $preorder['preorder_time'] );
                 $mysqldate = date( 'H:i', $phpdate );?>
                   <table class="card" style="margin-top: 6px; background-color:#ffffff; margin-bottom:0">
                    <tr>
                       <td class="left-align" style="padding:10px; padding-left:15px; padding-bottom:0px; font-size:12px">
                         <b>주문번호: <?php echo $preorder['number']; ?></b></td>
                        <td rowspan="3" class="center-align" style="width:25%; padding:0; padding-right:15px; font-size:22px; color:red">
                         <b><?php echo $mysqldate; ?></b></td>
                   </tr>
                   <tr>
                       <td class="left-align" style="padding:0 0 0 15px;font-size:18px">
                         <b><?php echo $preorder['menu']; ?>(<?php echo $preorder['choice']; ?>)  <?php echo $preorder['amount'].'잔'; ?></b></td>

                   </tr>
                   <tr>
                     <td class="left-align" colspan="2" style="padding:15px; padding-top:0; padding-bottom: 10px; font-size:12px">
                       <?php echo $preorder['message']; ?></td>
                   </tr>
                </table>
                       <?php } }?>

            </div>
        </div>

    </main>
      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>
