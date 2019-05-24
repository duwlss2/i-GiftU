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
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <div class="col s12 m12 l6" style="display: inline-block; float: none">
          <div class="carousel carousel-slider center" data-indicators="true">

<!--           고정된버튼-->
            <div class="carousel-fixed-item" style="position:relative; left:auto; right:10px; bottom:0; top:10px; text-align: right">
              <a class="btn waves-effect" href="<?php echo $url; ?>" style="height:35px; width:130px; padding:0;border:2px solid #fae7eb; background-color:#f3a3b7; color:#fae7eb">내 쿠폰 보러가기</a>
            </div>

            <!-- 첫번째페이지 -->
            <div class="carousel-item white-text" style="background-image:url('img/walkthrough1.jpg'); background-size:auto 100%">
            </div>
            <!-- 두번째페이지 -->
            <div class="carousel-item" href="#two!"><img src="img/walkthrough2.jpg">
            </div>
          </div>
        </div>
      </div>
    </main>

      <!--  Scripts-->

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
     
    <script src="js/init.js"></script>
    <script> $('.carousel.carousel-slider').carousel({full_width: true});</script>
  </body>
</html>
