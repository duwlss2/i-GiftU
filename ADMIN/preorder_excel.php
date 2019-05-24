<?php
date_default_timezone_set('Asia/Seoul');
header( "Content-type: application/vnd.ms-excel; charset=utf-8");
header( "Content-Disposition: attachment; filename = moms_preorder_info.xls" );
header( "Content-Description: PHP4 Generated Data" );

$conn = mysqli_connect("127.0.0.1", "root", "dnwnchdnjf206");
mysqli_select_db($conn, "igiftu");

// 테이블 상단 만들기
$EXCEL_STR = "
<table border='1'>
<tr>
   <td>날짜</td>
   <td>판매된 수</td>
   <td>하루 주문</td>
   <td>총 주문</td>
</tr>";
$sql = "SELECT * from preorder_money";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{

   $EXCEL_STR .= "
   <tr>
       <td>".$row['date']."</td>
       <td>".$row['sold']."</td>
       <td>".$row['amount']."</td>
       <td>".$row['total']."</td>
   </tr>
   ";
}

$EXCEL_STR .= "</table>";

echo "<meta content=\"application/vnd.ms-excel; charset=UTF-8\" name=\"Content-type\"> ";
echo $EXCEL_STR;
?>
