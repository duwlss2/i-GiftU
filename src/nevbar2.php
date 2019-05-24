<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    date_default_timezone_set('Asia/Seoul');
    $conn = mysqli_connect("127.0.0.1", "root", "dnwnchdnjf206");
    if (!$conn) {
      die("현재 서버점검 중입니다. 문제 지속시 igiftu@gmail.com으로 문의해주세요.");
    }
    mysqli_select_db($conn, "igiftu");

    $kakao_id = mysqli_real_escape_string($conn, $_SESSION["id"]);
    $userDB = mysqli_query($conn, "SELECT name, phone, thumbnail FROM user WHERE kakao_id = '".$kakao_id."'"); //개인정보
    $user = mysqli_fetch_assoc($userDB);
}else {
  //header('Location: ../index.php');
}
?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    </head>
    <body>
      <header>
        <div class="navbar-fixed" style="z-index: 9999;">
          <nav role="navigation" style="background-color:#d31e89">
            <div class="nav-wrapper topbar center-align" style="margin:0;width:100%"><a id="logo-container" href="#" class="brand-logo">Archive</a>
                
              <ul id="slide-out" class="side-nav fixed">
                <li><div class="userView">
                  <div class="background">
                    <img src="http://materializecss.com/images/office.jpg">
                  </div>
                  <a href="#!user"><img class="circle" src="<?php echo $_SESSION['thumb']; ?>"></a>
                  <a href="#!name"><span class="white-text name left-align"><?php echo $user['name'];?></span></a>
                  <a href="#!email"><span class="white-text email left-align"><?php echo $user['phone'];?></span></a>
                </div>
              </li>
              <li><a class="waves-effect" href="archive.php">아카이브</a></li>
              <li><a class="waves-effect" href="menu.php">MOM'S CAFE</a></li>
              <li ><a class="waves-effect" href="#!">한동이야기</a></li>
              <li style="color: black; "><a class="waves-effect" href="mypage.php">마이페이지</a></li>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
          </div>
          <div class="topbar" style="width:100%">
                  <ul class="tabs row">
                    <li class="tab col s3 l2"><a href="#test1">인물소개</a></li>
                    <li class="tab col s3 l2"><a href="#test2">섬기는</a></li>
                    <li class="tab col s3 l2"><a href="#test3">한알의밀알</a></li>
                    <li class="tab col s3 l2"><a href="#test4">우리팀</a></li>
                    <li class="tab col s3 l2"><a href="#test5">DREAM</a></li>
                    <li class="tab col s3 l2"><a href="#test6">갈대상자</a></li>
                  </ul>
                </div>
        </nav>
      </div>
    </header>
  </body>
</html>
