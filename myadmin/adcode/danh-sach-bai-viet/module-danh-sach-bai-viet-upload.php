<?php
    $table 		= '#_baiviet_img';
    $id    		= isset($_GET['edit']) && is_numeric($_GET['edit']) ? SHOW_text($_GET['edit']) : 0;
    $upload     = isset($_GET['upload']) && is_numeric($_GET['upload']) ? SHOW_text($_GET['upload']) : 1;

    if(isset($_GET['xoa']) && $_GET['xoa'] == "all") {
    	// $list_hinhcon = DB_fet("  * "," `#_baiviet_img` "," `id_parent` = 0  "," `sort` ASC, `id` ASC", "","arr");
    	$list_hinhcon = DB_fet("  * "," `#_baiviet_img` "," `id_parent` = '".$id."' AND `the_loai` = '$upload' "," `sort` ASC, `id` ASC", "","arr");
		foreach ($list_hinhcon as $r_img) { 
			$idofme		 = $r_img['id'];
			$icon		 = $r_img['icon'];
			$duongdantin = $r_img['duongdantin'];
			@unlink("../$duongdantin/".$icon);
			@unlink("../$duongdantin/thumb_".$icon);
			@unlink("../$duongdantin/thumbnew_".$icon);

			DB_que("DELETE FROM `$table` WHERE  `id`= ".$idofme." LIMIT 1");
		}
		$_SESSION['show_message_on'] = "Cập nhật dữ liệu thành công!";
		LOCATION_js("?module=main-module&action=danh-sach-bai-viet&step=".$step."&id_step=".$id_step."&edit=".$id."&upload=".$upload);
		exit();
    }

	$thongtin_step = DB_fet("*","`#_step`", "`id` = '$step'","", 1, "arr");
	$baiviet = DB_que("SELECT * FROM `#_baiviet` WHERE `id` = '$id' LIMIT 1");
	if(!mysql_num_rows($baiviet)) exit();
	$baiviet = mysql_fetch_assoc($baiviet);
?>
<section class="content-header">
    <h1><?=SHOW_text($baiviet['tenbaiviet_vi']) ?></h1> 
    <ol class="breadcrumb">
        <li><a href="<?=$fullpath_admin ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Quản lý hình ảnh</li>
    </ol>
</section>
<?php 
  $img_size   		= "";
  $img_size_text   	= "";
  if(!empty($thongtin_step[0]['size_img']) && $thongtin_step[0]['size_img'] != ''){
    $size_tinh = $thongtin_step[0]['size_img'];
    $size_tinh = explode("x", $size_tinh);
    $img_size = (int)($size_tinh[0])."x".(int)($size_tinh[1]);
    $img_size_text = (int)($size_tinh[0]*1)."px x".(int)($size_tinh[1]*1). "px";

  }
  
