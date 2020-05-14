<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CÔNG TY TNHH CÔNG NGHIỆP VÀ THƯƠNG MẠI ĐỨC VIỆT</title>
<meta name='keywords' content='CÔNG TY TNHH CÔNG NGHIỆP VÀ THƯƠNG MẠI ĐỨC VIỆT'/>
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style_responsive.css" rel="stylesheet" type="text/css" />
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="css/shake.css" rel="stylesheet" type="text/css">
<link href="css/widget.css" rel="stylesheet" type="text/css" />
<link href="css/unleash.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/animation.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="images/fancybox/jquery.fancybox.css"/>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/galleria.folio.css"/>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type='text/javascript' src='//cdn.jsdelivr.net/jquery.marquee/1.3.9/jquery.marquee.min.js'></script>
<script type="text/javascript" src="js/jquery.carouFredSel.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="js/script218.js"></script>
<script type="text/javascript" src="images/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" language="javascript" src="js/flexcroll.js"></script>
<script src="js/galleria-1.2.8.min.js"></script>
<script type="text/javascript" src="js/jquery.unleash.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		var hei_box_menu = $(".box_menu").height();
		$(".dv-menu-home").height(hei_box_menu + 20);
		$(".scroll").click(function(event){		
			event.preventDefault();
	 		console.log($(this.hash).offset().top)
			$('html,body').animate({scrollTop:$(this.hash).offset().top - hei_box_menu + 10},1000);
		});
	});
</script>

<script>
$(document).ready(function(){
	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
</head>
<body>
  <?php include"header.php";?>
  <div class="conten">
    <?php
	if (isset($_GET["page"]))
	{
		$page=$_GET["page"];
		$page.=".php";
		if($page=="index.php")
		$page="trangchu.php";
		$page = str_replace("http","XXX",$page);
		$page = str_replace("https","XXX",$page);
		$page = str_replace("ftp","XXX",$page);
		$page = str_replace("ftps","XXX",$page);
		if (is_file($page))
			include $page;
		else echo "<div class='clr' text-align: center; color: #fff;'>Under Contruction</div>";
	}
	else 
		include "trangchu.php";
	?>
    <div class="clr"></div>
  </div>
</body>
</html>