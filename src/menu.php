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
         .card.small{height:410px}
         @media only screen and (max-width : 1700px){.card.small{height:300px}}
         .indicator{background-color:#6a5a49 !important}
         .tabs .tab a:hover, .tabs .tab a.active{color:#6a5a49 !important}
         .tab a{color:rgba(106,90,73, 0.7) !important}
     </style>
</head>

<body style="background-color:#e7e7e7">
<?php   require("nevbar.php"); ?>  
    <main>
        <div class="row">
         <div class="col s12" style="padding:0">
           <ul class="tabs" >
            <li class="tab col s6"><a href="#coffee" style="text-decoration:none;"><b>Coffee</b></a></li>
            <li class="tab col s6"><a href="#dessert" style="text-decoration:none;"><b>Dessert</b></a></li>
           </ul>
         </div>
         <div id="coffee" class="col s12" style="padding:0; padding-right:7px">
              <div class="row">
                  <?php
                    $result = mysqli_query($conn, "SELECT * FROM moms_drink");
                    $result2 = mysqli_query($conn, "SELECT * FROM moms_food");
                    while( $row = mysqli_fetch_assoc($result))
                    { ?>

                    <div class="col s6 m4 l3 center-align" style="padding:0; padding-left:9px">
                       <a href="./menuinside_moms_drink.php?id=<?php echo $row['menu']; ?>">
                          <div class="card" style="margin:0; margin-top:9px; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="img/moms_drink/<?php echo $row['menu']; ?>.PNG" alt="<?php echo $row['name']; ?>" style="width:100%">
                              </div>
                              <div style="padding:0; color:black; padding-bottom:4px; z-index:2; position:relative; margin-top:-20px; padding-top:5px; background-color:white">
                                <p style="margin:5px; margin-bottom:0"><b><?php echo $row['name']; ?></b></p>
                                <p style="margin:5px; margin-top:0"><?php echo $row['price']; ?></p>
                              </div>
                          </div>
                      </a>
                    </div>
                  <?php } ?>
             </div>
         </div>
         <div id="dessert" class="col s12" style="padding:0; padding-right:7px">
              <div class="row">
                  <?php
                    while( $row2 = mysqli_fetch_assoc($result2))
                    { ?>

                    <div class="col s6 m4 l3 center-align" style="padding:0; padding-left:9px">
                       <a href="./menuinside_moms_food.php?id=<?php echo $row2['menu']; ?>">
                          <div class="card" style="margin:0; margin-top:9px; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="img/moms_food/<?php echo $row2['menu']; ?>.PNG" alt="<?php echo $row2['name']; ?>" style="width:100%">
                              </div>
                              <div style="padding:0; color:black; padding-bottom:4px; z-index:2; position:relative; margin-top:-20px; padding-top:5px; background-color:white">
                                <p style="margin:5px; margin-bottom:0"><b><?php echo $row2['name']; ?></b></p>
                                <p style="margin:5px; margin-top:0"><?php echo $row2['price']; ?></p>
                              </div>
                          </div>
                      </a>
                    </div>
                  <?php } ?>
             </div>
         </div>

      </div>
      
    </main>
    <?php   require("footer.php"); ?> 
      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>