?>
<style>
	.dv-add-anh-new input { width: 100%; position: absolute; opacity: 0; left: 0; top: 0; bottom: 0; right: 0; cursor: pointer;}
	.dv-add-anh-new { border: 1px solid #3c8dbc; display: inline-block; padding: 6px 10px; border-radius: 5px; background: #3c8dbc; margin-top: -10px; color: #fff; font-weight: 600; cursor: pointer; font-size: 12px; position: relative; }
	.dv-add-anh-new:hover { border: 1px solid #2073a3; background: #2073a3;}
	.dv-add-anh-new label { margin: 0 !important; cursor: pointer; }
	.dv_hinhanh_con_upload { min-width: 200px; width: calc(25% - 10px); height: 200px; border: 1px solid #e3e3e3; position: relative; margin: 0 10px 10px 0; float: left; display: flex; align-items: center; }
	.dv_hinhanh_con_upload img { max-width: 100%; max-height: 100%; width: auto; height: auto; }
	.dv_hinhanh_con_upload input { position: absolute; bottom: 1px; left: 1px; width: calc(100% - 2px); border: 1px solid #e3e3e3; height: 28px; padding: 0 7px; font-size: 12px; background: #fff; }
	.dv_hinhanh_con_upload input.v2 { bottom: 28px; }
	.dv_hinhanh_con_upload input.v1 { bottom: auto; top: 1px; width: 67px; height: 26px; font-size: 12px; padding: 0 4px; }
	.dv_hinhanh_con_upload a.cur { width: 20px; height: 20px; background: #FF5722; padding: 2px; }
	.dv_hinhanh_con_upload a.cur:hover { background: #ef0c0c}
</style>
<form action="" method="POST" enctype="multipart/form-data" id="formUpload">
	<input type="hidden" name="kietxuatid" value='<?=$id ?>'>
	<input type="hidden" name="ajax_send_img" class="ajax_send_img" value='0'>
	<input type="hidden" name="size_img" value='<?=$img_size ?>'>
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                    	<h2 class="h2_title">
			                <i class="fa fa-pencil-square-o"></i> <?=$upload == 1 ? "Ảnh 360 độ" : "Ảnh slider" ?> 
			            </h2>
                        <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page?>&step=<?=$step ?>&id_step=<?=$id_step ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                        </h3>
                    </div>
                    <div class="box-body box-body-upload-message">
                    	<div class="dv-add-anh-new">
                    		<label>
					      	<input type="file" id="upload_mutile_tindang" multiple="multiple" style="padding: 0; height: auto" accept="image/*" >
					      	<input type="hidden" class="js_theloai_upload" value="<?=$upload ?>">
					      	<input type="hidden" class="id_edit" value="<?=$id ?>">
					      	<i class="fa fa-cloud-upload" ></i> Chọn ảnh (<?=$img_size_text ?>)</label>
					      	<img src="images/loading2.gif" class="js_load_data_upload" style="height: 16px; margin-left: 7px; position: relative; top: -2px; display: none;">
					    </div>
		                <div class="clear"></div>
		                <div class="form-group" style="margin-top: 15px">
		                  	<label>Danh sách hình ảnh</label> <a href="?module=main-module&action=danh-sach-bai-viet&step=<?=$step ?>&id_step=<?=$id_step ?>&edit=<?=$id ?>&upload=<?=$upload ?>&xoa=all" onclick="return confirm('Bạn có chắc xóa?')">[Xóa tất cả]</a><div class="clear"></div>
		                
						<div class="img-child">
						  <div class=" no_box ">
						  	<div class="js_load_img_upload">
							    <?php 
							      $list_hinhcon = DB_fet("  * "," `#_baiviet_img` "," `id_parent` = '".$id."' AND `the_loai` = '$upload' "," `sort` ASC, `id` ASC", "","arr");
							      foreach ($list_hinhcon as $r_img) { 
							    ?>
							    <div class="dv_hinhanh_con_upload dv_hinhanh_con dv-anh-chl dv_hinhanh_con_<?=$r_img['id'] ?>">
									<a class="cur" onclick="remove_images_js(this, <?=$r_img['id'] ?>)"><img src="images/x_icon.svg" alt=""></a>
									<img src="<?=checkImage($fullpath, $r_img['icon'], $r_img['duongdantin']) ?>">
									<input class="v1" value='<?=$r_img['sort'] ?>' class='box_input' placeholder="Nhập STT" onchange="UPDATE_colum(this, '<?=$r_img['id'] ?>', 'sort','#_baiviet_img')">
									<input class="v2" value="<?=SHOW_text($r_img['tenbaiviet_vi']) ?>" placeholder="Nhập mô tả (vi)..." onchange="UPDATE_colum(this, '<?=$r_img['id'] ?>', 'tenbaiviet_vi','#_baiviet_img')">
									<input class="v3" value="<?=SHOW_text($r_img['tenbaiviet_en']) ?>" placeholder="Nhập mô tả (en)..." onchange="UPDATE_colum(this, '<?=$r_img['id'] ?>', 'tenbaiviet_en','#_baiviet_img')">
							    </div> 
							    <?php } ?>
						    </div>
						    <div class="clr"></div>
						    <div class="dv-dvjs-ajanh dv-anh-js-load dv-anh-js-load-anh-upload"></div>
						    <div class="dv-anh-js-load-err">   </div>
						    
						  </div>
						  <div class="clr"></div>
						  <!--  -->
						</div>
		                <!--  -->
                    </div>
                    <div class="box-header">
                      <h3 class="box-title box-title-td pull-right">
                          <button type="submit" name="addgiatri" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?=luu_lai ?></button>
                          <a href="<?=$url_page?>&step=<?=$step ?>&id_step=<?=$id_step ?>" class="btn btn-primary"><i class="fa fa-sign-out"></i> Thoát</a>
                      </h3>
                    </div>
                    <!--  -->
                </div>
            </section>
        </div>
    </section>
</form>