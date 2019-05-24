<?php
    $conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
    mysqli_select_db($conn, "igiftu");
    $kakao_id = mysqli_real_escape_string($conn, $_SESSION["id"]);
    date_default_timezone_set('Asia/Seoul');
    parse_str(basename($_SERVER['HTTP_REFERER'], ".php"));
    $coupon_no = $no;
 ?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="http://code.jquery.com/jquery-latest.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
      <?php
        echo $no;
        $sql = "SELECT kakao_id, menu, message, purchase_date, restaurant FROM purchase_history WHERE coupon_no = $coupon_no";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $sender = $row['kakao_id'];
        $message = $row['message'];
        $restau = $row['restaurant'];
        $menu= $row['menu'];
        $date = $row['purchase_date'];
        //menu불러오기
        $sql = "SELECT * FROM "."$restau"." WHERE menu = $menu";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $menu_final = $row['name'];
        //사용자 이름 불러오기
        $sql = "SELECT name,thumbnail FROM user WHERE kakao_id = $sender";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $thumbnail = $row['thumbnail'];
        $name = $row['name'];
        //쿠폰 사용여부 불러오기
        $result = mysqli_query($conn, "SELECT * FROM coupon WHERE coupon_no = $coupon_no");
        $row= mysqli_fetch_assoc($result);
        $is_used = $row['is_used'];
        $is_deposit = $row['is_deposit'];
        if(!$is_deposit){ //비활성화된 쿠폰
            $disabled = 'disabled';
            $btn_msg = '미승인쿠폰'; ?>
            <script type = text/javascript>
              $( document ).ready(function() {
                $('#couponbg').hide().css("visibility", "hidden");
              });
            </script>
        <?php
        } else if($is_deposit){ //활성화된 쿠폰
              //사용된 쿠폰
              if($is_used){
                $disabled = '';
                $btn_msg = '사용된 쿠폰'; ?>
                <script type = text/javascript>
                    $( document ).ready(function() {
                      $('.icon').hide();
                      $('#notification').hide().css("visibility", "hidden");
                      $('#couponbg').css("background-color", "#ada791");
                      $('#usingCoupon').css("background-color", "#ada791");
                    });
                </script>
        <?php
              //사용 전 쿠폰
              } else {
                $disabled = '';
                $btn_msg = "관리자 승인"; ?>
                <script type = text/javascript>
                    $( document ).ready(function() {
                      $('#notification').hide().css("visibility", "hidden");
                    });
                </script>
        <?php
                }
        }
      ?>
      <header>
        <div class="navbar-fixed" style="z-index: 9999; ">
             <nav role="navigation" style="background-color:#005e39">
               <div class="nav-wrapper container center-align" style="background-color:#005e39"><a id="logo-container" href="menu.php" class="brand-logo" style="font-size : 26px">i-GiftU</a>
               </div>
             </nav>
         </div>
      </header>

      <!-- 미승인 쿠폰 안내메세지 -->
      <p id="notification" style="margin-bottom : 0px; background-color : #eee; padding:17px; font-size:12px" class="center-align">
        <b><?php echo $no; ?>메세지 보기와 쿠폰 사용은 익일부터 가능합니다.</b>
      </p>

      <!-- 메세지창 -->
      <main class="center-align">
        <div class="row">
          <div class="col s12 m12 l6" style="display: inline-block; float: none; padding-top:7px">
            <div class="card hoverable">
              <div class="card-image waves-effect waves-block waves-light">
                <?php if($is_deposit) {
                  echo '<img class="activator" src="../img/moms_background.png">';
                } else echo '<img src="../img/moms_background.png">';
                ?>
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-2" style="font-size : 14px;" >
                  <table>
                    <tr >
                      <td style="padding-bottom: 0px; padding-left: 0px; padding-top: 9px; padding-right: 0px;"><img style="width:20px; height:20px" class="circle" src="<?php echo $thumbnail; ?>"></td>
                      <td style="padding-bottom: 0px; padding-left: 5px; padding-top: 0px; padding-right: 0px;" class="left-align">
                        <b><?php echo $name; ?></b>님이 보낸 메세지 보기
                        <?php if($is_deposit){
                          echo '<i class="material-icons right grey-text text-darken-4 ">more_vert</i></td>';
                        }?>
                    </tr>
                  </table>
                </span>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                  <div class="input-field col s12">
                    <label for="message" class="left-align"><?php echo $message; ?></label>
                  </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 메뉴상세정보란 -->
        <div class="row" style="margin-bottom : -15px; margin-top: -15px">
            <div class="col s12 m12 l6 left-align" style="display: inline-block; float: none">
                  <table style="padding-bottom:10px">
                    <tr>
                      <td style="width:45px"><img style="width:35px; height:35px" class="circle" src="../img/moms.png"></td>
                      <td>  <b style="margin-left: 0; font-size: 18px"><?php echo $menu_final; ?></b></td>
                    </tr>
                  </table>
            </div>
        </div>
        <div class="row">
          <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none">
            <div class="card-panel hoverable" style="padding-top: 5px">
              <table class="bordered">
                  <tr style="font-size : 14px">
                      <td class="left-align">주문번호</td>
                      <td class="right-align"><?php echo $coupon_no; ?></td>
                  </tr>
                  <tr style="font-size : 14px">
                      <td class="left-align">유효기간</td>
                      <td class="right-align">  <?php echo date('Y-m-d', strtotime('+1 year', strtotime($date))); ?></td>
                  </tr>
              </table>
            </div>
          </div>
        </div>

        <!-- 주의사항칸 -->
        <p style="margin-bottom : 0px; background-color : #eee; padding:17px; font-size:12px" class="left-align">
        <b>주의사항</b><br>
        : <?php echo $no; ?><br>
        : 입금확인까지 하루 정도 소요됩니다.<br>
        : 쿠폰은 관리자만 승인할 수 있습니다. <br>
        : 쿠폰을 사용하게 되면 되돌릴 수 없으며, 그에 대한 모든 책임은 본인에게 있습니다.<br>
        : 같은 가격의 다른 상품으로 변경가능합니다.<br>
        : 차액은 환불되지 않습니다.<br>
        : 문의사항은 igiftu@handong.edu로 해주세요.
        </p>

        <!-- 쿠폰사용하기버튼 -->
        <div id="couponbg" style="margin-bottom : 0px; margin-top:0; background-color : #dfaf43; padding:50px; padding-top:45px; padding-bottom:25px; height:200px" class="center-align">
        <p class="center-align" style="font-size:12px; color: white; margin-bottom: 15px; margin-top:0">쿠폰을 사용하게 되면 되돌릴 수 없으며,<br> 모든 책임은 본인에게 있습니다.</p>
          <button id="usingCoupon" <?php echo $disabled; ?> type = "button" class="waves-effect waves-light btn-large" class="center-align" style="font-size:15px; background-color : #dfaf43; width:200px">
            <div class="icon"><i class="material-icons left" style="margin-right:0">done</i></div><?php echo $btn_msg; ?></button>
        </div>

        <!-- 앱으로연결버튼 -->
        <footer style="z-index:1;">
           <div class="text-center" style="width:100%; height:60px; padding:0">
               <a href="../loginpage.php">
                 <button type="button" class="btn btn-lg" style="width:100%; height:100%; background-color: #005e39 ; font-size : 17px">내 쿠폰함에 저장하기</button></a>
           </div>
        </footer>

        <script type = text/javascript>
        $('#usingCoupon').click(function(){
          $.ajax({
            type:'POST',
            url:'testprocess.php',
            data: {c_no: <?php echo $coupon_no; ?>},
            success: function(result) {
              if(result === 'nowused'){
                alert("쿠폰을 사용했습니다");
                $('#usingCoupon').text('사용된 쿠폰');
                $('#usingCoupon').css("background-color", "#ada791");
                $('#couponbg').css("background-color", "#ada791");
              } else if(result === 'alreadyused'){
                alert("이미 사용한 쿠폰입니다.");
              } else alert("관리자에게 문의하세요");
            }
          })
        });
        </script>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>
