<?php
$conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
mysqli_select_db($conn, "igiftu");
$number= $_POST['number'];

//update 'sell'
if($_POST['which'] == 1){
  $sql = "UPDATE preorder SET sell= 1 WHERE number=$number";
  $result = mysqli_query($conn, $sql);
  //echo '1';
}
else{
//update 'made'
  $row= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM preorder WHERE number = $number"));
  if($row['made']) {
    $madev = 0;
    echo 'cancel';
  } else {
    $madev = 1;
    echo 'made';
  }

  $sql = "UPDATE preorder SET made= $madev WHERE number=$number";
  $result = mysqli_query($conn, $sql);
}
 ?>
