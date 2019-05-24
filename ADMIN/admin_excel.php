<?php
date_default_timezone_set('Asia/Seoul');
header( "Content-type: application/vnd.ms-excel; charset=utf-8");
header( "Content-Disposition: attachment; filename = moms_coupon_info.xls" );
header( "Content-Description: PHP4 Generated Data" );

$conn = mysqli_connect("127.0.0.1", "root", "dnwnchdnjf206");
mysqli_select_db($conn, "igiftu");

// 테이블 상단 만들기
$EXCEL_STR = "
<table border='1'>
<tr>
   <td>쿠폰번호</td>
   <td>메뉴</td>
   <td>입금자명</td>
   <td>가격</td>
   <td>주문날짜</td>
   <td>입금여부</td>
   <td>사용여부</td>
   <td>주문자 이름</td>
   <td>주문자 번호</td>
   <td>주문자 계좌</td>
</tr>";
$sql = "SELECT * from purchase_history left JOIN moms_drink on purchase_history.menu = moms_drink.menu order by coupon_no DESC";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
   $search = $row['kakao_id'];
   $coupon_no = $row['coupon_no'];
   //개인정보
   $sql2 = mysqli_query($conn,"SELECT * FROM user where kakao_id = $search");
   $row2 = mysqli_fetch_assoc($sql2);

   //입금확인을 위한 db접속
   $sql3 = "SELECT * FROM coupon WHERE coupon_no = $coupon_no";
   $result2 = mysqli_query($conn, $sql3);
   $row3= mysqli_fetch_assoc($result2);
   $is_deposit = $row3['is_deposit'];
   $is_used = $row3['is_used'];

   $checked = ($is_deposit) ? 'checked = "checked"' : '';
   $phpdate = strtotime( $row['purchase_date'] );
   $mysqldate = date( 'Y-m-d H:i', $phpdate );

   $EXCEL_STR .= "
   <tr>
       <td>".$row['coupon_no']."</td>
       <td>".$row['name']."</td>
       <td>".$row['deposit_name']."</td>
       <td>".$row['price']."</td>
       <td>".$mysqldate."</td>
       <td>".$is_deposit."</td>
       <td>".$is_used."</td>
       <td>".$row2['name']."</td>
       <td>".$row2['phone']."</td>
       <td>".$row2['bank']."</td>
       <td>".$row2['account_no']."</td>
       <td>".$row2['holder']."</td>
   </tr>
   ";
}

$EXCEL_STR .= "</table>";

echo "<meta content=\"application/vnd.ms-excel; charset=UTF-8\" name=\"Content-type\"> ";
echo $EXCEL_STR;
?>
