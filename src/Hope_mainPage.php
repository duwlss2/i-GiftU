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

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="http://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <title>iGiftU 메뉴</title>

     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
     <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


     <style>
          main, footer {padding-left: 300px;}
          @media only screen and (max-width : 992px){main, footer{padding-left: 0;}}
         .topbar{padding-left: 300px !important}
         @media only screen and (max-width: 992px){.topbar{padding-left:0 !important}}
         .card.small{height:410px}
         @media only screen and (max-width : 1700px){.card.small{height:300px}}
         .indicator{background-color:#454e3b !important}
         .tabs .tab a:hover, .tabs .tab a.active{color:#454e3b !important}
         .tab a{color:rgba(69,78,59, 0.4) !important}

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

         td{border-right:1px solid #f1f1f1; width:25%; padding:10px 0; text-align: center;color:#999;font-size:12px}
         tr{border-bottom: 1px solid #f1f1f1}
     </style>
</head>
<body style="background-color:#f5f5f5">
  <?php require("nevbar_hope.php"); ?>
    <main>
        <div class="row center-align" style="margin:48px 0 0 0">
            <div id="test1" class="left-align col s12 m10 l6" style="display:inline-block;float: none;padding:0px; max-width:390px">

                <!--선교 사역 나눔 블럭-->
                <div class="row card" style="margin-bottom:8px; padding:0 15px 0 7px">


                   <!--기도 편지의 헤드, 헤드와 내용물의 간격조정은 바로 밑의 div의 margin-bottom-->
                    <div class="col s12" style="height:32px;line-height:27px; padding:0 0 0 12px; margin-top:10px; margin-bottom:-5px">
                        <b href="#!" data-activates="slide-out" class="left" style="color:black; font-size:15px">선교 사역 나눔</b>
                        <a class="right" href="#!" style="color:black; margin-right:2px;"><i class="material-icons right" style="line-height:32px">more_vert</i></a>
                            <!--적당한 아이콘 찾아서 more_vert를 바꿔주세용-->
                    </div>

                    <?php
                    $sql0 = "SELECT * FROM mission_post order by post_no desc limit 4";
                    $result0 = mysqli_query($conn, $sql0);
                    while($row0 = mysqli_fetch_assoc($result0)){

                      $sql2 = "SELECT com_name FROM community WHERE com_no = '".$row0['com_no']."'";
                      $result2 = mysqli_query($conn, $sql2);
                      $row2 = mysqli_fetch_array($result2)
                    ?>
                    <div class="col s6 center-align" style="padding:12px 0 0 8px">
                      <a href="Hope_CommunityIntro.php?id=<?php echo $row0['com_no']; ?>">
                          <div class="card" style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:100px">
                              </div>

                              <div class="left-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:55px">
                                <p style="margin:0; padding:0; line-height:20px"><span style="color:#649a71"><?php echo $row2['0']; ?></span> &nbsp;<?php echo $row0['title']; ?></p>
                              </div>
                          </div>
                       </a>
                    </div>
                    <?php } ?>

                    <!--더보기를 눌렀을 때 나오는 링크-->
                    <a href="#!">
                    <div class="col s12 center-align" style="padding:0 0 0 8px;margin:8px 0 0 0">
                       <div style="margin:0; border-radius:0;height:42px; line-height:42px; border-top:1px solid #f2f2f2">
                          <span style="color:#777;font-size:13px">더보기</span>
                       </div>
                    </div>
                    </a>
                </div>

                <!--기도제목 블럭-->
                <div class="row" style="margin-bottom:12px">
                   <!--기도제목의 헤드-->
                    <div class="col s12 left-align" style="padding:0">
                        <div class="card" style="margin:0; border-radius:0;height:45px; line-height:33px; padding-top:5px">
                            <b style="color:black; padding-left:15px; font-size:15px">기도 제목</b>
                            <span style="font-size:12px">&nbsp;일상을 망치러 온 나의 구원자</span>
                            <a class="right" href="#!" style="color:black; font-size:17px; margin-right:10px;"><i class="material-icons right" style="line-height:37px">more_vert</i></a>
                            <!--적당한 아이콘 찾아서 more_vert를 바꿔주세용-->
                        </div>
                    </div>

                    <?php
                    $sql = "SELECT * FROM prayer order by post_no desc limit 5"; //최신 5개
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <!--내용 한블럭 (!내용물이 너무 많을 때, class="truncate"로 인해 그 뒤 내용은 ...으로 축약됨)-->
                    <div class="col s12 left-align" style="padding:0">
                      <a href="HOPE_prayer_post.php?id=<?php echo $row['post_no']; ?>">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:13px"><?php echo $row['title']; ?></span>
                       </div>
                      </a>
                    </div>
                    <?php } ?>

                    <!--기도제목의 꼬리-->
                    <a href="Hope_edit_personal_app.php" class="col s12 center-align" style="padding:0">
                       <div class="card" style="margin:0; border-radius:0;height:42px; line-height:42px">
                          <b style="color:#777; padding-left:15px; font-size:13px">기도 제목 쓰러가기</b>
                       </div>
                    </a>

                </div>


                <!--선교위원회 1 블럭-->
                <div class="row card" style="margin-bottom:8px; padding: 0 15px 0 7px">


                   <!--기도 편지의 헤드, 헤드와 내용물의 간격조정은 바로 밑의 div의 margin-bottom-->
                    <div class="col s12" style="height:32px;line-height:27px; padding:0 0 0 12px; margin-top:10px; margin-bottom:-5px">
                        <b href="#!" data-activates="slide-out" class="left" style="color:black; font-size:15px">선교위원회 1</b>
                        <a class="right" href="#!" style="color:black; margin-right:2px;"><i class="material-icons right" style="line-height:32px">more_vert</i></a>
                            <!--적당한 아이콘 찾아서 more_vert를 바꿔주세용-->
                    </div>

                    <?php
                    $sql0 = "SELECT * FROM mission_post order by post_no desc limit 4";
                    $result0 = mysqli_query($conn, $sql0);
                    while($row0 = mysqli_fetch_assoc($result0)){

                      $sql2 = "SELECT com_name FROM community WHERE com_no = '".$row0['com_no']."'";
                      $result2 = mysqli_query($conn, $sql2);
                      $row2 = mysqli_fetch_array($result2)
                    ?>
                    <div class="col s6 center-align" style="padding:12px 0 0 8px">
                      <a href="Hope_CommunityIntro.php?id=<?php echo $row0['com_no']; ?>">
                          <div class="card" style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:100px">
                              </div>

                              <div class="left-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:55px">
                                <p style="margin:0; padding:0; line-height:20px"><span style="color:#649a71"><?php echo $row2['0']; ?></span> &nbsp;<?php echo $row0['title']; ?></p>
                              </div>
                          </div>
                       </a>
                    </div>
                    <?php } ?>

                    <!--더보기를 눌렀을 때 나오는 링크-->
                    <a href="#!">
                    <div class="col s12 center-align" style="padding:0 0 0 8px;margin:8px 0 0 0">
                       <div style="margin:0; border-radius:0;height:42px; line-height:42px; border-top:1px solid #f2f2f2">
                          <span style="color:#777;font-size:13px">더보기</span>
                       </div>
                    </div>
                    </a>
                </div>



                <?php require("admin_footer_2.php");?>





                <!--동아리 모음1-->
                <div class="row card" style="margin-bottom:8px">
                    <div class="col s12" style="padding:0">
                        <table>
                            <tr>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">Bov</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">CCC</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">Crist 90%</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">FRON</td>
                            </tr>
                            <tr>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">GO</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">IVF</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">JDM</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">Jesus Army</td>
                            </tr>
                            <tr style="border:0">
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">LAMB</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">Navigators</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">NIBC</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">SFC</td>
                            </tr>
                        </table>
                    </div>
                </div>


                <!--이름없는 블럭-->
                <div class="row card" style="margin-bottom:8px; padding: 0 15px 12px 7px">

                    <?php
                    $sql0 = "SELECT * FROM mission_post order by post_no desc limit 4";
                    $result0 = mysqli_query($conn, $sql0);
                    while($row0 = mysqli_fetch_assoc($result0)){

                      $sql2 = "SELECT com_name FROM community WHERE com_no = '".$row0['com_no']."'";
                      $result2 = mysqli_query($conn, $sql2);
                      $row2 = mysqli_fetch_array($result2)
                    ?>
                    <div class="col s6 center-align" style="padding:12px 0 0 8px">
                      <a href="Hope_CommunityIntro.php?id=<?php echo $row0['com_no']; ?>">
                          <div class="card" style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:100px">
                              </div>

                              <div class="left-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:55px">
                                <p style="margin:0; padding:0; line-height:20px"><span style="color:#649a71"><?php echo $row2['0']; ?></span> &nbsp;<?php echo $row0['title']; ?></p>
                              </div>
                          </div>
                       </a>
                    </div>
                    <?php } ?>

                </div>



                <!--선교위원회 2 블럭-->
                <div class="row card" style="margin-bottom:8px; padding-right:8px">


                   <!--기도 편지의 헤드, 헤드와 내용물의 간격조정은 바로 밑의 div의 margin-bottom-->
                    <div class="col s12" style="height:32px;line-height:32px; padding:0 0 0 19px; margin-top:10px; margin-bottom:0px">
                        <b href="#!" data-activates="slide-out" class="left" style="color:black; font-size:15px">선교위원회 2</b>
                        <span style="font-size:14px">&nbsp;&nbsp;일상을 망치러 온 나의 구원자</span>
                        <a class="right" href="#!" style="color:black; margin-right:2px;"><i class="material-icons right" style="line-height:32px">more_vert</i></a>
                            <!--적당한 아이콘 찾아서 more_vert를 바꿔주세용-->
                    </div>

                    <?php
                    $sql0 = "SELECT * FROM mission_post order by post_no desc limit 4";
                    $result0 = mysqli_query($conn, $sql0);
                    while($row0 = mysqli_fetch_assoc($result0)){

                      $sql2 = "SELECT com_name FROM community WHERE com_no = '".$row0['com_no']."'";
                      $result2 = mysqli_query($conn, $sql2);
                      $row2 = mysqli_fetch_array($result2)
                    ?>
                    <div class="col s12 center-align" style="padding:6px 15px">
                       <a href="Hope_CommunityIntro.php?id=<?php echo $row0['com_no']; ?>">
                          <div class="valign-wrapper" style="margin:0; border-radius:0; z-index:0; min-height:65px">
                              <div class="valign waves-effect waves-block waves-light" style="z-index:1; margin-right:15px; width:100px; min-width:100px">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:65px">
                              </div>

                              <div class="left-align valign" style="color:black; z-index:2">
                                <p style="margin:0; padding:0"> &nbsp;<?php echo $row0['title']; ?></p>
                              </div>
                          </div>
                       </a>
                    </div>
                    <?php } ?>
                    <!--더보기를 눌렀을 때 나오는 링크-->
                    <a href="#!">
                    <div class="col s12 center-align" style="padding:0 0 0 8px;margin:8px 0 0 0">
                       <div style="margin:0; border-radius:0;height:42px; line-height:42px; border-top:1px solid #f2f2f2">
                          <span style="color:#777;font-size:13px">더보기</span>
                       </div>
                    </div>
                    </a>
                </div>



                <!--동아리 모음2-->
                <div class="row card" style="margin-bottom:8px">
                    <div class="col s12" style="padding:0">
                        <table>
                            <tr>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">UBF</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">북중모</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">비전선교단</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">예수전도단</td>
                            </tr>
                            <tr style="border:0">
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">오르</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">인터콥</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">MNT</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">학선위</td>
                            </tr>
                        </table>
                    </div>
                </div>



                <!--학선위 블럭-->
                <div class="row card" style="margin-bottom:8px; padding: 0 15px 0 7px">


                   <!--선교 보고의 헤드, 헤드와 내용물의 간격조정은 바로 밑의 div의 margin-bottom-->
                    <div class="col s12" style="height:32px;line-height:27px; padding:0 0 0 12px; margin-top:10px; margin-bottom:-5px">
                        <b href="#!" data-activates="slide-out" class="left" style="color:black; font-size:15px">학선위</b>
                        <a class="right" href="#!" style="color:black; margin-right:2px;"><i class="material-icons right" style="line-height:32px">more_vert</i></a>
                            <!--적당한 아이콘 찾아서 more_vert를 바꿔주세용-->
                    </div>

                    <div class="col s6 center-align" style="padding:12px 0 0 8px">
                       <a href="">
                          <div class="card" style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:100px">
                              </div>

                              <div class="left-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:55px">
                                <p style="margin:0; padding:0; line-height:20px">기도합니다abcdefghi</p>
                              </div>
                          </div>
                       </a>

                    </div>

                    <div class="col s6 center-align" style="padding:12px 0 0 8px">
                       <a href="">
                          <div class="card" style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:100px">
                              </div>

                              <div class="left-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:55px">
                                <p style="margin:0; padding:0; line-height:20px">기도합니다abcdefghi</p>
                              </div>
                          </div>
                       </a>
                    </div>

                    <div class="col s6 center-align" style="padding:12px 0 0 8px">
                       <a href="">
                          <div class="card" style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:100px">
                              </div>

                              <div class="left-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:55px">
                                <p style="margin:0; padding:0; line-height:20px">기도합니다abcdefghi</p>
                              </div>
                          </div>
                       </a>
                    </div>

                    <div class="col s6 center-align" style="padding:12px 0 0 8px">
                       <a href="">
                          <div class="card" style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:100px">
                              </div>

                              <div class="left-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:55px">
                                <p style="margin:0; padding:0; line-height:20px">기도합니다abcdefghi</p>
                              </div>
                          </div>
                       </a>
                    </div>

                    <!--더보기를 눌렀을 때 나오는 링크-->
                    <a href="#!">
                    <div class="col s12 center-align" style="padding:0 0 0 8px;margin:8px 0 0px 0">
                       <div style="margin:0; border-radius:0;height:42px; line-height:42px; border-top:1px solid #f2f2f2">
                          <span style="color:#777;font-size:13px">더보기</span>
                       </div>
                    </div>
                    </a>
                </div>


            </div>


            <div id="test2">
                <!--2번째 탭에 들어갈 내용-->
            </div>

            <div id="test3">

            </div>
        </div>
    </main>

    <!-- Initialize Quill editor -->
    <script>
    var quill = new Quill('#editor', {
      modules: {
        toolbar: [
          ['bold', 'italic'],
          ['link', 'blockquote', 'code-block', 'image'],
          [{ list: 'ordered' }, { list: 'bullet' }]
        ]
      },
      placeholder: 'Compose an epic...',
      theme: 'snow'
    });

    var form = document.querySelector('form');
    form.onsubmit = function() {
        // Populate hidden form on submit
        var about = document.querySelector('input[name=about]');
        about.value = JSON.stringify(quill.getContents());

        console.log("Submitted", $(form).serialize(), $(form).serializeArray());
    }
    // $('#save').click(function(){
    //   window.delta = quill.getContents();
    //   console.log(window.delta);
    // });
    </script>

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
