<ul class="menu no_box">
  <?=GET_menu_new($full_url, $lang, '', 'sub', '') ?>
</ul>
<div class="mn-mobile" >
	<a href="<?=$full_url ?>" class="a_trangchu_mb"><?=$glo_lang['trang_chu'] ?></a>
	<div class="menu-bar hidden-md hidden-lg">
		<a href="#nav-mobile">
			<img src="images/menu-mobile-lh.png" alt="">
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
		$(".menu > li").each(function(){
			if($("ul", this).length > 0){
				var a_ok = $("a",this).eq(0).attr('addok');
				if(a_ok != "ok"){
					$("a",this).eq(0).append('<i class="fa fa-angle-down"></i>');
					$("a",this).eq(0).attr("addok","ok");	
				}
			}
		});
	});
</script>