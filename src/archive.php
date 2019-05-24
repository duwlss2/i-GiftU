<?php
  require("nevbar2.php");
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
         main, footer {padding-left: 300px;}
          @media only screen and (max-width : 992px){main, footer{padding-left: 0;}}
         .topbar{padding-left: 300px}
         @media only screen and (max-width: 992px){.topbar{padding-left:0}}
         .card.small{height:410px}
         @media only screen and (max-width : 1700px){.card.small{height:300px}}
         .indicator{background-color:#d31e89 !important}
         .tabs .tab a:hover, .tabs .tab a.active{color:#d31e89 !important}
         .tab a{color:rgba(106,90,73, 0.7) !important}
<!--
/*구글 웹폰트*/
/*@import url(https://www.handong.edu/res/font/NanumBarunGothicWeb.css);

body { font: 100%/1.4 NanumBarunGothic, Gulim, Dotum; background: #FFF; margin: 18px 0 18px 0; padding: 0; color: #666; font-size:14px; }
p {
	line-height: 170%;
	 [disabled]text-align:justify;
	padding-right: 28px;
	padding-left: 28px;
}*/
p.t2 { line-height:170%; text-align:justify; padding-right: 0px; padding-left: 0px; }
img.exp { margin-bottom:4px; }
a.st4 { color:#b72569; }
.st5 { color:#C03; line-height:230%;}
.st51 { color:#C03; }
.st6 { color:#b72569; }
.st7 { color:#7accc8; line-height:230%; }
.st7-1 { color:#7accc8; }
.st8 { color:#609 }
/*
ul, ol, dl { padding: 0; margin: 0; }
h1, h2, h3, h4, h5, h6 { margin-top: 0; padding-right: 28px; padding-left: 28px; }
a img { border: none; }
a:link { color: #666; text-decoration: none; }
a:visited { color: #666; text-decoration: none; }
a:hover, a:active, a:focus { color: #3e7dab; text-decoration: underline; }*/*/
.container {
	width: 720px;
	background: #FFF;
	margin: 0 auto;
	z-index: 0;
}
.content { width: 720px; }
.content1 { width: 720px; }
         
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

     </style>
</head>
  <body>
   <main>
    <div class="row center-align" style="margin-top:48px">


    <div id="test1" class="col s12 l6 left-align" style="display: inline-block; float: none">
      <img src="./img/archive/1-1.png" alt="" width="100%"  border="0">
       <iframe width="100%" height="200px" src="https://www.youtube.com/embed/JclrNqY83wU" frameborder="0" allowfullscreen=""></iframe> 

  <p><b class="st7">Q. 자기소개 부탁드립니다.
    </b><br/>
  안녕하세요. 저는 경영경제학부에서 회계학을 가르치고 있는 라채원이라고 합니다.</p>

  <p><b class="st7">Q. 한동대에는 언제 어떻게 오게 되셨나요?</b><br/>
  제가 2010년 가을학기부터 근무를 시작하게 됐습니다. 그전에는 사실 한동대학교에 대해 잘 몰랐습니다. 원래 싱가포르에 살고 있다가 갑자기 제 전공 관련해서 한동대학교에 자리가 났는데, 한동대학교 졸업생인 사촌 동생이 항상 학교에 대한 자랑을 많이 하고, 목회자인 남편을 통해 얘기를 들으며 알게 되었고 결과적으로 하나님께서 허락하심으로 한동대학교에 오게 됐습니다. </p>



  <p><b class="st7">Q. 한동대에서 가장 좋았던 점은 무엇인가요?</b><br/>
  학생분들도 많이 느끼실지 모르겠지만, 다른 학교들은 전공만 이야기하고 교수님과 학생들과의 관계가 단절되는 경우가 많습니다. 그런데 한동대에서는 학업뿐만 아니라, 삶 자체에서 학생들과 교수님들 간의 새로운 관계가 형성될 수 있다는 점이 가장 좋은 점인 것 같습니다. 그 안에서 학생들과 같이 고민을 하면서 인생 자체를 나눌 수 있다는 점이 저에게는 가장 큰 차별점이었습니다.</p>

  <center><img src="./img/archive/1-2.png" alt="" width="100%"  border="0" class="exp"></center><br />

  <p><b class="st7">Q. 이번에 한동대를 떠나게 되셨는데, 학교생활 중 가장 기억에 남는 에피소드는 무엇인가요?</b><br/>
  가장 처음으로는 한 학생이 기억납니다(웃음). 2010년 가을, 한동대에 왔을 때, 처음으로 맡게 된 팀원 중 한 명이 어느 날 저를 찾아와서 성경책을 들고는 이 성경책에 대해서 자신이 따질 것이 있다고 얘기를 했었습니다. 그래서 제가 그 친구에게 “논쟁을 하고 싶으면 그 책을 한번은 읽고 와서 논쟁하자고 하는 것이겠지?”라고 이야기했었는데 그 학생이 “아니요”라고 대답해서 쫓아냈던 기억이 있습니다(웃음).<br />
  저에겐 사실 7년 동안의 모든 팀이 한 팀도 버릴 팀 없이 다 기억에 남습니다. 하지만 그 가운데서도, 기질적인 측면에서 저를 가장 많이 닮고, 그래서 제가 제일 마음으로 진통했던 팀은 첫 RC팀인 것 같습니다. ‘사랑하라’라는 팀이었는데, 정말 사건∙사고도 많았고 나중에 마지막 시간에는 서로 울면서 정말 소중한 관계를 고백할 수 있는 팀이었습니다. 제 분신이라고 해도 믿을 정도로 비슷한 사람들이 모여서 여러 가지 일들을 겪었었는데, 그 가운데서 그 친구들이랑 새벽 3~4시까지도 토론을 하고 고민을 했던 소중했던 시간이 기억납니다. 그 이후에도 제 수업을 듣는 학생들이나 RC에서 만났던 학생들과 밤늦게까지 고민을 하면서 함께 나눴던 순간들이 아직도 제 기억에 많이 남아있습니다.</p>

  <p><b class="st7">Q.혹시 아쉬웠던 기억이 있다면 어떤 것이 있으신가요?</b><br/>
  항상 더 줄 수 있었는데, 충분한 사랑을 못 준 것 같아 지금 이 순간에도 아쉬움을 절감하고 있습니다. 작년 초에 제가 많이 지쳐있었을때, 새내기와 팀원들 그리고 학생들에게 더 많은 시간을 나눠주지 못했던 것이 굉장히 마음에 많이 남습니다. 그럼에도 당시 새내기들과 여전히 좋은 관계를 유지하고 있어 새내기들에게 감사한 마음도 있습니다. 또 개인적인 사정으로 힘들었던 시기에 팀원들에게 충분한 관심을 주지 못했던 적이 있는데, 그때 힘들었을 팀원을 더욱 품어주지 못한 게 가장 아쉬운 것 같습니다. </p>


  <center><img src="./img/archive/1-3.png" alt="" width="100%"  border="0" class="exp"></center><br />

  <p><b class="st7">Q. 한동을 떠나는 교수의 입장에서 학생들에게 꼭 해주고 싶은 말이 있으시다면?</b><br />
  저는 현동홀 현판에 쓰인 ‘GOD’S University’라는 말이 와 닿아서 한동대에 오게 됐습니다. 그래서 학생들한테 이야기하고 싶은 것은 세상을 바꾼다는 의미가 ‘내가 나가서 거창하게 어떤 것을 하는 것이 아니라는 것’을 꼭 기억했으면 좋겠습니다. 바꿔야 하는 대상 중에 첫 번째 대상이 ‘나 자신’이라는 것을 잊지 않았으면 좋겠습니다. 그래서 내가 바뀌면 내 주변이 바뀔 수 있고, 이를 통해 세상에 선한 영향력이 흘러나간다는 것을 잊지 않았으면 합니다. <br />
  한 가지 더 이야기하면 우리 학교의 특성이 사실은 전공의 탁월성도 추구해야 하지만 ‘하나님과의 관계’, ‘사람과의 관계’도 중요하다고 생각을 합니다. 그래서 학생들에게 ‘한동대에서 다른 것을 얻어가려고 하지 말고, 거품을 뺀 나 자신과 거품을 뺀 너를 얻어가라’라고 종종 이야기했고, 학교에서 평생 함께할 수 있는 평생지기들을 꼭 얻어가라고 이야기하고 싶습니다.</p>

  <center><img src="./img/archive/1-4.png" alt="" width="100%"  border="0" class="exp"></center><br />

  <p><b class="st7">Q. 남아계시는 동료 교수님들에게 하고 싶으신 말씀이 있으신가요?</b><br />
  학생들은 모를 수도 있는데 한동대에 있으면서 정말 절감한 것은 ‘세상에 어디 가도 이런 관계성을 가질 수 있는 집단은 절대 없다’라는 것입니다. 원래 교수가 된 다음에 또 다른 스승을 만난다는 것은 거의 불가능한데, 한동대에서 다시 한번 은사님이라 부르고 싶고, 제게 인생의 지혜를 나눠주시는 분들을 만나게 된 것에 정말 감사하고 있습니다. 그래서 저는 한동대에서 만난 교수님들과의 관계를 너무나도 소중하게 간직할 수밖에 없을 것 같습니다. 또한, 함께 기도하고, 삶을 나눠주시고, 서로를 너무 소중하게 여겨주시는 지기 교수님들을 만나게 되어 너무 뜻깊은 시간이었던 것 같습니다. 특별히 경영경제학부 교수님들 소속인 게 감사했던 것은 정말 중요한 사안에 관해 토론하고 논쟁할 때도, 본질로 돌아가시는 교수님들 사이에 제가 있다는 게 너무나도 감사했고, 감격스러웠습니다. 그런 교수님들을 뵙고, 일을 할 수 있었다는 것만으로도 제게는 영광이었다고 감히 말씀드립니다.</p>


  <p><b class="st7">Q. 내년에 학교에 입학하게 될 17학번 새내기들에게 하고 싶으신 말씀이 있다면요?</b><br/>이번 시국 사태를 대하는 것을 보며 우리 중고등학생들한테도 참 많은 변화가 있다는 생각을 했습니다. 저는 한편으로 굉장히 다행이라는 생각을 했고, 그래서 지금보다 아랫세대들이 이끌어 가는 세대는 분명히 달라질 수 있다고 생각했습니다. 달라져야만 우리나라가 살아난다고 생각을 하고, 이를 위해서는 주어진 것만 생각하고 살면 안 될 것 같다는 생각을 하게 됩니다. 어른들이 요구하는 것으로만 자신을 맞추지 않고, 스스로 찾고, 고민하고, 자신에게 제일 맞는 길들을 개척한다는 생각을 가지고 살았으면 합니다. 그런 의미에서 한동대에서 자기 자신을 찾아보고, 재능을 찾고, 그리고 주변의 관계를 만들어나가길 기도하겠습니다. </p>
    </div>

    <div id="test2" class="col s12 l6 left-align" style="display: inline-block; float: none">

  <img src="./img/archive/2-1.png" alt="" width="100%"  border="0" />
<br>

<iframe width="100%" height="200px" src="https://www.youtube.com/embed/PeGURj03kIw" frameborder="0" allowfullscreen></iframe>


<p><b class="st7">Q. 자기소개 부탁드립니다</b><br/>
안녕하세요. 저는 ICT 융합과 경영을 전공하고 있는 13학번 조혜상입니다.</p>




<p><b class="st7">Q. 현재 지역교회를 위해서 어떤 섬김을 하고 계시는지 설명 부탁드릴게요.</b>
<br/>

저는 매주 토요일마다 포항 기계읍에 가서 세 교회에서 모인 친구들과 함께 예배하고 음악을 가르치고 있습니다. 특별히 저는 드럼을 가르치고 있죠. 또한, 주일마다 경남 산청에 있는 작은 시골 미자립교회에서 주일학교 교사와 고등부 교사로 섬기고 있습니다. 매일 아침 10시에 주일학교 아이들 서너 명과 함께 예배를 드린 후 아이들에게 말씀을 가르치고 있고, 대예배가 끝나면 인근 고등학교에서 온 약 10명의 고등학생에게 말씀을 가르치고 있습니다.
<p>

<center><img src="./img/archive/2-2.png" alt="" width="100%" border="0"></center><br />

<p><b class="st7">Q.지역교회를 섬기게 된 특별한 계기가 있다면 무엇인가요?</b><br/>
저는 어려서부터 농어촌 미자립교회에서 성장해왔고 자라왔습니다. 그리고 그곳에서 귀하게 섬겨주신 선생님들의 사랑을 받고 자랐죠. 제가 나이가 차고 음악을 가르칠 수 있는 역량이 되었는데 때마침 포항 기계읍에 교사가 필요하다는 소식을 듣게 되었고 지금까지 섬기게 되었습니다.</p>

<p><b class="st7">Q. 지역교회를 섬기는 주말 일과가 어떻게 되나요?</b><br/>
토요일 아침이 되면 부리나케 일어납니다. 한 8시쯤 일어나서 준비 하고 9시쯤 양덕에서 출발합니다. 차를 타고 3~40분 가게 되면 포항의 기계읍이 나옵니다. 거기에 있는 기계중앙교회에 들어가게 되면 아이들이 삼삼오오 모여서 떠들고 있죠. 그러면 제가 아이들을 불러모으고 둥그렇게 앉아서 기타를 치면서 예배합니다. 1시간 정도 예배하고 그 후 파트 별로 저는 드럼을 가르치고 다른 친구는 기타를 가르치고, 또 다른 친구는 피아노를 가르치면서 함께 시간을 보냅니다. 그렇게 오후 1시까지 음악 교실이 진행되고요. 저녁 6시 30분이 되면 포항에서 버스를 타고 경남 산청으로 이동합니다. 버스를 타고 3시간 정도, 또 거기서 차를 갈아타고 3~40분 정도 가게 되면 경남 산청의 칠정교회라는 작은 교회가 나오죠. 그 교회는 제가 어려서부터 성장해왔고 사랑을 많이 받아온 교회입니다. 아침이 되면 주일학교 차를 운행하고 아이들을 모아서 함께 예배하고 말씀을 나누고 간식도 먹습니다. 그러고 나서 11시 대예배를 드리고 오후에는 인근에 있는 10명 남짓한 고등학생들에게 말씀을 가르치고 있습니다. 이게 제 주말 일과입니다</p>



<center><img src="./img/archive/2-3.png" alt="" width="100%" border="0"></center><br />

<p><b class="st7">Q. 특별히 기억에 남는 에피소드가 있다면 들려주세요.</b><br/>
하루는 제가 기계읍에서 드럼을 가르치는 친구의 생일이었습니다. 그 날 저희는 땡땡이를 치고 치킨집에 가서 맛있는 치킨을 먹었던 기억이 납니다. 그때 아이들이 마음 문을 열고 자신들이 했었던 고민을 털어놓고 저는 그 고민을 들어주고 상담을 해줬죠. 산청에서는 아침에 아이들을 깨우러 가면 아이들이 일어나지 않거나 부모님과 다른 장소를 갔는데 저한테 연락을 안 하는 경우가 종종 있었습니다. 그러면 저는 혼자 돌아와 남아있는 한 명, 혹은 혼자서 예배를 드렸던 기억이 많이 있습니다. 그렇기에 저는 아이들과 함께 예배드릴 수 있는 게 기쁘고요. 앞으로도 끝까지 잘 섬기고 싶습니다.</p>

<p><b class="st7">Q. 섬기면서 느끼고 배웠던 것은 무엇이었나요?.</b><br/>
사랑하고 섬기는 것은 쉽지 않다, 그리고 그렇게 낭만적이진 않다는 것을 느꼈습니다. 때로는 아이들이 결석할 때도 있고 말을 듣지 않을 때도 있고, 또는 도망칠 때도 있고 저를 피해서 숨을 때도 있습니다. 하지만 저는 그 아이들에게 연락하고 찾아가면서 ‘사랑은 이런 거구나, 포기하지 않는 거구나’라는 걸 배웠습니다. 저도 그런 사랑을 받아왔으니깐요.</p>

<center><img src="./img/archive/2-4.png" alt="" width="100%" border="0"></center><br />

<p><b class="st7">Q. 지역교회를 섬기면서 어려움이 있었거나 어려움이 있었다면 어떻게 극복했나요?</b><br/>
처음에 지역교회를 섬기려고 했을 때, 많은 어려움이 있었습니다. 학업과 섬김을 병행한다는 것이 쉽지 않았기 때문입니다. 그래서 많은 부담과 스트레스를 받을 때도 있었는데요. 저는 이 스트레스와 부담을 극복할 수 있는 요령을 깨달았습니다. 바로 섬김을 즐기는 것이었습니다. 주말마다 아이들과 만나고 교제하는 것이 저에게 매우 기쁘다는 것을 발견했고, 산청까지 가는 3시간 동안 버스에서 푹 쉴 수 있는 숙면의 시간을 확보했거든요. 섬김이 조금은 힘들고 어려워 보일진 모르겠지만 섬김에서 오는 큰 기쁨과 활력소가 저로 하여금 오히려 공부를 더 열심히 하고 공부해야 하는 이유를 발견했던 큰 계기가 되었습니다.</p>



<p><b class="st7">Q. 지역교회 섬김에 대한 앞으로의 계획은 어떻게 되나요?</b><br/>
더 많은 한동의 친구들과 함께 지역교회를 섬기는 것을 계획하고 있습니다. 포항 기계읍에서 다음 학기부터 다시 진행될 음악 교실에 재능 많고 아이들을 사랑하는 친구들과 함께 섬기고 싶습니다. 그리고 경남 산청에 있는 지역교회도 꾸준히 섬길 계획입니다.</p>

<center><img src="./img/archive/2-5.png" alt="" width="100%" border="0"></center><br />

<p><b class="st7">Q. 앞으로의 비전은 무엇인가요?</b><br/>
저의 비전은 사회에 꼭 필요한, 하나님이 기뻐하시는 기업을 만들어내는 창업가입니다. 저의 창업을 통하여서 지역사회가 발전하고 지역에서 하나님의 꿈을 꾸는 많은 청소년과 청년들이 일어났으면 좋겠습니다.</p>



<br /><br />

    </div>

    <div id="test3" class="col s12 l6 left-align" style="display: inline-block; float: none">
          <img src="./img/archive/3-1.png" alt="" width="100%"  border="0">
          <!-- <img src="images/sub03_01.jpg" alt="" width="720" border="0"> -->

      <br />

      <p><b class="st7">Q. 자기소개 부탁드립니다.</b><br />
      안녕하세요. 저는 99학번 이경황이라고 합니다. 기계제어시스템공학부를 졸업하고, 이어서 기계제어시스템대학원에서 석사까지 마치고 졸업을 했습니다. 그 이후에 연구원 생활을 하고 2013년에 창업을 해서 지금까지 ‘오파테크’라는 회사를 운영하고 있습니다.
      </p>


      <p><b class="st7">Q. 선배님에게 ‘한동대학교’는 어떤 곳인가요?</b><br />
       어떻게 보면 모르는 것도 많고 개념도 없고, 뭐든지 할 수 있을 것만 같은 젊은 시절을 가다듬어 주고, 기본적으로 앞으로 살아갈 삶에 대한 방향들을 고민할 수 있게 해줬던 곳이 아닌가 생각이 드네요.
      </p>

      <center><img src="./img/archive/3-2.png" alt="" width="100%"  border="0"></center><br />


      <p><b class="st7">Q. 어떻게 오파테크를 창업하게 되셨나요?
      </b><br />
       화려한 것은 없어요(웃음). 첫 직장에서 이직해 포항의 벤처기업으로 왔는데, 회사가 잘 안 됐죠. 경영이 어려워져 제가 직장을 옮겨야 하는 상황이었어요. 당시 저는 10년에서 20년 정도 경력을 쌓아서 가진 기술을 가지고 사람들을 도울 수 있는 일을 해야겠다는 생각을 갖고 있었는데, 생각보다 빨리 선택의 기로에 서게 됐죠. 그래서 이 상황을 두고 고민을 하다가 늦기 전에, 미친 척하고 하고 싶은 일을 해보자 해서 창업을 하게 됐어요. 2013년에 혼자 시작을 해서 당시에는 적정기술 쪽으로 준비했지만 비즈니스 모델을 만드는 것이 굉장히  어려웠어요. 그렇게 2년을 지내다가 그 시절에 만났던 사람들과 우리 따로 하지 말고, 모여서 해보자는 생각을 하게 됐고, 지금의 시각장애인 점자 관련된 기술을 다루는 오파테크를 정식으로 시작하게 되었죠.
      </p>

      <center><img src="./img/archive/3-3.png" alt="" width="100%"  border="0" /></center><br />

      <P><b class="st7">Q. 오파테크의 비전과 모토는 무엇인가요?</b><br />
      오파테크는 독자적인 기술을 보유한 임팩트 기업을 모토로 하고 있어요. 그래서 사회적인 문제에 대해서 어떤 기술이 필요한지를 찾고, 이에 대한 솔루션을 개발하는 것을 비전과 목표로 하고 있습니다.
      </p>

      <center><img src="./img/archive/3-4.png" alt="" width="100%"  border="0" /></center><br />

      <P><b class="st7">Q. 최근 학교에 창업을 준비하는 학생들이 많은데, 이 학생들에게 조언을 해주신다면?
      </b><br />
       일단은 창업을 통계적으로 볼 때, 세 번 정도 실패하고 난 이후에 성공하는 케이스가 많아요. 그만큼 처음 시작한 창업을 성공으로 이끌긴 쉽지 않아요. 그리고 사업이라는 것은 어쨌든 경쟁이기 때문에 시작하기 전에 본인이 어떤 경쟁력을 갖고 있는지 아는 것이 굉장히 중요해요. 특히, 대학생들이 아이디어를 가지고 창업을 하는 경우가 많은데, 사실 그 자체가 경쟁력인 경우는 거의 없어요. 그렇기 때문에 저는 창업을 준비하는 학생이라면 자신이 내세울 수 있는 경쟁력이 어떤 것인지, 그것을 어떻게 키울 것인지 분석하고, 고민하는 것이 꼭 필요하다고 생각합니다.
      </p>

      <center><img src="./img/archive/3-5.png" alt="" width="100%"  border="0" /></center><br />

    </div>

    <div id="test4" class="col s12 l6 left-align" style="display: inline-block; float: none">
        <img src="./img/archive/4-1.png" alt="" width="100%"  border="0">
    <!-- <img src="images/sub04_01.jpg" alt="" width="720" border="0"><br /><br /> -->



<p>영하를 밑도는 날씨가 계속되는 추운 겨울에 한동인들의 마음을 따듯하게 하는 소식이 있어 전하고자 합니다. 바로, 강병덕 교수님 팀인 '부국강병'의 이야기인데요. '부국강병' 팀은 환경이 마땅치 않아 공부하는 데에 어려움을 겪고 있는 취약계층 아동들에게 공부방을 꾸며주었다고 합니다. 추운 겨울마저 훈훈하게 만들어주는 한동인들의 선행에 대해서 자세히 소개하고자 합니다.<strong></strong></p>

<center><img src="./img/archive/4-2.png" alt="" width="100%" border="0" /></center><br />

<p><b class="st7">기적의 공부방 프로젝트</b><br />
  대한민국 헌법 제 31조 1항은 대한민국 국민의 교육에 대한 권리에 대해서 정의하고 있습니다. &quot;모든 국민은 능력에 따라 균등하게 교육을 받을 권리를 가진다&quot;고 규정하고 있으며, 의무교육제도를 취하며 국민들의 교육을 위해 다방면에서 노력을 하고 있습니다. 한편, 이러한 노력에도 여전히 취약계층의 학생들은 다양한 문제들로 인해 적절한 교육을 받지 못하고 있고, 포항에도 교육 환경과 문화에 대한 개선이 끊임 없이 논의되고 있습니다. 이러한 배경에서 '부국강병' 팀은 환경적 요인으로 인해 학습에 어려움을 겪고 있는 학생들에게 적절한 환경을 제공하기 위해 '공부방 꾸며주기' 프로젝트를 진행했습니다. </p>

<center><img src="./img/archive/4-3.png" alt="" width="100%" border="0" /></center><br />

<p>이 프로젝트의 팀장으로 참여한 지현성 (경영경제, 10) 학생은 &quot;공부할 공간이 없어 공부를 하고 있지 못하는 학생들을 위해 기존의 방을 공부방으로 꾸며주는 프로젝트를 진행하게 됐다&quot;고 이야기하며 &quot;무엇보다도 진행을 하면서 공부방을 갖게 된 아이들의 표정과 저희가 진행하는 프로젝트가 좋은 의도를 가졌다는 것을 아시고 알게 모르게 지원해주신 모든 분들에게 너무 감사하다는 말을 전하고 싶다&quot;고 답했습니다.<strong></strong></p>

<center><img src="./img/archive/4-4.png" alt="" width="100%" border="0"></center><br />


<p><b class="st7">'기적의 프로젝트', 기적을 선물하다</b><br />
  한동대학교에서는 매 학기 팀 활동의 일환으로 '워크 듀티 (Work duty)', '기적의 프로젝트' 등을 진행하게 됩니다. 그중에서도 기적의 프로젝트는 한동대학교의 중요한 구성요소인 '팀'이 학교, 그리고 더 나아가 지역사회와 친밀한 관계를 유지하고, 선한 영향력을 전하고자 실행하는 프로젝트입니다. 앞선 뉴스레터 53호에 소개되었던 김주일 교수님 팀 '소리주일러' 역시 이런 의도를 갖고 프로젝트를 진행했습니다. 이번 '부국강병' 팀에서 진행된 '공부방 꾸며주기' 프로젝트 역시 한동대학교의 가치를 세상에 전하고자 기획된 프로젝트 입니다. </p>


<p><img src="./img/archive/4-5.png" alt="" width="100%"  border="0" /></p>
<p>이번 프로젝트에 참여한 임연우 (전산전자, 15) 학생은 &quot;이번 프로젝트를 통해서 ''배워서 남주자'라는 한동의 '나눔'에 대한 가치를 실현할 수 있는 기회 였던 것 같아 좋았다&quot;고 말하며 프로젝트의 목적성에 대해 이야기 했습니다. 또한 임연우 학우는 &quot;처음 교수님께서 공부방 꾸미기 프로젝트가 있다고 이야기해주셨을 때에 팀원들 모두 '부국강병' 팀에서 주도적으로 참여하고자 했습니다&quot;라고 이야기하며 팀원들이 적극적으러 프로젝트에 임했음을 강조했습니다.</p>
<p><img src="./img/archive/4-6.png" alt="" width="100%"  border="0" /></p>
<p>이번 프로젝트를 통해서 다시 한번 '배워서 남 주자'라는 한동대학교의 가치를 되새기고,  추운 겨울 마음이 훈훈해지는 기회가  한동인들에게 전해지면 좋겠습니다. </p>
<p>&nbsp;</p>



  <center></center><br />
  <center></center><br />
  <center><img src="./img/archive/4-7.png" alt="" width="100%"  border="0"></center><br />

  <br />

    </div>

    <div id="test5" class="col s12 l6 left-align" style="display: inline-block; float: none">
      <br />
<center><img src="./img/archive/capture.png" alt="" width="100%"  border="0" class="exp"></center>
    </div>

    <div id="test6" class="col s12 l6 left-align" style="display: inline-block; float: none">
      <img src="./img/archive/sub06_title.jpg" alt="" width="100%" border="0">


<p>쌀쌀한 겨울이 되면 벌써 수년째 한동을 따뜻하게 만드는 한 후원자의 선물이 도착합니다. 바로 외국인 유학생들을 위해 오순향 후원자가 매년 11월 말을 목표로 40~50벌의 스웨터, 목도리, 모자 등 손뜨개질로 만들어서 전해주는 사랑과 정성의 선물입니다.</p>

<center><img src="./img/archive/sub06_01.jpg" alt="" width="100%"  border="0" class="exp"></center><br />

<p>오 후원자께서는 서울영락교회에 오랫동안 다니시며, 신앙생활을 하고 있으셨습니다. 젊었을 때 사업을 하며 해외를 많이 다니게 되었는데, 그러면서 자연스럽게 해외 선교활동에 큰 관심을 갖게 되었다고 하십니다. 오랜 기간 교회 청년들과 함께 사역하시며, 여름이면 청년들과 함께 30여 개국을 다니며 단기선교를 참 많이 다녀오셨다고 합니다.</p>
<p>오 후원자께서 한동대를 처음 알게 된 계기는 2000년대 초 김영길 초대총장님(현 한동글로벌후원회장)이 영락교회 집회에 오셨을 때였습니다. 김 총장님께서 다녀가신 후에 하나님께서 오 후원자에게 한동대를 도우라는 마음을 주셔서 같은 교회의 몇몇 성도들과 함께 갈대상자 후원을 시작하게 되셨다고 하네요. 이후에도 정기적으로 후원해 오시다가 병환으로 병원에 있는 동안, 젊었을 때 단기 선교를 다니던 것처럼, 한국에서 외국인 유학생들을 도울 방법이 무엇이 있을까 고민하다가, 2013년부터 직접 병상에서 손뜨개질로 니트, 목도리, 스웨터, 모자 등을 떠서 한동대에 있는 외국인 유학생들에게 전달하게 되었던 것입니다.</p>


<center><img src="./img/archive/sub06_02.jpg" alt="" width="100%"  border="0" class="exp"></center><br />


<p><b class="st7">오순향 후원자의 편지</b><br/>
2016 11月 25日<br />
스웨터 4장 조끼 10장 목도리 14장 모자 16장<br />
내가 이젠 선교지 가지 못하니 이 물건을 받은 학생은 고향으로 돌아가면 그 나라에 좋은
지도자가 되고 복음의 통로가 되길 기도하며 한 땀 한 땀 떴습니다. 변변치 못하나 기쁨으
로 받아주세요. 고맙습니다.<br />
오순향 드림
</p>

        <p><b class="st7">학생들의 답장</b><br/></p>


<center><img src="./img/archive/sub06_03.jpg" alt="" width="100%"  border="0" class="exp"></center><br />


<center><img src="./img/archive/sub06_04.jpg" alt="" width="100%"  border="0" class="exp"></center><br />

<center><img src="./img/archive/sub06_05.jpg" alt="" width="100%"  border="0" class="exp"></center><br />

<center><img src="./img/archive/sub06_06.jpg" alt="" width="100%"  border="0" class="exp"></center><br />

<center><img src="./img/archive/sub06_07.jpg" alt="" width="100%"  border="0" class="exp"></center><br />

<center><img src="./img/archive/sub06_08.jpg" alt="" width="100%"  border="0" class="exp"></center><br />

<center><img src="./img/archive/sub06_09.jpg" alt="" width="100%"  border="0" class="exp"></center><br />

<center><img src="./img/archive/sub06_10.jpg" alt="" width="100%"  border="0" class="exp"></center><br />

<center><img src="./img/archive/sub06_11.jpg" alt="" width="100%"  border="0" class="exp"></center><br />

<center><img src="./img/archive/sub06_12.jpg" alt="" width="100%"  border="0" class="exp"></center><br />

<center><img src="./img/archive/sub06_13.jpg" alt="" width="100%"  border="0" class="exp"></center><br />

<center><img src="./img/archive/sub06_14.jpg" alt="" width="100%"  border="0" class="exp"></center><br />

<center><img src="./img/archive/sub06_15.jpg" alt="" width="100%"  border="0" class="exp"></center><br />



<p>
    <a href="http://sarang.handong.edu/sarang " target="_blank">▶한동을 따뜻하게 만드는 '갈대상자함께엮기' 참여하기</a><br></p>

    </div>
    <div class="col s12 navbar-fixed-top" style="position:relative; float: none; padding:0">
        <a href="" class="black-text btn waves-effect waves-light" style="background-color:#ddd; width:100%; position:absolute; left:0; margin-top:20px; height:45px; line-height:48px; font-size:18px"><b>글 더 보러가기</b></a>
    </div>
  </div>
    </main>
<footer>
  <div class="fixed-action-btn" style="z-index:1030">
     <a class="btn-floating btn-large waves-effect waves-light" style="background-color : #d31e89">
       <i class="large material-icons">mode_edit</i>
     </a>
     <ul>
       <li><a class="btn-floating yellow darken-1 waves-effect waves-light" ><i class="material-icons">attach_file</i></a></li>
     </ul>
   </div>
   </footer>
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

