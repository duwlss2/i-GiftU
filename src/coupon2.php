<?php
    ob_start();
    $conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
    mysqli_select_db($conn, 'igiftu');
    date_default_timezone_set('Asia/Seoul');
    parse_str($_SERVER['QUERY_STRING']); //$id=카카오아이디,$no=쿠폰번호

    $sql0 = "SELECT purchase_history.coupon_no, purchase_history.kakao_id, purchase_history.menu, purchase_history.message, purchase_history.purchase_date, purchase_history.restaurant, coupon.coupon_no, coupon.is_used, coupon.is_deposit FROM purchase_history LEFT JOIN coupon ON purchase_history.coupon_no = coupon.coupon_no WHERE purchase_history.coupon_no = $no";
    $result0 = mysqli_query($conn, $sql0);
    $row0= mysqli_fetch_assoc($result0);
    if($row0['kakao_id'] != $id){
      header('Location: ./nocoupon.php');
    }else {
      $final = $row0;
      $is_deposit = $final['is_deposit'];

      // walkthrough if coupon not used
      $url = 'couponWalkthrough.php?id='.$id.'&no='.$final['coupon_no'];
      $referer = (basename($_SERVER['HTTP_REFERER']));
      if(!$is_deposit && $referer != $url && $referer == NULL ){
        //echo $referer == NULL ? "DD": "FF";
        echo $is_deposit;
        echo $url;
        header('Location: ./'.$url);
      }
    };
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
       <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
       <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
       <script src="http://code.jquery.com/jquery-latest.js"></script>
       <!--Let browser know website is optimized for mobile-->
       <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     </head>
     <body>
       <?php
         $sql = "SELECT kakao_id, menu, message, purchase_date, restaurant FROM purchase_history WHERE coupon_no =' ".$kakao_id."'";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);
         $sender = $final['kakao_id'];
         $message = $final['message'];
         $restau = $final['restaurant'];
         $menu= $final['menu'];
         $date = $final['purchase_date'];
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
         $is_used = $final['is_used'];
         //$is_deposit = $final['is_deposit'];
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
         <b>메세지 보기와 쿠폰 사용은 익일부터 가능합니다.</b>
       </p>

       <!-- 메세지창 -->
       <main class="center-align">
         <div class="row">
           <div class="col s12 m12 l6" style="display: inline-block; float: none; padding-top:7px">
             <div class="card hoverable">
               <div class="card-image waves-effect waves-block waves-light">
                 <?php if($is_deposit) {
                   echo '<img class="activator" src="img/moms_background.png">';
                 } else echo '<img src="img/moms_background.png">';
                 ?>
               </div>
               <div class="card-content">
                 <span class="card-title activator black-text" style="font-size : 14px;" >
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
                     <label for="message" class="left-align" style="color:black"><?php echo $message; ?></label>
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
                       <td style="width:45px"><img style="width:35px; height:35px" class="circle" src="img/moms.png"></td>
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
                       <td class="right-align"><?php echo $final['coupon_no']; ?></td>
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
                <a href="../../index.php">
                  <button type="button" class="btn btn-lg" style="width:100%; height:100%; background-color: #005e39 ; font-size : 17px">받은 쿠폰함에 저장</button></a>
            </div>
         </footer>

         <script type = text/javascript>
         $('#usingCoupon').click(function(){
           $.ajax({
             type:'POST',
             url:'testprocess.php',
             data: {c_no: <?php echo $final['coupon_no']; ?>},
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
