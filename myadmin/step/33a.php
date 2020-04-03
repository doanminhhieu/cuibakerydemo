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

        <th class="w100 text-center">Hiển thị</th>
        <!-- <th class="w150 text-center">Tác vụ</th> -->
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
          foreach ($rows as $key => $value) {
            ${$key}         = SHOW_text($value);
          }
          $catasort           = number_format($catasort,0,',','.');

          $soluonganh_con = 0;
          if(is_array($list_bv_img)){
            foreach ($list_bv_img as $val) {
              if($val['id_parent'] == $id) $soluonganh_con++;
            }  
          }
      ?>
      <tr>
        
        <td class="text-center">
          <input name="idme<?=$cl?>" value="<?=$id?>" type="hidden">
          <input type="text" class="text-center" value="<?=$catasort ?>" onchange="UPDATE_colum(this, '<?=$id ?>', 'catasort','#_baiviet')">
        </td>
        <td>
          <div class="name">
            <a href="<?=$url_page ?>&step=<?=$step?>&id_step=<?=$id_step?>&edit=<?=$id ?>"><?=$tenbaiviet_vi ?></a>
            <p class="p_lang_en"><?=$tenbaiviet_en ?></p>
          </div>
          <p class="a_nguoidang">Đăng bởi: <?=$members_dang[$id_user]['hoten'] ?> (<?=$members_dang[$id_user]['tentruycap'] ?>) - <?=date('d-m-Y H:i:s', $rows['ngaydang']) ?></p>
          <p class="p_chude_hienthi"><?=($id_parent == 0) ? '' : $list_danhmuc[$rows['id_parent']]['tenbaiviet_vi'] ?></p>
          <?php if(isset($_SESSION['admin'])){ ?>
          <label>
            <input name='coppy_row<?=$cl?>' type='checkbox' class='minimal'> [Coppy]
          </label>
          <?php } ?>
          <?php if(in_array($step, $danhmuc_slider)) { ?>
          <p style="margin: 5px 0;"><a href="<?=$url_page ?>&upload=true&step=<?=$step?>&id_step=<?=$id_step?>&edit=<?=$id?>" title="Quản lý hình ảnh">[Hình ảnh] [<?=$soluonganh_con ?>]</a></p>
          <?php } ?>
        </td>
        <td class="text-center">
          <?=ADMIN_show_img($fullpath."/".$rows['duongdantin'], $icon) ?>
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
        <!-- <td class="text-center">
            <a href="<?=$url_page ?>&step=<?=$step?>&id_step=<?=$id_step?>&edit=<?=$id?>" title="Cập nhật"><i class="fa fa-pencil-square-o"></i></a>
            <a href="<?=$url_page.'&del=ok&catalogid='.$id.'&token='.GET_token() ?>&step=<?=$step?>&id_step=<?=$id_step?>" class="do"  onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
        </td> -->
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