<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"/>
  <meta name="apple-mobile-web-app-capable" content="yes" />

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="http://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <title>iGiftU 메뉴</title>

     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
     <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


     <style>
          main, footer {padding-left: 300px;}
          @media only screen and (max-width : 992px){main, footer{padding-left: 0;}}
         .topbar{padding-left: 300px}
         @media only screen and (max-width: 992px){.topbar{padding-left:0}}
         .card.small{height:410px}
         @media only screen and (max-width : 1700px){.card.small{height:300px}}
         .indicator{background-color:#454e3b !important}
         .tabs .tab a:hover, .tabs .tab a.active{color:#454e3b !important}
         .tab a{color:rgba(69,78,59, 0.4) !important}
         
        .card-panel, .card{
            box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.14), 0px 0px 3px 0 rgba(0,0,0,0.12), 0px 0px 0px 0px rgba(0,0,0,0.2);
        }
     </style>
</head>
<body style="background-color:#f5f5f5">
   <header>
        <div class="navbar-fixed" style="z-index: 9999;">
          <nav role="navigation" style="background-color:#a1a077">
        
            <!-- 제목 태그-->
            <div class="nav-wrapper topbar center-align" style="margin:0;width:100%">
                <a id="logo-container" href="#" class="brand-logo">Hope</a>
                
                <ul id="slide-out" class="side-nav fixed">
                    <li>
                        <div class="userView">
                              <div class="background">
                                  <img src="http://materializecss.com/images/office.jpg">
                              </div>
                              <a href="#!user"><img class="circle" src=""></a>
                              <a href="#!name"><span class="white-text name left-align">
            <!--                      <?php echo $user['name'];?>-->
                              </span></a>
                              <a href="#!email"><span class="white-text email left-align">
            <!--                    <?php echo $user['phone'];?>-->
                              </span></a>
                        </div>
                    </li>
                    <li><a class="waves-effect" href="archive.php">아카이브</a></li>
                    <li><a class="waves-effect" href="menu.php">MOM'S CAFE</a></li>
                    <li ><a class="waves-effect" href="#!">한동이야기</a></li>
                    <li style="color: black; "><a class="waves-effect" href="mypage.php">마이페이지</a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse">
                    <i class="material-icons">menu</i>
                </a>
          </div>
        </nav>
      </div>
    </header>
   
    <main>
        <div class="row center-align">
            <div class="left-align col s12 m8 l10" style="display:inline-block;float: none;padding:0">

                   <!--내용물 한블럭-->
                   <div class="card center-align" style="margin:0; border-radius:0; padding:5%;">
                        선교사역 나눔
                      
                      
                      <div class="left-align" style="font-size:15px; line-height:30px; margin-top:6px; min-height:120px">
                      
                              <input type="text"  style="margin:0; height:50px" maxlength="40" placeholder="제목">

                             <div style="height:50px">
                                <div style="width:40%; display:inline; line-height:4; margin-right:30px; margin-left:20px">사역일정</div>
                                <div style="display:inline">
                                 <input type="date" class="datepicker" style="width:30%">~
                                 <input type="date" class="datepicker" style="width:30%">
                                 </div>
                             </div>
                              
                              <div class="file-field input-field">
                                  <div class="btn">
                                    <span>File</span>
                                    <input type="file">
                                  </div>
                                  <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                  </div>
                              </div>
                      </div>
                   </div>
                   
                     
                   <textarea class="card" name="" id="" cols="30" rows="10" style="background-color:white; border:0; resize:none; height:280px;margin-top:0; border-radius:0"></textarea>
            </div>
        </div>
    </main>
     
    

 <script>  $(document).ready(function(){
    $('ul.tabs').tabs();
  });

  $(document).ready(function(){
    $('ul.tabs').tabs('select_tab', 'tab_id');
  });
  </script>
 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script src="js/materialize.js"></script>
 <script src="js/init.js"></script>
   <script>$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });</script>
    </body>
</html>