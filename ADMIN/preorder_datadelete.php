<?php
    date_default_timezone_set('Asia/Seoul');
    $conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
    mysqli_select_db($conn, "igiftu");

    $sql = "SELECT number FROM preorder WHERE sell = 1" ;  //마지막 주문건을 불러온다.
    $result0 = mysqli_query($conn, $sql);
    $row0 = mysqli_fetch_array($result0);
    $sold = count($row0);

    $sql = "SELECT * FROM preorder order by number desc limit 1";  //마지막 주문건을 불러온다.
    $result1 = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result1);

    $sql = "SELECT total FROM preorder_money order by date desc limit 1";  //어제 total을 불러온다.
    $result2 = mysqli_query($conn, $sql);
    $row2 = mysqli_fetch_assoc($result2);

    $total = $row2['total']+$row1['number'];

    $sql = "INSERT INTO preorder_money (date, amount, total, sold)
    VALUES('".$row1['preorder_time']."','".$row1['number']."','".$total."' ,'".$sold."')";
    $result = mysqli_query($conn, $sql);

// DB 테이블 리셋. 필요한 부분 주석해제 후 사용.
// preorder 테이블 데이터 reset (default)
    $sql = "DELETE FROM preorder";
    $result = mysqli_query($conn, $sql);

    $sql = "ALTER TABLE preorder auto_increment = 1"; //a.i 초기화한다.
    $result = mysqli_query($conn, $sql);

    // $sql = "DELETE FROM moms_drink";
    // $result = mysqli_query($conn, $sql);
    //
    // $sql = "ALTER TABLE moms_drink auto_increment = 1"; //a.i 초기화한다.
    // $result = mysqli_query($conn, $sql);
    //
    // $sql = "DELETE FROM moms_food";
    // $result = mysqli_query($conn, $sql);
    //
    // $sql = "ALTER TABLE moms_food auto_increment = 1"; //a.i 초기화한다.
    // $result = mysqli_query($conn, $sql);

//purchase_history & coupon 테이블 reset
    // $sql = "DELETE FROM purchase_history";   //테이블 데이터를 다 지운다.
    // $result = mysqli_query($conn, $sql);
    // $sql = "ALTER TABLE purchase_history auto_increment = 1"; //a.i 초기화한다.
    // $result = mysqli_query($conn, $sql);
    // $sql = "DELETE FROM coupon";   //쿠폰테이블 정보도 함께 reset
    // $result = mysqli_query($conn, $sql);

    header('Location: 0120preorder.php');
?>
