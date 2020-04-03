<div class="user-panel">
    <div class="pull-left image" style="position: relative; z-index: 9;">
        <a href="../" target="_blank">
            <img src="<?= $favico ?>" class="img-circle">
        </a>
    </div>
    <div class="pull-left info">
        <p style="margin-bottom: 5px;">
            <a href="../" target="_blank" style="color: #fff !important; font-size: 16px !important; margin-bottom: 2px !important; display: inline-block;">Administrator</a>
        </p>
        <p style="margin-bottom: 5px; font-size: 9px; line-height: 10px; font-weight: 500; color: #c1c1c1;"><i class="fa fa-map-marker"></i> <?=$check_iplogin['ip_login'] ?><?=$check_iplogin['ip_login_time'] != 0 ? " - ".date("H:i d-m-Y", $check_iplogin['ip_login_time']) : "" ?></p>
        <p style="font-size: 9px; line-height: 10px; font-weight: 500; color: #c1c1c1;"><i class="fa fa-map-marker"></i> <?=$check_iplogin['ip_login_last'] ?><?=$check_iplogin['ip_login_last_time'] != 0 ? " - ".date("H:i d-m-Y", $check_iplogin['ip_login_last_time']) : "" ?></p>
    </div>
</div>
<section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header header_lis">
            CHỨC NĂNG HỆ THỐNG
            <a href="../" target="_blank" style="" title="Xem website">[<i class="fa fa-eye"></i>]</a>
            <a href="index.php?clear=cache" style="margin-right: 5px;" title="Xóa cache">[<i class="fa fa-refresh"></i>]</a>
        </li>
        <li>
            <a href="<?= $fullpath_admin ?>">
                <i class="fa fa-home"></i><span>Trang chủ</span>
            </a>
        </li>
        <?php 

            $sql        = DB_que("SELECT * FROM `#_module_tinhnang` WHERE `showhi` = 1 ORDER BY `sort` ASC ");
            $sql_array  =  array();
            while ($r   = mysql_fetch_assoc($sql)) {
              $sql_array[] = $r;
            }
            $m_dev_left = isset($_SESSION['admin']) ? 1 : 0;

            foreach ($sql_array as $value) {
                if($value['id_parent'] != 0) continue;
                if($value['m_dev'] == 1 && $value['m_dev'] != $m_dev_left) continue;
                if(!SHOW_menu_left($glo_quyen, "", 'tn_'.$value['id'])) continue;
                
                $nhom_2 = "";
                foreach ($sql_array as $value_2) {
                    if($value_2['id_parent'] != $value['id']) continue;
                    if($value_2['m_dev'] == 1 && $value_2['m_dev'] != $m_dev_left) continue;

                    if(!SHOW_menu_left($glo_quyen, "", 'tn_'.$value_2['id']) && $value_2['m_other'] == 0) continue;

                    $nhom_3 = "";
                    foreach ($sql_array as $value_3) {
                        if($value_3['id_parent'] != $value_2['id']) continue;
                        if($value_3['m_dev'] == 1 && $value_3['m_dev'] != $m_dev_left) continue;
                        if(!SHOW_menu_left($glo_quyen, "", 'tn_'.$value_3['id'])  && $value_3['m_other'] == 0) continue;

                       $nhom_3 .= '<li><a href="'.$value_3['lien_ket'].'"><i class="'.($value_3['icon'] != "" ? $value_3['icon'] : "fa fa-circle-o").'"></i> '.$value_3['ten_vi'].'</a></li>';
                    }
 
                    $nhom_2 .= '<li class="'.($nhom_3 != "" ? 'treeview' : "").'"><a href="'.$value_2['lien_ket'].'"><i class="'.($value_3['icon'] != "" ? $value_2['icon'] : "fa fa-circle-o").'""></i> <span>'.$value_2['ten_vi'].'</span>'.($nhom_3 != "" ? '<span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>' : "").'</a>'.($nhom_3 != "" ? '<ul class="treeview-menu">'. $nhom_3 .'</ul>' : "").'</li>';
                }
        ?>
        <li class="treeview">
            <a href="<?=$value['lien_ket'] ?>">
                <i class="<?=$value['icon'] != "" ? $value['icon'] : "fa fa-circle-o" ?>"></i> <span><?=$value['ten_vi'] ?></span>
                <?=$nhom_2 != "" || $value['m_action'] == 'main-module' ? '<span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>' : "" ?>
            </a>
            <?php 

                if($value['m_action'] == 'danh-sach-hinh-anh'){
            ?>
            <ul class="treeview-menu" style="">
                <?php 
                    $loaibanner = DB_que('SELECT * FROM `#_banner_danhmuc` WHERE `showhi` = 1 ORDER BY `catasort` ASC');
                    while($r    = mysql_fetch_array($loaibanner))
                      {
                    ?>
                    <li><a href="?module=quan-ly-hinh-anh&action=danh-sach-hinh-anh&id-parent=<?=$r['id'] ?>"><i class="fa fa-circle-o" "=""></i> <span><?=$r['tenbaiviet_vi'] ?></span></a></li>
                    <?php }   if(isset($_SESSION['admin'])){ ?>
                <li class=""><a href="?module=quan-ly-hinh-anh&action=danh-sach-loai-hinh-anh&them-moi=true"><i class="fa fa-circle-o" "=""></i> <span>Thêm loại hình ảnh</span></a></li>
                <li class=""><a href="?module=quan-ly-hinh-anh&action=danh-sach-loai-hinh-anh"><i class="fa fa-circle-o" "=""></i> <span>Danh sách loại hình ảnh</span></a>
                </li>
                <?php } ?>
            </ul>
            <?php 
                }else if($value['m_action'] != 'main-module'){
                    echo $nhom_2 != "" ? '<ul class="treeview-menu">'.$nhom_2.'</ul>' : "";
                }else{
            ?>
            <!-- //module -->
            <ul class="treeview-menu">
                <?php 
                    $name_bg        = "";
                    foreach (LEFT_mainmenu_new() as $val) { 
                        if(!SHOW_menu_left($glo_quyen, "", $val['id'])) continue;
                ?> 
                <li class="treeview">
                  <a href="JavaScript:"><i class="fa fa-circle-o"></i> <?=$val['cataname'] ?>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <?php if(!in_array($val['id'], $st_an_nhom_bv)){ ?>
                    <li><a href="?module=main-module&action=danh-sach-bai-viet&them-moi=true&step=<?=$val['step'] ?>&id_step=<?=$val['id_step'] ?>"><i class="fa fa-circle-o"></i>Thêm <?=$val['name'] ?></a></li>
                    <li><a href="?module=main-module&action=danh-sach-bai-viet&step=<?=$val['step'] ?>&id_step=<?=$val['id_step'] ?>"><i class="fa fa-circle-o"></i>Danh sách <?=$val['name'] ?></a></li>
                    <?php } if(in_array($val['id'], $array_only_bv) && $_SESSION['phanquyen'] == 1){ ?>
                    <li><a href="?module=main-module&action=danh-sach-chu-de&them-moi=true&step=<?=$val['step'] ?>&id_step=<?=$val['id_step'] ?>"><i class="fa fa-circle-o"></i> Thêm chủ đề</a></li>
                    <li><a href="?module=main-module&action=danh-sach-chu-de&step=<?=$val['step'] ?>&id_step=<?=$val['id_step'] ?>"><i class="fa fa-circle-o"></i> Danh sách chủ đề</a></li>
                    <?php } if(in_array($val['id'], $array_tn) && $_SESSION['phanquyen'] == 1){ ?>

                    <li><a href="?module=main-module&action=danh-sach-tinh-nang&them-moi=true&step=<?=$val['step'] ?>&id_step=<?=$val['id_step'] ?>"><i class="fa fa-circle-o"></i> Thêm tính năng</a></li>
                    <li><a href="?module=main-module&action=danh-sach-tinh-nang&step=<?=$val['step'] ?>&id_step=<?=$val['id_step'] ?>"><i class="fa fa-circle-o"></i> Danh sách tính năng</a></li>
                    <?php } ?>
                  </ul>
                </li>
                <?php } ?>
            </ul>
            <?php } ?>
            <!-- end -->
        </li>
    <?php } ?>


    <?php if (!empty($_SESSION['admin'])) { ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs"></i> <span>Module hệ thống</span>
                <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="?module=module-he-thong&action=danh-sach-hien-thi-page&them-moi=true"><i
                                class="fa fa-circle-o"></i> Thêm hiển thị</a></li>
                <li><a href="?module=module-he-thong&action=danh-sach-hien-thi-page"><i class="fa fa-circle-o"></i> Danh
                        sách hiển thị</a></li>
                <li><a href="?module=module-he-thong&action=danh-sach-setting&them-moi=true"><i
                                class="fa fa-circle-o"></i> Thêm setting</a></li>
                <li><a href="?module=module-he-thong&action=danh-sach-setting"><i class="fa fa-circle-o"></i> Danh sách
                        setting</a></li>
                <li><a href="?module=module-he-thong&action=danh-sach-tinh-nang-admin&them-moi=true"><i
                                class="fa fa-circle-o"></i> Thêm tính năng</a></li>
                <li><a href="?module=module-he-thong&action=danh-sach-tinh-nang-admin"><i class="fa fa-circle-o"></i>
                        Danh sách tính năng</a></li>
            </ul>
        </li>

    <?php } ?>
    </ul>
</section>