<div class="box_id">
    <div class="titile_home">
      <h3><?=$title ?></h3>
    </div>
    <div class="one_new_home">
      <li><a <?=full_href($baiviet_nd[0]) ?>><?=full_img($baiviet_nd[0], '') ?></a></li>
      <ul>
        <h3><a <?=full_href($baiviet_nd[0]) ?>><?=SHOW_text($baiviet_nd[0]['tenbaiviet_'.$lang]) ?></a></h3>
        <p><span class="lm_4"><?=SHOW_text(strip_tags($baiviet_nd[0]['mota_'.$lang])) ?></span></p>
      </ul>
      <div class="clr"></div>
    </div>
    <div class="one_new_home_right">
      <?php $i = 0; foreach ($baiviet_nd as $rows) { $i++; if($i == 1) continue; ?>
      <ul>
        <li><a <?=full_href($rows) ?>><?=full_img($rows) ?></a></li>
        <h3><a <?=full_href($rows) ?>><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a></h3>
        <div class="clr"></div>
      </ul>
      <?php } ?>
    </div>
    <div class="clr"></div>
  </div>