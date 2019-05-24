<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Seoul');
$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, 'igiftu');

$thing = serialize($_POST['about']);

$kakao_id = mysqli_real_escape_string($conn, $_SESSION['id']);
$date = date("Y-m-d");
$title = mysqli_real_escape_string($conn, $_POST['title']);
$nickname = mysqli_real_escape_string($conn, $_POST['nickname']);  //체크박스 해서 DB 넣으면 됨
$sql = "INSERT INTO prayer (kakao_id,date,title,post)
VALUES('".$kakao_id."', '".$date."', '".$title."', '" . mysqli_real_escape_string($conn, $thing) . "')";
$result = mysqli_query($conn, $sql);

$sql = "SELECT * FROM prayer  WHERE kakao_id = '".$kakao_id."' order by post_no desc limit 1"; //저장한곳 access

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$data = unserialize($row['post']);

echo '<br>from db: '.$data;

  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>
      </title>
      <script src="http://code.jquery.com/jquery-latest.js"></script>
      <!-- text-editor -->
      <!-- Include the Quill library -->
      <script src="https://cdn.quilljs.com/1.2.0/quill.js"></script>
      <link href="https://cdn.quilljs.com/1.2.0/quill.snow.css" rel="stylesheet">
    </head>


    <body>
        <script type="text/javascript">
        var content = <?php echo $data;?>;


        // document.write(content);
        </script>

        <!-- Initialize Quill editor -->
        <script type="text/javascript">
        var options = {
          modules: {
            toolbar: false
          },
          theme: 'snow',
        }
        </script>

        <div id="editor">
          <script type="text/javascript">
            var quill = new Quill('#editor', options);
            quill.setContents(content);
            quill.enable(false);
          </script>
        </div>


    </body>
  </html>
