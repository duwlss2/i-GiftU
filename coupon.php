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
            background-color: white;
            margin-bottom: 26px;
        }
    
        #used {
            background-color: gray;
        }
        
        #usingCoupon{
            width: 160px;
        }
      </style>
  </head>

  <body>
    <div id="messageBox" class="container">
         <div class="text-center">
              IGIftU로고
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
              <div class="effect" id="KakaoThumbnail"><img src="<?php echo $thumbnail; ?>" id="profileImg" alt="카카오톡 프로필사진">
                <?php echo $name; ?>
              </div>
                <img src="http://image.istarbucks.co.kr/upload/store/skuimg/2015/07/[106509]_20150724164325806.jpg" class="img-responsive center-block" alt="음료수<체리콕>">

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                   <div class="panel">
                    <div class="panel-heading" role="tab" id="headingTwo">
                      <h4 class="panel-title text-right">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#letter" aria-expanded="false" aria-controls="letter">
                          편지 보기
                        </a>
                      </h4>
                    </div>
                    <div id="letter" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="panel-body">
                        <?php echo $message; ?>
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
                1.ㅇㅁㄻㅇㄴㄹ;<br>
                2.ㅁ이ㅏ럼ㄴ<br>
                3.ㅇ미ㅏ러;ㅇㄴ<br>
            </div>
            <button id="usingCoupon" type="button" onclick="document.getElementById('cautionBox').id='used'" class="btn btn-primary btn-lg">쿠폰사용</button>
            
            <?php
            //체크박스
            $checked = ($is_used) ? 'checked = "checked"' : '';
            echo '<form id = "check"><label for="yesno">누르면 사용확인</label>';
            echo '<input type="checkbox" name="yesno" class="onoffswitch" id="yesno" value="1"'.$checked.'> </form>'; ?>
        </div>
        

        <div id="footBox" class="thumbnail navbar-fixed-bottom container">
            <a href="./kakaologin.php"><button id="footButton" type="button" class="btn btn-primary btn-lg btn-block">마이페이지에 저장하기</button></a>
        </div>

    <script>
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
