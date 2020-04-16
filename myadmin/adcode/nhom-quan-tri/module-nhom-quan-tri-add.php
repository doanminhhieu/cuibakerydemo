<?php
  $table = '#_module_nhomtaikhoan';
  $id    = isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;
  $sql        = DB_que("SELECT * FROM `#_module_tinhnang` WHERE `showhi` = 1 AND `m_other` = 0 AND `m_dev` = 0 ORDER BY `sort` ASC ");
  $sql_array  =  array();
  while ($r   = mysql_fetch_assoc($sql)) {
    $sql_array[] = $r;
  }

  if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $ten_vi             = @$_REQUEST['ten_vi'];
      $m_action           = @$_REQUEST['m_action'];
      $sort               = @$_REQUEST['sort'];
      $showhi             = isset($_POST['showhi']) ? 1 : 0;

      $list_phanquyen     = array();
      foreach ($sql_array as $val) {
        $action     = isset($_POST['action'.$val['id']]) ? $_POST['action'.$val['id']] : "";
        $xem        = isset($_POST['m_xem'.$val['id']]) ? 1 : 0;
        $them       = isset($_POST['m_them'.$val['id']]) ? 1 : 0;
        $sua        = isset($_POST['m_sua'.$val['id']]) ? 1 : 0;
        $xoa        = isset($_POST['m_xoa'.$val['id']]) ? 1 : 0;
        $xoa        = isset($_POST['m_xoa'.$val['id']]) ? 1 : 0;
        $menu       = isset($_POST['m_menu'.$val['id']]) ? 1 : 0;

        if($action != ''){
          $list_phanquyen[$action] = array("xem" => $xem,"them" => $them,"sua" => $sua,"xoa" => $xoa,"menu" => $menu);
        }
        $list_phanquyen['tn_'.$val['id']] = array("xem" => $xem,"them" => $them,"sua" => $sua,"xoa" => $xoa,"menu" => $menu);
      }

      foreach (LEFT_mainmenu_new() as $val) {

        $xem        = isset($_POST['m_xem'.$val['id']]) ? 1 : 0;
        $them       = isset($_POST['m_them'.$val['id']]) ? 1 : 0;
        $sua        = isset($_POST['m_sua'.$val['id']]) ? 1 : 0;
        $xoa        = isset($_POST['m_xoa'.$val['id']]) ? 1 : 0;
        $menu        = isset($_POST['m_menu'.$val['id']]) ? 1 : 0;
        if($action != ''){
          $list_phanquyen[$val['id']] = array("xem" => $xem,"them" => $them,"sua" => $sua,"xoa" => $xoa,"menu" => $menu);
        }
      }

    }




  if(!empty($_POST))
    {

      $data               = array();
      $data['ten_vi']     = $ten_vi;
      $data['sort']       = $sort;
      $data['showhi']     = $showhi;
      $data['phan_quyen']  = json_encode($list_phanquyen);


      if($id == 0){
        

        $id  = ACTION_db($data, $table , 'add',NULL,NULL);
        
        $_SESSION['show_message_on'] =  "Thêm chủ đề thành công!";
        LOCATION_js($url_page);
        exit();

      }else{

      
        ACTION_db($data, $table, 'update', NULL, "`id` = ".$id);
        $_SESSION['show_message_on'] =  "Cập nhật chủ đề thành công!";
      }
    }
 
    
  if($id > 0)
    {
      


      $sql_se             = DB_que("SELECT * FROM `$table` WHERE `id`='".$id."' LIMIT 1");
      $sql_se             = mysql_fetch_array($sql_se);
      $ten_vi             = SHOW_text($sql_se['ten_vi']);
      $sort               = number_format(SHOW_text($sql_se['sort']),0,',','.');
      $showhi             = SHOW_text($sql_se['showhi']);
      $phan_quyen         = $sql_se['phan_quyen'];


      $list_phanquyen     = json_decode($phan_quyen, true);
    
      print_r($list_phanquyen);
 
     

    }
    else 
    {

      $sort   = DB_que("SELECT * FROM `$table`");
      $sort   = number_format((mysql_num_rows($sort) + 1),0,',','.');
   

    }
?>

<section class="content-header">
  <h1>Nhóm quản trị</h1> 
  <ol class="breadcrumb">
      <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li class="active">Nhóm quản trị</li>
  </ol>
