<?php

  $result = mysqli_query($conn, "SELECT com_no FROM user WHERE kakao_id = '".$kakao_id."'");
  $user = mysqli_fetch_array($result);
  $com_no = $user["0"];     //user의 com_no 받아옴

  if(!$com_no == null && $com_no == "4103"){ ?>

  <div class="fixed-action-btn" style="z-index:1030">
  <a class="btn-floating btn-large waves-effect waves-light" style="background-color : #d31e89">
  <i class="large material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a class="btn-floating red">총학</a></li>
    <li><a href="STU_post_edit.php?id=1" class="btn-floating yellow darken-1">따心</a></li>
    <li><a href="STU_post_edit.php?id=2" class="btn-floating green">H가!</a></li>
    <li><a href="STU_post_edit.php?id=3" class="btn-floating blue">캘리</a></li>
  </ul>
  </div>

  <?php }    ?>
