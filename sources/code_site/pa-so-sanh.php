<?php
// echo $_SESSION['so_sanh'];
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	if(empty($_SESSION['so_sanh'])) $_SESSION['so_sanh'] = $id;
	else {
		$sosanh = explode(",", $_SESSION['so_sanh']);
		if(!in_array($id, $sosanh)) {
			$c_sosanh = count($sosanh);
			for ($i=0; $i < ($c_sosanh + 1); $i++) { 
				if($i >= 3) continue;
				if($i == 0) $_SESSION['so_sanh'] = $id;
				else $_SESSION['so_sanh'] = $_SESSION['so_sanh'].",".$sosanh[$i - 1];
				// echo $_SESSION['so_sanh'];
			}
		}
		
	}
?>
<div class="titile_page">
  <ul>
    <h3><?=$glo_lang['so_sanh_san_pham'] ?></h3>
    <div class="clr"></div>
  </ul>
</div>
<style>
	.dv-cont-sosanh { width: 100%; }
	.dv-cont-sosanh .box_pro_id { width: 970px; margin: 0; }
	.dv-cont-sosanh .box_pro_id ul { width: calc(33.33% - 20px); }
	.dv-cont-sosanh { width: 100%; overflow-x: auto; }
	a.close_ss { position: absolute; top: 10px; left: 10px; width: 20px; height: 20px; background: red; z-index: 99; text-align: center; line-height: 20px; color: #fff; font-size: 12px; border-radius: 100px; cursor: pointer;}
</style>
<div class="dv-cont-sosanh">
	<div class="box_pro_id no_box">
	    <div class="pro_home_id pro_home_id_2 flex">
	    	<?php 
	    		$quatang_sp    = LAY_baiviet(14, 0, "`opt1` = 1", '', 'id');
	    		$baiviet = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` = 1 AND `id` IN (".$_SESSION['so_sanh'].")");
	    		while ($rows = mysql_fetch_assoc($baiviet)) {
	    			$gia = GET_gia($rows['giatien'], $rows['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '','' );
	    	?>
	        <ul class="ul_js_clr_sp_<?=$rows['id'] ?>">
	        	<a class="close_ss" onclick="xoa_sosanh(<?=$rows['id'] ?>)">X</a>
		        <div class="discount-tag">-17%</div>   
		        <a <?=full_href($rows) ?>><li><img src="<?=full_src($rows) ?>" alt=""></li></a>     
	        	<a <?=full_href($rows) ?>>
	          		<h3><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></h3>
	          		<h4><?=$gia['text_gia'].$gia['text_km'] ?></h4>
		        </a>
		        <p><?=$glo_lang['danh_gia'] ?>: <?= GET_sao_sp($rows['num_1'], $rows['num_2'], $rows['id']) ?> | <i class="fa fa-eye"></i><?=number_format($rows['soluotxem']) ?></p>
		        
				<?php
				if($rows['tinh_nang'] != ""){
				  echo '<div class="flex">';
				  $tinh_nang = explode(",", $rows['tinh_nang']);
				  foreach ($tinh_nang as $kvv) {
				    if(empty($quatang_sp[$kvv])) continue;
				?>
				<div class="hinh_icon_giamgia"><img src="<?=full_src($quatang_sp[$kvv], '') ?>" alt=""><span><?=SHOW_text($quatang_sp[$kvv]['tenbaiviet_'.$lang]) ?></span></div>
				<?php } echo '</div>';} ?>  
		    </ul>
	        <?php } ?>
	            
	      <div class="clr"></div>
	    </div>
 	</div>
</div>
<script>
	function xoa_sosanh(id){
		$.ajax({
        type: "POST",
        url: full_url +"/xoa_sosanh/",
        data: {"id": id},
        success: function(response)
        {
          $(".ul_js_clr_sp_"+id).remove();
        }
    });
	}
</script>