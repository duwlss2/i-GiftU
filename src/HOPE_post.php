<?php session_start(); ?>
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

     <script src="https://cdn.quilljs.com/1.2.0/quill.js"></script>
     <link href="https://cdn.quilljs.com/1.2.0/quill.snow.css" rel="stylesheet">


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
  <?php
  require("nevbar_hope_!tep.php");
  require("admin_footer_2.php");

  $post_no = mysqli_real_escape_string($conn, $_GET['id']);
  $result = mysqli_query($conn, "SELECT * FROM mission_post WHERE post_no = '".$post_no."'");  //포스트 내용을 불러온다
  $row = mysqli_fetch_assoc($result);
  $post = unserialize($row['post']);

  $result0 = mysqli_query($conn, "SELECT * FROM community WHERE com_no = '".$row['com_no']."'");
  $row0 = mysqli_fetch_assoc($result0);
   ?>

    <main>
        <div class="row center-align" style="margin-top:48px">
            <div class="left-align col s12 m8 l5" style="display:inline-block;float: none;padding:0">

                   <!--내용물 한블럭-->
                   <div class="card" style="margin:0; border-radius:0; padding:18px;">
                      <b style="font-size:18px"><?php echo $row0['com_name']; ?></b>
                      <p style="margin:0 1px 0 0; font-size:20px">
                          <?php echo $row['title']; ?>
                      </p>
                      <p style="margin: 2px 0 17px 0; font-size:15px;color:#ccc;">
                          <?php echo $row['date_1']."~".$row['date_2']; ?>
                      </p>

                      <div class="card" style="margin:8px 0 0 0; border-radius:0; padding:15px">
                         <p style="margin:10px 0 10px 0">
                           <div id="com_intro">
                             <script type="text/javascript">
                                 var options = {
                                   modules: {
                                     toolbar: false
                                   },
                                   theme: 'snow',
                                 }

                                 var quill = new Quill('#com_intro', options);
                                 quill.setContents(<?php echo $post; ?>);
                                 quill.enable(false);
                             </script>
                           </div>
                         </p>
                      </div>

                      <?php if((!$com_no==null)&&($com_no==$row0['com_no'])){ ?>
                      <a href="HOPE_post_modify.php?post_no=<?php echo $_GET['id']; ?>&amp;id=1">수정</a>
                      &emsp;
                      <a href="HOPE_post_delete.php?post_no=<?php echo $_GET['id']; ?>&amp;id=1">삭제</a>
                      <?php } ?>
                   </div>
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
    </body>
</html>
