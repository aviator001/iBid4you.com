<?
session_start();
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/inc/utils.class.php';
$c=new utils;
$c->connect();

$fb = new Facebook\Facebook([
  'app_id' => '1620406188237943',
  'app_secret' => '52234f9356c42357b903561a4667b33a',
  'default_graph_version' => 'v2.4',
  ]);
 if (isset($_SESSION['facebook_access_token'])) {
	$access_token = (string) $_SESSION['facebook_access_token'];
	$_SESSION['facebook_access_token']=$access_token;
 } else {
	$access_token = (string) $_COOKIE['facebook_access_token'];
	$_SESSION['facebook_access_token']=$access_token;
 }

$fb->setDefaultAccessToken($access_token);
$response = $fb->get('/me?fields=name,email', $access_token);
$user = $response->getGraphNode();
//$graphEdge = $fb->getGraphEdge();
$name=$user['name'];
$email=$user['email'];
$id=$user['id'];
if ($email) {
	setCookie("login", $email);
	setCookie("id", $id);
}
$file_src="http://graph.facebook.com/$id/picture?type=large";

if ($_REQUEST['post']) {
	$linkData = [
		'link' => 'http://ibid4you.com/home.php?id='.$_REQUEST['port'],
		'message' => 'User provided message',
	];
	$response = $fb->post('/me/feed', $linkData, $_SESSION['facebook_access_token']);
	$graphNode = $response->getGraphNode();
	echo 'Posted with id: ' . $graphNode['id'];
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>				 
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
		<title>iBid4you.com :: Trade your skills and assets - auction style</title>		
		<meta name="keywords" content="" />		
		<meta name="description" content="The most modern platform for real live online auctions to trade anything - your possessions, skills, and talents" />		
		<meta name="Author" content="Gautam Sharma" />		
		<!-- mobile settings -->		 
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />		
	<link rel="shortcut icon" href="assets/images/favicon.ico">
    
	<!-- assets/css STYLES -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/fontElegant.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/prettyPhoto.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<link href="http://gaysugardaddyfinder.com/assets/css/bootstrap.min.css" rel="stylesheet">		
		<link href="http://gaysugardaddyfinder.com/assets/css/layout-responsive.css" rel="stylesheet" type="text/css" />		
		<link href="http://gaysugardaddyfinder.com/assets/css/style-20.css" rel="stylesheet">	
		<link href="http://gaysugardaddyfinder.com/assets/css/style.min.css" rel="stylesheet">
		<link href="http://gaysugardaddyfinder.com/assets/css/essentials.css" rel="stylesheet" type="text/css" />		
		<link href="http://gaysugardaddyfinder.com/assets/css/layout.css" rel="stylesheet" type="text/css" />		
		<link href="http://gaysugardaddyfinder.com/assets/css/color_scheme/orange.css" rel="stylesheet" type="text/css" />
		<link href="http://gaysugardaddyfinder.com/assets/css/shadows.css" rel="stylesheet" type="text/css" />
		<link href="http://gaysugardaddyfinder.com/assets/css/stream.css" rel="stylesheet" type="text/css" />
		<link href="http://gaysugardaddyfinder.com/assets2/css/retina.min.css" rel="stylesheet">
		<link href="http://gaysugardaddyfinder.com/assets2/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://gaysugardaddyfinder.com/assets2/css/style.min.css" rel="stylesheet"> 
		<link href="http://gaysugardaddyfinder.com/assets2/css/retina.min.css" rel="stylesheet">    
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    
	<!-- SCRIPTS -->
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE]><html class="ie" lang="en"> <![endif]-->
	
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
		<script type="text/javascript">
		  WebFontConfig = {
			google: { families: [ 'Fredericka+the+Great::latin', 'Poiret+One::latin', 'Shadows+Into+Light::latin', 'Pinyon+Script::latin', 'Amatic+SC::latin', 'Special+Elite::latin', 'Six+Caps::latin','Nothing+You+Could+Do::latin', 'Open+Sans+Condensed:300:latin' ] }
		  };
		  (function() {
			var wf = document.createElement('script');
			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
			  '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
			wf.type = 'text/javascript';
			wf.async = 'true';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(wf, s);
		  })(); </script>	
	<style>
				body{
					font-family:Shadows Into Light;font-size:24px
				}
				div{
										font-family:Shadows Into Light;font-size:18px

				}
					.f2
					font-family: Special+Elite
				}
				
				.tooltipsy {
					padding: 10px;
					max-width: 200px;
					color: #0093D9;
					background: url(../assets/images/xxx_big.png) center;
					background-size:cover;
					border: none;
					border-radius:4px;
					text-shadow:0px 0px 1px #333;
					opacity:1
				}
				</style>
	</head>
	<body>
