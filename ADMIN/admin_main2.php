<?php
session_start();
if((!$_SESSION['admin2']) || ($_SESSION['admin2'] != 'OK~')){
  header('Location: preorder.php');
}
?>
 <!DOCTYPE html>
 <html>
 <head>
      <meta charset="utf-8">
      <script src="http://code.jquery.com/jquery-latest.js"></script>
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


 </head>
 <body>
   <header>
     <table style="padding-bottom:10px">
       <tr>
         <td style="width:45px; padding-left:30px; padding-top:30px; padding-down: 10px"><img style="width:50px; height:50px" class="circle" src="./moms.png"></td>
         <td style="padding-top:23px; padding-down: 10px"><b style="margin-left:5px; font-size: 22px">관리자 페이지</b></td>
       </tr>
     </table>
  </header>
<main>
   <div class="col s12">
     <ul class="tabs" >
      <li class="tab col s4" class=><a href="#preorder"  style="text-decoration:none;">예약 주문</a></li>
      <li class="tab col s4"><a href="#menu">메뉴 수정</a></li>
     </ul>
   </div>

    <div class="row">
     <div id="preorder" class="col s12">
       <?php require("preorder_overall.php"); ?>
     </div>
   </div>

     <div id="menu" class="col s10">
      <?php require("admin_menu.php"); ?>
         <div class="col s12">
           <ul class="tabs">
             <li class="tab col s3"><a href="#drink">Drink</a></li>
             <li class="tab col s3"><a href="#food">Dessert&amp;food</a></li>
           </ul>
         </div>
         <div class="row">
         <div id="drink">
           <div class="col s12 m12 l7">
             <?php
             $restaurant="moms_drink";
             menu($restaurant); ?>

           </div>
           <div class="col s12 m12 l5">
             <table>
               <tr>
                 <td class="col s6">
                   <?php create($restaurant); ?>
                 </td>
                 <td class="col s6">
                     <?php image($restaurant); ?>
                     <?php delete_menu($restaurant); ?>
                 </td>
               </tr>
             </table>
         </div>
       </div>
       <!-- </div>
      <div class="row"> -->
      <div id="food">
        <div class="col s12 m12 l7">
          <?php
          $restaurant="moms_food";
          menu($restaurant); ?>

        </div>
        <div class="col s12 m12 l5">
          <table>
            <tr>
              <td class="col s6">
                <?php create($restaurant); ?>
              </td>
              <td class="col s6">
                  <?php image($restaurant); ?>
                  <?php delete_menu($restaurant); ?>
              </td>
            </tr>
          </table>
      </div>
    </div>
    </div>
    </div>
  </div>
</main>
<footer>
  <p style="margin-bottom : 0px; background-color : #eee; padding:17px; font-size:15px" class="left-align">
  <b>CRA</b><br>
  문제시 연락처 : 01051032361 로 연락주세요    <a href="logout_admin.php"><b>로그아웃</b></a>
  </p>
</footer>
 <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>
