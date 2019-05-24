<?php session_start();
      ob_start(); ?>
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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


     <style>
          main, footer {padding-left: 300px;}
          @media only screen and (max-width : 992px){main, footer{padding-left: 0;}}
         .topbar{padding-left: 300px}
         @media only screen and (max-width: 992px){.topbar{padding-left:0}}
         .card.small{height:410px}
         @media only screen and (max-width : 1700px){.card.small{height:300px}}
         .indicator{background-color:#126a3a !important}
         .tabs .tab a:hover, .tabs .tab a.active{color:#126a3a !important}
         .tab a{color:rgba(18,106,58, 0.4) !important}

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
        .card-panel, .card{
            box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.14), 0px 0px 3px 0 rgba(0,0,0,0.12), 0px 0px 0px 0px rgba(0,0,0,0.2);
        }
     </style>
</head>
<body style="background-color:#eee">
   <header>
        <div class="navbar-fixed" style="z-index: 9999;">
          <nav role="navigation" style="background-color:#126a3a">
            <?php require("nevbar_stu_!tep.php"); ?>
        </nav>
      </div>
    </header>

    <main>
        <div class="row center-align" style="margin-top:48px">
            <div class="left-align col s12 m8 l5" style="display:inline-block;float: none;padding:0">
              <ul class="collection" style="padding-top: 10px; margin: 0px">

                <?php
                $sql0 = "SELECT * FROM stu_personal_story WHERE tab_no = '".$_GET['id']."' order by post_no desc ";
                $result0 = mysqli_query($conn, $sql0);
                if($result3->num_rows == "0"){
                  echo "아직 사연이 없습니다. 처음으로 사연을 올려보세요!";
                } else {
                while($row0 = mysqli_fetch_assoc($result0)){

                  $sql2 = "SELECT thumbnail FROM user WHERE kakao_id = '".$row0['kakao_id']."'";
                  $result2 = mysqli_query($conn, $sql2);
                  $row2 = mysqli_fetch_array($result2)     //글 쓴 사람의 썸네일, 이름 등
                ?>
                  <a href="stu_personal_post.php?id=<?php echo $row0['post_no']; ?>">
                  <li class="collection-item avatar">
                    <img src="<?php echo $row2['thumbnail']; ?>" alt="" class="circle">
                    <span class="title" style="color:#126a3a"><?php echo $row0['title']; ?></span>
                    <p class="truncate"><?php echo $row0['post']; ?>  <br>
                       <label><?php echo $row0['post_date']; ?></label>
                    </p>
                    <p class="right-align" style="margin: 0 0 7px 0; font-size:13px;color:#126a3a">
                        <i class="fa fa-heart" aria-hidden="true"></i>13
                    </p>
                  </li>
                  <?php } } ?>
                </a>
              </ul>
            </div>
        </div>

        <div class="fixed-action-btn" style="z-index:1030">
        <a href="stu_personal_edit.php?id=<?php echo $_GET['id']; ?>" class="btn-floating btn-large waves-effect waves-light" style="background-color : #005735">
        <i class="large material-icons">mode_edit</i>
        </a>
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
 <script src="js/materialize.js">
       $('#textarea1').val('New Text');
        $('#textarea1').trigger('autoresize');
    </script>
 <script src="js/init.js"></script>


    </body>
</html>
