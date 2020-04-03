<?php
  $table = '#_form_lienhe';

  if(isset($_GET['edit']))
  {
    $sql_se       = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['edit']."' LIMIT 1");
    $sql_se       = mysql_fetch_array($sql_se);
    $noi_dung_vn  = SHOW_text($sql_se['noi_dung_vn']);
    // $nd_json      = SHOW_text($sql_se['nd_json']);

    DB_que("UPDATE $table SET `showhi` = 1 WHERE `id` = ".$_GET['edit']." LIMIT 1");
  }
  // $nd_json = unserialize($nd_json);
  // print_r($nd_json);
?>
<section class="content-header">
    <h1>Quản lý liên hệ</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Quản lý liên hệ</li>
    </ol>
</section>

<section class="content form_create">
  <div class="row">
    <section class="col-lg-12">
      <div class="box">
          <div class="box-header with-border">
            <h2 class="h2_title">
                <i class="fa fa-pencil-square-o"></i> Xem liên hệ
            </h2>
            <h3 class="box-title box-title-td pull-right">
                <a href="?module=<?=$module ?>&action=<?=$action ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
            </h3>
        </div>
        <div class=" p10">
            <?php 
              $url = '~(?:(https?)://maps([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
              $noi_dung_vn = preg_replace('/font-size: 13px">http:(.*?)<\/span>/i', 'font-size: 13px"><a href="http:$1" target="_blank">http:$1</a>', $noi_dung_vn); 

              $noi_dung_vn = str_replace("script", "", $noi_dung_vn);
              echo preg_replace($url, '<a href="$0" target="_blank" >$0</a>', html_entity_decode(stripslashes($noi_dung_vn)));
            ?>
        </div>
      </div>
    </section>
  </div>
</section>