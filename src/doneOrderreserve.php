<?php
  session_start();
  require("nevbar.php");
  $kakao_id = mysqli_real_escape_string($conn, $_SESSION["id"]);

 ?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->


    <title>i-GiftU 미리주문완료</title>
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <style>

        header, main, footer {padding-left: 300px;}
        @media only screen and (max-width : 992px){header, main, footer{padding-left: 0;}}
        .navbar-fixed-top,
        .navbar-fixed-bottom {
          position: fixed;
          right: 0;
          left: 0;
          z-index: 1030;
        }
        @media (min-width: 768px) {
          .navbar-fixed-top,
          .navbar-fixed-bottom {
            border-radius: 0;
          }
        }
        .navbar-fixed-bottom {
          bottom: 0;
          margin-bottom: 0;
          border-width: 1px 0 0;
        }
        p{margin:0}
    </style>



  </head>
<body style="background-color:#f1f1f1">
    <main class="center-align">
    <div class="row" style="margin-bottom:0; margin-top:75px">
      <div class="col s12 m8 l8 center-align" style="display: inline-block; float: none">
        <div class="card" style="padding-bottom:5px; margin:0 10px 0 10px">
       <img class="card " src="http://igiftu.handong.edu/igiftu/img/moms_background.png" alt="화면" style="width:70px; height:70px; margin:0;margin-top:-35px; border-radius:50%">
        <p style="font-size:18px; margin-top:8px; margin-bottom:-16px"><b>수령시간을 엄수해주세요.</b></p>
        <?php
        $phpdate = strtotime( $preorder['preorder_time'] );
                 $mysqldate = date( 'H:i', $phpdate );?>
               <table style="margin-top: 6px; background-color:#ffffff; margin-bottom:0px">
                   <tr>
                       <td class="center-align" style="padding:0">
                           <p style="margin:0;margin-bottom:-10px;font-size:55px;color:red"><b><?php $fulldate = strtotime( $_SESSION['preorder_time'] ); echo date( 'H:i', $fulldate ); ?></b></p>
                       </td>
                   </tr>
                   <tr>
                       <td class="center-align" style="padding:0; padding-bottom:5px; font-size:16px">
                         <b><?php echo $_SESSION['menu']."(".$_SESSION['choice'].')  '.$_SESSION['amount']."잔"; ?></b></td>
                   </tr>
                </table>
                
                <p class="center-align" style="font-size:15px; padding: 10px; margin:0; margin-top:12px; padding-top:19px; border-top:1px solid #ddd">
          결제시 <b>마이페이지&gt;예약주문</b> 내역을 <br>함께 제시해 주세요.
        </p>
               
               <button onclick="window.location.href='mypage.php'" class="btn waves-effect waves-light hoverable" type="submit" name="action" style="background-color:#005e39; height:41px; font-size:18px; margin-bottom:25px; margin-top:6px; width:220px; padding:0">마이페이지 바로가기
          </button>
                </div>

        

      </div>
    </div>

    <footer class="navbar-fixed-bottom">
      <div class="row center-align" >
        <div class="col s8 m8 l4 center-align" style="display: inline-block; float: none">
          
        </div>
      </div>
    </footer>
    </main>

    <script type='text/javascript'>
      //<![CDATA[
        // 사용할 앱의 JavaScript 키를 설정해 주세요.
        Kakao.init('afef33752335de3b77ada62abd43237b');
        // 카카오 로그인 버튼을 생성합니다.
        function sendTo(){
            Kakao.Auth.login({
                //// 메모챗을 발송하기 위해서는 로그인할때 추가적인 scope 을 얻어야 한다.
                scope: "PROFILE,TALK_MESSAGE",
                success: function(res) {
                    Kakao.API.request({
                        url: '/v1/api/talk/memo/send',
                        data: {
                            template_id: '2504',
                            args: '{"${NUMBER}":1}'
                        },
                        success: function(res) {
                            alert('success!');
                            console.log(res);
                        },
                        fail: function(error) {
                            alert('error! \n' + JSON.stringify(error));
                            console.log(error);
                        }
                    })
                },
                fail: function(error) {
                    console.log(error);
                }
            });
          }
      //]]>
    </script>

      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>
