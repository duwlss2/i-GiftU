<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- <script type="text/javascript">
    function getQuerystring(paramName){

      var _tempUrl = window.location.search.substring(1); //url에서 처음부터 '?'까지 삭제
      var _tempArray = _tempUrl.split('&'); // '&'을 기준으로 분리하기

      for(var i = 0; _tempArray.length; i++) {
        var _keyValuePair = _tempArray[i].split('='); // '=' 을 기준으로 분리하기
        if(_keyValuePair[0] == paramName){ // _keyValuePair[0] : 파라미터 명
          // _keyValuePair[1] : 파라미터 값
          return _keyValuePair[1];
        }
      }
    }
      console.log(getQuerystring('number'))  // -->
    </script> 
  </head>
  <body>

  </body>
</html>
<?php
  date_default_timezone_set('Asia/Seoul');
  $conn = mysqli_connect("127.0.0.1", "root", "dnwnchdnjf206");
  mysqli_select_db($conn, "igiftu");
  parse_str($_SERVER['QUERY_STRING']);

  $sql = "SELECT user,menu,choice,preorder_time,amount,message FROM preorder WHERE number = $number";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  echo '주문번호: '.$number.'<br>';
  echo '수령시간: '.$row['preorder_time'].'<br>';
  echo '주문내역: '.$row['menu'].' '.$row['choice'].' '.$row['amount'].'잔<br>';
  echo '추가사항: '.$row['message'].'<br>';
 ?>
