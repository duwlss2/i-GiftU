<?php
  session_start();
  $conn = mysqli_connect("127.0.0.1", "root", "dnwnchdnjf206");
  mysqli_select_db($conn, "igiftu");
 ?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <title>iGiftU</title>

     <!-- CSS  -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
     <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <style>
    header, main, footer {padding-left: 300px;}
    @media only screen and (max-width : 992px){header, main, footer{padding-left: 0;}}
	.navbar-fixed-top,
        .navbar-fixed-bottom {position: fixed;right: 0;left: 0;z-index: 1030;}
        @media (min-width: 768px) {.navbar-fixed-top,.navbar-fixed-bottom {border-radius: 0;}}
        .navbar-fixed-bottom {bottom: 0;margin-bottom: 0;border-width: 1px 0 0;}
  </style>
  </head>
  <body>


    <?php require("nevbar.php"); ?>



    <main>
        <!-- 상품이미지 + 메뉴이름 + 상품가격-->

        <div class="row center-align" style="margin-bottom:0">
            <div class="col s9 m9 l6 center-align" style="display: inline-block; float: none">
                <div style="padding:2px; padding-top:6px" class="card">
                                 <?php
                                 if(empty($_GET['id'])===false){
                                   $sql = 'SELECT * FROM moms_drink WHERE menu='.$_GET['id'];
                                   $result = mysqli_query($conn, $sql);
                                   $row = mysqli_fetch_assoc($result);
                                   $_SESSION['restaurant'] = "moms_drink"; ?>
                                 <img  src="img/moms_drink/<?php echo $row['menu']; ?>.PNG" class="responsive-img" alt="<?php echo $row['name']; ?>">

                </div>
            </div>
        </div>
        <?php } ?>
        <table style="height:55px; border-top: 1px solid #eee">
          <tr>
             <td style="width:45px; padding: 15px 0 0 20px"><img style="width:35px; height:35px" class="circle" src="img/moms.png"></td>
             <td class="left-align" style="font-size:20px; padding: 10px 0 0 10px"><b><?php echo $row['name'];?></b></td>
          </tr>
          <tr>
             <td colspan="2" id="ItemPrice" class="right-align" style="font-size:25px; padding: 0 20px 10px 5px"><b><?php echo $row['price'];?>원</b></td>
          </tr>
        </table>
             <p style="background-color : #eee; padding:17px; font-size:10px; margin:0; margin-bottom:55px">
             <b>주의사항</b><br>
             다음날부터 사용가능 합니다. <br>
             안녕<br>
             선물하면 카톡으로 받습니다.<br>
             유통기한은 1년입니다.<br>
             받은쿠폰을 마이페이지로 보내면 마이페이지에서 쉽게 확인할 수 있습니다.<br>
             </p>

    </main>

    <footer class="navbar-fixed-bottom">
       <table  style="width:100%; height:50px">
           <tr>
               <td style="padding:0">
                   <a href="preorder.php?id=<?php echo $_GET['id']; ?>"><button class="waves-effect waves-light btn" style="width:100%; height:55px; background-color:#6a5a49; padding= 0px; font-size:17px; border-radius:0">미리주문</button></a>
               </td>

               <td style="padding:0">
                   <a href="purchase.php?id=<?php echo $_GET['id']; ?>"><button class="waves-effect waves-light btn" style="width:100%; height:55px; background-color: #003c1f; padding= 0px; font-size:17px; border-radius:0">선물하기</button></a>
               </td>
           </tr>
       </table>
    </footer>

      <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
