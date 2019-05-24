<?php
$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, 'igiftu');
$sql = "SELECT coupon_no FROM purchase_history order by coupon_no desc limit 1";  //마지막 쿠폰 번호
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


    <title>IGiftU</title>

       <!--카카오톡 로그인을 위한 스크립트-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="http://developers.kakao.com/sdk/js/kakao.min.js"></script>
   
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    

    
    <style>
        main{min-height: 700px}
        @media only screen and (max-width : 992px){main{min-height: 360px}}
    </style>
  </head>
  <body>
  <!-- <body style="overflow: hidden"> -->

    <header>
    </header>
    
    
    
    <main class="center-align">
      <div class="row">
        <div class="col s12 m12 l6" style="display: inline-block; float: none">
            <p style="font-size:30px; border-bottom:1px solid #e7e7e7; margin-top:130px"><b>i-GiftU</b></p>

            iGiftU는 한동대학교 학생들을 위한<br> 기프티콘 서비스입니다.<br>
            <br> 현재 주고받은 마음은? <?php echo $row['coupon_no']?><br>
        </div>
      </div>
    </main>
    
    <footer class="center-align">
      <a id="kakao-login-btn"></a>
      <a href="http://alpha-developers.kakao.com/logout" ></a>

      <?php
        if(isset($_SERVER['HTTP_REFERER'])) {
          $prev_dir = basename($_SERVER['HTTP_REFERER'], ".php");
        } else $prev_dir = "abc";
        //echo "prev_dir: ".$prev_dir;
       ?>

       <script>
         var prev_dir = <?php echo $prev_dir; ?>;
         //<![CDATA[
           // 사용할 앱의 JavaScript 키를 설정해 주세요.
           Kakao.init('afef33752335de3b77ada62abd43237b');
           // 카카오 로그인 버튼을 생성합니다.
           Kakao.Auth.createLoginButton({
             container: '#kakao-login-btn',
             success: function(authObj) {
               // 로그인 성공시, API를 호출합니다.
               Kakao.API.request({
                 url: '/v1/user/me',
                 success: function(res) {
                   $.ajax({
                     type:'POST',
                     url:'kakaoprocess.php',
                     data: { id : res.id, nick: res.properties.nickname,
                       prof: res.properties.profile_image, thumb: res.properties.thumbnail_image,
                       ref: prev_dir},
                     success: function(result) {
                       if(result == 'exist'){
                         window.location = "./menu.php";
                       } else {
                         //alert(result);
                         window.location = "./register.php";
                       }
                     }
                   })
                 },
                 fail: function(error) {
                   alert(JSON.stringify(error));
                 }
               });
             },
             fail: function(err) {
               alert(JSON.stringify(err));
             }
           });
       </script>
        
    </footer>
     
      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>