</section>
<form id="form_submit" name="form_submit" action="" method="post"  enctype='multipart/form-data'>
  <section class="content form_create">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
            <h2 class="h2_title">
                <i class="fa fa-pencil-square-o"></i><?=$id > 0 ? 'Sửa' : 'Thêm' ?> nhóm quản trị
            </h2>
            <h3 class="box-title box-title-td pull-right">
                <button onclick="return checkSubmit()" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
            </h3>
          </div>
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="tab-pane active">
                <div class="form-group">
                  <label>Tên nhóm</label>
                  <input type="text" class="form-control" value="<?=!empty($ten_vi) ? SHOW_text($ten_vi) : ''?>" name="ten_vi">
                </div>
                <div class="form-group">
                  <label>Số thứ tự</label>
                  <input type="text" class="form-control" name="sort" value="<?=!empty($sort) ? $sort : 1 ?>">
                </div>
                <div class="form-group">
                  <label class="checkbox-mini">
                    <input name='showhi' type='checkbox' class='minimal' <?=(!empty($showhi) && $showhi) == 1 || empty($showhi) ? "checked='checked'" : "" ?>> Hiển thị
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- pq -->
        <div class="box">
          <div class="box-header with-border">
            <h2 class="h2_title">
                <i class="fa fa-pencil-square-o"></i> Phân quyền
            </h2>
          </div>
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="tab-pane active">
                <div class="form-group">
                  <table class="table table-hover table-danhsach table-danhsach-pq" style="margin: 0; width: 100%;">
                    <tr>
                      <th class="w80 text-center">STT</th>
                      <th>Tính năng</th>
                      <th class="w80 text-center">Xem</th>
                      <th class="w80 text-center">Thêm</th>
                      <th class="w80 text-center">Sửa</th>
                      <th class="w80 text-center">Xóa</th>
                      <th class="w80 text-center">Menu</th>
                    </tr>
                    <!-- // -->

                    <?php
                        
                        $cl = 0;
                        foreach ($sql_array as $rows) 
                        {

                          if($rows['id_parent'] != 0) continue;

                          $cl++;
                          $ten_vi             = SHOW_text($rows['ten_vi']);
                          $m_xem              = SHOW_text($rows['m_xem']);
                          $m_them             = SHOW_text($rows['m_them']);
                          $m_sua              = SHOW_text($rows['m_sua']);
                          $m_xoa              = SHOW_text($rows['m_xoa']);
                          $sort               = SHOW_text($rows['sort']);
                          $id                 = SHOW_text($rows['id']);
                          $m_action           = SHOW_text($rows['m_action']);
                          $m_action_new      = $rows['m_action'] != "" ? SHOW_text($rows['m_action']) : "tn_".$id;
                          $xem           = !empty($list_phanquyen[$m_action_new]['xem']) ? $list_phanquyen[$m_action_new]['xem'] :0;
                          $them          = !empty($list_phanquyen[$m_action_new]['them']) ? $list_phanquyen[$m_action_new]['them'] :0;
                          $sua           = !empty($list_phanquyen[$m_action_new]['sua']) ? $list_phanquyen[$m_action_new]['sua'] :0;
                          $xoa           = !empty($list_phanquyen[$m_action_new]['xoa']) ? $list_phanquyen[$m_action_new]['xoa'] :0;
                          $menu          = !empty($list_phanquyen[$m_action_new]['menu']) ? $list_phanquyen[$m_action_new]['menu'] :0;
                      ?>
                      <tr>
                        <td class="text-center">
                          <input type="hidden" name="action<?=$id ?>" value="<?=$m_action ?>">
                          <?=$cl ?>
                        </td>
                        <td class="dvhide-row">
                          <div class="name">
                            <?=$ten_vi ?>
                          </div>
                        </td>
                        <td class="text-center">
                            <?php if($m_xem == 1){ ?>
                            <input type="checkbox" class='minimal' name="m_xem<?=$id ?>" <?=(($xem == 1) ? "checked='checked'" : "" )?> >
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php if($m_them == 1){ ?>
                            <input type="checkbox" class='minimal' name="m_them<?=$id ?>" <?=(($them == 1) ? "checked='checked'" : "" )?> >
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php if($m_sua == 1){ ?>
                            <input type="checkbox" class='minimal' name="m_sua<?=$id ?>" <?=(($sua == 1) ? "checked='checked'" : "" )?> >
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php if($m_xoa == 1){ ?>
                            <input type="checkbox" class='minimal' name="m_xoa<?=$id ?>" <?=(($xoa == 1) ? "checked='checked'" : "" )?> >
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <input type="checkbox" class='minimal' name="m_menu<?=$id ?>" <?=(($menu == 1) ? "checked='checked'" : "" )?> >
                        </td>
                        
                      </tr>
                      <!-- //cap 2 -->
                      <?php 
                        if($rows['m_action'] == 'main-module'){
                          echo "<pre>";

                          print_r(LEFT_mainmenu_new());
                           echo "</pre>";
              
                        foreach (LEFT_mainmenu_new() as $val) { 
                          echo $val['id'];

                          $cl++;
                          $xem  = !empty($list_phanquyen[$val['id']]['xem']) ? $list_phanquyen[$val['id']]['xem'] :0;
                          $them = !empty($list_phanquyen[$val['id']]['them']) ? $list_phanquyen[$val['id']]['them'] :0;
                          $sua  = !empty($list_phanquyen[$val['id']]['sua']) ? $list_phanquyen[$val['id']]['sua'] :0;
                          $xoa  = !empty($list_phanquyen[$val['id']]['xoa']) ? $list_phanquyen[$val['id']]['xoa'] :0;
                          $menu = !empty($list_phanquyen[$val['id']]['menu']) ? $list_phanquyen[$val['id']]['menu'] :0;


                      ?>
                      <tr>

                        <td class="w80 text-center"><?=$cl ?></td>
                        <td class="dvhide-row">
                          <span class="sp-list-cap1">╚═►</span>
                          <div class="name name_list_cap_1">
                            <?=$val['cataname'] ?>
                          </div>
                        </td>
                        <td class="w100 text-center">
                          <?php  echo "xem:" .$xem; ?>
                          <input type="checkbox" class='minimal' name="m_xem<?=$val['id'] ?>" <?=(($xem == 1) ? "checked='checked'" : "" )?> >
                        </td>
                        <td class="w100 text-center">
                          <?php echo $list_phanquyen[$val['id']]['menu'];  echo "Thêm:" .$them; ?>
                          <input type="checkbox" class='minimal' name="m_them<?=$val['id'] ?>" <?=(($them == 1) ? "checked='checked'" : "" )?> >
                        </td>
                        <td class="w100 text-center">
                          <?php  echo "sua:" .$sua; ?>
                          <input type="checkbox" class='minimal' name="m_sua<?=$val['id'] ?>" <?=(($sua == 1) ? "checked='checked'" : "" )?> >
                        </td>
                        <td class="w100 text-center">
                          <?php  echo "xoa:" .$xoa; ?>
                          <input type="checkbox" class='minimal' name="m_xoa<?=$val['id'] ?>" <?=(($xoa == 1) ? "checked='checked'" : "" )?> >
                        </td>
                        <td class="w100 text-center">
                          <?php  echo "menu:" .$menu; ?>
                          <input type="checkbox" class='minimal' name="m_menu<?=$val['id'] ?>" <?=(($menu == 1) ? "checked='checked'" : "" )?> >
                        </td>
                      </tr>

                      <?php }} ?>
                      <!--  -->
                      <?php
                        foreach ($sql_array as $rows_2) 
                        {
                          if($rows_2['id_parent'] != $rows['id']) continue;
                          $cl++;
                          $ten_vi_2             = SHOW_text($rows_2['ten_vi']);
                          $m_xem                = SHOW_text($rows_2['m_xem']);
                          $m_them               = SHOW_text($rows_2['m_them']);
                          $m_sua                = SHOW_text($rows_2['m_sua']);
                          $m_xoa                = SHOW_text($rows_2['m_xoa']);
                          $id                   = SHOW_text($rows_2['id']);
                          $m_action             = SHOW_text($rows_2['m_action']);
                          $m_action_new         = $rows_2['m_action'] != "" ? SHOW_text($rows_2['m_action']) : "tn_".$id;
                          $xem           = !empty($list_phanquyen[$m_action_new]['xem']) ? $list_phanquyen[$m_action_new]['xem'] :0;
                          $them          = !empty($list_phanquyen[$m_action_new]['them']) ? $list_phanquyen[$m_action_new]['them'] :0;
                          $sua           = !empty($list_phanquyen[$m_action_new]['sua']) ? $list_phanquyen[$m_action_new]['sua'] :0;
                          $xoa           = !empty($list_phanquyen[$m_action_new]['xoa']) ? $list_phanquyen[$m_action_new]['xoa'] :0;
                          $menu          = !empty($list_phanquyen[$m_action_new]['menu']) ? $list_phanquyen[$m_action_new]['menu'] : 0;
                      ?>
                      <tr>
                        <td class="text-center">
                          <input type="hidden" name="action<?=$id ?>" value="<?=$m_action ?>">
                          <?=$cl ?>
                        </td>
                        
                        <td class="dvhide-row">
                          <span class="sp-list-cap1">╚═►</span>
                          <div class="name name_list_cap_1">
                            <?=$ten_vi_2 ?>
                          </div>
                        </td>
                        <td class="text-center">
                            <?php if($m_xem == 1){ ?>
                            <input type="checkbox" class='minimal' name="m_xem<?=$id ?>" <?=(($xem == 1) ? "checked='checked'" : "" )?> >
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php if($m_them == 1){ ?>
                            <input type="checkbox" class='minimal' name="m_them<?=$id ?>" <?=(($them == 1) ? "checked='checked'" : "" )?> >
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php if($m_sua == 1){ ?>
                            <input type="checkbox" class='minimal' name="m_sua<?=$id ?>" <?=(($sua == 1) ? "checked='checked'" : "" )?> >
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php if($m_xoa == 1){ ?>
                            <input type="checkbox" class='minimal' name="m_xoa<?=$id ?>" <?=(($xoa == 1) ? "checked='checked'" : "" )?> >
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <input type="checkbox" class='minimal' name="m_menu<?=$id ?>" <?=(($menu == 1) ? "checked='checked'" : "" )?> >
                        </td>
                      </tr>
                    <?php  } ?> 
                      <!-- end cap 2 -->
          
                      <!--  -->
                    <?php  } ?> 
                    <!--  -->
                  <!-- end pro -->
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end pq -->
      </section>
    </div>
  </section>

  <div class="box-header mb-60">
  <h3 class="box-title box-title-td pull-right">
    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
    <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
    <a href="<?=$url_page ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
  </h3>
</div>
</form>