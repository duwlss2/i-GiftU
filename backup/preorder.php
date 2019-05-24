<?php
session_start();
$conn = mysqli_connect("127.0.0.1", "root", "dnwnchdnjf206");
mysqli_select_db($conn, "igiftu");

$menu = mysqli_real_escape_string($conn, $_GET['id']);  //메뉴 번호
$sql = 'SELECT name, price,choice FROM '.$_SESSION['restaurant'].' WHERE menu='.$menu;  //상품 이름하고 가격 가져오기
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$kakao_id = mysqli_real_escape_string($conn, $_SESSION["id"]);
$userDB = mysqli_query($conn, "SELECT name, phone FROM user WHERE kakao_id = '".$kakao_id."'");
$user = mysqli_fetch_assoc($userDB);

$_SESSION['user'] = mysqli_real_escape_string($conn, $user['name']." ".$user['phone']);  // preorder DB에 넣을 구매자 이름, 전화번호
$_SESSION['menu'] = $row['name'];  // preorder DB에 넣을 menu이름

?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">

    <title>IGiftU 결제확인</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


    <style>
        .navbar-fixed-top,
        .navbar-fixed-bottom {
          position: fixed;
          right: 0;
          left: 0;
          z-index: 1030;
        }
        @media (min-width: 768px) {
          .navbar-fixed-top,
          .navbar-fixed-bottom {
            border-radius: 0;
          }
        }
        .navbar-fixed-bottom {
          bottom: 0;
          margin-bottom: 0;
          border-width: 1px 0 0;
        }
        [type="radio"]:checked+label:after, [type="radio"].with-gap:checked+label:after{background-color: #666666; !important}
        [type="radio"]:checked+label:after, [type="radio"].with-gap:checked+label:before, [type="radio"].with-gap:checked+label:after {border: 2px solid #666666; !important}
      </style>
  </head>
<body>
  <!-- <body style="overflow: hidden"> -->

  <header>
    <nav style="height: 50px; background-color:#005e39">
      <div class="nav-wrapper" style="padding-left:15px">
        <div class="col s12">
          <a href="menu.php" class="breadcrumb">메뉴</a>
          <a href="#!" class="breadcrumb">예약주문</a>
        </div>
      </div>
    </nav>
  </header>

    <!--전체 선택지를 감싸는 form-->
        <main class="center-align val">

        <div class="row" style="margin-bottom : -20px">
            <div class="col s12 m12 l6 left-align" style="display: inline-block; float: none">
                <p style="margin-left: 5px; font-size:21px; margin-top:19px; margin-bottom:19px"><b><?php echo $row['name']; ?></b></p>
              <!-- <p style="margin-left: 5px; margin-top: 0; color:#c7c7c7; margin-bottom:16px"><small>주의사항</small></p> -->
            </div>
        </div>

        <div class="row" style="margin-bottom : 0;">
          <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none">
            <div class="card-panel" style="padding-top: 0px; padding-bottom:0">

              <form action="preorder_process.php?id=<?php echo $row['choice']; ?>"  method="post">
                    <table class="bordered" style="font-size: 15px">
                        <tbody>
                        <?php  if($row['choice']=="2"){ ?>
                           <tr>
                               <td style="width:50%">
                                   <p class="center-align">
                                       <input name="ice_hot" type="radio" checked="checked" value="HOT" id="Hot"/>
                                       <label class="red-text" for="Hot" style="font-size:19px"><b>Hot</b></label>
                                   </p>
                               </td>
                               <td style="width:50%">
                                   <p class="center-align">
                                       <input name="ice_hot" type="radio" value="ICE" id="Cold"/>
                                       <label class="blue-text" for="Cold" style="font-size:19px"><b>Cold</b></label>
                                   </p>
                               </td>
                           </tr>
                      <?php   } ?>
                            <tr>
                                <td class="left-align"><b>수량</b></td>
                                <td class="right-align" style="padding-top: 10px; padding-bottom: 10px">
                                   
                                   <select id="fixedNumber" name = "amount" style="display:inline; width:52px; height: 30px" onkeypress="validate(event)" required>
                                      <option value="1" >1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>
                                    </select>

                                    <!--상품가격을 이밑에 input속성의 value로 지정해주기!-->
                                    <input id="inputNumbers" type="hidden" value="<?php echo $row['price']; ?>">

                                </td>

                            </tr>
                            <tr>
                                <td class="left-align"><b>수령시간</b></td>
                                <td class="right-align" style="padding-top:10px; padding-bottom: 10px">
                                    <select name = "time" style="display:inline; width:52px; height: 30px" required>
                                      <option>**</option>
                                      <option value="15" >15</option>
                                      <option value="20">20</option>
                                      <option value="25">25</option>
                                      <option value="30">30</option>
                                      <option value="35">35</option>
                                      <option value="40">40</option>
                                      <option value="50">50</option>
                                    </select>
                                    분 후
                                </td>
                            </tr>
                            <tr style="border-bottom:0">
                                <td class="left-align" colspan="2"><b>요청사항</b>
                                    <input placeholder="예) 휘핑크림 얹어주세요." name="message" type="text" class="validate" style="margin: 0" length="50" maxlength="50">
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
          </div>
        </div>
        <br>
          <b>총 주문금액</b>
          <h2 class="center-align" style="margin:0"><b><span class="red-text" id="result"></span></b></h2>
          <br>
          <p class="center-align" style="color: gray; font-size:12px; margin-bottom:12px; padding:12px 15px 0 15px; border-top:1px solid #ddd">음료는 예약 시간에 맞추어 만들어지며, 제 시간에 도착하지 않을 시 음료의 상태는 변질될 수 있습니다.
             예약 취소는 불가합니다. 한동인의 아너코드를 지켜주세요! </p>
        </main>


        <footer style="z-index:1;">
          <div class="row center-align" style="margin-bottom:0">
                <div class="col s12 m12 l6 center-align" style="display: inline-block; float: none; padding:0">
                    <button class="btn waves-effect waves-light hoverable col s12 m12 l12" type="submit" name="action" style="background-color:#003c1f; display: inline-block; float: none; font-size:20px; height: 50px; width:100%; border-radius:0">주문하기
                    </button>
                </div>
            </div>
        </footer>
      </form>




      <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script>
			function calculate()
			{
				if(document.getElementById("fixedNumber").value)
				{
					var inputNumberStrings = document.getElementById("inputNumbers").value.split(/[, \n]+/);
					var result = 0;
					inputNumberStrings.forEach(function(string) {
							if(!isNaN(parseFloat(string))) result += parseFloat(string);
						});
					result *= document.getElementById("fixedNumber").value;

					document.getElementById("result").innerText = result.toString();
				}
				else
					document.getElementById("result").innerText = "상품 수를 입력하세요.";
			}


			document.getElementById("inputNumbers").addEventListener("input", calculate, false);
			document.getElementById("fixedNumber").addEventListener("input", calculate, false);
            //밑의 문장은 html이 로드되었을때 이벤트를 실행시키는 역할을 한다.
            window.addEventListener("load", calculate, false);
    </script>


  </body>
</html>
