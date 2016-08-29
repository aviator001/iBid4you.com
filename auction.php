<?
if (!$_COOKIE[login]) header("Location:fb.php?port=".$_REQUEST['port']);
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
	<link href="assets/css/flexslider.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/animate.css" rel="stylesheet" type="text/css" media="all" />
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    
	<!-- SCRIPTS -->
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE]><html class="ie" lang="en"> <![endif]-->
	
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.prettyPhoto.js" type="text/javascript"></script>
	<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.isotope.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.twitter.js" type="text/javascript"></script>
	<script src="assets/js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="assets/js/animate.js" type="text/javascript"></script>
	<style>
				.f1{
					font-family: Waiting+for+the+Sunrise
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
		<div class="container" style="width:100%;height:100%">
			<div class="row" style="width:100%">
				<div id="online" class="f2 col-sm-1" style="display:block;overflow-y:auto;opacity:1;text-shadow:0 0 1px #fff;background:#f1f1f1;width:800px;max-width:800px;height:800px;text-align:left;font-size:10px;margin:auto;left:0;right:0;font-family:Amatic SC;font-size:24px"></div>
			</div>
		</div>
		<div style="width:800px;text-align:center;margin:auto;left:0;right:0;position:absolute;top:400px">
			<span>
				<input style="position:absolute;bottom:50px;margin:auto;left:0;right:0;border:2px solid skyblue;width:200px;height:70px;font-size:48px;background:white;padding:10px;border-radius:5px;font-family:Open Sans Condensed" type="text" id="bid">
				<button id="btnBid" style="" class="btn btn-info" onclick="bid()">Place Live BID</button>
			</span>
		</div>
		</body>
			<script type="text/javascript" src="assets/js/jquery.min.js"></script>
			<script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
			<script type="text/javascript" src="assets/js/framework.js"></script>		
			<script type="text/javascript" src="assets/js/stream.js"></script>		
			<? if ($_REQUEST['port']) {?>
				<script>
					var login=getCookie('login')
					var id=getCookie('id')
					var port='<?=$_REQUEST['port'];?>'
					connect(login,id,port)
				</script>
			<? } else { ?>
				<script>
					alert('Invalid Auction!')
				</script>
			<? } ?>