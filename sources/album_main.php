
<?php 

 $img_album = LAY_banner_new("id_parent = 39", 100); 
  $img_album_chuck = array_chunk($img_album,2);
?>

<?php if(count($img_album)>0) { ?>
	<ul class="list_album slider cl no_style">
		 <?php  foreach ($img_album_chuck as $item_arrchuck) {?>
            <li class="item_list">
            	<?php  foreach ($item_arrchuck as $r) {?>
	                <div class="item_album">
	                    <div class="img_album">
	                        <a href="<?=$fullpath."/".$r['duongdantin']."/".$r['icon'] ?>" data-fancybox="images" title="<?=SHOW_text($r['tenbaiviet_'.$lang]) ?>">
	                            <img src="<?=$fullpath."/".$r['duongdantin']."/".$r['icon'] ?>" alt="images" class="img_album" alt="<?=SHOW_text($r['tenbaiviet_'.$lang]) ?>">
	                            <div class="view_video">
	                                <i class="fa fa-eye " aria-hidden="true"></i>
	                            </div>
	                        </a>
	                    </div>
	                </div>
	            <?php } ?>
            </li>

        <?php } ?>
    </ul>

<?php } ?>