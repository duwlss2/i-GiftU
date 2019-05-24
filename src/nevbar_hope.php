<?php require("nevbar_userinfo.php"); ?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    </head>
    <body>
      <header>
           <div class="navbar-fixed" style="z-index: 9999;">
             <nav role="navigation" style="background-color:#d396cd">
               <div class="nav-wrapper center-align topbar" style="margin:0; padding:0; width:100%">
                 <b id="logo-container" href="#" class="brand-logo" style="font-size:27px">HOPE</b>
               <?php require("nevbar_menu.php"); ?>
             </div>
             <!--topbar>모바일 제외, PC화면에서 옆쪽 패딩 넣어주는 역할, Tab의 개수를 늘리려면 li의 col s3를 건드리면 됨-->
             <div class="topbar card" style="width:100%; margin:0">
                <!--tab의 overflow-x를 지우면 스크롤바가 다시 생성됨-->
                 <ul class="tabs row" style="overflow-x:hidden">
                   <li class="tab col s3"><a href="#test1">기도편지</a></li>
                   <li class="tab col s3"><a href="#test2">예배일정</a></li>
                   <li class="tab col s3"><a href="#test3">모임소개</a></li>
                   <li class="tab col s3"><a href="#test4">HOPE</a></li>
                 </ul>
             </div>
           </nav>
         </div>
       </header>
  </body>
</html>
