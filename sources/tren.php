<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="fb:admins" content="<?=$thongtin['fb_id'] ?>"/>
<meta property="fb:app_id" content="<?=$thongtin['fb_app'] ?>" />

<meta name="format-detection" content="telephone=no" />
<base href="<?=$fullpath ?>/" />
<?php include("seo.php"); ?>
<link rel="stylesheet" type="text/css" href="menu_mb/css.css"/>
<?php include("css.php"); ?>


<script type="text/javascript">var fullpath = "<?=$fullpath ?>";var full_url = "<?=$full_url ?>";</script>

<?php if(!empty($thongtin['is_saochep']) && $thongtin['is_saochep'] == 1){ ?>
<style>
* { -webkit-touch-callout: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; -o-user-select: none; user-select: none; -webkit-touch-callout:none; }    
input, textarea { -webkit-touch-callout: normal; -webkit-user-select: normal; -moz-user-select: normal; -ms-user-select: normal; -o-user-select: normal; user-select: normal; -webkit-touch-callout:normal; }    
</style>
<script language="JavaScript">
$(function(){
function killCopy(e){return false } 
function reEnable(){return true } 
if(window.sidebar){ document.onmousedown=killCopy; document.onclick=reEnable; }
document.addEventListener("contextmenu", function(e) { e.preventDefault(); }, false);
document.addEventListener("keydown", function(e) { 
if (e.ctrlKey && e.shiftKey && e.keyCode == 73) { disabledEvent(e); } 
if (e.ctrlKey && e.shiftKey && e.keyCode == 74) { disabledEvent(e); } 
if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) { disabledEvent(e); } 
if (e.ctrlKey && e.keyCode == 85) { disabledEvent(e); } 
if (event.keyCode == 123) { disabledEvent(e); } }, false);
function disabledEvent(e) { if (e.stopPropagation) { e.stopPropagation(); } else if (window.event) { window.event.cancelBubble = true; } e.preventDefault(); return false; }});
</script>
<?php } ?>
</head>

<?php 
    $bkground_body = LAY_banner_new("id = 25");
?>

<style type="text/css">
	.section_main {
    padding: 35px 0px;
    background: url(<?=$fullpath."/".$bkground_body[0]['duongdantin']."/".$bkground_body[0]['icon'] ?>);
}

</style>
<body style="background: url(<?=$fullpath."/".$bkground_body[0]['duongdantin']."/".$bkground_body[0]['icon'] ?>)">

	
	<div class="loading" >
	    <div class="loader">
	        <div><div><div><div><div><div></div></div></div></div></div></div>
	    </div>
	</div>
	<div class="wrapper">
	<?=$thongtin['js_google_anilatic'] ?>
	<div id="fb-root"></div>
	<script>
		$(function(){
			LOAD_isfb(document, 'script', 'facebook-jssdk', '<?=$thongtin['fb_app'] ?>');
		});
	</script>
	<div>
	<article><section>
	<div>
	  	<?php include"header.php" ?>
	  	<div class="conten">
	  		