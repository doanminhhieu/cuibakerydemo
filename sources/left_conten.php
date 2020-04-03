<div class="left_conten">
  <div class="box_id_home">
    
    <div class="menu_left">
      <ul>
        <?=GET_menu_new($full_url, $lang, '', '', '') ?>
      </ul>
    </div>
  </div>
  <div class="box_id_home">
    <div class="title_tin_id">
      <h3><?=$glo_lang['tim_kiem'] ?></h3>
      <div class="clr"></div>
    </div>
    <div class="timkiem_left">
      <div class="col-md row-frm">
        <input class="form-control input_search input_search_enter input_keyword" type="text" value=""  data=".input_search_enter" data-href="<?=$full_url ?>/search/?key=" placeholder="<?=$glo_lang['nhap_tu_khoa_tim_kiem'] ?>" />
      </div>
      <h3><a class="cur" onClick="SEARCH_timkiem('<?=$full_url ?>/search/?key=','.input_search_enter'); if($('.input_search_enter').val() == '') $('.timkiem_top').removeClass('acti') "><?=$glo_lang['tim_kiem'] ?></a></h3>
      <div class="clr"></div>
    </div>
  </div>
  <?php
      $noidung    = LAYTEXT_rieng(70);
      if(is_array($noidung)){
  ?>
  <div class="box_id_home">
    <div class="title_tin_id">
      <h3><?=SHOW_text($noidung['tenbaiviet_'.$lang]) ?></h3>
      <div class="clr"></div>
    </div>
    <div class="bdh_left">
      <ul>
        <?=SHOW_text($noidung['noidung_'.$lang]) ?>
      </ul>
    </div>
  </div>
  <?php } ?>
  <div class="box_id_home">
    <div class="title_tin_id">
      <h3><?=$glo_lang['doc_nhieu_nhat'] ?></h3>
      <div class="clr"></div>
    </div>
    <div class="left_new_id">
      <ul>
        <?php
          $baiviet = LAY_baiviet("1,3,4", 10,"","`opt` DESC, `soluotxem` DESC");
          foreach ($baiviet as $rows) {
        ?>
        <li><a <?=full_href($rows) ?>><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a></li>
        <?php } ?>

      </ul>
    </div>
  </div>
  <?php if($glo_lang['fanpage'] != ""){ ?>
  <div class="box_id_home">
    <div class="face_footer">
        <div class="fb-page" data-href="<?=$glo_lang['fanpage'] ?>" data-tabs="timeline" data-width="400" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <blockquote cite="<?=$glo_lang['fanpage'] ?>" class="fb-xfbml-parse-ignore"><a href="<?=$glo_lang['fanpage'] ?>"><?=$thongtin['tenbaiviet_vi'] ?></a></blockquote>
        </div>
      </div>
  </div>
  <?php } ?>
</div>
