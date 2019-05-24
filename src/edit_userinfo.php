<?php
  session_start();
  $conn = mysqli_connect("127.0.0.1", "root", "dnwnchdnjf206");
  mysqli_select_db($conn, "igiftu");
  $kakao_id = mysqli_real_escape_string($conn, $_SESSION["id"]);

  $sql = "SELECT * FROM user WHERE kakao_id='".$kakao_id."'"; //개인정보
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  ?>


<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->


    <title>회원정보수정</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


    <style>
      input:not([type]), input[type=text], input[type=password], input[type=email], input[type=url], input[type=time], input[type=date], input[type=datetime], input[type=datetime-local], input[type=tel], input[type=number], input[type=search], textarea.materialize-textarea {height: 2.5rem !important}
      .navbar-fixed-top,.navbar-fixed-bottom {position: fixed;right: 0;left: 0;z-index: 1030;}
      @media (min-width: 768px) {.navbar-fixed-top,.navbar-fixed-bottom {border-radius: 0;}}
      .navbar-fixed-bottom {bottom: 0;margin-bottom: 0;border-width: 1px 0 0;}
      </style>
  </head>
<body>
  <!-- <body style="overflow: hidden"> -->

    <header>
     <div class="navbar-fixed" style="z-index: 9999;">
          <nav role="navigation" style="background-color: #005e37">
            <div class="nav-wrapper container center-align" style="font-size:22px">개인정보수정
            </div>
          </nav>
      </div>
    </header>


    <form action="member_edit.php" method="POST">

    <main class="center-align">
        <div class="row" style="margin-bottom:30px; margin-top:15px">
          <div class="col s12 m8 l6" style="display: inline-block; float: none">
            <div class="card-panel grey lighten-5 z-depth-1" style="padding: 5px; padding-right:0">
              <div class="row valign-wrapper" style="margin:0">
                <div class="col s3 m3 l2">
                  <img src="<?php echo $_SESSION['thumb']; ?>" alt="" class="circle" style="width:100%"> <!-- 카카오톡 사진이 들어갈 자리 -->
                </div>
                <div class="col s9 m9 l10" style="font-size: 13px">
                  <table>
                      <tr>
                          <td style="font-size: 17px"><b><?php echo $row['name']; ?></b></td>
                      </tr>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
       
       <div class="row center-align">
        <div class="col s12 l7" style="margin-bottom : 0; margin-top: -10px; padding-left:5px;display: inline-block; float: none">
            <div class="col s12 m10 l10 left-align" style="display: inline-block; float: none">
                <p style="margin:0; font-size:20px"><b>개인정보</b></p>
            </div>
        </div>

        <div class="col s12 l7" style="margin-bottom:5px;display: inline-block; float: none">
          <div class="col s3 l2 right-align" style="display: inline-block; float: none; padding:0">
              휴대폰 :
          </div>
          <div class="col s8 l9 left-align" style="display: inline-block; float: none; margin-right:15px">
                <input id="phone" name="phone" type="text" style="margin:5px" value="<?php echo $row['phone']; ?>">
          </div>
        </div>

        <div class="col s12 l7" style="margin-bottom : 0; margin-top: 30px; padding-left:5px;display: inline-block; float: none">
            <div class="col s12 m10 l10 left-align" style="display: inline-block; float: none; margin-right:15px">
                <p style="margin:0; font-size:20px"><b>계좌정보</b></p>
            </div>
        </div>

        <div class="col s12 l7" style="margin-bottom:80px;display: inline-block; float: none">
          <div class="col s3 l2 right-align" style="display: inline-block; float: none; padding:0">
              예금주명 :
          </div>
          <div class="col s8 l9 left-align" style="display: inline-block; float: none; margin-right:15px">
                <input id="name" name="holder" type="text" style="margin:5px" value="<?php echo $row['holder']; ?>">
          </div>

          <div class="col s3 l2 right-align" style="display: inline-block; float: none; padding:0">
              환불은행 :
          </div>
          <div class="col s8 l9 left-align" style="display: inline-block; float: none; margin-right:15px">
                <input id="bank" name="bank" type="text" style="margin:5px" value="<?php echo $row['bank']; ?>">
          </div>

          <div class="col s3 l2 right-align" style="display: inline-block; float: none; padding:0">
              환불계좌 :
          </div>
          <div class="col s8 l9 left-align" style="display: inline-block; float: none; margin-right:15px">
                <input id="account" name="account_no" type="text" style="margin:5px" value="<?php echo $row['account_no']; ?>">
          </div>
        </div>
        </div>
    </main>


    <footer class="navbar-fixed-bottom">
       <table  style="width:100%; height:50px">
           <tr>
             <td style="padding:0; width:50%">
               <a href="mypage.php" class="waves-effect waves-light btn-large" style="background-color:#6a5a49; width:100%; border-radius:0; font-size:20px">취소하기</a>
             </td>

               <td style="padding:0; width:50%">
                   <button  class="waves-effect waves-light btn-large" type="submit" style="background-color:#005735; width:100%;border-radius:0; font-size:20px">수정하기</a>
               </td>

           </tr>
       </table>
    </footer>
    </form>

      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>
