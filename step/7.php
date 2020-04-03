<?php
  if((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
      $numview          = 12;
  else $numview         = $thongtin_step['num_view'];
  include _source."phantrang_kietxuat.php";
  $danhmuc = LAY_danhmuc($slug_step);
  $baiviet = LAY_baiviet($slug_step);
?>
<div class="link_page">
  <ul>
    <li><a href="<?=$full_url ?>"><i class="fa fa-home"></i><?=$glo_lang['trang_chu'] ?></a><?=GET_bre($arr_running['id'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table) ?></li>
    <div class="clr"></div>
  </ul>
</div>
<div class="title_product"><?=$glo_lang['choose'] ?></div>
<div class="col-md-2 row-frm">
  <select name="name" class="form-control" onchange="this_change_cre(this)">
    <?php 
      $acti = 0;
      foreach ($danhmuc as $rows) {
        if($rows['id_parent'] != 0) continue;
        if($acti == 0) $acti = $rows['id'];
    ?>
    <option value="<?=$rows['id'] ?>"><?=$rows['tenbaiviet_'.$lang] ?></option>
    <?php } ?>
  </select>
</div>
<script>
  function this_change_cre (obi){
    var id = $(obi).val();
    $(".dv-nhom-crea").removeClass('acti');
    $(".dv-nhom-crea-" + id).addClass('acti');
    $("img.isload").lazyload({
      load: function() {
       this.style.opacity = 1;
      },
      threshold: 100
    });
  }
</script>
<div class="clr"></div>
<?php 
  foreach ($danhmuc as $rows) {
    if($rows['id_parent'] == 0) continue;
?>
<div class="dv-nhom-crea dv-nhom-crea-<?=$rows['id_parent'] ?> <?=$acti == $rows['id_parent'] ? 'acti' : '' ?>">
  <div class="box_pro_id"> </div>
  <div class="title_product"><?=$rows['tenbaiviet_'.$lang] ?></div>
  <div class="create_id flex">
    <?php 
      foreach ($baiviet as $r_baiviet) {
        if($r_baiviet['id_parent'] != $rows['id']) continue;
        $dowload = $r_baiviet['dowload'] == "" ? "" : $fullpath."/datafiles/files/".$r_baiviet['dowload'];
        $clss    = "is_rand_".$r_baiviet['id']."_".RAND(1111,4444);
    ?>
    <ul>
      <li class="<?=$clss ?>">
        <a <?=full_href($r_baiviet) ?>>
          <?=full_img($r_baiviet) ?>
          <?=full_img_img_2($r_baiviet) ?>
        </a>
      </li>
      <h3><a href="<?=$dowload ?>" target="_blank" class="is_mouse_hv" data="<?=$clss ?>"><?=$glo_lang['dowload_file_sp'] ?></a></h3>
    </ul>
    <?php } ?>
    <div class="clr"></div>
  </div>
</div>
<?php } ?>
 