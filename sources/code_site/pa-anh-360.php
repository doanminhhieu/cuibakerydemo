<script src="js/j360.js" type="text/javascript"></script>
<style>
.threesixty { position: relative; overflow: hidden; margin: 0 auto; } .threesixty .threesixty_images { display: none; list-style: none; margin: 0; padding: 0; } .threesixty .threesixty_images img { position: absolute; top: 0; width: 100%; height: auto; } .threesixty .threesixty_images img.previous-image { visibility: hidden; width: 0; } .threesixty .threesixty_images img.current-image { visibility: visible; width: 100%; } .threesixty .spinner { width: 60px; display: block; margin: 0 auto; height: 30px; background: #333; background: rgba(0, 0, 0, 0.7); -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; } .threesixty .spinner span { font-family: Arial, "MS Trebuchet", sans-serif; font-size: 12px; font-weight: bolder; color: #FFF; text-align: center; line-height: 30px; display: block; } .threesixty .nav_bar { position: absolute; top: 10px; right: 10px; z-index: 11; } .threesixty .nav_bar a { display: block; width: 32px; height: 32px; float: left; text-indent: -99999px; } .threesixty .nav_bar a.nav_bar_play { background-position: 0 0; } .threesixty .nav_bar a.nav_bar_previous { background-position: 0 -73px; } .threesixty .nav_bar a.nav_bar_stop { background-position: 0 -37px; } #container .threesixty .nav_bar a.nav_bar_next { background-position: 0 -104px; } .div360{ position:relative; margin-top:5px; } .color li { float: left; font-size: 31px; margin-right: 10px; padding: 5px; border: 1px solid #ddd; border-radius: 5px; } .control360 { position: absolute; bottom: 20px; right: 30px; width: 100%; text-align: center; } .controls-360 button { background: #f1f1f1; -ms-border-radius: 4px; border-radius: 4px; padding: 8px; border: 1px solid #288ad6; color: #288ad6; font-size: 16px; display: none; }

.dv-popup-new-child { height: 100% !important; position: fixed !important; top: 0 !important; margin: 0 !important; max-width: 100% !important; padding: 0 !important; bottom: 0 !important; background: #fff !important; }
.dv-nd-popup { -webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none; height: 100%; display: flex; align-items: center; }
a.popup-close { right: 20px; top: 10px; }
.div360 { position: relative; margin-top: -30px; }
.div360 .right.control360 { bottom: -40px; right: 0; left: 0; font-size: 14px; }
.div360 .right.control360 a { margin: 0 8px; cursor: pointer;}
.div360 .right.control360 a i { margin-right: 4px; font-size: 13px; }
</style>
<div class="div360">
	<div class="threesixty js_load_360">
		<div class="spinner">
			<span>0%</span>
		</div>
		<ol class="threesixty_images" style="display:block !important;"></ol>
	</div>
	<div class="right control360">
		<a class="btn btn-danger custom_previous"><i class="fa fa-arrow-left"></i></a>
		<a class="btn btn-inverse custom_play"><i class="fa fa-play"></i>Play</a>
		<a class="btn btn-inverse custom_stop"><i class="fa fa-pause"></i> Pause</a>
		<a class="btn btn-danger custom_next"><i class="fa fa-arrow-right"></i></i></a>
	</div>
	<div class="color">
		<ul class="ulcolor"></ul>
	</div>
</div>
<script type="text/javascript">
	var mang_anh = [
	<?php 
		$id = isset($_GET['id'])  ? $_GET['id'] : 0;
		$baiviet_chitiet = LAY_hinhanhcon($id, 0, 1);
		$list_anh = "";
		$count = 0;
        foreach ($baiviet_chitiet as $rows) {
   			$list_anh .= $list_anh == "" ? '"'.full_src($rows, '').'"': ',"'.full_src($rows, '').'"';
   			$count++;
   		}
   		echo $list_anh;
	?>
	];
	// window.onload = init;
	var wid = $(window).width();
	var wplay = 900;
	var helay = 600;
	if(wid < 500) {
		wplay = 300;
		helay = 200;
	}
	else if(wid < 900) {
		wplay = 450;
		helay = 300;
	}
	 
	init(<?=$count ?>, mang_anh, wplay, helay,0);
</script>