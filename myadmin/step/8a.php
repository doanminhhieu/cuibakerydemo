<div class="box-body table-responsive no-padding table-danhsach-cont">
  <table class="table table-hover table-danhsach">
    <tbody>
      <tr>
        
        <th class="w80 text-center">STT</th>
        <th>Tiêu đề</th>
        <!-- <th class="w120 text-center">Video</th> -->
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
        <th class="w90 text-center">Video mp4</th>
        <th class="w90 text-center">Hiển thị</th>
        <th class="w50 text-center">
          <label>
            <input type='checkbox' class='minimal cls_showxoa_all'> Xóa
          </label>
        </th>
      </tr>
      <?php
        $cl = 0;
        $list_kietxuat_img = DB_fet("*", "#_baiviet_img",'`id` ASC');
        while($rows = mysql_fetch_assoc($sql))
        {
          $ida                = SHOW_text($rows['id']);
          $catasort           = number_format(SHOW_text($rows['catasort']),0,',','.');
          foreach ($rows as $key => $value) {
            ${$key}         = SHOW_text($value);
          }
      ?>
      <tr>
        
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
          <?php if(isset($_SESSION['admin'])){ ?>
          <label>
            <input name='coppy_row<?=$cl?>' type='checkbox' class='minimal'> [Coppy]
          </label>
          <?php } ?>
          <div style="font-size: 10px;">
            <?php if($dowload != ""){ ?>
            <p style="margin: 0; color: #ff5722; white-space: nowrap; text-overflow: ellipsis; overflow: hidden; width: 100%; max-width: 350px;">Mp4: <?=$dowload ?></p>
            <?php } ?>
            <?php if($p1 != ""){ ?>
            <p style="margin: 0; color: #4caf50; white-space: nowrap; text-overflow: ellipsis; overflow: hidden; width: 100%; max-width: 320px;">Youtu: <?=$p1 ?></p>
            <?php } ?>
            <label style="margin-top: 7px; font-size: 11px; color: #E91E63;"><input top_video type='checkbox' class='minimal minimal_click' colum="top_video" idcol="<?=$id ?>" table="#_baiviet" value='1' <?=LAY_checked($top_video, 1)?> style="float: left;"> Top Video</label>
            
          </div>
        </td>
        <!-- <td class="text-center">
          <a class="cur" onclick="XEM_video('<?=@GET_ID_youtube($rows['p1']) ?>')">Xem video</a>
        </td> -->
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
            <label><input opt2 type='checkbox' class='minimal minimal_click' colum="opt_km" idcol="<?=$id ?>" table="#_baiviet" value='1' <?=LAY_checked($opt_km, 1)?>></label>
          </div>
        </td>
        <td class="text-center">
          <div id="cus" class="cus_menu">
            <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$id ?>" table="#_baiviet" value='1' <?=LAY_checked($showhi, 1)?>></label>
            </div>
        </td>
        <td class="text-center">
          <input name='xoa_gr_arr_<?=$cl?>' type='checkbox' class='minimal cls_showxoa'>
          <input name='key_<?=$cl?>' type='hidden' value="<?=$key ?>">
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
<div class="dv-popup-video">
  <a class="cur" onclick="CLOSE_dvvideo()"><i class="fa fa-times"></i></a>
  <iframe width="560" height="315" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>