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
     <script src="https://cdn.quilljs.com/1.2.0/quill.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
  <?php require("nevbar_hope_!tep.php");  ?>
    <main>
        <div class="row center-align" style="margin-top:48px">
            <div class="left-align col s12 m8 l10" style="display:inline-block;float: none;padding:0">
              <form class="" action="#" method="post">

                   <!--내용물 한블럭-->
                   <div class="card center-align" style="margin:0; border-radius:0; padding:5%;">
                     <?php
                      switch ($_GET['id']) {
                        case '1': {
                          $post_menu="선교 사역 나눔";
                          $post_explain = "공동체의 선교 사역 / 후원 요청 / 공동체 활동 등을 한동인들에게 자유롭게 나누어주세요";
                          $sql="SELECT * FROM mission_post WHERE post_no='".$_GET['post_no']."'";
                          break;
                        }
                        case '2': {
                          $post_menu = "공동체 소개";
                          $post_explain = "공동체를 잘 소개할 수 있는 사진과 글을 이쁘게 올려주세요.";
                          $sql="SELECT * FROM community WHERE post_no='".$_GET['post_no']."'";
                          break;
                        }
                      }
                      $result= mysqli_query($conn,$sql);
                      $row = mysqli_fetch_assoc($result);
                      $post = unserialize($row['post']);
                      $main_img = unserialize($row['main_img']);
                      ?>
                     <b style="font-size:16px"><?php echo $post_menu; ?></b>


                      <div class="left-align" style="font-size:15px; line-height:30px; margin-top:6px; min-height:120px">
                        <?php if($_GET['id']=="1"){ ?>
                          <input type="text" name="title" style="margin:0; height:50px" maxlength="40" value="<?php echo $row['title']; ?>">

                             <div style="height:50px">
                                <div style="width:40%; display:inline; line-height:4; margin-right:30px; margin-left:20px">사역일정</div>
                                <div style="display:inline">
                                 <input type="date" name="date_1" class="datepicker" style="width:30%" value="<?php echo $row['date_1']; ?>">~
                                 <input type="date" name="date_2" class="datepicker" style="width:30%" value="<?php echo $row['date_2']; ?>">
                                 </div>
                             </div>

                            <br>
                            <div class="form-editor">
                              <label for="image">메인 이미지</label>
                              <input type="hidden" name="image">
                              <div id="image_editor">
                                <!-- <script type="text/javascript">
                                    var quill = new Quill('#editor', options);
                                    quill.setContents();
                                </script> -->
                              </div>
                            </div>
                            <br>
                      <?php } ?> <!-- 선교사역나눔 메인 이미지 수정페이지 끝 -->

                      <!-- 선교나눔 및 공동체소개 컨텐츠 수정페이지 시작 -->
                            <div class="form-editor">
                              <label for="about">사역 내역</label>
                              <input type="hidden" name="about">
                              <div id="editor">
                                <!-- <script type="text/javascript">
                                    var quill = new Quill('#editor', options);
                                    quill.setContents();
                                </script> -->
                              </div>
                            </div>

                            <div class="row">
                              <button id='save' type = "submit" class="btn btn-primary">수정하기</button>
                            </div>
                      </div>

                  </div>
                </form>
            </div>
        </div>
    </main>


    <!-- Initialize Quill editor -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script>
    var toolbarOptions = [
      [{ 'header': [1, 2, 3, 4, 5, 6, false] }],  //글꼴 크기
      ['bold', 'italic', 'underline'],
      [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
      [{ 'align': [] }],
      [{ 'list': 'ordered'}, { 'list': 'bullet' }, 'blockquote'],
      [{ 'script': 'sub'}, { 'script': 'super' }, { 'indent': '-1'}, { 'indent': '+1' }],      // superscript/subscript/outdent/indent
      ['image', 'video']

      //['clean']                                         // remove formatting button
    ];


    var quill = new Quill('#editor', {
      modules: {
        toolbar: toolbarOptions
      },
      theme: 'snow'
    });

    var quill2 = new Quill('#image_editor', {
      modules: {
        toolbar: ['image']
      },
      theme: 'snow',
      placeholder: <?php echo $post; ?>
    });

    $(document).ready(function(){
      var editor_image = document.querySelector('#image_editor');
      editor_image.value = quill2.setContents(<?php echo $main_img; ?>);

      var editor_post = document.querySelector('#editor');
      editor_post.value = quill.setContents(<?php echo $post; ?>);
    });

    var form = document.querySelector('form');
    form.onsubmit = function() {
        // Populate hidden form on submit
        var image = document.querySelector('input[name=image]');
        image.value = JSON.stringify(quill.getContents());

        var about = document.querySelector('input[name=about]');
        about.value = JSON.stringify(quill2.getContents());

        alert("image = "+image+"image.value = "+image.value+"about = "+about+"about.value = "+about.value);
    }

   $(document).ready(function(){
      $('ul.tabs').tabs();
      $('ul.tabs').tabs('select_tab', 'tab_id');
    });

    $('.datepicker').pickadate({
     selectMonths: true, // Creates a dropdown to control month
     selectYears: 15 // Creates a dropdown of 15 years to control year
    });
  </script>

</body>
</html>
