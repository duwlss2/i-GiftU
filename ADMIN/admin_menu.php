<!DOCTYPE html>
  <html>
    <head>

      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
      <?php
      function menu($restaurant){
        $conn = mysqli_connect('127.0.0.1', 'root', 'dnwnchdnjf206');
        mysqli_select_db($conn, "igiftu");

        $sql = "SELECT * from $restaurant";
        $result = mysqli_query($conn, $sql); ?>
        <table class="bordered">
          <tr>
            <td width = 120px style="padding-left:20px">메뉴번호</td>
            <td width = 80px style="padding-left:18px">이름</td>
            <td width = 50px style="padding-left:10px">가격</td>
            <td style="padding-left:30px">메뉴 설명</td>
          </tr>
        </table>
        <?php
        while($row = mysqli_fetch_assoc($result))
        { ?>
          <table class="bordered">
            <tr>
              <td width = 20px style="padding-left:40px"><?php echo $row['menu'] ?></td>
              <td width = 150px style="padding-left:36px"><?php echo $row['name'] ?></td>
              <td width = 50px style="padding-left:10px"><?php echo $row['price'] ?></td>
              <td style="padding-left:30px"><?php echo $row['description'] ?></td>
            </tr>
          </table>
      <?php  }
    }

    function create($restaurant){  ?>
            <b style="font-size:20px; padding-top:30px; padding-left:10px">메뉴 추가/편집</b>
            <div class="row">
              <div class="col s12 m12 6 center-align" style="display: inline-block; float: none">
              <form action="admin_create.php?id=<?php echo $restaurant; ?>" method="post">
                <div class="card-panel hoverable" style="padding-top: 0px">
                  <table style=" td{padding:0}">
                      <tr style="font-size : 14px">
                          <td class="left-align">번호</td>
                          <td class="right-align"><input type="text" name="number" style="margin : 0"></td>
                      </tr>
                      <tr style="font-size : 14px">
                          <td class="left-align">메뉴 이름</td>
                          <td class="right-align"><input type="text" name="menu" style="margin : 0"></td>
                      </tr>
                      <tr style="font-size : 14px">
                          <td class="left-align">메뉴 금액</td>
                          <td class="right-align"><input type="text" name="price" style="margin : 0"></td>
                      </tr>
                      <tr style="font-size : 14px">
                          <td colspan="2"><div class="input-field col s12"><textarea id="textarea1" class="materialize-textarea" name="description" style="margin : 0"></textarea>
                          <label for="textarea1">메뉴 설명</label></div></td>
                      </tr>
                      <tr style="font-size : 14px">
                          <td colspan="2" class="center-align">
                            <button style="background-color: #005e39;" class="btn waves-effect waves-light" type="submit" name="action">추가/편집
                            <i class="material-icons right">send</i></button></td>
                      </tr>
                  </table>
                </form>
                </div>
              </div>
            </div>
    <?php }

    function delete_menu($restaurant){ ?>
              <b style="font-size:20px; padding-top:10px; padding-left:10px">메뉴 삭제</b>
              <div class="row">
                <div class="col s12 m12 6 center-align" style="display: inline-block; float: none">
                  <div class="card-panel hoverable" style="padding-top: 0px">
                    <form action="admin_delete.php?id=<?php echo $restaurant; ?>" method="post">
                    <table style=" td {padding:5px}">
                        <tr style="font-size : 14px">
                            <td class="left-align">삭제할 메뉴 번호</td>
                            <td class="right-align"><input type="text" name="number"></td>
                        </tr>
                        <tr style="font-size : 14px">
                            <td colspan="2" class="center-align">
                              <button style="background-color: #005e39;" class="btn waves-effect waves-light" type="submit" name="action">삭제하기
                              <i class="material-icons right">send</i></button></td>
                        </tr>
                    </table>
                  </form>
                  </div>
                </div>
              </div>
  <?php  } ?>

    <?php
    function image($restaurant){ ?>
      <!-- //       Select image to upload:
      //       <input type="file" name="fileToUpload" id="fileToUpload">
      //       <input type="submit" value="Upload Image" name="submit"></form>'; -->
        <form action="admin_image.php?id=<?php echo $restaurant; ?>" method="post" enctype="multipart/form-data">
            <b style="font-size:20px; padding-top:10px; padding-left:10px">이미지 올리기</b>
              <div class="row">
                <div class="col s12 m12 6 center-align" style="display: inline-block; float: none">
                  <div class="card-panel hoverable" style="padding-top: 0px">
                    <table style=" td{padding:5px}">
                            <tr><td class="center-align">
                                <div class="file-field input-field">
                                  <div style="background-color: #005e39;" class="btn">
                                    <span >File</span>
                                    <input  type="file" name="fileToUpload" id="fileToUpload">
                                  </div>
                                  <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                  </div>
                                </div>
                              </form>
                            </td>
                        </tr>
                        <tr style="font-size : 14px">
                            <td class="center-align">
                              <button style="background-color: #005e39;" class="btn waves-effect waves-light" type="submit" name="submit">이미지 올리기
                              <i class="material-icons right">send</i></button></td>
                        </tr>
                    </table>
                  </div>
                </div>
              </div>
            </form>
  <?php  }
      ?>
            <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>
