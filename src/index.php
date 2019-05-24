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
    <title>iGiftU</title>
    <!--카카오톡 로그인을 위한 스크립트-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="http://developers.kakao.com/sdk/js/kakao.min.js"></script>

    <!-- 부트스트랩 -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
   <style>
       body {
           padding-top: 100px;
       }
       footer {
            bottom :25% !important;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
        }
   </style>
  </head>
  <body>
    <!-- 들어갈 내용(상단부 제외)-->
    <div class="container">
      <div class="page-header">
          <h1 class="text-center"><b>iGiftU</span></b></h1>
      </div>
        <p class="lead text-center">iGiftU는 한동대학교 학생들을 위한 </br> 기프트콘 서비스입니다.</p>
        <p class="lead text-center">현재 주고받은 마음은? <?php echo $row['coupon_no']?></p>

    </div>
    <footer class="footer text-center">
      <a id="kakao-login-btn"></a>
      <a href="http://alpha-developers.kakao.com/logout" ></a>
      <p class="lead text-center">iGiftU는 모바일 환경에 최적화되어 있습니다.<br>문제시 igiftu@gmail.com으로 문의주세요.</p>

      <?php
        if(isset($_SERVER['HTTP_REFERER'])) {
          parse_str(basename($_SERVER['HTTP_REFERER'], ".php"));
          //$prev_dir = basename($_SERVER['HTTP_REFERER'], ".php");
        } else $no = "none";
      ?>

       <script>
         var prev_dir = "<?php echo $no; ?>";
         //document.write(prev_dir);
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
                     url:'/igiftu/kakaoprocess.php',
                     data: { id : res.id, nick: res.properties.nickname,
                       prof: res.properties.profile_image, thumb: res.properties.thumbnail_image,
                       ref: prev_dir},
                     success: function(result) {
                       if(result == 'exist'){
                         window.location.href = "/igiftu/menu.php";
                       } else {
                         window.location.href = "/igiftu/register.php";
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

    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
