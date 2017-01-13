<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <title>iGiftU</title>

    <!-- Bootstrap core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme CSS -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    
    <style>
        body{
            background-color:#ececec;
        }

        #messageBox{
            margin-bottom: 20px;
            padding:20px;
            background-color: white;
            box-shadow: 0px 0px 20px -5px rgba(0, 0, 0, 0.8);
            height: 100%;
        }

        #box{
            padding: 10px;
            background-color: white;
            margin-bottom: 20px;
        /*            box-shadow: 0px 0px 20px -5px rgba(0, 0, 0, 0.8);*/
        }

        label{
            width: 100%;
        }

        #product{
            font-size: 25px
        }

        #profileImg{
          display: inline-block;
          box-shadow: 0px 0px 20px -5px rgba(0, 0, 0, 0.8);
          border-radius: 50%;
            margin:10px;

          width: 30px;
          height: 30px;
        }

        #accordion {
            margin-top: 5px;
            margin-bottom: 0px;
        }

        #footBox{
            margin-bottom: 0;
            padding:2px;
          box-shadow: 0px 0px 20px -9px rgba(0, 0, 0, 0.8);
        }

        #footButton{
            border-radius: 3%;
            height: 45px;
        }

        div > .thumbnail{
          background-color: pink;
        }

        #accordion > .panel {
          background: none;
        }
        
        #cautionBox{
            padding: 10px;
            background-color: white;
            margin-bottom: 20px;
        }
    
        #used {
            padding: 10px;
            background-color:darkgray;
            margin-bottom: 20px;
        }
        
        #usingCoupon{
            width: 160px;
        }
        
        #logo{
            font-size: 25px;
            margin-bottom: 10px;
        }
        
        #KakaoThumbnail{
            font-size: 15px;
            font-style: oblique;  
        }
        
      </style>
  </head>

  <body>
    <div id="messageBox" class="container">
         <div class="text-center">
              <div id="logo" class="brand"><span class="glyphicon glyphicon-gift" aria-hidden="true">iGiftU</span></div>
          </div>

<?php
  $conn = mysqli_connect('localhost', 'root', 'dlfdns2');
  mysqli_select_db($conn, 'i_giftu');
  $coupon_no = basename($_SERVER["PHP_SELF"], ".php");

  $sql = "SELECT sender_id, menu, message, purchase_date, restaurant FROM purchase_history WHERE coupon_no = $coupon_no";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $sender = $row['sender_id'];
  $message = $row['message'];
  $restau = $row['restaurant'];
  $menu= $row['menu'];
  //menu불러오기
  $menu_search = "moms_"."$restau";
  $sql = "SELECT * FROM "."$menu_search"." WHERE menu = $menu";
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
  ?>
       
        <div>
            <div class="thumbnail">
              <div class="effect" id="KakaoThumbnail"><img src="http://mud-kage.kakao.co.kr/14/dn/btqfkKobo3I/pT0RXTm1CQf7U1W9jhqoa1/o.jpg" id="profileImg" alt="카카오톡 프로필사진">
                From. <?php echo $name; ?>
              </div>
                <img src="http://image.istarbucks.co.kr/upload/store/skuimg/2015/07/[106509]_20150724164325806.jpg" class="img-responsive center-block" alt="음료수<체리콕>">

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                   <div class="panel">
                    <div class="panel-heading" role="tab" id="headingTwo">
                      <h4 class="panel-title text-right">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#letter" aria-expanded="false" aria-controls="letter">
                          <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        </a>
                      </h4>
                    </div>
                    <div id="letter" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="panel-body">
                        <?php echo $message; ?> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est maiores sit earum vero laborum, architecto numquam accusantium totam dolorem eum molestiae, tempore expedita ipsa nisi dolore suscipit aliquid doloremque aspernatur.
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </div>
        </div>

        <div id="box" class="container">
           <small>Mom's <?php echo $restau; ?> </small> <br>
            <div id="product"><strong> <?php echo $menu_final; ?> </strong></div>

            <div class="text-right"><small>유효기간<br>
            주문번호: <?php echo $coupon_no; ?></small></div>

        </div>
        
        <div id="cautionBox" class="container text-center">
            <div class="text-center">
                주의사항<br>
                Lorem ipsum dolor.<br>
                Lorem ipsum dolor sit amet, consectetur.<br>
                Lorem ipsum dolor sit.<br>
                <hr>
            </div>
            <div id="cautionbox">
               <button type="button" class="btn btn-danger btn-lg" data-loading-text="사용완료" onclick="document.getElementById('cautionBox').id='used'">쿠폰사용
               </button>
            </div>
            <hr>
            
        </div>
        

        <div id="footBox" class="thumbnail navbar-fixed-bottom container">
            <a href="./kakaologin.php"><button id="footButton" type="button" class="btn btn-default btn-lg btn-block">마이페이지에 저장하기</button></a>
        </div>

    <script>
        //쿠폰사용 버튼 비활성화 처리
          $(function() {
             $("#cautionbox .btn").click(function(){
                $(this).button('loading').delay(1000).queue(function() {
                });
             });
          });
    var coupon_no = "<?php echo $coupon_no; ?>";
    $('#yesno').click(function(){
      $.ajax({
        type:'POST',
        url:'testprocess.php',
        data: {c_no: coupon_no},
        success: function(result) {
          //alert(result);
          if(result == 'nowused'){
            alert("쿠폰을 사용했습니다");
          } else {
            alert("이미 사용한 쿠폰입니다.");
            $('input[name="yesno"]').prop('checked', true);
          }
        }
      })
    })
    </script>

    <a href="./kakaologin.php"><input type="button" name="send" value="마이페이지에 저장"></a>


    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
