<?php 
    // if($thongtin_step['num_view'] == 0)
    //     $numview          = 10;
    // else $numview         = $thongtin_step['num_view'];

    // if($slug_table == 'step'){
    //     $lay_all_kx = LAYDANHSACH_idkietxuat(0, $slug_step);
    // }
    // else{
    //     $lay_all_kx = @LAYDANHSACH_idkietxuat($arr_running['id'], $slug_step);
    // }
 
    $pzer                   = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

    $vi_tri                 = PHANTRANG_start($pzer, $numview);
    if ($pzer               == 1 || $pzer == NULL) 
        $pzz                = 0;
    else $pzz               = $pzer * $numview;

    if(empty($wh)) $wh = '';
    if(empty($catasort)){
        $catasort   = '`catasort` ASC, `id` DESC';
    }

    $limit_new = str_replace(",", ".", "$vi_tri,$numview");

    $nd_kietxuat = DB_fet_rd("*","`#_danhmuc`"," `step` IN (".$slug_step.") $wh "," $catasort  ", $limit_new, "id");
    $nd_total    = DB_num_rd("SELECT `id` FROM `#_danhmuc` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh", "#_danhmuc");

    $numshow     = ceil($nd_total / $numview);
    $sotrang     = PHANTRANG_findPages($nd_total, $numview);

?>