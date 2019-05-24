<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="ko">
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
          header, main, footer {padding-left: 300px;}
          @media only screen and (max-width : 992px){header, main, footer{padding-left: 0;}}
         .card.small{height:400px}
         @media only screen and (max-width : 1700px){.card.small{height:250px}}
     </style>
</head>

<body>
     <?php require("nevbar.php");
     $result = mysqli_query($conn, "SELECT * FROM moms_drink");
     $result2 = mysqli_query($conn, "SELECT * FROM moms_food");
     ?>

    <main>
        <div class="row">
         <div class="col s12">
           <ul class="tabs" >
            <li class="tab col s6"><a href="#coffee" style="text-decoration:none;">Coffee</a></li>
            <li class="tab col s6"><a href="#dessert" style="text-decoration:none;">Dessert</a></li>
           </ul>
         </div>
         <div id="coffee" class="col s12" style="background-color : #e7e7e7; padding:0; padding-right:7px">
              <div class="row">
                  <?php
                    while( $row = mysqli_fetch_assoc($result))
                    { ?>

                    <div class="col s6 m3 l2 center-align" style="padding:0; padding-left:9px">
                       <a href="./menuinside_moms_drink.php?id=<?php echo $row['menu']; ?>">
                          <div class="card small" style="margin:0; margin-top:9px; border-radius:0">
                              <div class="card-image waves-effect waves-block waves-light" style="max-height:70%">
                                <img class="activator" src="img/moms_drink/<?php echo $row['menu']; ?>.PNG" alt="<?php echo $row['name']; ?>">
                              </div>
                              <div class="card-content" style="padding:0; padding-top:15px; color:black">
                                <p style="font-size:15px"><b><?php echo $row['name'];?></b></p>
                                <p><?php echo $row['price']; ?></p>
                              </div>
                          </div>
                      </a>
                    </div>
                  <?php } ?>
             </div>
         </div>
         <div id="dessert" class="col s12" style="background-color : #e7e7e7; padding:0; padding-right:7px">
           <div class="row">
               <?php
                 while( $row2 = mysqli_fetch_assoc($result2))
                 { ?>
                 <div class="col s6 m3 l2 center-align" style="padding:0; padding-left:9px">
                    <a href="./menuinside_moms_food.php?id=<?php echo $row2['menu']; ?>">
                       <div class="card small" style="margin:0; margin-top:9px; border-radius:0">
                           <div class="card-image waves-effect waves-block waves-light" style="max-height:70%">
                             <img class="activator" src="img/moms_food/<?php echo $row2['menu']; ?>.PNG" alt="<?php echo $row2['name']; ?>">
                           </div>
                           <div class="card-content" style="padding:0; padding-top:15px; color:black">
                             <p style="font-size:18px"><b><?php echo $row2['name'];?></b></p>
                             <p><?php echo $row2['price']; ?></p>
                           </div>
                       </div>
                   </a>
                 </div>
               <?php } ?>
           </div>
         </div>
      </div>
      <footer class="footer" style="background-color : #e7e7e7;">
        <div class="container">
          <p class="text-muted">© Developed by CRA</p>
        </div>
      </footer>
    </main>

      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>
