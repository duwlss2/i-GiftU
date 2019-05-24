<?php

  $result = mysqli_query($conn, "SELECT com_no FROM user WHERE kakao_id = '".$kakao_id."'");
  $user = mysqli_fetch_array($result);
  $com_no = mysqli_real_escape_string($conn, $user["0"]);    //user의 com_no 받아옴

  if((!$com_no == null) && $com_no != "4103" ){
  $result = mysqli_query($conn, "SELECT com_name FROM community WHERE com_no = '".$com_no."'");
  $community = mysqli_fetch_array($result);
  $com_name = mysqli_real_escape_string($conn,$community["0"]);     //user의 com_name 받아옴

 ?>

  <div class="fixed-action-btn" style="z-index:1030">
  <a class="btn-floating btn-large waves-effect waves-light" style="background-color : #d396cd">
  <i class="large material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a class="btn-floating red"><?php echo $com_name;?></a></li>
    <li><a href="Hope_post_edit.php?id=1" class="btn-floating yellow darken-1">기도후원</a></li>
    <li><a href="Hope_post_edit.php?id=2" class="btn-floating green">소개</a></li>
  </div>

  <?php }    ?>
