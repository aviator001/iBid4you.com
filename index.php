<?
ob_start();
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1704098726469372',
  'app_secret' => '158c42fbe28a71a91ab044e533937a84',
  'default_graph_version' => 'v2.4',
 'persistent_data_handler'=>'session'
  ]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['public_profile','email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://sugardaddydays.com/callback.php', $permissions);

foreach ($_SESSION as $k=>$v) {                    
    if(strpos($k, "FBRLH_")!==FALSE) {
        if(!setcookie($k, $v)) {
            //what??
        } else {
            $_COOKIE[$k]=$v;
        }
    }
}
setCookie("admin",'admin',time()+3600,"/");

 include "inc/utils.class.php";
	$c=new utils;
	$c->connect();
	
	if ($c->is_mobile()) {
		$style="background:#f0f0f0;opacity:0.3;height:130px;border-radius:6px;color:#000;-webkit-filter:blur(+10);padding:20px";
		$auctions="<div STYLE=\"FONT-SIZE:12PX;COLOR:#000;text-shadow:0 0 1px #fff\"><b>AUCTIONS, DIRECT SMS & MORE</div>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no"/>
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/camera.css"/>

  <script src="js/jquery.js"></script>
  <script src="js/jquery-migrate-1.2.1.js"></script>

  <!--[if lt IE 9]>
  <html class="lt-ie9">
  <div style=' clear: both; text-align:center; position: relative;'>
    <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
      <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
           alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
    </a>
  </div>
  <script src="js/html5shiv.js"></script>
  <![endif]-->

  <script src='js/device.min.js'></script>
</head>

<body>
<div class="page">
  <!--========================================================
                            HEADER
  =========================================================-->
  <header id="header" class="header">
    <div class="header_panel">
      <div class="brand">
        <div class="brand_cnt" style="opacity:0.8">
        <b>  <p class="brand_slogan">
            SugarDaddyDays.com
			<br> </p></b>
			<span>
				<a href="<?=$loginUrl;?>"><img src="http://smsgone.com/face.png" style="margin-left:-5px;margin-top:10px;width:80px"></a>
			</span>
			<span>
				<img src="assets/grey_button_c.png" style="margin-top:10px;margin-left:20px;width:85px" onmmouseover="this.src='assets/grey_button_o.png'" onmmouseout="this.src='assets/grey_button_c.png'">
			</span>
        </div>
      </div>
    </div>
<style>
	.magic_box {
	background:#f0f0f0;
	opacity:0.3;
	border-radius:6px;
	color:#000;
	-ms-filter:blur(+10);
	filter:blur(+10);
	-webkit-filter:blur(+10);
	padding:20px
 }
</style>
  </header>
  <!--========================================================
                            CONTENT
  =========================================================-->
  <section id="content" class="content">
    <div id="home" class="camera_container">
      <div id="camera" class="camera_wrap">
        <div data-src="images/page-1_slide01.jpg"></div>
        <div data-src="images/page-1_slide02.jpg"></div>
        <div data-src="images/page-1_slide03.jpg"></div>
      </div>
      <div class="camera_cnt">
        <div class="container center">
          <div class="box-dt">
            <div class="box-dr">
              <div class="box-dc">
                <h2>
                  <span>Welcome to</span>
				  <div style="padding:5px;font-size:20px;text-shadow:1px 1px 1px #fff;color:transparent;<?=$style;?>">
                  a wealthy gentlemans
                  candy store
				  <?=$auctions;?>
				  </div>
                </h2>
                <p class="magic_box tiny">
                 Unleash your inner-celebrity and auction your time, your company over dinner, or just about anything to do with you, for your favorite charity - YOU!
                <br>
				Auctions are just like in the real world - lasting minutes and not days and are in real time - built just for you!
				</p> 
              </div>
           </div>
          </div>
        </div>
      </div>
    </div>
   <div id="portfolio" class="bg-black well">
    <div class="container">
      <p class="tiny center">Coming Soon</p>
       <h3 class="center">Sugar Babies</h3>
        <div class="row">
          <div class="grid_4">
            <a class="lazy-img thumb" style="padding-bottom:100%;" href="#">
			 <img data-src="v3.0/sb/ademao.jpg" src="#" alt=""/>
              <span class="thumb_overlay"></span>
              <div class="thumb_cnt">
                <h5>SugarBaby</h5>
              </div>
            </a>
          </div>
          <div class="grid_4">
            <a class="lazy-img thumb" style="padding-bottom:100%;" href="#">
			<img data-src="v3.0/sb/AnnaBelle77.jpg" src="#" alt=""/>
              <span class="thumb_overlay"></span>
              <div class="thumb_cnt">
                <h5>SugarBaby</h5>
              </div>
            </a>
          </div>
          <div class="grid_4">
            <a class="lazy-img thumb" style="padding-bottom:100%;" href="#">
			<img data-src="v3.0/sb/CarisEyes.jpg" src="#" alt=""/>
              <span class="thumb_overlay"></span>

              <div class="thumb_cnt">
                <h5>SugarBaby</h5>
              </div>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="grid_4">
            <a class="lazy-img thumb" style="padding-bottom:100%;" href="#">
			<img data-src="v3.0/sb/avaforlove.jpg" src="#" alt=""/>
              <span class="thumb_overlay"></span>
              <div class="thumb_cnt">
                <h5>SugarBaby</h5>
              </div>
            </a>
          </div>
          <div class="grid_4">
            <a class="lazy-img thumb" style="padding-bottom:100%;" href="#">
			<img data-src="v3.0/sb/babycarrie.jpg" src="#" alt=""/>
              <span class="thumb_overlay"></span>
              <div class="thumb_cnt">
                <h5>SugarBaby</h5>
              </div>
            </a>
          </div>
          <div class="grid_4">
            <a class="lazy-img thumb" style="padding-bottom:100%;" href="#">
			<img data-src="v3.0/sb/brightasia.jpg" src="#" alt=""/>
              <span class="thumb_overlay"></span>
              <div class="thumb_cnt">
                <h5>More</h5>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id="experience" class="parallax parallax1 well" data-parallax-speed="-0.1">
      <div class="container">
        <p class="tiny center"> features of the future of dating</p>

        <h3 class="center">features</h3>

        <div class="row">
          <div class="grid_4 wow fadeIn" data-wow-delay="0.2s">
            <div class="icon_1"></div>
            <h4> Sitamet consectetur modi </h4>

            <p>Nsatolernatur autitaut miertase vertas. Veasnseq usauntur magni dolores eo qui quisqu ameras dolomas.</p>
            <a class="btn" href='#'>more</a>
          </div>
          <div class="grid_4 wow fadeIn" data-wow-delay="0.4s">
            <div class="icon_2"></div>
            <h4>tempora incidunt ut labore </h4>

            <p>Detaesaert tase aplicaserde neafaese mikertyu eraneo. Nsatolernatur aut oditaut miertase vertas
               gytras.</p>
            <a class="btn" href='#'>more</a>
          </div>
          <div class="grid_4 wow fadeIn" data-wow-delay="0.6s">
            <div class="icon_3"></div>
            <h4>Dolore magnam aliquam </h4>

            <p>Leasnseq usauntur magnilores eo quide
               ratione voluptate msequi nesciuque porros
               sease kuytras masertqu.
            </p>
            <a class="btn" href='#'>more</a>
          </div>
        </div>
        <div class="row">
          <div class="grid_4 wow fadeIn" data-wow-delay="0.4s">
            <div class="icon_4"></div>
            <h4> fersectetur modi Sitame </h4>

            <p>Nsatolernatur autitaut miertase vertas. Veasnseq usauntur magni dolores eo qui quisqu ameras dolomas.</p>
            <a class="btn" href='#'>more</a>
          </div>
          <div class="grid_4 wow fadeIn" data-wow-delay="0.6s">
            <div class="icon_5"></div>
            <h4>incidunt ut labore fertas</h4>

            <p>Detaesaert tase aplicaserde neafaese mikertyu eraneo. Nsatolernatur aut oditaut miertase vertas
               gytras.</p>
            <a class="btn" href='#'>more</a>
          </div>
          <div class="grid_4 wow fadeIn" data-wow-delay="0.8s">
            <div class="icon_6"></div>
            <h4>enim ad minima veniam quis</h4>

            <p>Leasnseq usauntur magnilores eo quide
               ratione voluptate msequi nesciuque porros
               sease kuytras masertqu.
            </p>
            <a class="btn" href='#'>more</a>
          </div>
        </div>
      </div>
    </div>

    <div id="bio">
      <div class="well2 center bg-dark">
        <div class="container">
          <div class="row">
            <div class="grid_10 preffix_1">
              <p class="tiny"> quis autem vel eum iure reprehen deritqui in eaoluptate velita esse, quam nihil
                               molesti</p>

              <h3>what does the future of dating mean?</h3>
              <img class="author" src="images/page-1_img07.jpg" alt=" "/>

              <p>Kitaesaert tasetruse aplicaserde neafaese mikertyu eraneo. Nsatolernatur aut oditaut miertase vertas.
                 Beasnseq usauntur magni dolores eo qui ratione voluptate msequi nesciuque porro quisqu ameras dolomas
                 felerereta
                 jrease kuytras masertqui dolorem ipsum, quiadesa dolores.</p>
              <a class="btn" href='#'>more about me</a>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-black well4">
        <div class="container">
          <p class="center tiny">be the first to get nearly updates</p>
          <h3 class="center">STAY IN TOUCH</h3>

          <form id="subscribe-form" class="subscribe-form center">
            <div class="row">
              <div class="grid_4 preffix_2">
                <label class="name">
                  <input type="text" value="enter name"/>
                  <span class="error">*Invalid name.</span>
                  <span class="success">Your subscription request has been sent!</span>
                </label>
              </div>
              <div class="grid_4">
                <label class="email">
                  <input type="email" value="enter email">
                  <span class="error">*Invalid email.</span>
                </label>
              </div>
            </div>
            <a data-type="submit" href="#">SUBSCRIBE now</a>
          </form>
        </div>
      </div>

      <div class="bg-primary well3">
        <div class="container">
          <div class="row">
            <div class="grid_7 center">
              <div class="promo wow fadeInLeft" data-wow-delay="1s">
                Perfect
                <span>
                  Experience & High Quality Service
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-black well">
        <div class="container">
          <p class="tiny center"> quis auaquam nihil molestiae consequatur vel illumqui dolorem eum</p>

          <h3 class="center">latest news</h3>

          <div class="row">
            <div class="grid_4 box">
              <time class="box_aside" datetime="2014-01-01">24 <span>March</span></time>
              <div class="box_cnt box_cnt__no-flow">
                <h6>
                  <a href="#">Vintur magni dolo resuie merese</a>
                </h6>
                <p>certa baditaut onquser kaytsrera feate msequi nesciunt. Niques porroisquam umquam eiumodi tempora.
                   Cincidunt, ut labore et</p></div>
            </div>
            <div class="grid_4 box">
              <time class="box_aside" datetime="2014-01-01">25 <span>March</span></time>
              <div class="box_cnt box_cnt__no-flow">
                <h6>
                  <a href="#">Kertaditaut onquser kaytsrera</a>
                </h6>
                <p>untur magni dolores eoquie merese voluptate msequi nesciunt. Niques porroisquam umquam eiumodi
                   tempora.</p></div>
            </div>
            <div class="grid_4 box">
              <time class="box_aside" datetime="2014-01-01">26 <span>March</span></time>
              <div class="box_cnt box_cnt__no-flow">
                <h6>
                  <a href="#">Sinquser kaytsrera erta baditaus</a>
                </h6>
                <p> eoquie merese voluptauntur magni doloreste mseqnesciunt. Dolues am eiumodi porroisquam umqu tempora
                    roisquam umqu.</p></div>
            </div>
          </div>
          <hr/>
          <div class="right">
            <a class="btn fa-arrow-circle-o-right" href='#'>read more news</a>
          </div>
        </div>
      </div>

    </div>


  </section>

  <!--========================================================
                            FOOTER
  =========================================================-->
  <footer id="contacts" class="footer parallax parallax2" data-parallax-speed="-0.2" style="filter:blur(10px);-webkit-filter:blur(10px);-ms-filter:blur(10px)">
    <div class="container">
      <div class="row">
        <div class="grid_4">
          <h3>contacts</h3>
        </div>
        <div class="grid_4">
          <address>
            28 Jackson Blvd Ste 1020 Chicago <br/>
            IL 60604-2340
          </address>

          <ul class="social-list">
            <li>
              <a class="fa fa-twitter" href="#"></a>
            </li>
            <li>
              <a class="fa fa-facebook" href="#"></a>
            </li>
            <li>
              <a class="fa fa-google-plus" href="#"></a>
            </li>
            <li>
              <a class="fa fa-rss" href="#"></a>
            </li>
            <li>
              <a class="fa fa-pinterest" href="#"></a>
            </li>
          </ul>
        </div>
        <div class="grid_4 right">
          <div class="copyright">
            david horton © <span id="copyright-year"></span>
            <!-- {%FOOTER_LINK} -->
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="map">
    <div id="google-map" class="map_model"></div>
    <ul class="map_locations">
      <li data-x="-73.9874068" data-y="40.643180">
        28 Jackson Blvd Ste 1020 Chicago
        IL 60604-2340
      </li>
    </ul>
  </div>
</div>

<script src="js/script.js"></script>

<!--coded by Diversant-->
</body>
</html>