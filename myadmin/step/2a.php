<style>
  .bv-con .gr { border-top: 1px solid #dedede; padding: 6px 0; }
</style>
<div class="box-body table-responsive no-padding table-danhsach-cont">
  <table class="table table-hover table-danhsach">
    <tbody>
      <tr>
        
        <th class="w80 text-center">STT</th>
        <th>Tiêu đề</th>
        <th class="w100 text-center">Hình ảnh</th>
        <?php if(in_array($step, $st_nhom_opt)){ ?>
        <th class="w90 text-center"><?=@$name_list_opti[$step]["op0"] ?></th>
        <?php } ?>
        <?php if(in_array($step, $st_nhom_opt1)){ ?>
        <th class="w90 text-center"><?=@$name_list_opti[$step]["op1"] ?></th>
        <?php } ?>
        <?php if(in_array($step, $st_nhom_opt2)){ ?>
        <th class="w90 text-center"><?=@$name_list_opti[$step]["op2"] ?></th>
        <?php } ?>
        <th class="w90 text-center">Hiển thị</th>
        <th class="w50 text-center">
          <label>
            <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
          </label>
        </th>
      </tr>
      <?php
        $cl = 0;
        while($rows = mysql_fetch_assoc($sql))
        {
          $ida                = SHOW_text($rows['id']);
          foreach ($rows as $key => $value) {
            ${$key}         = SHOW_text($value);
          }
          $catasort           = number_format($catasort,0,',','.');


          $soluonganh_con     = 0;
          $soluonganh_slider  = 0;
          if(is_array($list_bv_img)){
            foreach ($list_bv_img as $val) {
              if($val['id_parent'] == $id AND $val['the_loai'] == 1) $soluonganh_con++;
              if($val['id_parent'] == $id AND $val['the_loai'] == 2) $soluonganh_slider++;
            }  
          }
      ?>
      <tr class="p_hover">
        
        <td class="text-center">
          <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
          <input type="text" class="text-center" value="<?=$catasort ?>" onchange="UPDATE_colum(this, '<?=$id ?>', 'catasort','#_baiviet')">
        </td>
 
        <td>
          <div class="name">
            <a href="<?=$url_page ?>&step=<?=$step?>&id_step=<?=$id_step?>&edit=<?=$id ?>"><?=$tenbaiviet_vi ?></a>
            <p class="p_lang_en"><?=$tenbaiviet_en ?></p>
          </div>
          <p class="a_nguoidang">Đăng bởi: <?=$members_dang[$id_user]['hoten'] ?> (<?=$members_dang[$id_user]['tentruycap'] ?>) - <?=date('d-m-Y H:i:s', $rows['ngaydang']) ?></p>
          <p class="p_chude_hienthi"><?=($id_parent == 0) ? '' : $list_danhmuc[$rows['id_parent']]['tenbaiviet_vi'] ?></p>
          <p class="p_chude_hienthi" style="display: none;"><spam class="r"><?=NUMBER_fomat($giatien) ?>đ</spam> <?=$giakm != 0 ? ' - <span class="km">'.NUMBER_fomat($giakm)."đ</span>" : "" ?> </p>

          <?php 
            if(in_array($step, $sl_quanlybaiviet)){
            $so_baiviet = DB_que("SELECT `id` FROM `#_baiviet_chitiet` WHERE `id_parent` = '$id'");
          ?>
          <p style="margin: 0;">
            <a href="?module=bai-viet-chi-tiet&action=bai-viet-chi-tiet&id-parent=<?=$id?>&step=<?=$step ?>" style="font-size: 12px; color: #ff4c14;">[Quản lý bài viết] [<?=mysql_num_rows($so_baiviet) ?>]</a>
            <!-- <a href="?module=main-module&action=danh-sach-bai-viet&step=<?=$step ?>&id_step=<?=$id_step ?>&edit=<?=$id?>&upload=1" style="font-size: 12px; color: #4caf50;">[Ảnh 360] [<?=number_format($soluonganh_con) ?>]</a>
            <a href="?module=main-module&action=danh-sach-bai-viet&step=<?=$step ?>&id_step=<?=$id_step ?>&edit=<?=$id?>&upload=2" style="font-size: 12px; color: #673ab7;">[Ảnh Slider] [<?=number_format($soluonganh_slider) ?>]</a> -->
          </p>
          <?php } ?>
          <?php if(isset($_SESSION['admin'])){ ?>
          <label>
            <input name='coppy_row<?=$cl?>' type='checkbox' class='minimal'> [Coppy]
          </label>
          <?php } ?>
          <div class="bv-con">
          <?php 
              // $baiviet_diendan = DB_que("SELECT * FROM `#_binhluan` WHERE `id_sp` = '".$id."' ORDER BY `id` DESC");
              // while ($bcdd     = mysql_fetch_assoc($baiviet_diendan)) { 
            ?>
            <!-- <div class="gr">
              <p class="p_hide_bl" style="font-size: 11px; color: red; line-height: 15px">
                <?=SHOW_text(strip_tags($bcdd['tenbaiviet_vi'])) ?>
                <span style="display: block; font-size: 11px; line-height: 15px; color: #4CAF50;"><?=SHOW_text(strip_tags($bcdd['noidung_vi'])) ?></span>
              </p>
              <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$bcdd['id'] ?>" table="#_binhluan" value='1' <?=LAY_checked($bcdd['showhi'], 1)?>> [Hiển thị]</label>  
              <a href="<?=$url_page.'&del_bl='.$bcdd['id'].'&token='.GET_token() ?>&step=<?=$step?>&id_step=<?=$id_step?>" onclick="return confirm('Bạn thật sự muốn xóa?')">[Xóa]</a>
            </div> -->
            <?php //} ?>
          </div>
        </td>
        <td class="text-center">
          <img class='img_show_ds' src='<?=$fullpath."/".$rows['duongdantin']."/thumb_".$icon ?>'>
          <?php if(isset($_SESSION['admin'])){ ?>
          <input type="file" name="upload_<?=$cl?>">
          <input type="hidden" name="anh_sp_<?=$cl?>" value="<?=!empty($thongtin_step['size_img']) && $thongtin_step['size_img'] != '' ? $thongtin_step['size_img'] : '' ?>">
          <?php } ?>
        </td>
        <?php if(in_array($step, $st_nhom_opt)){ ?>
        <td class="text-center">
          <div id="cus" class="cus_menu">
            <label><input opt type='checkbox' class='minimal minimal_click' colum="opt" idcol="<?=$id ?>" table="#_baiviet" value='1' <?=LAY_checked($opt, 1)?>></label>
          </div>
        </td>
        <?php } ?>
        <?php if(in_array($step, $st_nhom_opt1)){ ?>
        <td class="text-center">
          <div id="cus" class="cus_menu">
            <label><input opt1 type='checkbox' class='minimal minimal_click' colum="opt1" idcol="<?=$id ?>" table="#_baiviet" value='1' <?=LAY_checked($opt1, 1)?>></label>
          </div>
        </td>
        <?php } ?>
        <?php if(in_array($step, $st_nhom_opt2)){ ?>
        <td class="text-center">
          <div id="cus" class="cus_menu">
            <label><input opt2 type='checkbox' class='minimal minimal_click' colum="opt2" idcol="<?=$id ?>" table="#_baiviet" value='1' <?=LAY_checked($opt2, 1)?>></label>
          </div>
        </td>
        <?php } ?>
        <td class="text-center">
          <div id="cus" class="cus_menu">
            <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$id ?>" table="#_baiviet" value='1' <?=LAY_checked($showhi, 1)?>></label>
            </div>
        </td>
        <td class="text-center">
          <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
        </td>
      </tr>
      <?php
            $cl++;
          }
      ?> 
    </tbody>
  </table>
  <input type='hidden' value='<?=$cl?>' name='maxvalu'>
</div>