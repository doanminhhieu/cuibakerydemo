<?php
  if(isset($_GET['them-moi']) || (isset($_GET['edit']) && is_numeric($_GET['edit']))){
        include "module-nhung-thong-tin-khac-add.php";
  }else{
    $table = '#_seo_name';
    
    if(isset($_GET['del']))
    {
        $sql_se         = DB_que("SELECT * FROM `$table` WHERE `id`='".$_GET['catalogid']."' LIMIT 1");
        $icon           = @mysql_result($sql_se,0,'icon');
        $duongdantin    = @mysql_result($sql_se,0,'duongdantin');
        $del_name       = @mysql_result($sql_se,0,'tenbaiviet_vi');
        @unlink("../".$duongdantin."/".$icon);
        @unlink("../".$duongdantin."/thumb_".$icon);
        $sql = DB_que("DELETE FROM $table WHERE id='".$_GET['catalogid']."' LIMIT 1", $table);
        $_SESSION['show_message_on'] =  'Đã xóa [<strong>'.$del_name.'</strong>] thành công';
        LOCATION_js($url_page);
        exit();
    }

    $sql     = DB_que("SELECT * FROM `$table`");
?>
<section class="content-header">
    <h1>Quản lý thông tin khác</h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Quản lý thông tin khác</li>
    </ol>
</section>
<form action="" method="post">
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header  with-border">
                        <h3 class="box-title box-title-td pull-right">
                        <?php
                          if(isset($_SESSION['admin']))
                          {
                        ?>
                            <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                        <?php
                          }
                        ?>
                        </h3>
                        <h2 class="h2_title">
                          <i class="fa fa-pencil-square-o"></i> Danh sách 
                        </h2>
                    </div>
                    <div class="box-body table-responsive no-padding table-danhsach-cont">
                      <table class="table table-hover table-danhsach">
                        <tbody>
                          <tr>
                            <th class="w80 text-center">STT</th>
                            
                            <th>Tên bài viết</th>
                            <th class="w100 text-center">Hình ảnh</th>
                            <th class="w100 text-center">Hiển thị</th>
                            <th class="w100 text-center">Tác vụ</th>
                          </tr>
                          <?php
                            $cl = 0;
                            while($rows = mysql_fetch_assoc($sql))
                            {
                              $ida                = SHOW_text($rows['id']);
                              foreach ($rows as $key => $value) {
                                ${$key}         = SHOW_text($value);
                              }

                          ?>
                          <tr>
                            <td class="text-center">
                              <input name="idme<?=$cl?>" value="<?=$ida?>" type="hidden">
                              <?=$cl + 1?>
                            </td>
                            
                            <td>
                              <div class="name">
                                <a href="<?=$url_page ?>&edit=<?=$ida?>"><?=$tenbaiviet_vi ?></a>
                                <p class="p_lang_en"><?=$tenbaiviet_en ?></p>
                              </div>
                            </td>
                            <td class="text-center">
                              <img class='img_show_ds' src='<?=$fullpath."/".$duongdantin."/thumb_".$icon ?>'>
                            </td>
                            <td class="text-center">
                              <div id="cus" class="cus_menu">
                                <label><input showhi type='checkbox' class='minimal minimal_click' colum="showhi" idcol="<?=$ida ?>" table="<?=$table ?>" value='1' <?=LAY_checked($showhi, 1)?>></label>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="<?=$url_page ?>&edit=<?=$ida?>"><i class="fa fa-pencil-square-o"></i></a>
                                <?php if(isset($_SESSION['admin'])){ ?>
                                <a href="<?=$url_page.'&del=ok&catalogid='.$ida.'&token='.GET_token() ?>" class="do" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fa fa-times"></i></a>
                                <?php } ?>
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
                    <div class="box-header">
                      <h3 class="box-title box-title-td pull-right">
                          <?php if(isset($_SESSION['admin'])) {  ?>
                              <a href="<?=$url_page ?>&them-moi=true" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                          <?php
                            }
                          ?>
                      </h3>
                    </div>
                    <!--  -->
                </div>
            </section>
        </div>
    </section>
</form>
<?php } ?>