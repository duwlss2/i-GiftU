  <ul id="slide-out" class="side-nav fixed">
    <li><div class="userView">
      <div class="background">
        <img src="http://materializecss.com/images/office.jpg">
      </div>
      <a href="#!user"><img class="circle" src="<?php echo $_SESSION['thumb']; ?>"></a>
      <a href="#!name"><span class="white-text name left-align"><?php echo $user['name'];?></span></a>
      <a href="#!email"><span class="white-text email left-align"><?php echo $user['phone'];?></span></a>
    </div>
  </li>
  <li><a class="waves-effect" href="finalMainPage.php">메인화면</a></li>
  <li><a class="waves-effect" href="menu.php">MOM'S CAFE</a></li>
  <li>
    <ul class="collapsible" data-collapsible="accordion">
      <li>
        <div class="collapsible-header" style="padding:0"><a href="#!">총학</a></div>
        <div class="collapsible-body"><a class="waves-effect" href="STU_mainPage.php"><span>People in 한동</span></a></div>
        <div class="collapsible-body"><a class="waves-effect" href="http://stu.handong.edu/handongpedia/main.php"><span>한동피디아</span></a></div>
      </li>
    </ul>
  </li>
  <li ><a class="waves-effect" href="Hope_mainPage.php">HOPE</a></li>
  <li style="color: black; "><a class="waves-effect" href="mypage.php">마이페이지</a></li>
</ul>
<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