<? /*
		'Fredericka+the+Great', 'Poiret+One', 'Shadows+Into+Light', 'Pinyon+Script', 'Amatic+SC', 'Special+Elite', 'Six+Caps','Nothing+You+Could+Do', 'Open+Sans+Condensed'
*/ ?>
		<div id="modal" style="position:absolute;left:0;right:0;top:0;bottom:0;width:100%;height:100%;background:#000;opacity:0.7;display:none;margin:auto;z-index:999999999;cursor:hand;cursor:pointer" onclick="this.style.display='none';document.all.info.style.display='none'"></div>
		<div id="info" style="position:absolute;left:0;right:0;top:0;bottom:0;text-align:center;width:300px;height:300px;background:#f0f0f0;opacity:0.6;display:none;margin:auto;z-index:9999999999999;box-shadow:0 0 100px #000;opacity:0.9;overflow:hidden;overflow-y:auto;padding:60px;border-radius:8px;box-shadow:0 0 50px rgba(0,0,0,0.6)"></div>
		<div id="container" style="width:100%;height:100%;background:url(images/b5.jpg) no-repeat;background-size:cover;width:100%;height:100%">
		<div id="div_table" style="width:320px;height:200px;text-align:center;margin:auto;left:0;right:0;position:absolute;top:50px;background:#f0f0f0;border-top:0px solid orange;box-shadow:0 0 1px #000, 0 0 10px rgba(0,0,0,0.3);opacity:0.9;border-radius:0 0 4px 4px">
			<table cellspacing=0 style="margin-top:0px">
				<tr><td colspan=3 style="height:25px;width:100%;background:url(images/mask10.png) center;margin:0;margin-top:-5px;color:#000;font-size:32px;font-family:Amatic SC"><?=$name;?></td></tr>
				<tr style="">
					<td style="width:320px;padding:10px" align="left" colspan=2>
						<span style='color:red'>To setup your auction, do:</span><br>
						1. Fill out the form below:<br>
						2. Click 'Create'<br>
						3. Enter auction or <br>
						4. Invite people to your auction
					</td>
					<td>
						<img src="<?=$file_src?>" style="position:absolute;width:100px;height:100px;border-radius:100px;right:5px;top:60px">
					</td>
				</tr>
				<tr><td colspan=3 style="height:5px"></td></tr>
				<tr>
					<td style="width:320px" align="center" colspan=3>

					</td>
				</tr>
				<tr>
					<td style="width:320px" align="center" colspan=3>
					</td>
				</tr>
				<tr><td colspan=3 style="height:5px"></td></tr>
				<tr>
					<td style="width:320px" align="left">
						<div id="online"></div> 
					</td>
				</tr>
				<tr><td colspan=3 style="height:5px"></td></tr>
			</table>
	<? if ($_COOKIE['admin']) { ?>	
		<div id="div_table" style="width:320px;height:500px;text-align:center;margin:auto;left:0;right:0;position:absolute;top:250px;background:#f0f0f0;border-top:5px solid orange;box-shadow:0 0 1px #000, 0 0 10px rgba(0,0,0,0.3);opacity:0.9;border-radius:0 0 4px 4px">
			<table cellspacing=20 style="margin-top:25px">
				<tr style="margin-bottom:30px">
					<td style="width:80px;text-align:right"><span style="font-size:18px;font-family:Shadows Into Light;text-shadow:0 0 1px #fff">
						Name</span>
					</td>
					<td style="width:220px" align="left">
						<span><input onchange="validate(this)" onclick="clearErr(this)" id="name" type="text" style="width:200px;height:40px;margin-left:10px;border-radius:4px;background:#fff"></span>
						<span><img style="position:absolute;margin-top:10px;margin-right:5px;opacity:0;width:20px;height:20px;right:2px" id="name_err_img" src='images/chk_off.png'></span>
						<div id="name_err_txt"></div> 
					</td>
					<td>
					</td>
				</tr>
				<tr><td colspan=3 style="height:5px"></td></tr>
				<tr>
					<td style="width:80px;text-align:right"><span style="font-size:18px;font-family:Shadows Into Light;text-shadow:0 0 1px #fff;color:black">
						Category</span>
					</td>
					<td style="width:220px" align="left">
						<span><input id="catID" onchange="validate(this)" onclick="gen_ebay_cat()"  type="text" style="width:200px;height:40px;margin-left:10px;border-radius:4px;background:#fff"></span>
						<span><img style="position:absolute;margin-top:10px;margin-right:5px;opacity:0;width:20px;height:20px;right:2px" id="catID_err_img" src='images/chk_off.png'></span>
						<div id="catID_err_txt"></div>
					</td>
					<td>
					</td>
				</tr>
				<tr><td colspan=3 style="height:5px"></td></tr>
				<tr>
					<td style="width:80px;text-align:right"><span style="font-size:18px;font-family:Shadows Into Light;text-shadow:0 0 1px #fff;color:black">
						Start Bid</span>
					</td>
					<td style="width:220px" align="left">
						<span><input id="start_price" onchange="validate(this)" onclick="clearErr(this)"  type="text" style="width:100px;height:40px;margin-left:10px;border-radius:4px;background:#fff"></span>
						<span style="color:brown;margin-top:10px;width:40px;height:40px;margin-left:10px;border-radius:4px;background:">US$</span>
						<span><img style="position:absolute;margin-top:10px;margin-right:5px;opacity:0;width:20px;height:20px;right:2px" id="start_price_err_img" src='images/chk_off.png'></span>
						<div id="start_price_err_txt"></div>
					</td>
					<td>
					</td>
				</tr>
				<tr><td colspan=3 style="height:5px"></td></tr>
				<tr>
					<td style="width:80px;text-align:right"><span style="font-size:18px;font-family:Shadows Into Light;text-shadow:0 0 1px #fff;color:black">
						Reserve</span>
					</td>
					<td style="width:220px" align="left">
						<span><input id="reserve" onchange="validate(this)" onclick="clearErr(this)"  type="text" style="width:100px;height:40px;margin-left:10px;border-radius:4px;background:#fff"></span>
						<span style="color:brown;margin-top:10px;width:40px;height:40px;margin-left:10px;border-radius:4px;background:">US$</span>
						<span><img style="position:absolute;margin-top:10px;margin-right:5px;opacity:0;width:20px;height:20px;right:2px" id="reserve_err_img" src='images/chk_off.png'></span>
						<div id="reserve_err_txt"></div>
					</td>
					<td>
					</td>
				</tr>
				<tr><td colspan=3 style="height:5px"></td></tr>
				<tr>
					<td style="width:80px;text-align:right"><span style="color:black;font-size:18px;font-family:Shadows Into Light;text-shadow:0 0 1px #fff;color:black">
						Start Time</span>
					</td>
					<td style="width:220px" align="left">
						<span><input id="start" type="text" onchange="validate(this)" onclick="clearErr(this)"  style="width:100px;height:40px;margin-left:10px;border-radius:4px;background:#fff"></span>
						<span style="color:brown;margin-top:10px;width:40px;height:40px;margin-left:10px;border-radius:4px;background:">Time</span>
						<span><img style="position:absolute;margin-top:10px;margin-right:5px;opacity:0;width:20px;height:20px;right:2px" id="start_err_img" src='images/chk_off.png'></span>
						<div id="start_err_txt"></div>
					</td>
					<td>
					</td>
				</tr>
				<tr><td colspan=3 style="height:5px"></td></tr>
				<tr>
					<td style="width:80px;text-align:right"><span style="font-size:18px;font-family:Shadows Into Light;text-shadow:0 0 1px #fff;color:black">
						Duration</span>
					</td>
					<td style="width:220px" align=left>
						<span><input id="duration" type="text" onchange="validate(this)" onclick="clearErr(this)"  style="width:100px;height:40px;margin-left:10px;border-radius:4px;background:#fff"></span>
						<span style="color:brown;margin-top:10px;width:40px;height:40px;margin-left:10px;border-radius:4px;background:">Minutes</span>
						<span><img style="position:absolute;margin-top:10px;margin-right:5px;opacity:0;width:20px;height:20px;right:2px" id="duration_err_img" src='images/chk_off.png'></span>
						<div id="duration_err_txt"></div>
					</td>
					<td>
					</td>
				</tr>
				<tr><td colspan=3 style="height:5px"></td></tr>
				<tr>
					<td style="width:80px;text-align:right"><span style="font-size:18px;font-family:Shadows Into Light;text-shadow:0 0 1px #fff;color:black">
						Description</span>
					</td>
					<td style="width:220px" align="left">
						<span><textarea id="description" onchange="validate(this)" onclick="clearErr(this)"  style="width:200px;height:40px;margin-left:10px;border-radius:4px;background:#fff"></textarea></span>
						<span><img style="position:absolute;margin-top:10px;margin-right:5px;opacity:0;width:20px;height:20px;right:2px" id="description_err_img" src='images/chk_off.png'></span>
						<div id="description_err_txt"></div>
					</td>
					<td>
					</td>
				</tr>
				<tr><td colspan=3 style="height:5px"></td></tr>
				<tr id="row_link" style="visibility:hidden">
					<td style="width:80px;text-align:right"><h2 style="font-size:18px;font-family:Shadows Into Light;text-shadow:0 0 1px #fff">
						<p style="cursor:hand;cursor:pointer">Copy Link</p>
					</td>
					<td style="width:220px" align="left">
						<span><input type="text" id="text_link" value="http://ibid4you.com/auction.php?port=" style="width:200px;height:40px;margin-left:10px;border-radius:4px;background:#fff"></span>
					</td>
				</tr>
				<tr id="row_create">
					<td colspan=3>
						<div onclick="javascript:check_sub()" style='cursor:hand;cursor:pointer;background:url(images/z_orange.png) no-repeat;background-size:cover;font-size:24px;color:#000;text-shadow:1px 1px 1px #fff;padding:5px;width:100%;height:50px;position:absolute;left:0;right:0;margin:auto;bottom:5px'><span style='padding-bottom:0px'>Create Auction</span></div>
					</td>
				</tr>
			</table>
		</div>
		<div style="width:400px;text-align:center;margin:auto;left:20px;right:0;position:absolute;top:500px;" id="result">
		</div>
		<div style="width:800px;text-align:center;margin:auto;left:0;right:0;position:absolute;top:500px">
			<span><button id="enter" class="btn btn-warning" style="display:none" onclick="init()">Enter Existing</button></span>
		</div>
	<? } else { ?>
		<div style="width:800px;text-align:center;margin:auto;left:0;right:0;position:absolute;top:800px">
			<span><button id="enter" class="btn btn-warning" onclick="enter_existing()">Enter Existing</button></span>
		</div>
	<? } ?>
	</div>
	</body>
			<script type="text/javascript" src="assets/js/jquery.min.js"></script>
			<script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
			<script>
			document.getElementById('container').style.height=window_height()+'px'
				document.querySelector('p').addEventListener('click', function(ev) {
					var atx = document.getElementById('text_link')
					var bkp = atx.value;
					atx.select();
					document.execCommand('copy');
					atx.value = bkp;
				});

				function enter_existing() {
					location.href='auction.php?'+getCookie('port')
				}
				
	var port,jobID,login,id
	
	function window_height() {
		if (document.body) {
		 winH = document.body.offsetHeight;
		}

		if (document.compatMode=='CSS1Compat' &&
			document.documentElement &&
			document.documentElement.offsetHeight ) {
			winH = document.documentElement.offsetHeight;
			return winH
		}

		if (window.innerHeight && window.innerHeight) {
			 winH = window.innerHeight;
			 return winH;
		}
	}		


	function delCookie(cname) {
		var d = new Date();
		d.setTime(d.getTime());
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + "" + "; " + expires;
	 }

	function setCookie(cname,cvalue,exdays)	{
		var d = new Date();
		d.setTime(d.getTime()+(exdays*24*60*60*1000));
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
	 }

	function getCookie(cname)	{
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) {
		  var c = ca[i].trim();
		  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
		}
		return "";
	}


	function is_valid_mobile(f) {
		if (f.value.length >10) {
			show_error(f,'Invalid Mobile! Format: 10 Digits only. (123) 456-7890 or XXXYYYZZZZ or 123.456.7890')
			return false
		}
		var number = f.value
		var m = /^(\W|^)[(]{0,1}\d{3}[)]{0,1}[.]{0,1}[\s-]{0,1}\d{3}[\s-]{0,1}[\s.]{0,1}\d{4}(\W|$)/
		if(!m.test(number)) {
				
				show_error(f,'Invalid Mobile! Format: 10 Digits only. (123) 456-7890 or XXXYYYZZZZ or 123.456.7890')
				return false
			}
	}

	function is_valid_email(f) {
	var email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(email.test(f.value)) 
		{
			return true
		} else {
			return false
		}
	}
	
	
		var validated=true
		function check_sub() {
			var objImg
			var obj
			var txtErr=''
			var arrE=new Array('name','catID','start_price','reserve','start','duration','description')
			for (i=0;i<=6;i++) {
				if ((i<2) || (i==6)) {
					if (chk_all(arrE[i])) validated=false
						else validated=true
				} else {
					if (chk_all(arrE[i])) validated=true
						else validated=false
				}
			}
			if (validated===true) init_auction()
		}	
	
		function chk_all(obx) {
			var obj=document.getElementById(obx)
			var objImg=document.getElementById(obx + '_err_img')
			var ob = (obj.value) ? obj.value : obj.innerHTML
			if (!ob) {
				txtErr='' + obx + ' cant be blank!'
				document.getElementById(obx).style.background='#FFFFBF'
				objImg.src='images/chk_err.png'
				objImg.style.opacity='1'
				validated=false
			} else {
				if (isNaN(ob)) {
				document.getElementById(obx).style.background='#FFFFBF'
					txtErr='Invalid Entry'
					objImg.src='images/chk_err.png'
					objImg.src='images/chk_err.png'
					objImg.style.opacity='1'
					validated=false
				} else {
					validated=true
				}
			}
			return validated
		}



		function validate(obj) {
			var objImg
			if (obj) {
				objImg=document.getElementById(obj.id + '_err_img')
				objImg.style.opacity='1'
			}
			var txtErr=''
			var ob = (obj.value) ? obj.value : obj.innerHTML
			 if (obj.id=='name'){
				if (!isNaN(ob)) {
					txtErr='Thats a strange name!'
					objImg.src='images/chk_err.png'
				} else {
					objImg.src='images/chk_on.png'
					return true
				}
			} else if (obj.id=='start_price'){
				if (isNaN(ob)) {
					txtErr='Invalid starting price'
					objImg.src='images/chk_err.png'
				} else {
					objImg.src='images/chk_on.png'
					return true
				}
			} else if (obj.id=='reserve'){
				if (isNaN(ob)) {
					txtErr='Invalid reserve price'
					objImg.src='images/chk_err.png'
				} else {
					objImg.src='images/chk_on.png'
					return true
				}
			} else if (obj.id=='start'){
				if (!ob) {
					txtErr='Invalid start date/time'
					objImg.src='images/chk_err.png'
				} else {
					objImg.src='images/chk_on.png'
					return true
				}
			} else if (obj.id=='end'){
				if (!isNaN(ob) && (ob > 1) && (ob < 61)) {
					objImg.src='images/chk_on.png'
					return true
				} else {
					txtErr='Invalid auction duration'
					objImg.src='images/chk_err.png'
				}
			} else if (obj.id=='description'){
				if (!ob) {
					txtErr='Invalid description'
					objImg.src='images/chk_err.png'
				} else {
					objImg.src='images/chk_on.png'
					return true
				}
			}
			if (!ob) {
				txtErr='' + obj.id + ' may not be blank!'
				objImg.src='images/chk_err.png'
			} else {
				if (txtErr) {
					document.getElementById(obj.id + '_err_txt').innerHTML="<span style='margin-left:15px;color:red'>" + txtErr + "</span>"	
					objImg.src='images/chk_err.png'
				} else {
					objImg.src='images/chk_on.png'
					return true
				}
			}
	}
		function gen_ebay_cat(obj, txtCat) {
			if (!obj) var obj=-1
			if (!txtCat) var txtCat = ''
			
			setCookie('previous', txtCat)
			
			if (getCookie('previous')) previous=getCookie('previous')
				else previous='Home'
				
			$.ajax({
				url: 'x_get_ebay_cat.php?categoryID='+obj,
				type: "GET",
				dataType: "html",
				cache: false,
				success: function(msg) {
						if (!msg) {
							closeMe()
							document.getElementById('catID').value=txtCat
						} else {
							info(msg)
						}
							
					}	
				} 
		)}					

		function info(obj) {
			document.getElementById('info').style.width='600px'
			document.getElementById('info').style.height='600px'
			document.getElementById('info').style.background='#fff'
			document.getElementById('info').innerHTML='<div>'+obj+'</div>'
			document.getElementById('modal').style.display='block'
			document.getElementById('info').style.display='block'
		}
		function text(obj) {
			document.getElementById('info').style.background='#fff'
			document.getElementById('info').innerHTML='<div style="opacity:0.8;border-radius:4px;"><img src="images/waits.gif"></div><div>'+obj+'</div>'
			/*
				$( "#info" ).html( objHTML );
				$.get( obj+".php?id=<?=rand(1111111,9999999);?>", function( data ) {
					$( "#info" ).html( data );
				});
			*/  
			document.getElementById('modal').style.display='block'
			document.getElementById('info').style.display='block'
		}

		function closeMe() {
			document.getElementById('modal').style.display='none'
			document.getElementById('info').style.display='none'
		}

		function clearErr(obj) {
			validated=true
			var ob = (obj.value||obj.innerHTML)
			ob=''
			document.getElementById(obj.id).style.background='#fff'
			document.getElementById(obj.id+'_err_txt').innerHTML=ob
			var objImg=document.getElementById(obj.id + '_err_img')
			objImg.src='images/chk_off.png'
			objImg.style.opacity='0'
		}

		function init_auction() {
			if (document.getElementById('description').value.length*1 > 15) {
			text('Seeking available port...')

			var name = document.getElementById('name').value
			var start = document.getElementById('start').value
			var duration = document.getElementById('duration').value
			var start_price = document.getElementById('start_price').value
			var reserve = document.getElementById('reserve').value
			var catID = document.getElementById('catID').value
			var description = document.getElementById('description').value
			var url='socket/x_create_auction.php?name='+name+'&start='+start+'&duration='+duration+'&start_price='+start_price+'&reserve='+reserve+'&catID='+catID+'&owner='+memberID+'&description='+description
			var memberID='<?=$id?>'
			$.ajax({
				url: url,
				type: "GET",
				dataType: "html",
				cache: false,
				success: function(msg) {
					closeMe()
					var v = msg.split("|")
					port=v[0]
					jobID=v[1]
					login='<?=$email;?>'
					id='<?=$id;?>'
					setTimeout('post_process()',500)
					document.getElementById('div_table').style.height='640px'
					document.getElementById('row_link').style.visibility='visible'
					document.getElementById('row_create').style.visibility='hidden'
					document.getElementById('text_link').value=document.getElementById('text_link').value+port
					document.getElementById('result').innerHTML='<a href="http://ibid4you.com/auction.php?port='+port+'&login='+login+'&id='+id+'"><div style=\'background:url(images/z_blue.png);font-size:16px;color:#000;text-shadow:1px 1px 1px #fff;padding-top:8px;width:160px;height:35px;position:absolute;left:0;right:0;margin:auto;margin-top:242px;\'>ENTER AUCTION</div></a></div>'
					document.getElementById('result').innerHTML = document.getElementById('result').innerHTML + '<a href="javascript:storeClip('+port+')"><div class=\'p22\' style=\'background:url(images/xyz_pink.png);font-size:18px;color:#000;text-shadow:1px 1px 1px #fff;padding-top:8px;width:160px;height:35px;position:absolute;left:0;right:0;margin:auto;margin-top:282px;\'>EMAIL|SMS LINK</div></a></div>'
					document.getElementById('result').innerHTML = document.getElementById('result').innerHTML + '<a href="javascript:fb_post()"><div style=\'background:url(images/z_green.png);font-size:18px;color:#000;text-shadow:1px 1px 1px #fff;padding-top:8px;width:160px;height:35px;position:absolute;left:0;right:0;margin:auto;margin-top:322px;\'>POST TO FACEBOOK</div></a></div>'
				} 
			})	
			} else {
				txtErr='Please describe what you are selling'
				document.getElementById('description_err_txt').innerHTML="<span style='margin-left:15px;margin-top:10px;color:red'>" + txtErr + "</span>"	
				var objImg=document.getElementById('description_err_img')
				objImg.src='images/chk_err.png'
				document.getElementById('div_table').style.height='550px'
				return false
			}
		}
		function post_process() {
			setCookie('auctionID','auction_' + port)
			setCookie('port',port)
			setCookie('jobID',jobID)
			setCookie('login',login)
			setCookie('id',id)
			setTimeout('del_lock()',500)					
		}
		function fb_post() {
			var full_post=document.getElementById('text_link').value
			$.ajax({
				url: 'x_fb_post.php?port='+port+'&full_post='+full_post+'&facebook_access_token=<?=$_SESSION['facebook_access_token']?>',
				type: "GET",
				dataType: "html",
				cache: false,
				success: function(msg) {
						alert(msg)
					}	
				} 
		)}					

		function del_lock() {
			$.ajax({
				url: 'socket/x_del_lock.php',
				type: "GET",
				dataType: "html",
				cache: false,
				success: function(msg) {
					}	
				} 
		)}					
	</script>