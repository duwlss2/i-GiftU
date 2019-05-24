<?php
$target_dir = "./img/";
$target_file = $target_dir . basename("111");
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "파일형식 - " . $check["mime"] . ".<br> ";
        $uploadOk = 1;
    } else {
        echo "잘못된 파일입니다.(이미지가 아닙니다)";
        $uploadOk = 0;
    }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "파일 용량이 큽니다.";
    $uploadOk = 0;
}
// Allow certain file formats
// if($imageFileType != "png") {
//     echo "PNG 파일만 올리실 수 있습니다. ";
//     $uploadOk = 0;
// }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "파일을 업로드하지 못했습니다.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "파일이름 : ". basename( $_FILES["fileToUpload"]["name"]). " 파일이 안전하게 업로드 되었습니다.";
    } else {
        echo "파일을 업로드하지 못했습니다.";
    }
}
?>
<!DOCTYPE html>
  <html>
<a href="http://igiftu.handong.edu/igiftu/ADMIN/admin_main2.php?start=1#menu">menu로 돌아가기</a>
</html>
