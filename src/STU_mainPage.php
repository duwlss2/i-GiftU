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
     <link href="./css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

     <script src="https://cdn.quilljs.com/1.2.0/quill.js"></script>
     <link href="https://cdn.quilljs.com/1.2.0/quill.snow.css" rel="stylesheet">


     <style>
          main, footer {padding-left: 300px;}
          @media only screen and (max-width : 992px){main, footer{padding-left: 0;}}
         .topbar{padding-left: 300px !important}
         @media only screen and (max-width: 992px){.topbar{padding-left:0 !important}}
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
  <?php require("nevbar_stu.php");
        require("admin_footer_1.php"); ?>
    <main style="margin-top:48px">
        <div class="row center-align">
            <div class="left-align col s12 m12 l6" style="display:inline-block;float: none;padding:0">

              <!-- 전체 탭 -->
                <div id="all">
                  <?php
                  // order by post_no desc limit 15
                  $sql = "SELECT * FROM stu_post "; //최신 15개
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)){
                    $post = unserialize($row['main_img']);
                  ?>
                   <!--내용물 한블럭-->
                   <div class="card" style="margin:12px 0 0 0; border-radius:0; padding:15px">
                     <a href="STU_post.php?id=<?php echo $row['post_no']; ?>" style="color:black">
                      <b style="font-size:16px; margin-left:4px"><?php echo $row['tab_name']; ?></b>

                      <p style="margin:0 1px 0 4px; font-size:16px">
                          <?php echo $row['title']; ?>
                      </p>
                      <p style="margin: 2px 0 6px 5px; font-size:13px;color:#ccc;">
                          <?php echo $row['date']; ?>
                      </p>
                      <p style="margin:0 0 8px 4px; font-size:15px">
                          좋아요 14
                      </p>
                      <div id="<?php echo 'editor'.$row['post_no'] ;?>">
                          <script type="text/javascript">
                              var options = {
                                modules: {
                                  toolbar: false
                                },
                                theme: 'snow',
                              }
                              var quill = new Quill('<?php echo '#editor'.$row['post_no'] ;?>', options);
                              quill.setContents(<?php echo $post; ?>);
                              quill.enable(false);
                          </script>
                        </div>
                      </div>
                    </a>
                    <?php } ?>
                    </div>

                <!-- 한동 탭 -->
                <div id="handong">
                  <?php
                  $tab_name1 = "따心";
                  $tab_name2 = "H가간다!";
                  $sql = "SELECT * FROM stu_post WHERE tab_name = '".$tab_name1."' || tab_name = '".$tab_name2."'" ; //최신 5개
                  $result1 = mysqli_query($conn, $sql);
                  while($row1 = mysqli_fetch_assoc($result1)){
                    $post = unserialize($row1['main_img']);
                  ?>
                  <div class="card" style="margin:12px 0 0 0; border-radius:0; padding:15px">
                     <a href="STU_post.php?id=<?php echo $row1['post_no']; ?>" style="color:black">
                      <b style="font-size:16px; margin-left:4px"><?php echo $row1['tab_name']; ?></b>

                      <p style="margin:0 1px 0 4px; font-size:16px">
                          <?php echo $row1['title']; ?>
                      </p>
                      <p style="margin: 2px 0 6px 5px; font-size:13px;color:#ccc;">
                          <?php echo $row1['date']; ?>
                      </p>
                      <p style="margin:0 0 8px 4px; font-size:15px">
                          좋아요 14
                      </p>
                      <div id="<?php echo 'editor1'.$row1['post_no'] ;?>">
                          <script type="text/javascript">
                              var options = {
                                modules: {
                                  toolbar: false
                                },
                                theme: 'snow',
                              }
                              var quill = new Quill('<?php echo '#editor1'.$row1['post_no'] ;?>', options);
                              quill.setContents(<?php echo $post; ?>);
                              quill.enable(false);
                          </script>
                        </div>
                    </a>
                  </div>
                  <?php } ?>
                </div>

                <div id="story">
                   <!--내용물 한블럭-->
                   <div class="card" style="margin:12px 0 0 0; border-radius:0; padding:15px; color:black">
                      <b style="font-size:16px; margin-left:4px">캘리</b>

                      <p style="margin:0 1px 0 4px; font-size:16px">
                          마음의 소리
                      </p>
                      <p style="margin: 2px 0 6px 5px; font-size:13px;color:#ccc;">
                          2017.02.04
                      </p>
                      <p style="margin:0 0 8px 4px; font-size:15px">
                          좋아요 14
                      </p>

                      <img src="https://s-media-cache-ak0.pinimg.com/originals/d4/e6/1f/d4e61f7ed09741b8de3dab399ab71786.jpg" alt="캘리 사진" style="width:100%; display:block">
                   </div>
                 </div>

                <div id="calli">
                  <?php
                  $tab_name3 = "감성캘리";
                  $sql2 = "SELECT * FROM stu_post WHERE tab_name = '".$tab_name3."'"; //최신 5개
                  // order by post_no desc
                  $result2 = mysqli_query($conn, $sql2);
                  while($row2 = mysqli_fetch_assoc($result2)){
                    $post = unserialize($row2['main_img']);
                  ?>
                   <!--내용물 한블럭-->
                   <div class="card" style="margin:12px 0 0 0; border-radius:0; padding:15px">
                     <a href="STU_post.php?id=<?php echo $row2['post_no']; ?>" style="color:black">
                      <b style="font-size:16px; margin-left:4px"><?php echo $row2['tab_name']; ?></b>

                      <p style="margin:0 1px 0 4px; font-size:16px">
                          <?php echo $row2['title']; ?>
                      </p>
                      <p style="margin: 2px 0 6px 5px; font-size:13px;color:#ccc;">
                          <?php echo $row2['date']; ?>
                      </p>
                      <p style="margin:0 0 8px 4px; font-size:15px">
                          좋아요 14
                      </p>
                      <div id="<?php echo 'editor2'.$row2['post_no'] ;?>">
                          <script type="text/javascript">
                              var options = {
                                modules: {
                                  toolbar: false
                                },
                                theme: 'snow',
                              }
                              var quill = new Quill('<?php echo '#editor2'.$row2['post_no'] ;?>', options);
                              quill.setContents(<?php echo $post; ?>);
                              quill.enable(false);
                          </script>
                        </div>
                    </a>
                    </div>
                   <?php }?>
                </div>

                <!-- 캘리그라피  -->

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
