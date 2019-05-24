<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"/>
  <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>iGiftU 메뉴</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://cdn.quilljs.com/1.2.0/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.2.0/quill.snow.css" rel="stylesheet">


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
  <?php
  require("nevbar_hope_!tep.php");
  require("admin_footer_2.php");
  $com_no = $_GET['id'];
  $sql = "SELECT * FROM community WHERE com_no = '".$com_no."'"; //최신 5개
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result)

  //$com_ no 와 $com_name 은 있음
  ?>
    <main>
        <div class="row center-align" style="margin-top:48px">
            <div class="left-align col s12 m8 l5" style="display:inline-block;float: none;padding:0">


                <!--동아리 소개 블럭-->
                <div class="row" style="margin-bottom:8px;">
                   <!--동아리 소개 헤드-->
                    <div class="col s12 center-align" style="padding:0">
                        <div class="card" style="margin:0">


                            <img class="circle" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="동아리 사진" style="width:50px; height:50px; margin-top:30px">
                            <p style="color:black; font-size:24px; margin-top:-7.5px;margin-bottom:15px"><?php echo $row['com_name']; ?></p>


                            <!--동아리 소개의 Tab-->
                            <div class="card" style="width:100%; margin:0">
                             <!--tab의 overflow-x를 지우면 스크롤바가 다시 생성됨-->
                              <ul class="tabs row" style="overflow-x:hidden; height:45px">
                                <li class="tab col s6"><a href="#prayEmail">사역나눔</a></li>
                                <li class="tab col s6"><a href="#report">공동체 소개</a></li>
                              </ul>
                            </div>
                        </div>
                    </div>

                    <div id="prayEmail">
                      <script type="text/javascript">
                          var options = {
                            modules: {
                              toolbar: false
                            },
                            theme: 'snow',
                          }
                      </script>

                      <?php
                      $result0 = mysqli_query($conn, "SELECT * FROM mission_post WHERE com_no = '".$com_no."' ORDER BY post_no DESC");
                      while($row0 = mysqli_fetch_assoc($result0)){
                        $main_img = unserialize($row0['main_img']);
                        ?>
                        <!--내용물 한블럭-->
                        <div class="col s12" style="padding:0 8px 8px 8px">
                           <a href="HOPE_post.php?id=<?php echo $row0['post_no']; ?>">
                           <div class="card" style="margin:8px 0 0 0; border-radius:0; padding:15px">
                              <b style="font-size:17px; line-height:17px"><?php echo $row0['title']; ?></b>
                              <span class="right" style="font-size:10px; color:#a1a1a1"><?php echo $row0['date_1']; ?>~<?php echo $row0['date_2']; ?></span>
                              <p style="margin:10px 0 10px 0">
                                <div id="<?php echo 'editor'.$row0['post_no'] ;?>">
                                  <script type="text/javascript">
                                      var quill = new Quill('<?php echo '#editor'.$row0['post_no'] ;?>', options);
                                      quill.setContents(<?php echo $main_img; ?>);
                                      quill.enable(false);
                                  </script>
                                </div>
                              </p>
                           </div>
                           </a>
                        </div>
                        <?php  } ?>
                    </div>

                    <!--공동체 소개 -->
                    <div id="report">
                        <!--컨텐츠를 감싸는 블럭-->
                        <div class="col s12" style="padding:0 8px 8px 8px">
                          <?php
                          $result2 = mysqli_query($conn, "SELECT * FROM community WHERE com_no = '".$com_no."'");
                          $row2 = mysqli_fetch_assoc($result2);
                          $post = unserialize($row2['com_intro']);
                            ?>
                           <!--컨텐츠 한블럭-->
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


                        </div>
                    </div>

                <!--헤더를 제외한 전체 컨텐츠end-->
                </div>
            </div>
        </div>
    </main>


   <script>
      $(document).ready(function(){
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
