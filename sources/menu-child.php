<div class="dv-menu-left no_box">
  <div class="dv-nut-menu"><i class="fa fa-bars"></i>&nbsp; <span><?=$glo_lang['danh_muc_san_pham'] ?></span></div>
  <?php include _source.'menu-child-nd.php'; ?>
</div>
<script>
 	$(".dv-menu-left").mouseover(function(){
	  var hei = $(".dv-ul-menu > ul").height();
    	$(".dv-ul-menu ul ul.sub-2").css("min-height", hei + 2);	
	});
</script> 
