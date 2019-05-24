<?php
session_start();
date_default_timezone_set('Asia/Seoul');

if((!$_SESSION['admin1']) || ($_SESSION['admin1'] != 'OK')){
  header('Location: admin.php');
}
?>

 <!DOCTYPE html>
 <html>
 <head>
      <meta charset="utf-8">
      <script src="http://code.jquery.com/jquery-latest.js"></script>
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


 </head>
 <body>
   <header>
     <table style="padding-bottom:10px">
       <tr>
         <td style="width:45px; padding-left:30px; padding-top:30px; padding-down: 10px"><img style="width:50px; height:50px" class="circle" src="./moms.png"></td>
         <td style="padding-top:23px; padding-down: 10px"><b style="margin-left:5px; font-size: 22px">관리자 페이지</b></td>
       </tr>
     </table>
  </header>
<main>
    <div style="display:inline">
      <ul class="tabs" style="display:inline">
       <li class="tab col s4"><a href="#deposit" style="text-decoration:none;" class="active">입금 확인 </a></li>
      <div class="indicator" style="right: 4px; left: 0px;"></div><div class="indicator" style="right: 4px; left: 0px;"></div></ul>
    </div>
    <div style="display:inline;">
      <a type="button" href="preorder_excel.php" style="background-color: #005e39; margin-top:-30px; margin-left:20px" class="waves-effect waves-light btn">
        엑셀로 내보내기</a>
    </div>

    <div id="deposit" class="col s12">
    <?php
    $conn = mysqli_connect("127.0.0.1", "root", "dnwnchdnjf206");
    mysqli_select_db($conn, "igiftu"); ?>


    <!--prints title row -->
    <table style="border-bottom:3px solid #e0e0e0">
      <tr>
       <td width = 110x style="padding-left:20px" class="left-align">쿠폰번호</td>
       <td width = 100x  class="left-align">메뉴</td>
       <td width = 90x  class="left-align">입금자명</td>
       <td width = 90x class="left-align"> 가격 </td>
       <td  width = 170x class="left-align"> 주문날짜</td>
       <td  width = 150xclass="left-align">입금 확인
       <td  width = 130xclass="left-align">쿠폰취소</td>
       <td class="left-align">입금자 정보</td>
     </tr>
   </table>

   <?php
       $rec_num = 20;    //한페이지에 보여줄 글의 수 -> results_per_pages
       if(empty($_GET['start'])){
         $page_n = 1;
       } else{
         $page_n = $_GET['start']*20;    //현재 페이지 번호 -> cur_page
       }

       $result = mysqli_query($conn, "SELECT * FROM purchase_history ORDER BY coupon_no DESC limit 1");
       $data_num = mysqli_fetch_array($result);
       $total = $data_num["0"];     //총 글의 수  -> total

       $page_scale = 10;   //페이징 할 수
       $temp = floor(($page_n-1) / $page_scale) * $page_n + 1;

      //  if($temp > 1){

       //여기에서도 restaurant먼저 분류 필요
       $sql = "SELECT * from purchase_history left JOIN moms_drink on purchase_history.menu = moms_drink.menu order by coupon_no DESC limit $page_n, $rec_num";
       $result = mysqli_query($conn, $sql);
       while($row = mysqli_fetch_assoc($result))
       {
          $search = $row['kakao_id'];
          $coupon_no = $row['coupon_no'];

          //개인정보
          $sql2 = mysqli_query($conn,"SELECT * FROM user where kakao_id = $search");
          $row2 = mysqli_fetch_assoc($sql2);

          //입금확인을 위한 db접속
          $sql3 = "SELECT * FROM coupon WHERE coupon_no = $coupon_no";
          $result2 = mysqli_query($conn, $sql3);
          $row3= mysqli_fetch_assoc($result2);
          $is_deposit = $row3['is_deposit'];
          $is_used = $row3['is_used'];
          $used = ($is_used) ? 'style="background-color:#eee"' : '';
          $checked = ($is_deposit) ? 'checked = "checked"' : '';
          $phpdate = strtotime( $row['purchase_date'] );
          $mysqldate = date( 'Y-m-d H:i', $phpdate ); ?>

          <!-- 출력 purchase_history -->
          <table class="bordered" <?php echo $used; ?>>
            <tr>
              <td width = 70px style="padding-left:40px"><?php echo $row['coupon_no'] ?></td>
              <td width = 130px style="padding-left:20px"><?php echo $row['name'] ?></td>
              <td width = 100px style="padding-left:30px"><b><?php echo $row['deposit_name'] ?></b></td>
              <td width = 60px style="padding-left:10px"><b><?php echo $row['price'] ?></b></td>
              <td width = 170px style="padding-left:10px"><?php echo $mysqldate;  ?></td>
              <td width = 165px style="padding-left:30px">

      <input type="checkbox" <?php echo $checked; ?> class="<?php echo 'chk'.$coupon_no; ?>" value="<?php echo $row['coupon_no']; ?>" />
      <label class="<?php echo 'labelchk'.$coupon_no; ?>" for="<?php echo 'chk'.$coupon_no; ?>">입금확인</label></td>

      <td width = 110px>
        <input type="button" class="<?php echo 'cancel'.$coupon_no; ?>" value="쿠폰취소">

          <!--개인정보 출력 -->
              <td>
                <a style="background-color: #005e39; " class="btn tooltipped" data-position="right" data-delay="30" data-tooltip="<?php
                        echo $row2['name']." ";
                        echo $row2['phone']." ";
                        echo $row2['bank']." ";
                        echo $row2['account_no']." ";
                        echo $row2['holder'];
                         ?>">입금자 정보</a>
                       </tr>
              </td>
          </table>

          <script>
          $(document).ready(function(){
            $('.<?php echo 'labelchk'.$coupon_no; ?>').on("click", function(e){
              e.preventDefault();
              var coupon_no = $('.<?php echo 'chk'.$coupon_no; ?>').val();
              $.ajax({
                type:'POST',
                url:'deposit_check.php',
                data: {c_no: coupon_no, is_deposit: <?php echo $is_deposit; ?>},
                success: function(result) {
                  if(result === '입금확인'){
                    $(this).prev().prop('checked', true);
                    alert("입금처리 되었습니다.");
                  } else if (result === '입금취소') {
                    $(this).prev().removeAttr("checked");
                    $(this).prev().prop('checked', false);
                    alert("입금취소 처리되었습니다.");
                  }
                  location.reload();
                }
              })
            });

            $('.<?php echo 'cancel'.$coupon_no; ?>').on("click", function(e){
              e.preventDefault();
              var coupon_no = $('.<?php echo 'chk'.$coupon_no; ?>').val();
              $.ajax({
                type:'POST',
                url:'cancelcoupon.php',
                data: {c_no: coupon_no, is_deposit: <?php echo $is_deposit; ?>},
                success: function(result) {
                  //$(this).off("click");
                  if (result == "입금") {
                    alert("이미 입금된 쿠폰입니다.");
                  }
                  else {
                    alert("삭제되었습니다.");
                    location.reload();
                  }
                }
              })
            });
          });
          </script>
        <?php  } //while문 닫기

        $page_cnt = $total / $rec_num; ?>
        <ul class="pagination">
         <?php

        // echo "<li><a href = $_SERVER[PHP_SELF]?start=$total>마지막</a></li>";

        for($i=0;$i<$page_cnt;$i++){
          if($i == $page_n){
            $page = "<b>".$i."</b>";
          } else {
            $page = $i;
          }
          echo "<li><a href = $_SERVER[PHP_SELF]?start=$i>$page</a></li>";
        }

        // echo "<li><a href = $_SERVER[PHP_SELF]?start=1>처음</a></li>";
          ?>
          <li class="disabled"><i class="material-icons">chevron_left</i></li>
          <li class="disabled"><i class="material-icons">chevron_right</i></li>
          </ul>

    </div>
  </div>
</main>
<footer>
  <p style="margin-bottom : 0px; background-color : #eee; padding:17px; font-size:15px" class="left-align">
  <b>CRA</b><br>
  문제시 연락처 : 01051032361 로 연락주세요
  </p>
</footer>
 <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>
