<div class="left_conten_sp">
  <div class="menu_left">
    <ul>
      <h3><?=$glo_lang['danh_muc_san_pham'] ?></h3>
      <?php 
        $sp_danhmuc = LAY_danhmuc(6,"","`id_parent` = 0");
        foreach ($sp_danhmuc as $rows) {
      ?>
      <li><a href="<?=GET_link($full_url, $rows['seo_name']) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a></li>
      <?php } ?>
    </ul>
  </div>
  <div class="check_id_cont">
  <div class="check_id">
    <h3><?=$glo_lang['gia_tien'] ?></h3>
    <ul>
      <?php 
        $tkgia = LAY_tkgia();
        foreach ($tkgia as $rows) {
      ?>
      <label class="container"><?=$rows['tenbaiviet_'.$lang] ?>
        <input type="checkbox" class="tnn_pri" value="<?=$rows['id'] ?>">
        <span class="checkmark"></span> 
      </label>
      <?php } ?>
    </ul>
  </div>
    <?php 
      $list_tinhnawng = DB_fet("*","`#_baiviet_tinhnang`","`showhi` = 1 ","`catasort` ASC, `id` DESC","","arr");
      $name_timkiem   = "";
      foreach ($list_tinhnawng as $rows) { 
        if($rows['id_parent'] != 0 || $rows['tim_kiem'] != 1) continue;
        $name_timkiem++;
    ?>
    <div class="check_id">
    <h3><?=$rows['tenbaiviet_'.$lang] ?></h3>
    <ul>
      <?php foreach ($list_tinhnawng as $rows_2) { if($rows_2['id_parent'] != $rows['id']) continue; ?>
        <label class="container"><?=$rows_2['tenbaiviet_'.$lang] ?>
        <input type="checkbox" class="tnn_2" value="<?=$rows_2['id'] ?>">
        <span class="checkmark"></span> </label>
      <?php } ?>
      
    </ul>
    </div>
    <?php } ?>
  </div>
  <div class="sanpham_left">
    <h2><?=$glo_lang['san_pham_ban_chay'] ?></h2>
      <div class="pro_home_id_2">
        <div class="marquee">
          <?php 
            $sp_baiviet = LAY_baiviet(6, 15, "`opt` = 1");
            foreach ($sp_baiviet as $rows) {
              $gia = GET_gia($rows['giatien'], $rows['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '','' );
          ?>
          <ul>
            <?=$gia['pt'] != 0 ? '<div class="discount-tag">-'.$gia['pt']."%</div>" : "" ?>
            <li><a href="<?=GET_link($full_url, $rows['seo_name']) ?>">
            <img src="<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin'], 'thumb_') ?>" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"/></a></li>
            <h3><a href="<?=GET_link($full_url, $rows['seo_name']) ?>"><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a></h3>
            <h4><?=$gia['text_gia'].$gia['text_km'] ?></span></h4>
            <p><a href="<?=GET_link($full_url, $rows['seo_name']) ?>"><?=$glo_lang['mua_hang'] ?></a></p>
            </a>
          </ul>
          <?php } ?>
            
        </div>
        <script type='text/javascript' src='js/jquery.marquee.min.js'></script>
        <script>$('.marquee').marquee({
            duration: 19000,
            gap: 0,
            delayBeforeStart: 0,
            direction: 'up',
            duplicated: true,
            startVisible: true
        });
        </script> 
      </div>
    </div>
</div>
<script>
  $(".check_id input").click(function(){
    LOAD_sp_ajax(1, '');
  });

  function LOAD_sp_ajax(page,list_check){
    var list_check = "";
    $(".check_id input.tnn_2").each(function(){
      if($(this).is(":checked")) {
        list_check += list_check == "" ? $(this).val() : "," + $(this).val();
      }
    });
    var list_check_pri = "";
    $(".check_id input.tnn_pri").each(function(){
      if($(this).is(":checked")) {
        list_check_pri += list_check_pri == "" ? $(this).val() : "," + $(this).val();
      }
    });
    
    $(".right_conten_ajax").html('<div style="text-align: center;width: 100%; padding: 20px 0"><img src="images/loadernew.gif" alt="" style="margin: 0 auto; float: none; height: 80px;"></div>');
    $.ajax({
      type: "POST",
      url: full_url + "/ajax_timkiem/",
      data: {
          "list_check": list_check,
          "list_check_pri": list_check_pri,
          "page": page,
          "cls_idprsp": $(".cls_idprsp").val(),
          "action_ajax": "ajax_timkiem"
      },
      success: function (data) {
        $(".right_conten_ajax").html(data);
        GOTO_sport('.right_conten_ajax')
      }
    });
  }
  
</script>