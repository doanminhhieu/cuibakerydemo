<?php /*<ul class="menu tree_parent no_box" id="menu">
	<!-- <li class="homepage"><a href="<?=$full_url ?>"><i class="fa fa-home"></i></a></li> -->
	<?//=$full_url?>
	<?php// die;?>
  	<?=GET_menu_new($full_url, $lang, '', '', '') ?>
</ul>

<div class="mn-mobile" >
	<a href="<?=$full_url ?>" class="a_trangchu_mb"><i class="fa fa-home"></i></a>
	<!-- <a href="<?=$full_url ?>" class="a_trangchu_mb"><?=$glo_lang['trang_chu'] ?></a> -->
	<div class="menu-bar hidden-md hidden-lg">
		<a href="#nav-mobile">
			<!-- <img src="images/menu-mobile-lh.png" alt=""> -->
			<span>&nbsp;</span>
			<span>&nbsp;</span>
			<span>&nbsp;</span>
		</a>
	</div>

	<div id="nav-mobile" style="display: none">
		<ul>
			<?=GET_menu_new($full_url, $lang, '', '', '') ?>
		</ul>
	</div>
</div>

<script>
	$(function(){
		$(".menu  li").each(function(){
			if($("ul", this).length > 0){
				var a_ok = $("a",this).eq(0).attr('addok');
				if(a_ok != "ok"){
					$("a",this).eq(0).append('<i class="fa fa-angle-down"></i>');
					$("a",this).eq(0).attr("addok","ok");	
				}
			}
		});
		var cont_ul = $(".menu > li.is_step_2 > ul").html();
		$(".menu > li.is_step_2 > ul").html('<div class="projects-menu flex no_box">'+cont_ul+'<div class="clr"></div></div>');
	});
</script> */?>

<ul class="menu tree_parent no_box" id="menu">
	<!-- <li class="homepage"><a href="<?=$full_url ?>"><i class="fa fa-home"></i></a></li> -->
  	<?=GET_menu_new($full_url, $lang, '', '', '') ?>
</ul>
<div class="mn-mobile cl" >
	<!-- <a href="<?=$full_url ?>" class="a_trangchu_mb"><i class="fa fa-home"></i></a> -->
	<!-- <a href="<?=$full_url ?>" class="a_trangchu_mb"><?=$glo_lang['trang_chu'] ?></a> -->
	<div class="menu-bar hidden-md hidden-lg">
		<a href="#nav-mobile">
			<!-- <img src="images/menu-mobile-lh.png" alt=""> -->
			<span>&nbsp;</span>
			<span>&nbsp;</span>
			<span>&nbsp;</span>
		</a>
	</div>

	<div id="nav-mobile" style="display: none">
		<ul>
			<?=GET_menu_new($full_url, $lang, '', '', '') ?>
		</ul>
	</div>
</div>
<script>
	$(function(){
		$(".menu  li").each(function(){
			if($("ul", this).length > 0){
				var a_ok = $("a",this).eq(0).attr('addok');
				if(a_ok != "ok"){
					$("a",this).eq(0).append('<i class="fa fa-angle-down"></i>');
					$("a",this).eq(0).attr("addok","ok");	
				}
			}
		});
		var cont_ul = $(".menu > li.is_step_2 > ul").html();
		$(".menu > li.is_step_2 > ul").html('<div class="projects-menu flex no_box">'+cont_ul+'<div class="clr"></div></div>');
	});
</script>

