<div class="group_sidebar">
	<div class="box_group_sidebar buy_online">
		<h3 class="title_sidebar">Đặt hàng ngay</h3>
		<div class="content_group_sidebar">
			<div class="box_buy_online">
				<?php include _source . "book_now.php"; ?>
			</div>
		</div>
	</div>
</div>

<div class="group_sidebar">
	<div class="box_group_sidebar">
		<h3 class="title_sidebar">Sản phẩm ưa chuộng</h3>
		<div class="content_group_sidebar">
			<?php 
			    $step = 2;
			    $limit = 4;
			    $where = "";
			    $orderby = '';
			    $col='';
			    $newproduct = LAY_baiviet($step,$limit,$where,$orderby,  $col );

			    // echo "<pre>";
			    //  print_r($newproduct);
			    // echo "</pre>";

			    // die;
			?>
			<?php 
			 if(count($newproduct)) {

			?>

			<ul class="list_pro_sidebar no_style">
				<?php 
	                  foreach ($newproduct as $rows) { 
	            ?>
					<li>
						<div class="item_pro_sidebar flex">
							<div class="img_item_sidebar">
		                        <a <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang])?>">
		                            <img src="<?=full_src($rows) ?>" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>">
		                        </a>
							</div>
							<div class="intro_item_sidebar">
								<h3 class="title_item_sidebar">
									<a <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a>
								</h3>
								<div class="price_product text_left">
		                             <?php
		                                $gia = GET_gia($rows['giatien'], $rows['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '','' );
		                              ?>
		                            <span class="price_new"> <?=$gia['text_gia'] ?> </span>
		                            <span class="price_old"><?=$gia['text_km'] ?></span>
		                            
		                        </div>
							</div>
						</div>
					</li>
				<?php } ?>

			</ul>

		<?php  } ?>
		</div>
	</div>
</div>

<div class="group_sidebar">
	<div class="box_group_sidebar">
		<h3 class="title_sidebar">Tin tức mới </h3>
		<div class="content_group_sidebar">
		<?php 
                $step = 4;
                $limit = 4;
                $where = "";
                $orderby = '';
                $col='';
                $new_article = LAY_baiviet($step,$limit,$where,$orderby,  $col);

        ?>
        <?php if($new_article) { ?>
			<ul class="list_pro_sidebar no_style">
				<?php 
	                  foreach ($new_article as $rows) { 

	                  
	            ?>
					<li>
						<div class="item_pro_sidebar flex">
							<div class="img_item_sidebar">
		                        <a <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>">
                                    <img src="<?=full_src($rows) ?>" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>">
                                </a>
							</div>
							<div class="intro_item_sidebar">
								<h3 class="title_item_sidebar">
									<a <?=full_href($rows)?> title="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"> 
                                     <?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a>
								</h3>
								<div class="short_article">
									<?=isset($rows["mota_".$lang])?$rows["mota_".$lang]:""?>
								</div>
							</div>
						</div>
					</li>
				<?php } ?>

			</ul>

		<?php  } ?>
		</div>
	</div>
</div>