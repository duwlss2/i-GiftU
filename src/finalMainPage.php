<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
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

        .card-panel, .card{
            box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.14), 0px 0px 3px 0 rgba(0,0,0,0.12), 0px 0px 0px 0px rgba(0,0,0,0.2);
        }
         
         td{border-right:1px solid #f1f1f1; width:25%; padding:10px 0; text-align: center;color:#999;font-size:12px}
         tr{border-bottom: 1px solid #f1f1f1}
     </style>
</head>
<body style="background-color:#f5f5f5">

   
    <header>
     <div class="navbar-fixed" style="z-index: 9999;">
          <nav role="navigation" style="background-color:#649a71">
            <div class="nav-wrapper container center-align"><b style="font-size:27px">i-Gift</b>
            </div>
          </nav>
      </div>
    </header>
    
    <main>
        <div class="row center-align" style="margin:0">
            <div class="left-align col s12 m10 l6" style="display:inline-block;float: none;padding:0px; max-width:390px">

               
                <!--맘스 순위 블럭-->
                <div class="row card" style="margin-bottom:12px;margin-top:12px; padding: 0 15px 5px 7px">

                    <div class="col s12 left-align" style="margin:10px 0 0 0">
                      
                          <div style="margin:0; border-radius:0; z-index:0;padding:0 ; font-size:20px">
                              <b>mom's cafe</b>
                              <span style="font-size:12px">&nbsp;기프티콘과 미리주문 하러가기</span>
                          </div>
                       
                    </div>
                   
                    <div class="col s4 center-align" style="padding:8px 0 0 8px">
                      <a href="#!">
                          <div style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:120px">
                              </div>

                              <div class="center-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:28px">
                                <b style="margin:0; padding:0; line-height:28px; font-size:14px">1 딸기바나나</b>
                              </div>
                          </div>
                       </a>
                    </div>
                    
                    <div class="col s4 center-align" style="padding:8px 0 0 8px">
                      <a href="#!">
                          <div style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:120px">
                              </div>

                              <div class="center-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:28px">
                                <b style="margin:0; padding:0; line-height:28px; font-size:14px">2 카푸치노</b>
                              </div>
                          </div>
                       </a>
                    </div>
                    
                    <div class="col s4 center-align" style="padding:8px 0 0 8px">
                      <a href="#!">
                          <div style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:120px">
                              </div>

                              <div class="center-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:28px">
                                <b style="margin:0; padding:0; line-height:28px; font-size:14px">3 초코바나나</b>
                              </div>
                          </div>
                       </a>
                    </div>
                    
                    <div class="col s12 center-align" style="padding:12px 0 0 8px; margin-top:2px">
                      
                          <div style="margin:0; border-radius:0; z-index:0; border-top:1px solid #eee; padding: 10px 0 5px 0; font-size:13px">
                              현재까지 주고 받은 기프티콘 ♥15
                          </div>
                       
                    </div>

                </div>
               
                <!--사연 블럭-->
                <div class="row" style="margin-bottom:12px">
                   
                    <div class="col s12 left-align" style="padding:0">
                        <div class="card" style="margin:0; border-radius:0; height:135px">
                            <img src="http://www.designsori.com/files/attach/images/721828/860/831/f27fcde042b97a4c9b44a3b6f3a07ed9.jpg" alt="사연 img" style="height:135px; width:100%">
                        </div>
                    </div>


                    <!--내용 한블럭 (!내용물이 너무 많을 때, class="truncate"로 인해 그 뒤 내용은 ...으로 축약됨)-->
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:14px">사연이 있어요~</span>
                       </div>
                      </a>
                    </div>
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:14px">사연이 있어요~</span>
                       </div>
                      </a>
                    </div>
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:14px">사연이 있어요~</span>
                       </div>
                      </a>
                    </div>
                    

                    <!--꼬리-->
                    <a href="Hope_edit_personal_app.php" class="col s12 center-align" style="padding:0">
                       <div class="card" style="margin:0; border-radius:0;height:42px; line-height:42px">
                          <b style="color:#777; padding-left:15px; font-size:13px">사연이 있나요?</b>
                       </div>
                    </a>

                </div>
               
               
                <!--선교모임 소개(소제목 없음) 블럭-->
                <div class="row card" style="margin-bottom:12px; padding: 4px 15px 15px 7px">

                    
                    <div class="col s6 center-align" style="padding:12px 0 0 8px">
                      <a href="#!">
                          <div class="card" style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:100px">
                              </div>

                              <div class="left-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:55px">
                                <p style="margin:0; padding:0; line-height:20px"><span style="color:#649a71">KFC</span> &nbsp;치킨도 먹고싶다.</p>
                              </div>
                          </div>
                       </a>
                    </div>
                    
                    <div class="col s6 center-align" style="padding:12px 0 0 8px">
                      <a href="#!">
                          <div class="card" style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:100px">
                              </div>

                              <div class="left-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:55px">
                                <p style="margin:0; padding:0; line-height:20px"><span style="color:#649a71">KFC</span> &nbsp;치킨도 먹고싶다.</p>
                              </div>
                          </div>
                       </a>
                    </div>
                    
                    <div class="col s6 center-align" style="padding:12px 0 0 8px">
                      <a href="#!">
                          <div class="card" style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:100px">
                              </div>

                              <div class="left-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:55px">
                                <p style="margin:0; padding:0; line-height:20px"><span style="color:#649a71">KFC</span> &nbsp;치킨도 먹고싶다.</p>
                              </div>
                          </div>
                       </a>
                    </div>
                    
                    <div class="col s6 center-align" style="padding:12px 0 0 8px">
                      <a href="#!">
                          <div class="card" style="margin:0; border-radius:0; z-index:0">
                              <div class="waves-effect waves-block waves-light" style="z-index:1">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:100px">
                              </div>

                              <div class="left-align" style="padding:10px; color:black; z-index:2; position:relative; margin-top:-10px; height:55px">
                                <p style="margin:0; padding:0; line-height:20px"><span style="color:#649a71">KFC</span> &nbsp;치킨도 먹고싶다.</p>
                              </div>
                          </div>
                       </a>
                    </div>

                </div>
                
                <!--동아리 모음2-->
                <div class="row card" style="margin-bottom:12px">
                    <div class="col s12" style="padding:0">
                        <table>
                            <tr>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">UBF</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">북중모</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">비전선교단</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">예수전도단</td>
                            </tr>
                            <tr style="border:0">
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">오르</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">인터콥</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">MNT</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">학선위</td>
                            </tr>
                        </table>
                    </div>
                </div>           
               
                <!--개인의 사연 블럭-->
                <div class="row" style="margin-bottom:12px">
                   <!--개인사연의 헤드-->
                    <div class="col s12 left-align" style="padding:0">
                        <div class="card" style="margin:0; border-radius:0;height:45px; line-height:33px; padding-top:5px">
                            <b style="color:black; padding-left:15px; font-size:15px">한동의 편지</b>
                            <span style="font-size:12px">&nbsp;한동만의 따뜻한 글</span>
                            <a class="right" href="#!" style="color:black; font-size:17px; margin-right:10px;"><i class="material-icons right" style="line-height:37px">more_vert</i></a>
                            <!--적당한 아이콘 찾아서 more_vert를 바꿔주세용-->
                        </div>
                    </div>

                    <!--내용 한블럭 (!내용물이 너무 많을 때, class="truncate"로 인해 그 뒤 내용은 ...으로 축약됨)-->
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:13px">개인의 사연이 들어갑니다.</span>
                       </div>
                      </a>
                    </div>
                    
                    <!--내용 한블럭 (!내용물이 너무 많을 때, class="truncate"로 인해 그 뒤 내용은 ...으로 축약됨)-->
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:13px">개인의 사연이 들어갑니다.</span>
                       </div>
                      </a>
                    </div>
                    
                    <!--내용 한블럭 (!내용물이 너무 많을 때, class="truncate"로 인해 그 뒤 내용은 ...으로 축약됨)-->
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:13px">개인의 사연이 들어갑니다.</span>
                       </div>
                      </a>
                    </div>
                    
                    <!--내용 한블럭 (!내용물이 너무 많을 때, class="truncate"로 인해 그 뒤 내용은 ...으로 축약됨)-->
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:13px">개인의 사연이 들어갑니다.</span>
                       </div>
                      </a>
                    </div>
                    
                    <!--내용 한블럭 (!내용물이 너무 많을 때, class="truncate"로 인해 그 뒤 내용은 ...으로 축약됨)-->
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:13px">개인의 사연이 들어갑니다.</span>
                       </div>
                      </a>
                    </div>


                    <!--기도제목의 꼬리-->
                    <a href="Hope_edit_personal_app.php" class="col s12 center-align" style="padding:0">
                       <div class="card" style="margin:0; border-radius:0;height:42px; line-height:42px">
                          <b style="color:#777; padding-left:15px; font-size:13px">사연 쓰러가기</b>
                       </div>
                    </a>

                </div>
               
               
                <!--총학 소개 블럭-->
                <div class="row card" style="margin-bottom:12px; padding: 10px 15px 0 0">
                   <!--가로로 길게 늘어지는 가로블럭-->
                    <div class="col s12 center-align" style="padding:6px 15px">
                       <a href="#!">
                          <div class="valign-wrapper" style="margin:0; border-radius:0; z-index:0; min-height:65px">
                              <div class="valign waves-effect waves-block waves-light" style="z-index:1; margin-right:18px; width:100px; min-width:100px">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:65px">
                              </div>

                              <div class="left-align valign" style="color:black; z-index:2">
                                <p style="margin:0; padding:0"><span style="color:#649a71">H가 간다!</span> &nbsp;총학의 일하는 이야기!</p>
                              </div>
                          </div>
                       </a>
                    </div>
                    
                    
                    <!--가로로 길게 늘어지는 가로블럭-->
                    <div class="col s12 center-align" style="padding:6px 15px">
                       <a href="#!">
                          <div class="valign-wrapper" style="margin:0; border-radius:0; z-index:0; min-height:65px">
                              <div class="valign waves-effect waves-block waves-light" style="z-index:1; margin-right:18px; width:100px; min-width:100px">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:65px">
                              </div>

                              <div class="left-align valign" style="color:black; z-index:2">
                                <p style="margin:0; padding:0"><span style="color:#649a71">H가 간다!</span> &nbsp;총학의 일하는 이야기!</p>
                              </div>
                          </div>
                       </a>
                    </div>
                    
                    <!--가로로 길게 늘어지는 가로블럭-->
                    <div class="col s12 center-align" style="padding:6px 15px">
                       <a href="#!">
                          <div class="valign-wrapper" style="margin:0; border-radius:0; z-index:0; min-height:65px">
                              <div class="valign waves-effect waves-block waves-light" style="z-index:1; margin-right:18px; width:100px; min-width:100px">
                                <img class="activator" src="https://www.handong.edu/handongin/54/images/sub04_01.jpg" alt="기도 사진" style="height:65px">
                              </div>

                              <div class="left-align valign" style="color:black; z-index:2">
                                <p style="margin:0; padding:0"><span style="color:#649a71">H가 간다!</span> &nbsp;총학의 일하는 이야기!</p>
                              </div>
                          </div>
                       </a>
                    </div>
                    
                    <!--더보기를 눌렀을 때 나오는 링크-->
                    <a href="#!">
                    <div class="col s12 center-align" style="padding:0 0 0 8px;margin: 3px 0 0 0">
                       <div style="margin:0; border-radius:0;height:42px; line-height:42px; border-top:1px solid #f2f2f2">
                          <span style="color:#777;font-size:13px">더보기</span>
                       </div>
                    </div>
                    </a>
                </div>

               
                <!--HOPE 좋은말씀 블럭-->
                <div class="row" style="margin-bottom:12px">
                   <!--기도제목의 헤드-->
                    <div class="col s12 left-align" style="padding:0">
                        <div class="card" style="margin:0; border-radius:0;height:45px; line-height:33px; padding-top:5px">
                            <b style="color:black; padding-left:15px; font-size:15px">Hope 좋은 말씀!</b>
                            <span style="font-size:12px">&nbsp;일상을 위한 따뜻한 글</span>
                            <a class="right" href="#!" style="color:black; font-size:17px; margin-right:10px;"><i class="material-icons right" style="line-height:37px">more_vert</i></a>
                            <!--적당한 아이콘 찾아서 more_vert를 바꿔주세용-->
                        </div>
                    </div>

                    <!--내용 한블럭 (!내용물이 너무 많을 때, class="truncate"로 인해 그 뒤 내용은 ...으로 축약됨)-->
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:13px">HOPE의 말씀이 들어갈 곳</span>
                       </div>
                      </a>
                    </div>
                    
                    <!--내용 한블럭 (!내용물이 너무 많을 때, class="truncate"로 인해 그 뒤 내용은 ...으로 축약됨)-->
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:13px">HOPE의 말씀이 들어갈 곳</span>
                       </div>
                      </a>
                    </div>
                    
                    <!--내용 한블럭 (!내용물이 너무 많을 때, class="truncate"로 인해 그 뒤 내용은 ...으로 축약됨)-->
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:13px">HOPE의 말씀이 들어갈 곳</span>
                       </div>
                      </a>
                    </div>
                    
                    <!--내용 한블럭 (!내용물이 너무 많을 때, class="truncate"로 인해 그 뒤 내용은 ...으로 축약됨)-->
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:13px">HOPE의 말씀이 들어갈 곳</span>
                       </div>
                      </a>
                    </div>
                    
                    <!--내용 한블럭 (!내용물이 너무 많을 때, class="truncate"로 인해 그 뒤 내용은 ...으로 축약됨)-->
                    <div class="col s12 left-align" style="padding:0">
                      <a href="#!">
                       <div class="card" style="margin:0; border-radius:0;height:38px; line-height:38px">
                          <span class="truncate" style="color:black; padding: 0 15px 0 15px; font-size:13px">HOPE의 말씀이 들어갈 곳</span>
                       </div>
                      </a>
                    </div>


                    <!--기도제목의 꼬리-->
                    <a href="Hope_edit_personal_app.php" class="col s12 center-align" style="padding:0">
                       <div class="card" style="margin:0; border-radius:0;height:42px; line-height:42px">
                          <b style="color:#777; padding-left:15px; font-size:13px">Hope글 더 보러가기</b>
                       </div>
                    </a>

                </div>

                
                <!--동아리 모음1-->
                <div class="row card" style="margin-bottom:12px">
                    <div class="col s12" style="padding:0">
                        <table>
                            <tr>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">Bov</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">CCC</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">Crist 90%</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">FRON</td>
                            </tr>
                            <tr>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">GO</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">IVF</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">JDM</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">Jesus Army</td>
                            </tr>
                            <tr style="border:0">
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">LAMB</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">Navigators</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">NIBC</td>
                                <td onClick="location.href='#!링크주소'" onMouseOver="window.status='#!링크주소'"  onMouseOut="window.status=''">SFC</td>
                            </tr>
                        </table>
                    </div>
                </div>                
                
                <!--배너(한동피디아) 블럭1-->
                <div class="row" style="margin-bottom:12px">
                    <div class="col s12 left-align" style="padding:0">
                            <img src="http://www.designsori.com/files/attach/images/721828/860/831/f27fcde042b97a4c9b44a3b6f3a07ed9.jpg" alt="사연 img" style="height:85px; width:100%; display:block">
                    </div>
                </div>
                
                
                <!--배너(Hope) 블럭2-->
                <div class="row" style="margin-bottom:12px">
                    <div class="col s12 left-align" style="padding:0">
                            <img src="http://www.designsori.com/files/attach/images/721828/860/831/f27fcde042b97a4c9b44a3b6f3a07ed9.jpg" alt="사연 img" style="height:85px; width:100%; display:block">
                    </div>
                </div>
                
                <!--페이지 풋터-->
                <div class="row" style="margin-bottom:12px">
                    <div class="col s12 center-align" style="padding:15px 40px 35px; position:absolute;background-color:#353840; color:#eaebee; left:0">
                         크라의 류여진, 강준민, 곽효빈, 김경협의<br>획기적인 서비스
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Initialize Quill editor -->
    <script>
    var quill = new Quill('#editor', {
      modules: {
        toolbar: [
          ['bold', 'italic'],
          ['link', 'blockquote', 'code-block', 'image'],
          [{ list: 'ordered' }, { list: 'bullet' }]
        ]
      },
      placeholder: 'Compose an epic...',
      theme: 'snow'
    });

    var form = document.querySelector('form');
    form.onsubmit = function() {
        // Populate hidden form on submit
        var about = document.querySelector('input[name=about]');
        about.value = JSON.stringify(quill.getContents());

        console.log("Submitted", $(form).serialize(), $(form).serializeArray());
    }
    // $('#save').click(function(){
    //   window.delta = quill.getContents();
    //   console.log(window.delta);
    // });
    </script>

 <script>  $(document).ready(function(){
    $('ul.tabs').tabs();
  });

  $(document).ready(function(){
    $('ul.tabs').tabs('select_tab', 'tab_id');
  });
  </script>
 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script src="js/materialize.js"></script>
 <script src="js/init.js"></script>
    </body>
</html>
