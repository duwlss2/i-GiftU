<?php
  parse_str($_SERVER['QUERY_STRING']);
  $url = 'coupon2.php?id='.$id.'&no='.$no;
 ?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">

    <title></title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <style>

        header, main, footer {padding-left: 300px;}
        @media only screen and (max-width : 992px){header, main, footer{padding-left: 0;}}

    </style>
  </head>
<body>
  <!-- <body style="overflow: hidden"> -->
    <main class="center-align">
      <div class="row" style="padding-top:12px">
        <div class="col s12 m8 l6" style="display: inline-block; float: none">
            
            
            <!-- 첫번째페이지 -->
            <img src="img/walkthrough1.jpg" alt="안내페이지 1번" style="width:100%">
            <img src="img/walkthrough2.jpg" alt="안내페이지 2번" style="width:100%">

            <div style="position:fixed; left:auto; right:20px; bottom:0; top:20px; text-align: right">
                <a class="btn waves-effect" href="<?php echo $url; ?>" style="height:35px; width:130px; padding:0;border:2px solid #fae7eb; background-color:#f3a3b7; color:#fae7eb; font-size:12px; line-height:31px">내 쿠폰 보러가기</a>
            </div>
        </div>
      </div>
    </main>

      <!--  Scripts-->

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script> $('.carousel.carousel-slider').carousel({full_width: true});</script>
  </body>
</html>
