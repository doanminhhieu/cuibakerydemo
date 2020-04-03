<ul class="rightNav no_box">
  <?php
    $mangxahoi = SHOW_mxh();
    foreach ($mangxahoi as $rows) {

  ?>
  <a target="_blank" <?=full_href($rows) ?>  class="button <?=$rows['fontawesome'] ?> " style="<?=$rows['background'] != '' ?  'background: '.$rows['background'] : '' ?>">
    <span><?=$rows['tenbaiviet_'.$lang] ?></span>
    <img src="<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin']) ?>" alt="">
  </a>
  <?php } ?>
</ul>