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
    <?php require("nevbar_hope_!tep.php"); ?>
    <main>
        <div class="row center-align" style="margin-top:48px">
            <div class="left-align col s12 m8 l5" style="display:inline-block;float: none;padding:0">

              <form action="Hope_prayer_process.php" method="post">
                   <!--내용물 한블럭-->
                   <div class="card center-align" style="margin:0; border-radius:0; padding:15px">
                      <b style="font-size:16px">기도 제목 쓰기</b>


                      <div class="left-align" style="font-size:15px; padding:0 5%; line-height:30px; margin-top:10px">
                          <span style="width:100%">
                              제목
                              <input class="center-align right" name="title" type="text" placeholder="10글자이내로 작성" style="margin:0;width:70%; height:25px; margin-left:10px" maxlength="10">
                          </span>
                                <br>
                          <span>
                              작성자
                              <input disabled class="center-align right" type="text" value="<?php echo $user['name'];?>" style="margin:0;width:70%; height:25px; margin-left:10px; color:black" maxlength="10">
                          </span>


                          <input type="checkbox" id="익명">
                          <label for="익명" name="nickname" style="font-size:10px; padding-left:25px;line-height:22px">체크하시면 익명으로 작성됩니다.</label>
                      </div>
                   </div>


                   <!-- <input type="text" name="duh" value=""> -->
                   <input name="about" type="hidden">
                     <div id="editor">
                       <p>A robot who has developed sentience, and is the only robot of his kind shown to be still functioning on Earth.</p>
                     </div>
                   <div class="row">
                     <button id='save' type = "submit" class="btn btn-primary">Save Profile</button>
                   </div>

                 </form>
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
