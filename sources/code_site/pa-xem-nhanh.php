<?php 
  $arr_running = DB_que("SELECT * FROM `#_baiviet` WHERE `id` = '".$_GET['id']."' AND `showhi` = 1 AND `step` = 2 LIMIT 1");
  if(mysql_num_rows($arr_running)){
    $arr_running = mysql_fetch_assoc($arr_running);
?>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<div class="page_sp_ct page_sp_ct_xemnhanh">
  <?php include _source."viewRight_sanpham.php";?>
  <div class="clr"></div>
</div>
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript" src="js/owl.carousel.js"></script>
<script src='menu_mb/jquery.mmenu.min.js' type='text/javascript'></script> 
<script>
	$(".popup-close").click(function(){
	    $(".dv-nd-popup").html("");
	    $("body").removeClass("body_hide");
	    $(".dv-popup-new").removeClass("acti");
	});
	function plus_minus(obj){
	    var t = $(obj).closest(".quantity").find(".qty"),n=parseFloat(t.val()),r=parseFloat(t.attr("max")),i=parseFloat(t.attr("min")),s=t.attr("step");
	    if(!n||n==""||n=="NaN")n=0;
	    if(r==""||r=="NaN")r="";if(i==""||i=="NaN")i=0;
	    if(s=="any"||s==""||s==undefined||parseFloat(s)=="NaN")s=1;
	    $(obj).is(".plus")?r&&(r==n||n>r)?t.val(r):t.val(n+parseFloat(s)):i&&(i==n||n<i)?t.val(i):n>0&&t.val(n-parseFloat(s));
	    t.trigger("change");
	}
	$(".plus").click(function(){
	    plus_minus(this);
	});
	$(".minus").click(function(){
	    plus_minus(this);
	});
	$(document).ready(function() {
	    $(".page_sp_ct_xemnhanh .owl-auto").each(function(){
	      var is_slidespeed = $(this).attr("is_slidespeed");
	      var is_navigation = $(this).attr("is_navigation") == 1 ? true : false;
	      var is_dots       = $(this).attr("is_dots") == 1 ? true : false;
	      var is_autoplay   = $(this).attr("is_autoplay") == 1 ? true : false;
	      var is_items_0    = $(this).attr("data0");
	      var is_items_1    = $(this).attr("data1");
	      var is_items_2    = $(this).attr("data2");
	      var is_items_3    = $(this).attr("data3");
	      var is_items_4    = $(this).attr("data4");
	      var is_items_5    = $(this).attr("data5");
	      $(this).owlCarousel({
	        slideSpeed : is_slidespeed,
	        navigation : is_navigation,
	        itemsCustom : [
	          [0, is_items_0],
	          [319, is_items_1],
	          [479, is_items_2],
	          [767, is_items_3],
	          [991, is_items_4],
	          [1199, is_items_5]
	          ],
	        dots: is_dots,
	        autoPlay: is_autoplay,
	        navigationText : ["‹","›"]
	      });
	    });
	});
</script>
<?php } ?>