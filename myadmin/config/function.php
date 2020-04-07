<?php 



	function sql_id($id) { 
		$id = str_replace("+","",$id); 
		$id = str_replace("'","''",$id); 
		$id = str_replace("union","",$id); 
		$id = str_replace("select","",$id); 
		$id = str_replace("\*","",$id); 
		$id = str_replace("\%","",$id); 
		$id = str_replace("%","",$id); 
		$id = str_replace("2b","",$id); 
		return $id; 
	} 


	function DANHSACH_page($val, $name, $class= '', $kieu = 0, $disabled = ''){
		$list_step = DB_fet("*", "#_module_page", "`showhi` = 1", "`sort` ASC", "", "arr");
		if($kieu 	== 0)
			{	
				$selec 			 	= "<select $disabled id='".$name."' name='".$name."' class='".$class."'>";
				foreach ($list_step as$value) 
					{
						$selec 	   .= '<option '.(($val == $value['id']) ? 'selected="selected"':''). 'value="'.$value['id'].'">'.$value['ten_vi'].'</option>';
					}
				$selec 			   .= "</select>";
				return $selec;
			}
		else
			{
				return $list_step[$val]['ten_vi'];
			}
	}


	function trim_val($gia_tri_1_vi){
		$gia_tri_1_vi = str_replace(", ", ",", $gia_tri_1_vi);
    	$gia_tri_1_vi = str_replace(" ,", ",", $gia_tri_1_vi);
    	return $gia_tri_1_vi;
	}


	function thuoctinh_lang($rows, $lang){
		$list_lang = array();
		for ($k=1; $k <= 3; $k++) { 
			$key_ss  = explode(",", $rows['gia_tri_'.$k.'_vi']);
			$val_ss  = explode(",", $rows['gia_tri_'.$k.'_en']);
			for ($i=0; $i < count($key_ss); $i++) { 
				if($lang != "vi") {
					$list_lang[$key_ss[$i]] = $val_ss[$i];
				}
				else{
					$list_lang[$key_ss[$i]] = $key_ss[$i];
				}
			}
		}
		return $list_lang;
	}


 	function LAY_chude_new($val, $step = 0, $name = '', $class = ''){
		$chude_arr  = DB_fet("*","#_danhmuc", "`showhi` = '1' AND `step` = ".$step."  ", "`catasort` ASC","", "arr");
		$select 	= '<select name="'.$name.'" id="'.$name.'" class="'.$class.'">
    						<option value="0">Chọn chủ đề con</option>'; 
    	foreach ($chude_arr as $row_1)
            {		
              	$select 		   .= '<option '.(($val == $row_1['id']) ?'selected="selected"':'').'  value="'.$row_1['id'].'">'.$row_1['tenbaiviet_vi'].'</option> ';
             
			}
			$select .= '</select>';
		return $select;	
	}



	function LAY_chude_table($table, $val,  $name = '', $class = '', $kieu = 0,  $id_ht = 0, $chude = 'true'){
		if($kieu == 0)
			{
				$chude_arr  = DB_fet("*",$table, "`showhi` = '1'  ", "`catasort` ASC","", "arr");
				$select 	= '<select name="'.$name.'" id="'.$name.'" class="'.$class.'">
	        						<option value="0">Chọn chủ đề con</option>'; 
	        	foreach ($chude_arr as $row_1)
		            {		
		            	if($row_1['id_parent'] != 0) continue;
		            	$check_dis 			= "";
		            	$check_dis_trung 	= "";
		            	if($id_ht == $row_1['id'] && $chude == 'true') $check_dis_trung = 'disabled="disabled"';
		              	$select 		   .= '<option '.$check_dis.$check_dis_trung.' '.(($val == $row_1['id']) ?'selected="selected"':'').'  value="'.$row_1['id'].'">'.$row_1['tenbaiviet_vi'].'</option> ';
		              	foreach ($chude_arr as $row_2) 
				            {		
				            	if($row_2['id_parent'] != $row_1['id']) continue;
				            	if($id_ht == $row_2['id'] && $check_dis_trung == '' && $chude == 'true') $check_dis1 = 'disabled="disabled"';
				            	else $check_dis1 = "";

				              	$select 		   .= '<option '.$check_dis.$check_dis1.$check_dis_trung.' '.(($val == $row_2['id']) ?'selected="selected"':'').'  value="'.$row_2['id'].'">╚═►'.$row_2['tenbaiviet_vi'].'</option> ';
				              	foreach ($chude_arr as $row_3)
						            {	
						            	if($row_3['id_parent'] != $row_2['id']) continue;
						            	if($id_ht == $row_3['id'] && $check_dis_trung == '' && $chude == 'true') $check_dis2 = 'disabled="disabled"';
				            			else $check_dis2 = "";

						              	$select 		   .= '<option '.$check_dis.$check_dis1.$check_dis2.$check_dis_trung.' '.(($val == $row_3['id']) ?'selected="selected"':'').'  value="'.$row_3['id'].'"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╙─►'.$row_3['tenbaiviet_vi'].'</option> ';
						              	foreach ($chude_arr as $row_4) 
								            {	
								            	if($row_4['id_parent'] != $row_3['id']) continue;
								            	if($chude == 'true')
								            		$check_dis3 = 'disabled="disabled"';	
								            	else
								            		$check_dis3 = '';	
										        $select 		   .= '<option '.$check_dis.$check_dis1.$check_dis2.$check_dis3.$check_dis_trung.' '.(($val == $row_4['id']) ?'selected="selected"':'').'  value="'.$row_4['id'].'"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╙─►'.$row_4['tenbaiviet_vi'].'</option> ';

											}
									}
							}
					}
					$select .= '</select>';
				return $select;
			}
		else
			{
				$sql_cap 	= DB_que("SELECT `tenbaiviet_vi` FROM `$table` WHERE `id` = ".$val." LIMIT 1");
				return mysql_result($sql_cap, 0, 'tenbaiviet_vi');
			}
	}
	function LAY_chude($val, $step = 0, $name = '', $class = '', $kieu = 0, $idstep  = 0, $id_ht = 0, $chude = 'true'){
		if($kieu == 0)
			{
				$chude_arr  = DB_fet("*","#_danhmuc", "`showhi` = '1' AND `step` = ".$step."  ", "`catasort` ASC","", "arr");
				$select 	= '<select name="'.$name.'" id="'.$name.'" class="'.$class.'">
	        						<option value="0">Chọn chủ đề con</option>'; 
	        	foreach ($chude_arr as $row_1)
		            {		
		            	if($row_1['id_parent'] != 0) continue;
		            	$check_dis 			= "";
		            	$check_dis_trung 	= "";
		            	if($id_ht == $row_1['id'] && $chude == 'true') $check_dis_trung = 'disabled="disabled"';
		              	$select 		   .= '<option '.$check_dis.$check_dis_trung.' '.(($val == $row_1['id']) ?'selected="selected"':'').'  value="'.$row_1['id'].'">'.$row_1['tenbaiviet_vi'].'</option> ';
		              	foreach ($chude_arr as $row_2) 
				            {		
				            	if($row_2['id_parent'] != $row_1['id']) continue;
				            	if($id_ht == $row_2['id'] && $check_dis_trung == '' && $chude == 'true') $check_dis1 = 'disabled="disabled"';
				            	else $check_dis1 = "";

				              	$select 		   .= '<option '.$check_dis.$check_dis1.$check_dis_trung.' '.(($val == $row_2['id']) ?'selected="selected"':'').'  value="'.$row_2['id'].'">╚═►'.$row_2['tenbaiviet_vi'].'</option> ';
				              	foreach ($chude_arr as $row_3)
						            {	
						            	if($row_3['id_parent'] != $row_2['id']) continue;
						            	if($id_ht == $row_3['id'] && $check_dis_trung == '' && $chude == 'true') $check_dis2 = 'disabled="disabled"';
				            			else $check_dis2 = "";

						              	$select 		   .= '<option '.$check_dis.$check_dis1.$check_dis2.$check_dis_trung.' '.(($val == $row_3['id']) ?'selected="selected"':'').'  value="'.$row_3['id'].'"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╙─►'.$row_3['tenbaiviet_vi'].'</option> ';
						              	foreach ($chude_arr as $row_4) 
								            {	
								            	if($row_4['id_parent'] != $row_3['id']) continue;
								            	if($chude == 'true')
								            		$check_dis3 = 'disabled="disabled"';	
								            	else
								            		$check_dis3 = '';	
										        $select 		   .= '<option '.$check_dis.$check_dis1.$check_dis2.$check_dis3.$check_dis_trung.' '.(($val == $row_4['id']) ?'selected="selected"':'').'  value="'.$row_4['id'].'"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╙─►'.$row_4['tenbaiviet_vi'].'</option> ';

											}
									}
							}
					}
					$select .= '</select>';
				return $select;
			}
		else
			{
				$sql_cap 	= DB_que("SELECT `tenbaiviet_vi` FROM `#_danhmuc` WHERE `id` = ".$val." LIMIT 1");
				return mysql_result($sql_cap, 0, 'tenbaiviet_vi');
			}
	}


	function LAY_menu($val, $name = '', $class = '', $kieu = 0, $id_ht = 0, $chude = 'true'){
		if($kieu == 0)
			{
				$chude_arr  = DB_fet("*","#_menu", "`showhi` = '1'", "`catasort` ASC","", "arr");
				$select 	= '<select name="'.$name.'" id="'.$name.'" class="'.$class.'">
	        						<option value="0">Chọn menu con</option>'; 
	        	foreach ($chude_arr as $row_1)
		            {		
		            	if($row_1['id_parent'] != 0) continue;
		            	$check_dis 			= "";
		            	$check_dis_trung 	= "";
		            	if($id_ht == $row_1['id'] && $chude == 'true') $check_dis_trung = 'disabled="disabled"';
		              	$select 		   .= '<option '.$check_dis.$check_dis_trung.' '.(($val == $row_1['id']) ?'selected="selected"':'').'  value="'.$row_1['id'].'">'.$row_1['tenbaiviet_vi'].'</option> ';
		              	foreach ($chude_arr as $row_2) 
				            {		
				            	if($row_2['id_parent'] != $row_1['id']) continue;
				            	if($id_ht == $row_2['id'] && $check_dis_trung == '' && $chude == 'true') $check_dis1 = 'disabled="disabled"';
				            	else $check_dis1 = "";

				              	$select 		   .= '<option '.$check_dis.$check_dis1.$check_dis_trung.' '.(($val == $row_2['id']) ?'selected="selected"':'').'  value="'.$row_2['id'].'">╚═►'.$row_2['tenbaiviet_vi'].'</option> ';
				              	foreach ($chude_arr as $row_3)
						            {	
						            	if($row_3['id_parent'] != $row_2['id']) continue;
						            	if($id_ht == $row_3['id'] && $check_dis_trung == '' && $chude == 'true') $check_dis2 = 'disabled="disabled"';
				            			else $check_dis2 = "";

						              	$select 		   .= '<option '.$check_dis.$check_dis1.$check_dis2.$check_dis_trung.' '.(($val == $row_3['id']) ?'selected="selected"':'').'  value="'.$row_3['id'].'"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╙─►'.$row_3['tenbaiviet_vi'].'</option> ';
						              	foreach ($chude_arr as $row_4) 
								            {	
								            	if($row_4['id_parent'] != $row_3['id']) continue;
								            	if($chude == 'true')
								            		$check_dis3 = 'disabled="disabled"';	
								            	else
								            		$check_dis3 = '';	
										        $select 		   .= '<option '.$check_dis.$check_dis1.$check_dis2.$check_dis3.$check_dis_trung.' '.(($val == $row_4['id']) ?'selected="selected"':'').'  value="'.$row_4['id'].'"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╙─►'.$row_4['tenbaiviet_vi'].'</option> ';

											}
									}
							}
					}
					$select .= '</select>';
				return $select;
			}
		else
			{
				$sql_cap 	= DB_que("SELECT `tenbaiviet_vi` FROM `#_menu` WHERE `id` = ".$val." LIMIT 1");
				return mysql_result($sql_cap, 0, 'tenbaiviet_vi');
			}
	}


	function UPLOAD_image($file, $folder, $newname = ''){ 
		if(isset($_FILES[$file]) && !$_FILES[$file]['error']){
			$ext  = explode('.',$_FILES[$file]['name']);
			$ext  = end($ext);
			$name = basename($_FILES[$file]['name'], '.'.$ext);

			if($_FILES[$file]['type'] == "image/jpeg" || $_FILES[$file]['type'] == "image/png" || $_FILES[$file]['type'] == "image/gif" || $_FILES[$file]['type'] == "image/x-icon" || $_FILES[$file]['type'] == "image/vnd.microsoft.icon" || $_FILES[$file]['type'] == "image/svg" || $_FILES[$file]['type'] == "image/svg+xml")
			{
				$_FILES[$file]['name'] = $newname.'_'.CONVERT_vn($name).'.'.$ext;
				if (!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
					if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
						return false;
					}
				}
				return $_FILES[$file]['name'];
			}
			else return false;	
		}
		return false;
	}


	function UPLOAD_file($file, $folder, $newname = ''){
		if(isset($_FILES[$file]) && !$_FILES[$file]['error']){
			$ext  = explode('.',$_FILES[$file]['name']);
			$ext  = end($ext);
			$name = basename($_FILES[$file]['name'], '.'.$ext);
			if(($_FILES[$file]['type'] == "application/zip" || $_FILES[$file]['type'] == "application/x-rar" || $_FILES[$file]['type'] == "application/pdf" || $_FILES[$file]['type'] == "application/msword" || $_FILES[$file]['type'] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $_FILES[$file]['type'] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $_FILES[$file]['type'] == "application/vnd.ms-excel"  || $_FILES[$file]['type'] == "video/mp4" || $_FILES[$file]['type'] == "image/jpeg" || $_FILES[$file]['type'] == "image/png" || $_FILES[$file]['type'] == "image/gif" || $_FILES[$file]['type'] == "image/x-icon" || $_FILES[$file]['type'] == "image/vnd.microsoft.icon" || $_FILES[$file]['type'] == "image/svg" || $_FILES[$file]['type'] == "image/svg+xml"))
			{
				$_FILES[$file]['name'] = $newname.'_'.CONVERT_vn($name).'.'.$ext;
				if (!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
					if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
						return false;
					}
				}
				return $_FILES[$file]['name'];
			}
			else return false;	
		}
		return false;
	}	
	function TAO_anhthumb($name, $newname, $new_w, $new_h, $anh = '', $by_small=true, $border=false, $transparency=true, $base64=false){

		$thumb_width    = $new_w;
		$thumb_height   = $new_h;

		if(file_exists($newname))
			@unlink($newname);
		if(!file_exists($name))
			return false;
		$arr 	= explode("\.",$name);
		$ext 	= $arr[count($arr)-1];
		if(preg_match('/jpeg/i', $ext))
			{
				$img = @imagecreatefromjpeg($name);
			}
		else if (preg_match('/jpg/i', $ext))
			{
				$img = @imagecreatefromjpeg($name);
			} 
		else if(preg_match('/png/i', $ext))
			{
				$img = @imagecreatefrompng($name);
			} 
		else if(preg_match('/gif/i', $ext)) 
			{
				$img = @imagecreatefromgif($name);
			} 
		else if(preg_match('/bmp/i', $ext)) 
			{
				$img = @imagecreatefrombmp($name);
			}
		if(!@$img)
			return false;

		list( $original_width, $original_height, $type, $attr ) = getimagesize( $name );

		$thumb_ratio    	= $thumb_width / $thumb_height; //1.83
		$original_ratio   	= $original_width / $original_height; //3

		if( $thumb_ratio 	> $original_ratio ) // Anh goc la hinh chu nhat dung
			{
				$thumb_w  	= round( ( $thumb_height * $original_width) / $original_height );
				$thumb_h 	= $thumb_height;
			}
		else if( $thumb_ratio < $original_ratio ) // Anh goc la hinh chu nhat ngang
			{
				$thumb_w  	= $thumb_width;
				$thumb_h 	= round( ( $thumb_width * $original_height ) / $original_width );
			}
		else
			{
				$thumb_w  	= $thumb_width;
				$thumb_h  	= $thumb_height;
			}


		$new_img = ImageCreateTrueColor($thumb_w, $thumb_h);
		if($transparency) 
		{
			if(preg_match('/png/i', $ext)) 
				{
					imagealphablending($new_img, false);
					$colorTransparent = imagecolorallocatealpha($new_img, 0, 0, 0, 127);
					imagefill($new_img, 0, 0, $colorTransparent);
					imagesavealpha($new_img, true);
				} 
			else if(preg_match('/gif/i', $ext)) 
			{
				$trnprt_indx 			= imagecolortransparent($img);
				if ($trnprt_indx 		>= 0) 
					{
						$trnprt_color 	= imagecolorsforindex($img, $trnprt_indx);
						$trnprt_indx 	= imagecolorallocate($new_img, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
						imagefill($new_img, 0, 0, $trnprt_indx);
						imagecolortransparent($new_img, $trnprt_indx);
					}
			}
		} 
		else 
			{
				Imagefill($new_img, 0, 0, imagecolorallocate($new_img, 255, 255, 255));
			}
		@imagecopyresampled($new_img, $img, 0,0,0,0, $thumb_w, $thumb_h, $original_width, $original_height);
	    if($border) 
		    {
		        $black 		= imagecolorallocate($new_img, 0, 0, 0);
		        imagerectangle($new_img,0,0, $thumb_w, $thumb_h, $black);
		    }
	    if($base64) 
		    {
		        ob_start();
		        imagepng($new_img);
		        $img 		= ob_get_contents();
		        ob_end_clean();
		        $return 	= base64_encode($img);
		    } 
		else 
		{
	        if(preg_match('/jpeg/i', $ext)) 
		        {
		                imagejpeg($new_img, $newname);
		            $return = true;
		        } 
	        else if( preg_match('/jpg/i', $ext))
		        {
		            imagejpeg($new_img, $newname);
		            $return = true;
		        } 
	        else if(preg_match('/png/i', $ext))
		        {
		            imagepng($new_img, $newname);
		            $return = true;
		        } 
	        else if(preg_match('/gif/i', $ext)) 
		        {
		            imagegif($new_img, $newname);
		            $return = true;
		        }
	    	else if(preg_match('/bmp/i', $ext)) 
		    	{
		            imagejpeg($new_img, $newname);
		            $return = true;
		        }
	    }
	    imagedestroy($new_img);
	    imagedestroy($img);
	    if($anh != ''){
	    	@watermark2($newname,$anh);	
	    }
	    return $return;
	}
	function watermark2($SourceFile, $anh) { 
		$watermark_root     = $SourceFile; 
		$_image         = $anh;

		$ext_root         = strtolower(substr($watermark_root,-3));

		if($ext_root  =='gif')    $watermark = imagecreatefromgif($watermark_root);  
		elseif($ext_root=='png')    $watermark = imagecreatefrompng($watermark_root);  
		elseif($ext_root=='jpg')    $watermark = imagecreatefromjpeg($watermark_root);  
		elseif($ext_root=='bmp')    $watermark = imagecreatefrombmp($watermark_root);  
		else              $watermark = imagecreatefromjpeg($watermark_root);  

		$watermark_width  = imagesx($watermark);   
		$watermark_height   = imagesy($watermark);   

		$image = imagecreatetruecolor($watermark_width, $watermark_height);  
		$ext = strtolower(substr($_image,-3));
		if($ext=='jpg')   $image = @imagecreatefromjpeg($_image);   
		elseif($ext=='gif') $image = @imagecreatefromgif($_image);   
		elseif($ext=='png') $image = @imagecreatefrompng($_image);    
		elseif($ext=='png') $image = @imagecreatefrombmp($_image);
		else        $image = @imagecreatefromgd($_image);    
		$size = getimagesize($_image);   
		$dest_x = ($size[0] - $watermark_width)/2;   
		$dest_y = ($size[1] - $watermark_height)/2;   

		@imagecopymerge($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, 100);   
		@imagejpeg ($image, $SourceFile, 100);
		@imagedestroy($image);   
		@imagedestroy($watermark);
	}
	function ACTION_db($array,$table,$kieu='add',$array_remove=array(),$condition=NULL){
		if($kieu=='delete')
			{
				$sqldel = DB_que("DELETE FROM `$table` WHERE $condition");
				DEL_redis_table($table);
				return true;
			}
		$bang_db 		= "";
		$bang_value 	= "";
		$soluong 		= count($array);
		foreach($array as $key => $value)
			{
				if($kieu=='add')
					{
						if(@in_array($key, $array_remove)) continue;
						$bang_db		.= "`$key`,";	
						$bang_value		.= "'".$value."',";
					}
				if($kieu=='update')
					{
						if(@in_array($key, $array_remove)) continue;
						$bang_db		.= "`$key`='".$value."',";	
					}	
			}
		$bang_db	 	= substr($bang_db,0,-1);
		$bang_value 	= substr($bang_value,0,-1);

		if($kieu=='add')
			{
				@DB_que("INSERT INTO `$table`($bang_db) VALUES($bang_value)");
				// echo "INSERT INTO `$table`($bang_db) VALUES($bang_value)";
				// exit();
			} 	
		if($kieu=='update')  
			{
				@DB_que("UPDATE `$table` SET $bang_db WHERE $condition"); 
				// echo "UPDATE `$table` SET $bang_db WHERE $condition";
				
			}
		DEL_redis_table($table);
		return mysql_insert_id();
	}
	function CONVERT_vn($str){
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/( )/", '-', $str);
		$str = preg_replace("/%/", 'Phan-Tram', $str);
		$str = preg_replace("@[^A-Za-z0-9./\-_]+@i","",$str); 
		$str = preg_replace("/(--)/", '-', $str);
		$str = preg_replace("/:/", '-', $str);
		$str = str_replace("/",'-',$str);
		return trim($str,"-");
	}	
	function NUMBER_fomat($val){
		return number_format($val,0,'.','.');
	}
	function NUMBER_fomat_vnd($val){
		return number_format($val,0,'.','.'). ' VNĐ';
	}
	function NUMBER_fomat_d($val){
		return number_format($val,0,'.','.'). ' đ';
	}
	function RANDOM_chuoi($val){
		$alphanum  = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$text = substr(str_shuffle($alphanum), 0, $val);
		return $text;
	}
	function LAYTEXT_rieng($id) {
		$seo_name = AOK("*", "#_seo_name", "`showhi` = 1 AND `id` = '$id'", "", 1, "", "where_clear");
		$seo_name = reset($seo_name);
		return $seo_name;
	}
	function ALERT_js($val){
		echo '<script>alert("'.$val.'")</script>';
	}
	function RELOAD_js(){
		echo '<script>window.location.reload()</script>';
	}
	function LOCATION_js($val){
		echo '<script>window.location.href= "'.$val.'"</script>';
	}
	function CONVER_thu($val, $glo_lang){
	    $weekday = strtolower($val);
	    switch($weekday) {
	        case 'monday':
	            $weekday = $glo_lang['thu_hai'];
	            break;
	        case 'tuesday':
	            $weekday = $glo_lang['thu_ba'];
	            break;
	        case 'wednesday':
	            $weekday = $glo_lang['thu_tu'];
	            break;
	        case 'thursday':
	            $weekday = $glo_lang['thu_nam'];
	            break;
	        case 'friday':
	            $weekday = $glo_lang['thu_sau'];
	            break;
	        case 'saturday':
	            $weekday = $glo_lang['thu_bay'];
	            break;
	        default:
	            $weekday = $glo_lang['chu_nhat'];
	            break;
	    }
	    return $weekday;
	}
	function GETNAME_step($step){
		if($step == 0) return "";
		$sql_a = DB_que("SELECT `tenbaiviet_vi` FROM `#_step` WHERE `id`='$step' LIMIT 1");	
		return @mysql_result($sql_a,0,"tenbaiviet_vi");
	}
	function SHOW_text($text){	
		if($_SESSION['sub_demo_check']){
			$text = str_replace($_SESSION['sub_demo'], "", $text);	
		}
		$text = preg_replace("/\[mp4](.*)\[mp4]/i", '<div class="video_id_1">
	      <video width="100%" controls>
	        <source src="$1" type="video/mp4">
	      </video>
	    </div>', $text); 

	    if(defined("MOTTY")) {
	    	$text = preg_replace("/<table(.*?)>/i", '<div class="dv-table-reposive-n"><table$1>', $text); 
	    	$text = preg_replace("/<\/table>/i", '</table></div>', $text); 
	    	$text = preg_replace("/\[check]/i", '<img class="img_tich" src="images/icon-check-pink.png">', $text); 
	    }
	    else {
	    	$text = str_replace('"', '&quot;', $text);
	    }

	    $text = preg_replace("/\[mp3](.*)\[mp3]/i", '<div class="video_id_1">
	      audio controls>
			  <source src="$1" type="audio/mpeg">
			</audio>
	    </div>', $text); 
	    $text = str_replace("<script>", "", $text);
		return stripslashes(trim($text));
	}
	function SHOW_input($text){	
		$text = strip_tags($text);
		return stripslashes(mb_strtolower(htmlspecialchars(urldecode($text))));
	}
	function LAY_selected($val, $val_ss){
		if($val == $val_ss) return 'selected="selected"';
		return "";
	}
	function LAY_checked($val, $val_ss){
		if($val == $val_ss) return 'checked="checked"';
		return "";
	}
	function LAY_uutien($val_1 = '', $val_2 = '', $val_3 = '', $val_4 = '', $val_5 = '', $val_6 = '', $val_7 = ''){
		if($val_1 != '') return $val_1;
		if($val_2 != '') return $val_2;
		if($val_3 != '') return $val_3;
		if($val_4 != '') return $val_4;
		if($val_5 != '') return $val_5;
		if($val_6 != '') return $val_6;
		if($val_7 != '') return $val_7;
	}
	function THEM_seoname($id, $seo_name, $bang, $step, $loai = 0, $i = 0){
		$bang_slug 			= str_replace('#_', "", $bang);
		$seo_name_goc 		= $seo_name 			= trim($seo_name);
		if($seo_name == '') $seo_name = time();

		$id_slug 			= DB_que("SELECT `id` FROM `#_slug` WHERE  `id_bang` = '$id' AND `bang` = '".$bang_slug."' LIMIT 1");
		
		$data 				= array();
		$data['bang'] 		= $bang_slug;
		$data['id_bang'] 	= $id;
		$data['step'] 		= $step;
		$data['slug'] 		= $seo_name.'-'.time();

		if(strstr($seo_name,"http://") != '' || strstr($seo_name,"tel:") != '' || strstr($seo_name,"mailto:") != '' || strstr($seo_name,"https://") != '') {
			$data['slug'] 		= $seo_name_goc;
		}

		if(mysql_num_rows($id_slug)){
			$id_slug 			= mysql_result($id_slug, 0, "id");
			ACTION_db($data, "#_slug", 'update', NULL, "`id` = $id_slug");
		}else{
			$id_slug 			= ACTION_db($data, "#_slug", 'add', NULL);
		}

		$list_seoname 		= DB_fet("*", "`#_slug`", "`slug` = '".$seo_name."'","`id` DESC","", "arr");
		foreach ($list_seoname as $val) {
			if($val['id_bang'] == $id && $val['bang'] == $bang_slug) continue;
			else{
				$seo_name = $seo_name ."-". $id_slug;
				unset($_SESSION['show_message_on']);
				$_SESSION['show_message_off'] = "Seo Name đã tồn tại. Seo Name được thêm tự động!";
				break;
			}
			
		}	

		$data 				= array();
		$data_new 			= array();
		
		$data['step'] 		= $step;

		if(strstr($seo_name,"http://") != '' || strstr($seo_name,"tel:") != '' || strstr($seo_name,"mailto:") != '' || strstr($seo_name,"https://") != '') {
			$data['slug'] 			= $seo_name_goc;
			$data_new['seo_name'] 	= $seo_name_goc;
			unset($_SESSION['show_message_off']);
		}
		else {
			$data['slug'] 			= trim($seo_name);
			$data_new['seo_name'] 	= $seo_name;
		}
		ACTION_db($data, "#_slug", 'update', NULL, "`id` = $id_slug");
		ACTION_db($data_new, $bang, 'update', NULL, "`id` = $id");	
	}
	function DANHSACH_chude_href($idactive, $table, $langone, $step){
		$danhmuc_arr = DB_fet("*","$table","`step` = '$step'  "," `catasort` ASC", "", "arr");

		$box    = "<select class='form-control cls_chude' onchange='SEARCH_jsstep()'>";
		$box   .= "<option value='0' ".($idactive == 0 ? "selected='selected'" : "").">$langone</option>";
		foreach ($danhmuc_arr as $rows) 
			{
				if($rows['id_parent'] != 0) continue;
				$cataname 		= $rows['tenbaiviet_vi'];
				$cataid			= $rows['id'];
				$box   		   .= "<option value='".$cataid."' ".($cataid == $idactive ? "selected='selected'" : "").">$cataname</option>";
				foreach ($danhmuc_arr as $rows2) 						
				{
					if($rows2['id_parent'] != $cataid) continue;

					$cataname2 	= $rows2['tenbaiviet_vi'];
					$cataid2	= $rows2['id'];
					$box   	   .= "<option value='".$cataid2."' ".($cataid2 == $idactive ? "selected='selected'" : "").">╙─►$cataname2</option>";
					foreach ($danhmuc_arr as $rows3) 						
					{
						if($rows3['id_parent'] != $cataid2) continue;
						$cataname3 	= $rows3['tenbaiviet_vi'];
						$cataid3	= $rows3['id'];
						$box   	   .= "<option value='".$cataid3."' ".($cataid3 == $idactive ? "selected='selected'" : "").">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╙─►$cataname3</option>";
						foreach ($danhmuc_arr as $rows4) 						
						{
							if($rows4['id_parent'] != $cataid3) continue;

							$cataname4 		= $rows4['tenbaiviet_vi'];
							$cataid4		= $rows4['id'];
							$box   	       .= "<option value='".$cataid4."' ".($cataid4 == $idactive ? "selected='selected'" : "").">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╙─►$cataname4</option>";
						}
					}
				}
			
		}
		$box .= "</select>";
		return $box;
	}
	function LAY_tieude_kietxuat($id, $table){
		$sql = DB_que("SELECT `tenbaiviet_vi` FROM `$table` WHERE `id`='$id' LIMIT 1");
		return @mysql_result($sql,0,"tenbaiviet_vi");
	}
	function ONLINE_user($timeroff = 360, $sidd){

		$ipadd 			= @getenv(REMOTE_ADDR);
		$baygio 		= time();

		$sql_del 	= DB_que("DELETE FROM `#_online` where `timer` + $timeroff < $baygio");
		$sql_tim 		= DB_que("SELECT `uip`, `sidd` FROM `#_online` where uip='$ipadd' and sidd='$sidd'");
		$cohaykhong 	= @mysql_fetch_assoc($sql_tim);
		if($cohaykhong) {
			$sql_upd 	= DB_que("UPDATE FROM `#_online` SET `timer` = '$baygio' where `uip` = '$ipadd'");
		}
		else {
			$sql_them 	= DB_que("INSERT INTO `#_online` (`uip`, `sidd`, `timer`) values ('$ipadd','$sidd','$baygio')");
			$sql_counter 	= DB_que("UPDATE `#_counter` SET `coonter` = `coonter` + 1");

			$sql_timngay    = DB_que("SELECT `id` FROM `#_count_date` WHERE `day` = '".date("j")."' AND `month` = '".date("n")."' AND `year` = '".date("Y")."'");
	        $cokhong        = @mysql_fetch_array($sql_timngay);
	        if($cokhong) {
	        	$sql_ngay 	= DB_que("UPDATE `#_count_date` SET `count` = `count`+1 WHERE `day` = '".date("j")."' AND `month` = '".date("n")."' AND `year` = '".date("Y")."'");
	        }
	        else  {
	        	$sql_ngay_in = DB_que("INSERT INTO `#_count_date` (day,month,year,count) VALUES(".date("j").",".date("n").",".date("Y").",1)");
	        }	        
		}
		$sql_show 			= DB_que("SELECT count(*) AS tongso FROM `#_online`");
		$sho 				= @mysql_fetch_assoc($sql_show);
		$sql_show 			= @AOK("count(*) AS tongso", "#_online","","","","","where_clear");
		return $sho['tongso'];
	}
	function THONGKE_online() {
		$sql = DB_que("SELECT SUM(`count`) AS `counter` FROM `#_count_date`");
		$sho = @mysql_fetch_assoc($sql);
		// $sql_show = AOK("SUM(`count`) AS `counter`", "#_count_date","","","","","where_clear");
		return $sho['counter'];
	}
	function create_pass($pass,$key){
		return strtoupper(md5($pass.md5($key)).sha1($key.sha1($pass)));
	}
	function LAYDANHSACH_idkietxuat($id, $slug_step = ''){
		if($slug_step != ''){
			$slug_step  = " AND `step` IN ($slug_step)";
		}
		$kietxuat 	= DB_fet_rd("*", "#_danhmuc", "1 = 1  $slug_step ","`catasort` ASC");
		$ds_id 		= $id.",";

		foreach ($kietxuat as $r_1) 
			{
				if($r_1['id_parent'] != $id) continue;
				$ds_id 		.= $r_1['id'].",";
				foreach ($kietxuat as $r_2) 
					{
						if($r_2['id_parent'] != $r_1['id']) continue;
						$ds_id 		.= $r_2['id'].",";
						foreach ($kietxuat as $r_3) 
							{
								if($r_3['id_parent'] != $r_2['id']) continue;
								$ds_id 		.= $r_3['id'].",";
								foreach ($kietxuat as $r_4) 
									{
										if($r_4['id_parent'] != $r_3['id']) continue;
										$ds_id 	.= $r_4['id'].",";
									}
							}
					}
			}
		return trim($ds_id,",");
	}
	function PHANTRANG_v1($current, $total_row, $url, $uri = '')
		{
			$url 	 = trim($url, "/"); 
			if($uri != ''){
				parse_str($uri, $get_array);
				$uri_test = "";
				foreach ($get_array as $key => $value) {
					if($key != "page"){
						$uri_test .= "&".$key."=".$value;
					}
				}
				if($uri_test != ''){
					$url =  $url."/?".trim($uri_test,"&")."&page=";
				}else{
					$url = $url."/?page=";
				}
			}
			else $url = $url."/?page=";

			$div 				= 5;
			$row_per_page 		= 1;
			if(empty($current)) 
				$current 		= 1;

			$npage 				= floor($total_row/$row_per_page) + (($total_row%$row_per_page)?1:0);
			$nDiv 				= floor($npage/$div) + (($npage%$div)?1:0);
			$currentDiv 		= floor($current/$div) ;
			$count 				= ($npage<=($currentDiv+1)*$div)?($npage-$currentDiv*$div):$div;
			$str_paging 		= '';

			if($npage > 0)
				{	
				   	$npage						= intval($total_row / $row_per_page);

				   	if($total_row % $row_per_page >0) 
				   		$npage 					+= 1;
					if ($npage 					> 1)
						{	
							// if ($current 		!= 1)
							// {	
							// 	if (($current 	!= 1) && ($current))
							// 		{
							// 			$str_paging .= ' <li class="page db_left_pt"><a class="stay" href = "'.$url.'1'.'"><i class="fa fa-chevron-left"></i></a></li>';
							// 			echo 1;	
							// 		}
							// 	if (($current-1) > 0)
							// 		{
							// 			$str_paging .= ' <li class="page"><a class="stay" href = "'.$url.($current - 1).'"><i class="fa fa-chevron-left"></i></a></li>';	
							// 			echo 2;
							// 		}

							// } 

							if($current % $div 			== 0) 
								{
									$str_paging			.= ' <li class="page"><a class="active pagination a" href = "'.$url.($current).'">'.$current.'</a></li>';
								}

							for($i =0 ; $i < $count; $i++)		
								{
									$page 				= ($currentDiv*$div + $i);
									if(($page + 1) 		== $current)
										$str_paging		.= ' <li class="page"><a class="active pagination" href = "'.$url.($current).'">'.($page + 1);
									else
										$str_paging		.= ' <li class="page"><a class="pagination" href = "'.$url.($page + 1).'">'.($page + 1);		
									$str_paging			.='</a></li>';
								}
							// 
							$str_paging .= "<div class='gr-r'>";
							if ($current 	== 1) {
								$str_paging .= ' <li class="page"><a class="stay" href = "'.$url.'1'.'"><i class="fa fa-chevron-left"></i></a></li>';	
							}
							else {
								if (($current 	!= 1) && ($current))
									{
										$str_paging .= ' <li class="page db_left_pt"><a class="stay" href = "'.$url.'1'.'"><i class="fa fa-chevron-left"></i></a></li>';
									}
								if (($current-1) > 0)
									{
										$str_paging .= ' <li class="page"><a class="stay" href = "'.$url.($current - 1).'"><i class="fa fa-chevron-left"></i></a></li>';	
									}
							}
							// 
							if ((@$page + 1) >= $count)
								{
									if (($current+1) <= $npage)
										{
											$str_paging .= '<li class="page"><a class=" stay" href = "'.$url.($current +1).'"><i class="fa fa-chevron-right"></i></a></li>';
										}
									else if (($current != $npage) && ($npage != 0))
										{
											$str_paging .= '<li class="page db_right_pt"><a class=" stay" href = "'.$url.$npage.'"><i class="fa fa-chevron-double-right"></i></a></li>';	
										}
									else {
										$str_paging .= '<li class="page"><a class=" stay" href = "'.$url.($page + 1).'"><i class="fa fa-chevron-right"></i></a></li>';
									}
								}
							$str_paging .= "</div>";
						}
					return $str_paging;
				}
		}
	function PHANTRANG($current, $total_row, $url, $uri = ''){
		$url 	 = trim($url, "/"); 
		if($uri != ''){
			parse_str($uri, $get_array);
			$uri_test = "";
			foreach ($get_array as $key => $value) {
				if($key != "page"){
					$uri_test .= "&".$key."=".$value;
				}
			}
			if($uri_test != ''){
				$url =  $url."/?".trim($uri_test,"&")."&page=";
			}else{
				$url = $url."/?page=";
			}
		}
		else $url = $url."/?page=";

		$div 				= 5;
		$row_per_page 		= 1;
		if(empty($current)) 
			$current 		= 1;

		$npage 				= floor($total_row/$row_per_page) + (($total_row%$row_per_page)?1:0);
		$nDiv 				= floor($npage/$div) + (($npage%$div)?1:0);
		$currentDiv 		= floor($current/$div) ;
		$count 				= ($npage<=($currentDiv+1)*$div)?($npage-$currentDiv*$div):$div;
		$str_paging 		= '';

		if($npage > 0)
			{	
			   	$npage						= intval($total_row / $row_per_page);

			   	if($total_row % $row_per_page >0) 
			   		$npage 					+= 1;
				if ($npage 					> 1)
					{	
						if ($current 		!= 1)
						{	
							if (($current 	!= 1) && ($current))
								{
									$str_paging .= ' <li class="page db_left_pt"><a class="stay" href = "'.$url.'1'.'"><i class="fa fa-angle-double-left"></i></a></li>';	
								}
							if (($current-1) > 0)
								{
									$str_paging .= ' <li class="page"><a class="stay" href = "'.$url.($current - 1).'"><i class="fa fa-angle-left"></i></a></li>';	
								}

						}

						if($current % $div 			== 0) 
							{
								$str_paging			.= ' <li class="page"><a class="active pagination a" href = "'.$url.($current).'">'.$current.'</a></li>';
							}

						for($i =0 ; $i < $count; $i++)		
							{
								$page 				= ($currentDiv*$div + $i);
								if(($page + 1) 		== $current)
									$str_paging		.= ' <li class="page"><a class="active pagination" href = "'.$url.($current).'">'.($page + 1);
								else
									$str_paging		.= ' <li class="page"><a class="pagination" href = "'.$url.($page + 1).'">'.($page + 1);		
								$str_paging			.='</a></li>';
							}

						if ((@$page + 1) >= $count)
							{
								if (($current+1) <= $npage)
									{
										$str_paging .= '<li class="page"><a class=" stay" href = "'.$url.($current +1).'"><i class="fa fa-angle-right"></i></a></li>';
									}
								if (($current != $npage) && ($npage != 0))
									{
										$str_paging .= '<li class="page db_right_pt"><a class=" stay" href = "'.$url.$npage.'"><i class="fa fa-angle-double-right"></i></a></li>';	
									}
							}
					}
				return $str_paging != "" ? '<ul>'.$str_paging.'</ul>' : $str_paging;
			}
	}
	function PHANTRANG_findPages($count, $limit){
		$pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;
		return $pages;
	}

	function PHANTRANG_start($page, $limit){
		if (empty($page) || $page == "1")
			{
				$start = 0;
				$page = 1;
			}
		else
			{
				$start = ($page-1) * $limit;
			}
		return $start;
	}
	function LAY_email($type){
		$list_email 	= '';
		$sql 			= DB_que("SELECT * FROM `#_email_config` WHERE  `showhi` = 1");	
		while($rim 		= mysql_fetch_array($sql))
			{
				if(empty($list_email)) 
						$list_email 	= $rim['email'];
				else 	$list_email 	.= ';'.$rim['email'];
			}
			return $list_email;
	}

	function GUI_email($to_email,$to_name,$subject,$domain,$body, $thongtin, $admin = ""){         
		require_once('class.phpmailer.php');

	    $body             = @eregi_replace("[\]",'',$body);
	    $mail 			  = new PHPMailer();
	    $mail->IsSMTP();
	    $mail->Host       = 'smtp.gmail.com';
	    $mail->Port = 587;
	    $mail->SMTPDebug  = 0;  
	    $mail->SMTPAuth   = true;  
	    $mail->CharSet     = "utf-8";
	    $mail->Username   = "doanminhhieuck@gmail.com"; 
	    $mail->Password   = "Hieu@#143294";
	    $frommail         = "contact.cuibakery@gmail.com";
	    $mail->SetFrom($frommail, $domain);
	    $subject          = $subject . " - " .date("H:i A | d/m/Y") ;
	    $mail->Subject    = $subject;
	    $mail->AltBody    = $body; 
	    $mail->MsgHTML($body);
	    $get_name   = explode(";",$to_name);
	    $get_email  = explode(";",$to_email);
	    $soluongmail = count($get_email);
	    for($in=0;$in<$soluongmail;$in++)
	        {
	        	if(!empty($get_name[$in]))
	            	{
	            		$get_name_in = @$get_name[$in];
	            	}
	        	else 	$get_name_in = @$get_name[0];
	            if($in==0) { if(is_email(trim($get_email[$in]))) $mail->AddAddress(trim($get_email[$in]),$get_name_in); }
	            else       { if(is_email(trim($get_email[$in]))) $mail->AddBCC(trim($get_email[$in]),$get_name_in); }
	        }
	    $mail->WordWrap   = 50;
	    $mail->IsHTML(true);
	    if(!$mail->Send())
	        return 0;
	    else
	        return 1;
	}
	function is_email($email) {
	  if(eregi("^[a-z0-9\._-]+@+[a-z0-9\._-]+\.+[a-z]{2,3}$", $email)) return TRUE;
	  else return FALSE;
	}
	function GET_link($url, $link){
		if(strstr($link,"http://") != '' || strstr($link,"tel:") != '' || strstr($link,"mailto:") != '') return $link;
		else if(strstr($link,"https://") != '') return $link;
		else {
			return $link == "" ? $url : $url."/".trim($link,"/");
		}
	}
	function layHinhCon($id){
		$danhsach_img = DB_que("SELECT * FROM `#_baiviet_img` WHERE `id_parent` = '".$id."' ORDER BY `sort` ASC, `id` ASC");
		return $danhsach_img;
	}
	function layIdUser($email){
		$sql = DB_que("SELECT `id` FROM `#_members` WHERE `showhi` = 1 AND `phanquyen` = 0 AND `email` = '".$email."' LIMIT 1");
		return @mysql_result($sql, 0, 'id');
	}
	function laySeoName($id = 'seo_name', $table, $where = ''){
		$sql = DB_que("SELECT `$id` FROM `$table` WHERE ".$where." LIMIT 1");
	    return mysql_result($sql, 0, $id);
	}
	function checkImage($fullpath, $icon, $duongdantin, $thumb = ''){
		if($icon != '')
			$link_img = $fullpath."/".$duongdantin."/".$thumb.$icon;
		else
			$link_img = $fullpath."/myadmin/images/no_image_400_312.jpg";
		return $link_img;
	}
	function layCatasort($table, $where = '1'){
		$sql 	= DB_que("SELECT `catasort` FROM `$table` WHERE ".$where." ORDER BY `catasort` DESC LIMIT 1");
		$catasort = @mysql_result($sql, 0, 'catasort') + 1; 
		return $catasort;
	}

	function getTypeTitle($step) {
		if($step == 2 || $step == 3) $title_l = 'sản phẩm';
        else $title_l = 'bài viết';
        // $title_l = 'album ảnh';
        // $title_l = 'video';
        return $title_l;
	}

    function so_luong_theo_dmy($day,$month,$year) {
    	$check = DB_que("SELECT `id` FROM `#_count_date` WHERE `day` = '$day' AND `month` = '$month' AND `year` = '$year' ");
    	if(mysql_num_rows($check) > 0)
    	{
        	$sql = "SELECT SUM(count) AS `so_nguoi` FROM `#_count_date` WHERE `day` = '$day' AND `month` = '$month' AND `year` = '$year' ";
        	$sql_a = DB_que($sql);
            return @mysql_result($sql_a,0,"so_nguoi");
        }else
        	return 0;
    }
 
    function layEmailUser($id) {
		$sql = DB_que("SELECT `email` FROM `#_members` WHERE `id` = '".$id."' LIMIT 1");
		return mysql_result($sql, 0, 'email');
	}
	function PHANTRANG_ajax($current, $total_row, $list_check = ''){

		$div 				= 5;
		$row_per_page 		= 1;
		if(empty($current)) 
			$current 		= 1;

		$npage 				= floor($total_row/$row_per_page) + (($total_row%$row_per_page)?1:0);
		$nDiv 				= floor($npage/$div) + (($npage%$div)?1:0);
		$currentDiv 		= floor($current/$div) ;
		$count 				= ($npage<=($currentDiv+1)*$div)?($npage-$currentDiv*$div):$div;
		$str_paging 		= '';


		$npage 				= floor($total_row/$row_per_page) + (($total_row%$row_per_page)?1:0);
		$nDiv 				= floor($npage/$div) + (($npage%$div)?1:0);
		$currentDiv 		= floor($current/$div) ;
		$count 				= ($npage<=($currentDiv+1)*$div)?($npage-$currentDiv*$div):$div;
		$str_paging 		= '';
		if($npage > 0)
			{	
			   	$npage						= intval($total_row / $row_per_page);
 
			   	if($total_row % $row_per_page >0) 
			   		$npage 					+= 1;
				if ($npage 					> 1)
					{	
						if ($current 		!= 1)
						{	
							if (($current 	!= 1) && ($current))
								{
									$str_paging .= ' <li class="page db_left_pt"><a class="stay" onclick="LOAD_sp_ajax(\'1\', \''.$list_check.'\')"><<</a></li>';	
								}
							if (($current-1) > 0)
								{
									$str_paging .= ' <li class="page"><a class="stay" onclick="LOAD_sp_ajax(\''.($current - 1).'\', \''.$list_check.'\')" ><</a></li>';	
								}
						}

						if($current % $div 			== 0) 
							{
								$str_paging			.= ' <li class="page"><a class="active pagination a"  onclick="LOAD_sp_ajax(\''.($current).'\', \''.$list_check.'\')" >'.$current.'</a></li>';
							}

						for($i =0 ; $i < $count; $i++)		
							{
								$page 				= ($currentDiv*$div + $i);
								if(($page + 1) 		== $current)
									$str_paging		.= ' <li class="page"><a class="active pagination"  onclick="LOAD_sp_ajax(\''.($current - 1).'\', \''.$list_check.'\')" >'.($page + 1);
								else
									$str_paging		.= ' <li class="page"><a class="pagination"  onclick="LOAD_sp_ajax(\''.($page + 1).'\', \''.$list_check.'\')" >'.($page + 1);		
								$str_paging			.='</a></li>';
							}

						if ((@$page + 1) >= $count)
							{
								if (($current+1) <= $npage)
									{
										$str_paging .= '<li class="page"><a class=" stay" onclick="LOAD_sp_ajax(\''.($current + 1).'\', \''.$list_check.'\')">></a></li>';
									}
								if (($current != $npage) && ($npage != 0))
									{
										$str_paging .= '<li class="page db_right_pt"><a class=" stay"  onclick="LOAD_sp_ajax(\''.($page).'\', \''.$list_check.'\')">>></a></li>';	
									}
							}

					}
				return $str_paging;
			}
	}

	function PHANTRANG_admin($numshow, $url_page, $pz, $uri = ""){
		if($numshow > 1)
            {
				$trangxem 		= $url_page;
				$pmin 			= $pz-1;
				$pmax 			= $pz+1;
				$gioihancuanum 	= 5;
				if($pz-$gioihancuanum>0) 
					$batdau 	= $pz-$gioihancuanum;
				else $batdau 	= 0;

				if($pz+$gioihancuanum < $numshow && $batdau + 10 < $numshow) 
					$ketthuc 	= $batdau + 10;
				else 
					$ketthuc 	= $numshow;

				if($pz == 0) 
					echo "<li class='paginate_button previous disabled'><a> &laquo; </a></li>";
				else 
					echo "<li class='paginate_button previous'><a href='$trangxem&pz=$pmin".$uri."'> &laquo; </a></li>";

				for($i 		= $batdau; $i < $ketthuc; $i++)
				{
					$k 		= $i+1;
					if($i 	== $pz) 
						echo "<li class='paginate_button active' ><a href='$trangxem&pz=$i".$uri."'> $k </a></li>";
					else 
						echo "<li class='paginate_button' ><a href='$trangxem&pz=$i".$uri."'> $k </a></li>";
				}
				if($pz >= $numshow-1) 
					echo "<li class='paginate_button next disabled'><a> &raquo; </a></li>";
				else 
					echo "<li class='paginate_button next'><a href='$trangxem&pz=$pmax".$uri."'> &raquo; </a></li>";
            }
	}

	function GET_bre($id, $step, $full_url, $lang, $thongtin_step, $slug_table, $line = '/'){
		$line = '<span>'.$line.'</span>';
		$the_bg  	= "";
		$the_end  	= "";
		$list_kietxuat = "";
		$list_kietxuat_ch = $the_bg.$line.'<a href="'.GET_link($full_url, $thongtin_step['seo_name']).'">'.SHOW_text($thongtin_step['tenbaiviet_'.$lang]).'</a>'.$the_end;

		if($slug_table != 'step'){
			$kietxuat = DB_fet_rd("*", "#_danhmuc", "`step` = '$step'  ","`catasort` ASC");

			foreach ($kietxuat as $val) {
				if($val['id'] != $id) continue;
				$list_kietxuat = $the_bg.$line.'<a href="'.GET_link($full_url, $val['seo_name']).'">'.SHOW_text($val['tenbaiviet_'.$lang]).'</a>'.$the_end;
				foreach ($kietxuat as $val_1) {
					if($val_1['id'] != $val['id_parent']) continue;
					$list_kietxuat = $the_bg.$line.'<a href="'.GET_link($full_url, $val_1['seo_name']).'">'.SHOW_text($val_1['tenbaiviet_'.$lang]).'</a>'.$the_end.$list_kietxuat;
					foreach ($kietxuat as $val_2) {
						if($val_2['id'] != $val_1['id_parent']) continue;
						$list_kietxuat = $the_bg.$line.'<a href="'.GET_link($full_url, $val_2['seo_name']).'">'.SHOW_text($val_2['tenbaiviet_'.$lang]).'</a>'.$the_end.$list_kietxuat;
						foreach ($kietxuat as $val_3) {
							if($val_3['id'] != $val_2['id_parent']) continue;
							$list_kietxuat = $the_bg.$line.'<a href="'.GET_link($full_url, $val_3['seo_name']).'">'.SHOW_text($val_3['tenbaiviet_'.$lang]).'</a>'.$the_end.$list_kietxuat;

						}

					}

				}
			}
		}
		return $list_kietxuat_ch.$list_kietxuat;
	}
	function GET_ip(){  
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
		    $ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	function SHOW_menu_left($glo_quyen, $action, $id)
	{
		$action 		 = $action != "" ? $action : $id;
		$xem 			 = 1;
		if($glo_quyen   != 1){
			$xem = !empty($glo_quyen[$action]['menu']) ? $glo_quyen[$action]['menu'] : 0;
		}
		if($xem == 1) return true;
		return false;
	}
	function GET_danhsachquyen()
	{
        $list_mang  = DB_que("SELECT * FROM `#_module_nhomtaikhoan` WHERE `showhi` = 1 ORDER BY `id` ASC");
        if($_SESSION['phanquyen'] == 1){
        	$list_array[1] = array('id' => 1, 'ten_vi' => "Administrtor");	
        }

        while ($r   = mysql_fetch_assoc($list_mang)) {
        	$list_array[$r['id']] = array('id' => $r['id'], 'ten_vi' => $r['ten_vi']);
        }
        return $list_array;
	}
	function LEFT_mainmenu_new(){
		$wh 		= "";
		if(!CHECK_key_setting('lien-he-nhom-con'))
			$wh 	= " AND `step` <> 5 ";

		$sql        = DB_que("SELECT * FROM `#_step` WHERE `showhi` = 1 $wh ORDER BY `catasort` ASC ");
		$arr 		= array();
	    while($rows = mysql_fetch_array($sql))
	      	{

		        $id_step       	 = $rows['step'];
		        if($id_step 	 == 2)
		          $name_s   	 = "sản phẩm";
		        else if($id_step == 6)
		          $name_s   	 = "hình ảnh";
		      	else if($id_step == 8)
		          $name_s   	 = "video";
		      	else if($id_step == 9)
		          $name_s   	 = "phòng";
		        else
		          $name_s     	 = "bài viết";

		        $arr[] 			 = array(
										"step" 		    => $rows['id'],
										"id_step" 		=> $rows['step'],
										"id" 		    => $rows['id'],
										"cataname" 	    => $rows['tenbaiviet_vi'],
										"name" 			=> $name_s
										);
		    }
		return $arr;
	}

	function CHECK_key_setting($key){
		$check = DB_que("SELECT `id` FROM `#_module_setting` WHERE `ten_key` = '$key' AND `is_check` = 1 LIMIT 1");
		return mysql_num_rows($check);
	}


	function GET_ID_youtube($url){
		preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
    	return $matches[1];
	}
	function COPPY_row($table, $id, $step = 0){
		$list_data  	= DB_fet("*", $table, "`id` = '$id'");
		$id_bv = $id;

		$list_data  = mysql_fetch_assoc($list_data);
		$data 		= array();
		$seo_name   = "";
		$table_rl   = str_replace("#_", "", $table);
		foreach ($list_data as $key => $value) {
			if($key == "icon"){
				$data[$key] = "";
			}
			else if($key == "seo_name" && ($table_rl == "baiviet" || $table_rl == "danhmuc")){
				if(strstr($value,"http://") != '' || strstr($value,"tel:") != '' || strstr($value,"mailto:") != '' || strstr($value,"https://") != '') {
					$seo_name   = $value;
					$data[$key] = $seo_name;
				}
				else {
					$value 		= @explode("-cp-", $value);
					$value 		= @$value[0];
					$seo_name   = $value.'-cp-'.RAND(11111,99999).time();
					$data[$key] = $seo_name;
				}
			}
			else if($key == "tenbaiviet_vi"){
				$seo_name   = $value;
				$data[$key] = $seo_name;
			}
			else if($key == "catasort"){
				$catasort   = $value+1;
				$data[$key] = $catasort;
			}
			else if($key != "id" && $value != ""){
				$value 		= stripslashes($value);
				$value 		= addslashes($value);
				$data[$key] = $value;
			} 
		}
 
		ACTION_db($data, $table, "add", NULL);
		$id = mysql_insert_id();
		if($step){
			THEM_seoname($id, $seo_name, $table, $step, "0");	
		}
		//coppy tinh nawng
		$table = str_replace("#_", "", $table);
		$list_data_tn  	= DB_que("SELECT * FROM `#_baiviet_select_tinhnang` WHERE `id_baiviet` = '$id_bv'");
		if($table == "baiviet") {
			while ($rs  = mysql_fetch_assoc($list_data_tn)) {
				$data  = array();
				// print_r($rs);
				foreach ($rs as $key => $value) {
					if($key == "id_baiviet")
					{
						$data[$key] = $id;
					}
					else if($key != "id"){
						$value 		= stripslashes($value);
						$value 		= addslashes($value);
						$data[$key] = $value;
					} 
				}

				ACTION_db($data, "#_baiviet_select_tinhnang", "add", NULL);
			}

			
		}
		//
		
	}
	function SHOW_key($key){
		$$key = trim($key);
		$key  = strip_tags($key);
		$key  = SHOW_text($key);
		return $key;
	}
	function SHOW_mxh($wh = "")
	{
		$mxh_arr = DB_fet_rd("*", "#_mangxahoi", "$wh","`catasort` DESC");
		return $mxh_arr;
	}
	function DB_que($str, $table = ""){
		$str = str_replace("#_", "lh_", $str);
		// echo $str;
		$return = mysql_query($str);
		DEL_redis_table($table);
		return $return;
	}
	function DB_fet_new($sql, $table, $where 	= "", $order_by = "", $limit = "", $arr = "", $loai = "", $sql_return = ""){
		if($where 		!= "") $where 		= "WHERE $where ";
		if($order_by 	!= "") $order_by 	= "ORDER BY $order_by ";
		if($limit 		!= "") $limit 		= "LIMIT $limit ";
		$str 			= "SELECT $sql FROM $table $where $order_by $limit";
		// echo $str;
		if($sql_return != "") echo $str;

		$sql_que 		= DB_que($str);
		if($arr 		== "") return $sql_que;
		else{
			$retuen_arr = array();
			while ($r   = mysql_fetch_assoc($sql_que)) {
				if($loai == "") 
					$retuen_arr[] = $r;
				else 
					$retuen_arr[$r[$loai]] = $r;
			}
			return $retuen_arr;
		}
	}
	function DB_fet($sql, $table, $where 	= "", $order_by = "", $limit = "", $arr = "", $loai = 0, $sql_return = ""){
		if($where 		!= "") $where 		= "WHERE $where ";
		if($order_by 	!= "") $order_by 	= "ORDER BY $order_by ";
		if($limit 		!= "") $limit 		= "LIMIT $limit ";
		$str 			= "SELECT $sql FROM $table $where $order_by $limit";
		// echo $str;
		if($sql_return != "") echo $str;

		$sql_que 		= DB_que($str);
		if($arr 		== "") return $sql_que;
		else{
			$retuen_arr = array();
			while ($r   = mysql_fetch_assoc($sql_que)) {
				if($loai == 0) 
					$retuen_arr[] = $r;
				else 
					$retuen_arr[$r['id']] = $r;
			}
			return $retuen_arr;
		}
	}
	function DB_arr($sql, $col = ""){
		$sql_que 		= DB_que($sql);
		
		$retuen_arr = array();
		while ($r   = mysql_fetch_assoc($sql_que)) {
			if($col == "") 
				$retuen_arr[] = $r;
			else 
				$retuen_arr[$r[$col]] = $r;
		}
		return $retuen_arr;
	}
	

	function MENU_return_link($class_a, $tb_menu, $tb_step, $tb_danhmuc, $id_menu, $img_1 = "", $img_2 = ""){
		global $full_url, $lang;
		$target 	= $tb_menu[$id_menu]['cua_so_moi'] == 1 ? "target='_blank'" : '';
		if($tb_menu[$id_menu]['kieu_chon']  == 0) {
			return '<a class="'.$class_a.' active_mn_01" href="'.GET_link($full_url, SHOW_text($tb_menu[$id_menu]['seo_name'])).'" icons="&rsaquo;" '.$target.'>'.$img_1.$img_2.$tb_menu[$id_menu]['tenbaiviet_'.$lang].'</a>';
		}
		else{
			if($tb_menu[$id_menu]['step'] > 0){
				if($tb_menu[$id_menu]['danhmuc'] != 0){
					return '<a class="'.$class_a.' active_mn_'.$tb_menu[$id_menu]['step'].'" href="'.GET_link($full_url, SHOW_text($tb_danhmuc[$tb_menu[$id_menu]['danhmuc']]['seo_name'])).'" icons="&rsaquo;" '.$target.'>'.$img_1.$img_2.SHOW_text($tb_menu[$id_menu]['tenbaiviet_'.$lang]).'</a>';
				}else{
					return '<a class="'.$class_a.' active_mn_'.$tb_menu[$id_menu]['step'].'" href="'.GET_link($full_url, SHOW_text($tb_step[$tb_menu[$id_menu]['step']]['seo_name'])).'" icons="&rsaquo;" '.$target.'>'.$img_1.$img_2.SHOW_text($tb_menu[$id_menu]['tenbaiviet_'.$lang]).'</a>';
				}
				
			}
		}
		return '<a class="'.$class_a.' active_mn_0" href="'.GET_link($full_url, SHOW_text($tb_menu[$id_menu]['seo_name'])).'" icons="&rsaquo;" '.$target.'>'.$img_1.$img_2.SHOW_text($tb_menu[$id_menu]['tenbaiviet_'.$lang]).'</a>';

	}


function check_chon_module_danhmuc($row, $class_ul, $class_li, $class_a, $tb_danhmuc){
    global $full_url, $lang;
    if($row['step'] != 0) { 
      if($row['kieu_hien_thi'] == 2) { //baiviet
        // show list bv
        $tb_listbv  = DB_fet_rd("*", "#_baiviet", "step = '".$row['step']."'", "catasort DESC, id DESC", "","id");
      
        $return     = "";
        foreach ($tb_listbv as $val) {
          $return    .= '<li class="'.$class_li.'"><a class="'.$class_a.'" href="'.GET_link($full_url, $val['seo_name']).'" icons="&rsaquo;">'.$val['tenbaiviet_'.$lang].'</a></li>';
        }
        return $return != "" ? "<ul class='".$class_ul."'>".$return."</ul>" : $return;
        // end 
      }
      else if($row['kieu_hien_thi'] == 3){ //danh muc

        // show danh muc ra
        $list_dm_sel  = "";
        // $tb_danhmuc   = LAY_danhmuc($tb_danhmuc)
        foreach ($tb_danhmuc as $dmuc) {
          if($dmuc['step']     != $row['step'])   continue; // khac step
          if($dmuc['id_parent']   != 0)  continue; // khac dm cha

          $list_dm_sel .= '<li 11 1 class="is_step_'.$dmuc['step'].' '.$class_li.' hide_'.$dmuc['id'].'" ><a class="'.$class_a.'" href="'.GET_link($full_url, $dmuc['seo_name']).'" icons="&rsaquo;" dataid="'.$dmuc['id'].'">'.$dmuc['tenbaiviet_'.$lang].'</a>';

          //cap 2
          $list_dm_sel_2 = "";
          foreach ($tb_danhmuc as $dmuc_2) {
            if($dmuc_2['id_parent'] != $dmuc['id'])  continue; // khac dm con

            $list_dm_sel_2 .= '<li class="'.$class_li.' "><a class="'.$class_a.'" href="'.GET_link($full_url, $dmuc_2['seo_name']).'" icons="&rsaquo;">'.$dmuc_2['tenbaiviet_'.$lang].'</a>';
            //cap 3
            $list_dm_sel_3 = "";
            foreach ($tb_danhmuc as $dmuc_3) {
              if($dmuc_3['id_parent'] != $dmuc_2['id'])  continue; // khac dm con

              $list_dm_sel_3 .= '<li class="'.$class_li.' "><a class="'.$class_a.'" href="'.GET_link($full_url, $dmuc_3['seo_name']).'" icons="&rsaquo;">'.$dmuc_3['tenbaiviet_'.$lang].'</a>';
              //cap 4
              $list_dm_sel_4 = "";
              foreach ($tb_danhmuc as $dmuc_4) {
                if($dmuc_4['id_parent'] != $dmuc_3['id'])  continue; // khac dm con

                $list_dm_sel_4 .= '<li class="'.$class_li.' "><a class="'.$class_a.'" href="'.GET_link($full_url, $dmuc_4['seo_name']).'" icons="&rsaquo;">'.$dmuc_4['tenbaiviet_'.$lang].'</a></li>';
              }
              // end cap 4
              $list_dm_sel_4 = $list_dm_sel_4 != "" ? "<ul class='".$class_ul."'>".$list_dm_sel_4."</ul>" : $list_dm_sel_4;
              $list_dm_sel_3 .= $list_dm_sel_4.'</li>';
            }
            // end cap 3
            $list_dm_sel_3 = $list_dm_sel_3 != "" ? "<ul class='".$class_ul."'>".$list_dm_sel_3."</ul>" : $list_dm_sel_3;
            $list_dm_sel_2 .= $list_dm_sel_3.'</li>';

          }
          // end cap 2
          $list_dm_sel_2 = $list_dm_sel_2 != "" ? "<ul class='".$class_ul."'>".$list_dm_sel_2."</ul>" : $list_dm_sel_2;
          $list_dm_sel .= $list_dm_sel_2.'</li>';
        }
        // 
        return $list_dm_sel;
      }

      else if($row['kieu_hien_thi'] == 1){ //danh muc
        // show danh muc ra
        $list_dm_sel  = "";
        foreach ($tb_danhmuc as $dmuc) {
          if($dmuc['step']     != $row['step'])   continue; // khac step
          if($dmuc['id_parent']   != $row['danhmuc'])  continue; // khac dm chon

          $list_dm_sel .= '<li class="'.$class_li.' "><a class="'.$class_a.'" href="'.GET_link($full_url, $dmuc['seo_name']).'" icons="&rsaquo;">'.$dmuc['tenbaiviet_'.$lang].'</a>';
          //cap 2
          $list_dm_sel_2 = "";
          foreach ($tb_danhmuc as $dmuc_2) {
            if($dmuc_2['id_parent'] != $dmuc['id'])  continue; // khac dm con

			$list_dm_sel_2 .= '<li class="'.$class_li.' "><a class="'.$class_a.'" href="'.GET_link($full_url, $dmuc_2['seo_name']).'" icons="&rsaquo;">'.$dmuc_2['tenbaiviet_'.$lang].'</a>';
            //cap 3
            $list_dm_sel_3 = "";
            foreach ($tb_danhmuc as $dmuc_3) {
              if($dmuc_3['id_parent'] != $dmuc_2['id'])  continue; // khac dm con

              $list_dm_sel_3 .= '<li class="'.$class_li.' "><a class="'.$class_a.'" href="'.GET_link($full_url, $dmuc_3['seo_name']).'" icons="&rsaquo;">'.$dmuc_3['tenbaiviet_'.$lang].'</a>';
              //cap 4
              $list_dm_sel_4 = "";
              foreach ($tb_danhmuc as $dmuc_4) {
                if($dmuc_4['id_parent'] != $dmuc_3['id'])  continue; // khac dm con

                $list_dm_sel_4 .= '<li class="'.$class_li.' "><a class="'.$class_a.'" href="'.GET_link($full_url, $dmuc_4['seo_name']).'" icons="&rsaquo;">'.$dmuc_4['tenbaiviet_'.$lang].'</a></li>';
              }
              // end cap 4
              $list_dm_sel_4 = $list_dm_sel_4 != "" ? "<ul class='".$class_ul."'>".$list_dm_sel_4."</ul>" : $list_dm_sel_4;
              $list_dm_sel_3 .= $list_dm_sel_4.'</li>';
            }
            // end cap 3
            $list_dm_sel_3 = $list_dm_sel_3 != "" ? "<ul class='".$class_ul."'>".$list_dm_sel_3."</ul>" : $list_dm_sel_3;
            $list_dm_sel_2 .= $list_dm_sel_3.'</li>';

          }
          // end cap 2
          $list_dm_sel_2 = $list_dm_sel_2 != "" ? "<ul class='".$class_ul."'>".$list_dm_sel_2."</ul>" : $list_dm_sel_2;
          $list_dm_sel .= $list_dm_sel_2.'</li>';
        }
        // 
        return $list_dm_sel != "" ? "<ul class='".$class_ul."'>".$list_dm_sel."</ul>" : $list_dm_sel;
      }
    }
  }


	function GET_menu_new($full_url, $lang, $class_ul = '', $class_li = '', $class_a = '', $id_pr = 0){

		$tb_menu       = DB_fet_rd("*", "#_menu", "", "`catasort` ASC, `id` DESC", "", "id");
		$tb_step       = DB_fet_rd("*", "#_step", "", "`catasort` ASC, `id` DESC", "", "id");
		$tb_danhmuc    = DB_fet_rd("*", "#_danhmuc", "", "`catasort` ASC, `id` DESC", "", "id");

		$list_menu     = "";

		$list_mb_1 = "";

		foreach ($tb_menu as $row_0) {

			if($row_0['id_parent'] 	!= 0 ) continue;
			if($row_0['id'] 		!= $id_pr && $id_pr != 0) continue;
			foreach ($tb_menu as $row_1) {
				if($row_1['id_parent'] != $row_0['id'] ) continue;

				//cap 2
				$list_mb_2  = "";

				if($row_1['kieu_hien_thi'] == 3 && $row_1['kieu_chon'] == 1) { //kieu ngang
					$list_mb_1 .= check_chon_module_danhmuc($row_1, $class_ul, $class_li, $class_a, $tb_danhmuc);
				}
				else {
					$icon = $row_1['icon'] != "" ? '<img class="img-1" src="'.full_src($row_1, '').'" alt="'.SHOW_text($row_1['tenbaiviet_'.$lang]).'">' : "";
					$icon_hover = $row_1['icon_hover'] != "" ? '<img class="img-2" src="'.full_src_muti($row_1, '', 'icon_hover').'" alt="'.SHOW_text($row_1['tenbaiviet_'.$lang]).'">' : "";

					$list_mb_1 .= '<li class="is_step_'.$row_1['step'].' '.$class_li.' hide_'.$row_1['id'].'">'.MENU_return_link($class_a, $tb_menu, $tb_step, $tb_danhmuc, $row_1['id'], $icon, $icon_hover);
				}

				
				if($row_1['kieu_chon'] == 0) {
					foreach ($tb_menu as $row_2) {
						if($row_2['id_parent'] != $row_1['id']) continue;
						$list_mb_2 .= '<li class="'.$class_li.'">'.MENU_return_link($class_a, $tb_menu, $tb_step, $tb_danhmuc, $row_2['id']);

						//cap 3
						$list_mb_3  = "";
						if($row_2['kieu_chon'] == 0) {
							foreach ($tb_menu as $row_3) {
								if($row_3['id_parent'] != $row_2['id']) continue;
								$list_mb_3 .= '<li class="'.$class_li.'">'.MENU_return_link($class_a, $tb_menu, $tb_step, $tb_danhmuc, $row_3['id']);
								//cap 4
								$list_mb_4  = "";
								if($row_3['kieu_chon'] == 0) {
									foreach ($tb_menu as $row_4) {
										if($row_4['id_parent'] != $row_3['id']) continue;
										$list_mb_4 .= '<li class="'.$class_li.'">'.MENU_return_link($class_a, $tb_menu, $tb_step, $tb_danhmuc, $row_4['id']);
										//cap 5
										$list_mb_5  = "";
										if($row_4['kieu_chon'] == 0) {
											foreach ($tb_menu as $row_5) {
												if($row_5['id_parent'] != $row_4['id']) continue;
												$list_mb_5 .= '<li class="'.$class_li.'">'.MENU_return_link($class_a, $tb_menu, $tb_step, $tb_danhmuc, $row_5['id'])."</li>";
											}
											$list_mb_5 = $list_mb_5 != "" ? '<ul class=" '.$class_ul.'">'.$list_mb_5.'</ul>' : "";
										}
										else {
											$list_mb_5  .= check_chon_module_danhmuc($row_4, $class_ul, $class_li, $class_a, $tb_danhmuc);
										}
										//end cap 5

										$list_mb_4 .= $list_mb_5."</li>";
									}
									$list_mb_4 = $list_mb_4 != "" ? '<ul class=" '.$class_ul.'">'.$list_mb_4.'</ul>' : "";
								}
								else {
									$list_mb_4  .= check_chon_module_danhmuc($row_3, $class_ul, $class_li, $class_a, $tb_danhmuc);
								}
								//end cap 4

								$list_mb_3 .= $list_mb_4."</li>";
							}
							$list_mb_3 = $list_mb_3 != "" ? '<ul class=" '.$class_ul.'">'.$list_mb_3.'</ul>' : "";
						}
						else {
							$list_mb_3  .= check_chon_module_danhmuc($row_2, $class_ul, $class_li, $class_a, $tb_danhmuc);
						}
						//end cap 3

						$list_mb_2 .= $list_mb_3."</li>";
					}
					$list_mb_2 = $list_mb_2 != "" ? '<ul class=" '.$class_ul.'">'.$list_mb_2.'</ul>' : "";
				}
				else if($row_1['kieu_hien_thi'] != 3){
					$list_mb_2  .= check_chon_module_danhmuc($row_1, $class_ul, $class_li, $class_a, $tb_danhmuc);
				}
				//end cap 2
				$list_mb_1 .= $list_mb_2."</li>";
			}
		    
		}
		
		return $list_mb_1;
	}

	function GET_gia($gia, $giakm, $dvt = '', $lienhe = '', $class_gia = '', $class_km = '', $name_gia = '', $name_km  = ''){

		$km 		= 0;
		if($giakm != 0) {
			$km 	=100 -  (int)($gia * 100 / $giakm);
			
		}
		$text_gia 	= $gia != 0 ?number_format($gia).' <span class="dvt">'.$dvt.'</span>' : $lienhe;
		$text_km 	= $giakm != 0 ? number_format($giakm).' <span class="dvt">'.$dvt.'</span>' : "";
 
		return array("gia" => $gia, "km" => $giakm, "pt" => $km, "text_gia" => $name_gia." <span class='".$class_gia."'>".$text_gia."</span>", "text_km" => $name_km." <span class='".$class_km."'>".$text_km."</span>");
		
	}

	function LOC_char($val){
	    $val = addslashes(trim($val));
	    // $val = strip_tags($val);
	    // $val = str_replace("<", "&lt;", $val);
	    // $val = str_replace(">", "&gt;", $val);
	    $val = htmlentities($val, ENT_QUOTES, "UTF-8");
	    return $val;
	}
	function GET_token(){
		$token = md5(date('d-m-Y', time())."-PA-".GET_ip());
		return $token;
	}

	function CHECK_token($token){
		$token_check = md5(date('d-m-Y', time())."-PA-".GET_ip());
		if(trim($token) == $token_check) return true;
		return false;
	}

	function LAY_dulieusn($where = ""){
		if($where != "") $where = " AND $where";
		$thuoctinhchung = AOK("*", "`#_du_lieu_sn`", "`showhi` = 1 $where", "`catasort` ASC, `id` DESC", "", "id");
		return $thuoctinhchung;
	}
	function LAY_thuoctinhchung($where = ""){
		if($where != "") $where = " AND $where";
 
		$thuoctinhchung  = AOK("*", "`#_thuoctinhchung`", "`showhi` = 1 $where", "`catasort` ASC, `id` DESC", "", "id");
		return $thuoctinhchung;
	}

	function LAY_baiviet($step, $limit = 0, $where = "", $orderby = '', $col = ''){
		if($limit == 0) $limit = "";
		if($where != "") $where = " AND $where";
		if($orderby == '') $orderby = '`catasort` DESC, `id` DESC';
		$baiviet  = DB_fet_rd("*", "`#_baiviet`", "`step` IN ($step) $where", "$orderby", $limit, $col);
		return $baiviet;
	}
	
	function LAY_baiviet_chitiet($id = 0){
		$baiviet  = DB_fet_rd("*", "`#_baiviet_chitiet`", "`id_parent` = '$id' ", "`catasort` DESC, `id` DESC");
		return $baiviet;
	}
	function LAY_bv_tinhnang($step, $limit = 0, $where = "",$order_by = ""){
		if($limit == 0) $limit = "";
		if($where != "") $where = " AND $where";
		$baiviet  = DB_fet("*","`#_baiviet_tinhnang`","`showhi` = 1 AND `step` IN ($step) $where ","$order_by `catasort` ASC, `id` DESC",$limit,"arr", 1);
		return $baiviet;
	}
	
	function LAY_step($id = 0, $limit = 0, $where = ""){
		if($where 	!= "") 	$where = " $where";
		if($id 		!= 0) 	$where .= $where != "" ?  " AND `id` IN ($id)" : "  `id` IN ($id)";
		if($limit 	== 0) 	$limit = "";
 
		$step  	= DB_fet_rd("*", "`#_step`", $where, "`catasort` ASC, `id` DESC", $limit);
		if($limit == 1){
			return reset($step);
		}
		return $step;
	}
	function LAY_danhmuc($step, $limit = 0, $where = "", $catasort = '', $col = ''){
		if($limit == 0)  $limit = "";
		if($where != "") $where = " AND $where";
		$catasort = $catasort == '' ? "`catasort` ASC" : $catasort;
		if($col == '') {
			$danhmuc  = DB_fet_rd("*", "`#_danhmuc`", "`step` IN ($step) $where ", "$catasort , `id` DESC", $limit);
		}
		else {
			$danhmuc  = DB_fet_rd("*", "`#_danhmuc`", "`step` IN ($step) $where ", "$catasort , `id` DESC", $limit, $col);
		}
		return $danhmuc;
	}

	function LAY_khuvuc($limit = 0, $where = ""){
		if($limit == 0)  $limit = "";
		if($where != "") $where = " AND $where";
		$danhmuc  = DB_fet("*","`#_ship_khuvuc`","`showhi` = 1 $where ","`catasort` ASC, `id` DESC",$limit,"arr", 2);
		return $danhmuc;
	}
	
	function LAY_hinhanhcon($id, $limit  = 0, $the_loai = 0){
		if($limit  == 0) $limit  = "";
		$danhsach_img = DB_fet_rd("  * "," `#_baiviet_img` ",""," `sort` ASC, `id` ASC", $limit, "", "`id_parent` = '".$id."' AND `the_loai` = '$the_loai'");
		return $danhsach_img;
	}


	function LAY_tkgia($limit = 0, $where = ""){
		if($limit == 0) $limit = "";
		if($where != "") $where = " AND $where";
		$danhmuc  = DB_fet("*","`#_lien_ket_nhanh`","`showhi` = 1  $where ","`catasort` ASC, `id` DESC",$limit,"arr", 0);
		return $danhmuc;
	}
 
	function LAY_anhstep_now($step){
		$danhmuc  = DB_fet_rd(" * "," `#_step` "," `id` = '$step' ","", 1);
		return reset($danhmuc);
	}
	function LAY_anhcon($id, $limit = 0){
		if($limit == 0) $limit = "";
		$danhmuc  = DB_fet("*","`#_baiviet_img`","`id_parent` = '$id' ","`sort` ASC, `id` DESC",$limit,"arr", 0);
		return $danhmuc;
	}
	function GET_tienty($gia, $tienty, $dvt){
		if($gia < 1000000000) return number_format($gia).' '.$dvt;
		$gia = (float)($gia / 1000000000);
		return number_format($gia).' '.$tienty;
	}
	function RETURN_text_lienhe($name, $value){
        if($value == "") return;
        return '<tr><td colspan="3" style="width:160px; font-size: 13px">'.LOC_char(base64_decode($name)).'</td><td colspan="4" width="400"><span style="display:block; padding-left:5px; font-size: 13px">'.LOC_char($value).'</span></td></tr>';
    }
    function RETURN_text_lienhe_none($name, $value){
        if($value == "") return;
        return '<tr><td colspan="3" style="width:160px; font-size: 13px">'.$name.'</td><td colspan="4" width="400"><span style="display:block; padding-left:5px; font-size: 13px">'.$value.'</span></td></tr>';
    }
    function RETURN_text_lienhe_inline($value){
        if($value == "") return;
        return '<tr><td colspan="7">'.($value).'</td></tr>';
    }
    function RETURN_title_lienhe($value){
        if($value == "") return "";
        return '<tr> <td colspan="7" style="text-align: left; color: #333; background: #cccccc; font-size: 13px;text-transform: uppercase;"><b>'.LOC_char(base64_decode($value)).'</b></td> </tr>';
    }
    function CHECK_key_array($id, $step){
    	$check_tn = DB_que("SELECT * FROM `#_module_setting` WHERE `id` = '$id' LIMIT 1");
		$check_tn = mysql_fetch_assoc($check_tn);
		$array_tn = explode(",", $check_tn['ten_key']);

        if(in_array($step, $array_tn)) return true;
        return false;
    }
 
    function GET_danhmuc_hang($arr, $id_pr, $hang){
    	if(!empty($arr[$id_pr]['tenbaiviet_'.$_SESSION['lang']])) 
    		return $arr[$id_pr]['tenbaiviet_'.$_SESSION['lang']];
    	$hang = explode(",", $hang);
    	foreach ($hang as $value) {
    		if(!empty($arr[$value]['tenbaiviet_'.$_SESSION['lang']])) 
    			return $arr[$value]['tenbaiviet_'.$_SESSION['lang']];
    	}
    }
    function CHECK_phut($time, $glo_lang) {
		$time_now = time();
		$tg = $time_now - $time;
	
		if($tg < 10 && $tg > 0) return $glo_lang['vua_xong'];
		else if($tg < 60 && $tg > 0) return $tg." ".$glo_lang['giay_truoc'];
		else if($tg < 3600 && $tg > 0) return (int) ($tg / 60)." ".$glo_lang['phut_truoc'];
		else if($tg < 86400 && $tg > 0) return (int) ($tg / 3600)." ".$glo_lang['gio_truoc'];
		else return date('d-m-Y', $time);
	}

	function MUA_XtangY($idsp, $soluong){
		$wh  = " AND ((`dieu_kien_thoi_gian` = 1 AND `bat_dau` <= '".time()."' AND `ket_thuc` >= '".time()."') OR  `dieu_kien_thoi_gian` = 0)";
		$wh .= " AND ((`dieu_kien_so_luong` = 1 AND `su_dung_km` < `so_luong_khuyen_mai`) OR `dieu_kien_so_luong` = 0)";
		$wh .= " AND (`check_sp_khuyen_mai` = 0 OR  `sp_khuyen_mai` = '".$idsp."')";

		$check 		= DB_que("SELECT * FROM `#_muaxtangy` WHERE `showhi` = 1  $wh ORDER BY `id` DESC LIMIT 1");
		if(!mysql_num_rows($check)) return false;
		$check 		= mysql_fetch_assoc($check);

		$gioihan 		= 0;
		if($check['dieu_kien_so_luong'] == 1) {
			$gioihan = $check['so_luong_khuyen_mai'] - $check['su_dung_km'];
		}
		$check["soluong_km_con"] = $gioihan;
		if($check['dieu_kien_mua'] > $soluong){
			$check["muc_giam_gia"] = 0;
		}
		return $check;
	}
	function LOAD_gia_xy($khuyenmai, $dongia, $soluong, &$id_sp = "", &$gia_tien = "",  $key = ""){


		if($khuyenmai['loai_giam_gia'] == 0) 
			if($dongia >= $khuyenmai['muc_giam_gia']) //chi ap dung sp co gia > gia km
				$dongia_new = $dongia - $khuyenmai['muc_giam_gia'];
			else 
				$dongia_new = $dongia;
		else
			$dongia_new = $dongia - ($dongia*$khuyenmai['muc_giam_gia']/100);

		$thanhtien = 0;
		for ($i=0; $i < $soluong; $i++) { 
			$id_sp         .= $key.",";        

			if($i < $khuyenmai['soluong_km_con'] || $khuyenmai['soluong_km_con'] == 0) 
				{ $thanhtien += $dongia_new; $gia_tien      .= $dongia_new.";";}
			else 
				{ $thanhtien += $dongia; $gia_tien      .= $dongia.";";}
		}
		  

		return $thanhtien;
	}
	function GET_price_weight($sess_cart){
		$tongtien	  = 0;
		$khoi_luong	  = 0;
	    foreach ($sess_cart as $key => $value) { 
	    	$id_sp     = explode("_", $key);
            $id_sp     = $id_sp[0];

			$sanpham    = DB_que("SELECT * FROM `#_baiviet` WHERE `id` = '".$id_sp."' LIMIT 1");
			$sanpham    = mysql_fetch_assoc($sanpham);

			// $dongia_new = $dongia   = $sanpham['opt_km'] == 1 && $sanpham['giakm'] != 0 ? $sanpham['giakm'] : $sanpham['giatien'];
			// $gia_daily = GET_gia_daily($sanpham['id'], $sanpham['giatien'], '', 1);
			// $dongia_new = $dongia    = $gia_daily['gia'];

			// $khuyenmai              = MUA_XtangY($key, $value);
			// $tongtien              += LOAD_gia_xy($khuyenmai, $dongia, $value) ;
			// $khoi_luong	  		 += (float)($value * $sanpham['khoi_luong']);

			$dongia     = check_gia_sql($id_sp, @$_SESSION['tinhnang'][$key], $sanpham['giatien']);
			$thanhtien  = $dongia * $value;
			$tongtien  += $thanhtien;
	    }
	    return array("tontien" => $tongtien, "khoiluong" => $khoi_luong);
	}
	function SHIP_chung($url, $api, $fromProvince, $fromDistrict , $toProvince ,$toDistrict, $weight, $amount){

        $cookiesFile = '/tmp/shipchung.txt';
        @unlink($cookiesFile);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiesFile); // write
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiesFile); // read
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'cache-control:no-cache',
            'content-type:application/json'
        ));

        $return          = array();
        $shippingService = array(
            1  => 'Chuyển phát tiết kiệm - Economy delivery service',
            11 => 'EMS tiết kiệm - EMS economy delivery service',
            2  => 'Chuyển phát nhanh - Express delivery service'
        );

        foreach ($shippingService as $keyService => $nameService) {
            $data = array(
                'From'        => array(
                    'City'     => $fromProvince,
                    'Province' => $fromDistrict,
                ),
                'To'          => array(
                    'City'     => $toProvince,
                    'Province' => $toDistrict
                ),
                'Order'       => array(
                    'Amount' => $amount,
                    'Weight' => $weight
                ),
                'Config'      => array(
                    'Service'   => $keyService,
                    'CoD'       => 1, //1 co chon 2 // khong chon
                    'Protected' => 1,
                    'Checking'  => 1,
                    'Payment'   => 2,
                    'Fragile'   => 2
                ),
                'Domain'      => '',
                'MerchantKey' => $api
            );

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            $html = curl_exec($ch);

            $response = json_decode($html, true);
            // return $response;


            if ($response['error'] != '0' || empty($response['data'])) {
                continue;
            }

            if (empty($response['data']['courier']['system'])) {
                continue;
            }

            $max = 100000000;
            $row = array();

            //Trong cung 1 goi van chuyen (1, 2, 11), chon dvvc co phi vc nho nhat
            foreach ($response['data']['courier']['system'] as $courier) {
                $ship  = $response['data']['pvc'] + $courier['money_pickup'];
                $cod   = $response['data']['vas']['cod'];
                $total = $ship + $cod;
                // if ($total >= $max) {
                //     continue;
                // }

                $max = $total;
                $row = array(
                    'id'    => $keyService . '-' . $courier['courier_id'],
                    'name'  => $nameService . ' - ' . $courier['courier_name'],
                    'logo'  => $courier['courier_logo'],
                    'time'  => $courier['leatime_str'],
                    'ship'  => $ship,
                    'cod'   => $cod,
                    'total' => ($ship + $cod)
                );
            }

            if ($row) {
                $return[] = $row;
            }
        }
        return $return;
    }
    function Giao_hang_nhanh($url, $api, $fromDistrict, $toDistrict, $weight, $amount){
        
        $cookiesFile = '/tmp/ghn.txt';
        @unlink($cookiesFile);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiesFile); // write
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiesFile); // read
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);

        $data = json_encode(array(
            'token'          => $api,
            'FromDistrictID' => $fromDistrict,
            'ToDistrictID'   => $toDistrict,
            'Weight'         => $weight,
            'InsuranceFee '  => $amount
        ), JSON_NUMERIC_CHECK);
        //echo $data;die;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $html     = curl_exec($ch);
        $response = json_decode($html, true);
        // return $response;
        $priceList = array();
        if ($response['code'] == 1 && !empty($response['data'])) {
            foreach ($response['data'] as $row) {
                $priceList[] = array(
                    'id'    => $row['ServiceID'],
                    'name'  => $row['Name'],
                    'logo'  => '',
                    'time'  => date('H:i:s d-m-Y', strtotime($row['ExpectedDeliveryTime'])),
                    'ship'  => $row['ServiceFee'],
                    'cod'   => 0,
                    'total' => $row['ServiceFee']
                );
            }
        }

        return $priceList;
    }
    function SHIP_return($n_tinhthanh, $id_quanhuyen, $total) {
    	$kho            = DB_fet("*","`#_ship_vanchuyen_setup`","`id` = 1 LIMIT 1");
	    $kho            = mysql_fetch_assoc($kho);
	    $kho_tinhthanh  = $kho['kho_tinhthanh'];  
	    $kho_quanhuyen  = $kho['kho_quanhuyen']; 

	    $khuvuc         = LAY_khuvuc();

	    if($kho['loai_ship'] == 2){
	      $n_tinhthanh    = $khuvuc[$n_tinhthanh]['id_shipchung'];
	      $id_quanhuyen   = $khuvuc[$id_quanhuyen]['id_shipchung'];
	      $kho_tinhthanh  = $khuvuc[$kho_tinhthanh]['id_shipchung'];
	      $kho_quanhuyen  = $khuvuc[$kho_quanhuyen]['id_shipchung'];  
	    }
	    else if($kho['loai_ship'] == 3){
	      $n_tinhthanh    = $khuvuc[$n_tinhthanh]['id_giaohangnhanh'];
	      $id_quanhuyen   = $khuvuc[$id_quanhuyen]['id_giaohangnhanh'];
	      $kho_tinhthanh  = $khuvuc[$kho_tinhthanh]['id_giaohangnhanh'];
	      $kho_quanhuyen  = $khuvuc[$kho_quanhuyen]['id_giaohangnhanh'];
	    }

    	if($kho['loai_ship'] == 2){
			$url         = $kho['url_shipchung'];
			$api         = $kho['api_shipchung'];
			$return      = SHIP_chung($url, $api, $kho_tinhthanh, $kho_quanhuyen, $n_tinhthanh, $id_quanhuyen, $total['khoiluong']*1000, $total['tontien']);      
			return $return;
	    }
	    if($kho['loai_ship'] == 3){
			$url         = $kho['url_giaohangnhanh'];
			$api         = $kho['api_giaohangnhanh'];
			$return      = Giao_hang_nhanh($url, $api, $kho_quanhuyen, $id_quanhuyen, $total['khoiluong'], $total['tontien']);
			return $return;
	    }
	    return false;
    }
    function Table_ship($return, $glo_lang, $id_active = ''){
    	$phiship = 0;
    	$nd = '<table width="100%" border="0" cellspacing="1" cellpadding="5">
                <tbody>
                  <tr>
                    <th class="ms-select" style="padding: 5px;">'.$glo_lang['chon'].'</th>
                    <th class="ms-name" style="padding: 5px;">'.$glo_lang['hang_van_chuyen'].'</th>
                    <th class="ms-time" style="padding: 5px;">'.$glo_lang['du_kien'].'</th>
                    <th class="ms-fee" style="padding: 5px;">'.$glo_lang['phi_van_chuyen'].'</th>
                    <th class="ms-cod" style="padding: 5px;">'.$glo_lang['phi_thu_ho'].'</th>
                    <th class="ms-total" style="padding: 5px;">'.$glo_lang['cart_tong_tien'].'</th>
                  </tr>';
        foreach ($return as $value) {
        	if($id_active != '' && $id_active == $value['id']) $phiship = $value['total'];
          	$nd .=  '<tr>
                    <td class="ms-select" title="'.$glo_lang['chon'].'">
                      <label class="radio-payment radio-ctu"><input class="is_radio_ship" type="radio" name="methodShipping" value="'.$value['id'].'" '.($id_active == $value['id'] ? 'checked' : '').' data="'.$value['total'].'" onclick="ADD_ship(this)"></label>
                    </td>
                    <td class="ms-name"  title="'.$glo_lang['hang_van_chuyen'].'">'.($value['logo'] != '' ? '<img src="'.$value['logo'].'" style="width: 100px; display: block; margin: 5px 0;">' : "").'<span>'.$value['name'].'</span></td>
                    <td class="ms-time"  title="'.$glo_lang['du_kien'].'">'.$value['time'].'</td>
                    <td class="ms-fee"  title="'.$glo_lang['phi_van_chuyen'].'">'.NUMBER_fomat($value['ship']).' '.$glo_lang['dvt'].'</td>
                    <td class="ms-cod"  title="'.$glo_lang['phi_thu_ho'].'">'.NUMBER_fomat($value['cod']).' '.$glo_lang['dvt'].'</td>
                    <td class="ms-total"  title="'.$glo_lang['cart_tong_tien'].'">'.NUMBER_fomat($value['total']).' '.$glo_lang['dvt'].'</td>
                  </tr>';
        }

      	$nd .= '</tbody></table>'; 

      	if($id_active == '')
      		return $nd;
      	else
      		return array("nd" => $nd, "phiship" => $phiship);
    }
    function CHECK_ma_km_new($ma_khuyen_mai, $glo_lang, $tongtien){
    	if($ma_khuyen_mai 	== "") return false;
    	$check_magiamg      = DB_fet("*","`#_magiamgia_chitiet`","`ma_giam_gia` = '$ma_khuyen_mai' LIMIT 1");
	    if(!mysql_num_rows($check_magiamg)) 
	    	return array("err" => 1, "text" => $glo_lang['ma_giam_gia_khong_hop_le']);

	    $check_magiamg    = mysql_fetch_assoc($check_magiamg);
	    if($check_magiamg['so_lan_su_dung'] >= $check_magiamg['tong_su_dung'] && $check_magiamg['tong_su_dung'] != 0)
	        return array("err" => 1, "text" => $glo_lang['so_lan_su_dung_ma_giam_gia_da_het']);

        $ma_giam_gia_val    = DB_fet("*","`#_magiamgia`","`id` = '".$check_magiamg['id_parent']."' LIMIT 1");
        if(!mysql_num_rows($ma_giam_gia_val)) 
        	return array("err" => 1, "text" => $glo_lang['ma_giam_gia_khong_hop_le']);
        
        $ma_giam_gia_val 	= mysql_fetch_assoc($ma_giam_gia_val); 
        if($ma_giam_gia_val['bat_dau'] > time() || $ma_giam_gia_val['ket_thuc'] < time())
        	return array("err" => 1, "text" => $glo_lang['thoi_gian_ap_dung_ma_khuyen_mai_khong_hop_le']);

        // vnd
        if($ma_giam_gia_val['loai_km'] == 0) $vnd = 1;
        else if($ma_giam_gia_val['loai_km'] == 1) $vnd = 0;
        else return false;

    	return array("err" => 0, "text" => $glo_lang['ma_giam_gia_hop_le'], "vnd" => $vnd, "all" => 1,  "val" => $ma_giam_gia_val['gia_tri_giam']);
        
    }
    function CHECK_ma_km($ma_khuyen_mai, $glo_lang, $tongtien, $phiship){
    	if($ma_khuyen_mai == "") return false;
    	$check_magiamg      = DB_fet("*","`#_magiamgia_chitiet`","`ma_giam_gia` = '$ma_khuyen_mai' LIMIT 1");
	    if(!mysql_num_rows($check_magiamg)) 
	    	return array("err" => 1, "text" => $glo_lang['ma_giam_gia_khong_hop_le']);

	    $check_magiamg    = mysql_fetch_assoc($check_magiamg);
	    if($check_magiamg['so_lan_su_dung'] >= $check_magiamg['tong_su_dung'] && $check_magiamg['tong_su_dung'] != 0)
	        return array("err" => 1, "text" => $glo_lang['so_lan_su_dung_ma_giam_gia_da_het']);

        $ma_giam_gia_val    = DB_fet("*","`#_magiamgia`","`id` = '".$check_magiamg['id_parent']."' LIMIT 1");
        if(!mysql_num_rows($ma_giam_gia_val)) 
        	return array("err" => 1, "text" => $glo_lang['ma_giam_gia_khong_hop_le']);
        
        $ma_giam_gia_val 	= mysql_fetch_assoc($ma_giam_gia_val); 
        if($ma_giam_gia_val['bat_dau'] > time() || $ma_giam_gia_val['ket_thuc'] < time())
        	return array("err" => 1, "text" => $glo_lang['thoi_gian_ap_dung_ma_khuyen_mai_khong_hop_le']);

        //mien phi van chuyen
        if($ma_giam_gia_val['loai_km'] == 2) {
        	if($ma_giam_gia_val['gia_tri_giam'] > $tongtien) 
        		return array("err" => 1, "text" => $glo_lang['khong_du_dieu_kien_ap_dung_khuyen_mai']);
        	else 
        		return array("err" => 0, "text" => "", "vnd" => 1, "all" => 1,  "val" => $phiship);
        }
        // vnd
        if($ma_giam_gia_val['loai_km'] == 0) $vnd = 1;
        else if($ma_giam_gia_val['loai_km'] == 1) $vnd = 0;
        else return false;

    	if($ma_giam_gia_val['ap_dung_cho'] == 0)
    		return array("err" => 0, "text" => $glo_lang['ma_giam_gia_hop_le'], "vnd" => $vnd, "all" => 1,  "val" => $ma_giam_gia_val['gia_tri_giam']);
    	if($ma_giam_gia_val['ap_dung_cho'] == 1){
    		if($ma_giam_gia_val['gia_tri_ap_dung'] < $tongtien)
    			return array("err" => 0, "text" => $glo_lang['ma_giam_gia_hop_le'], "vnd" => $vnd, "all" => 1,  "val" => $ma_giam_gia_val['gia_tri_giam']);
    		else
    			return array("err" => 1, "text" => $glo_lang['khong_du_dieu_kien_ap_dung_khuyen_mai']);
    	}
    	if($ma_giam_gia_val['ap_dung_cho'] == 3){
    		return array("err" => 0, "text" => $glo_lang['ma_giam_gia_hop_le'], "vnd" => $vnd, "all" => 0, "apdung" => $ma_giam_gia_val['ap_dung_khuyen_mail_tren_don_hang'] , "id_sp" => $ma_giam_gia_val['gia_tri_ap_dung'],   "val" => $ma_giam_gia_val['gia_tri_giam']);
    	}
        return false;
        
    }
    function CHECK_val_khuyen_mai($thanhtien, $ma_khuyen_mai, $cart){
    	if(!$ma_khuyen_mai || $ma_khuyen_mai['err'] == 1) 
    		return array("thanh_tien" => $thanhtien, "gia_giam" => 0);

    	if($ma_khuyen_mai['all'] 			 == 1){ // tat ca don hang
    		if($ma_khuyen_mai['vnd'] 		 == 1) 
    			return array("thanh_tien" => $thanhtien - $ma_khuyen_mai['val'], "gia_giam" => $ma_khuyen_mai['val']);

    		else if($ma_khuyen_mai['vnd'] 	 == 0) 
    			return array("thanh_tien" => $thanhtien - $thanhtien*$ma_khuyen_mai['val']/100, "gia_giam" => $thanhtien*$ma_khuyen_mai['val']/100);
    		return array("thanh_tien" => $thanhtien, "gia_giam" => 0);
    	}	
    	if($ma_khuyen_mai['all'] 			 == 0){ // theo sp
    		$id_sp 							 = $ma_khuyen_mai['id_sp'];
    		$soluong 						 = $cart[$id_sp];

    		$sanpham   	= DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` = 1 AND `id` = '".$id_sp."' LIMIT 1");
    		if(!mysql_num_rows($sanpham)) 
    			return array("thanh_tien" => $thanhtien, "gia_giam" => 0);

    		$khuyenmai 	= MUA_XtangY($id_sp, $soluong);
            if($khuyenmai['loai_giam_gia'] == 1) 
            	return array("thanh_tien" => $thanhtien, "gia_giam" => 0); // san pham da ap dung ma giam gia truoc

            $sanpham    = mysql_fetch_array($sanpham);
            // $dongia 	= $sanpham['opt_km'] == 1 && $sanpham['giakm'] != 0 ? $sanpham['giakm'] : $sanpham['giatien'];
            $gia_daily = GET_gia_daily($sanpham['id'], $sanpham['giatien'], '', 1);
            $dongia_new = $dongia    = $gia_daily['gia'];

    		// echo $cart[$id_sp];
    		if($ma_khuyen_mai['apdung'] 	 == 0){ // 1 sp
    			$gia_cu   		= $dongia * 1;
    			$gia_giam 		= $ma_khuyen_mai['val'];
    			if($ma_khuyen_mai['vnd'] == 0){ //tinh theo %
    				$gia_giam 	= $dongia * $ma_khuyen_mai['val']/100;
    			}
    			$gia_moi 		= $gia_cu - $gia_giam * 1;
    			return array("thanh_tien" => $thanhtien - $gia_cu + $gia_moi, "gia_giam" => $gia_cu - $gia_moi);
    		}
    		else if($ma_khuyen_mai['apdung'] == 1){ // all san pham
    			$gia_cu   		= $dongia * $soluong;
    			$gia_giam 		= $ma_khuyen_mai['val'];
    			if($ma_khuyen_mai['vnd'] == 0){ //tinh theo %
    				$gia_giam 	= $dongia * $ma_khuyen_mai['val']/100;
    			}
    			$gia_moi 		= $gia_cu - $gia_giam * $soluong;
    			return array("thanh_tien" => $thanhtien - $gia_cu + $gia_moi, "gia_giam" => $gia_cu - $gia_moi);
    		}
    		return array("thanh_tien" => $thanhtien, "gia_giam" => 0);
    	}
    }

    function Get_total_cart(){
    	$total = 0;
    	if($_SESSION['cart']){

    		foreach ($_SESSION['cart'] as $key => $value) {
    			 $total += $value;
    		}

    	}

    	return $total;
    }
    function CHECK_thanhtien($ma_khuyen_mai, $glo_lang, $tongtien, $phi_ship, $session_cart){
    	$gia_km 			= "0 ".' '.$glo_lang['dvt'];
    	$gia_kmtext 		= '';

    	$ma_khuyen_mai      = CHECK_ma_km($ma_khuyen_mai, $glo_lang, $tongtien['tontien'], $phi_ship);
	    if($ma_khuyen_mai){
	      $gia_kmtext       = $ma_khuyen_mai['text'];
	    }
	    if($ma_khuyen_mai && $ma_khuyen_mai['err'] == 0){
	      $gia_km           = NUMBER_fomat($ma_khuyen_mai['val']).' '.($ma_khuyen_mai['vnd'] == 1 ? $glo_lang['dvt'] : '%');
	    }
	    $thanhtien_arr      = CHECK_val_khuyen_mai($tongtien['tontien'], $ma_khuyen_mai, $session_cart);
	    $thanhtien          = $thanhtien_arr['thanh_tien'];
	    $gia_km             = $thanhtien_arr['gia_giam'] != 0 ? NUMBER_fomat($thanhtien_arr['gia_giam']).' '.$glo_lang['dvt'] : $gia_km;

	    return array(
	    			'gia_km' 		=> $gia_km,
	    			'gia_km_err' 	=> $ma_khuyen_mai['err'],
	    			'gia_km_num' 	=> $thanhtien_arr['gia_giam'],
	    			'gia_kmtext'	=> $gia_kmtext,
	    			'tam_tinh' 		=> $tongtien['tontien'],
	    			'thanh_tien' 	=> $tongtien['tontien'] + $phi_ship - $thanhtien_arr['gia_giam']
	    			);
    }


    function TRANGTHAI_donhang($id, $glo_lang){
    	if($id == 1) return "<p class='moi'>".$glo_lang['don_hang_moi']."</p>";
    	if($id == 2) return "<p class='dang-giao'>".$glo_lang['don_hang_dang_giao']."</p>";
    	if($id == 3) return "<p class='hoan-thanh'>".$glo_lang['don_hang_da_hoan_thanh']."</p>";
    	if($id == 4) return "<p class='huy'>".$glo_lang['don_hang_da_bi_huy']."</p>";
    	return "";
    }
    function CAT_chuoi_ki_tu($text, $num = 80) {
    	$num_kitu = explode(" ", $text);
    	$num_kitu_c = count($num_kitu);
		if ($num_kitu_c <= $num) {
            return $text;
        }
        $kitu_moi = "";
        $i = 0;
        foreach ($num_kitu as $key) {
        	$i++;
        	if($i > $num) {
        		$kitu_moi = trim($kitu_moi);
        		$kitu_moi .= " [...]";
        		break;
        	}
        	$kitu_moi .= $key." ";
        }

        return $kitu_moi;
	}
    function CAT_chuoi($text, $num = 80) {
		if (strlen($text) <= $num) {
            return $text;
        }
        $text= substr($text, 0, $num);
        if ($text[$num-1] == ' ') {
            return trim($text)."...";
        }
        $x  = explode(" ", $text);
        $sz = sizeof($x);
        if ($sz <= 1)   {
            return $text."...";
        }
        $x[$sz-1] = '';

        return trim(implode(" ", $x))."...";
	}
	function GET_danhmuc_pr($id, $step){
		$danhmuc = LAY_danhmuc($step);
		if($danhmuc[$id]['id_parent'] == 0) return $id;

		$id = $danhmuc[$id]['id_parent'];
		if($danhmuc[$id]['id_parent'] == 0) return $id;

		$id = $danhmuc[$id]['id_parent'];
		if($danhmuc[$id]['id_parent'] == 0) return $id;

		$id = $danhmuc[$id]['id_parent'];
		if($danhmuc[$id]['id_parent'] == 0) return $id;
		return false;
	}
	function GET_lolat($url_map){
		preg_match_all('/!2d(.*?)!/', $url_map, $longitude);
		$longitude = $longitude[1][0];

		preg_match_all('/!3d(.*?)!/', $url_map, $latitude);
		$latitude  = $latitude[1][0];
		return array("lon" => $longitude, "lat" => $latitude);
	}
	function GET_gia_daily($idsp, $giatien, $glo_lang = '', $gia_arr = 0) {
		$dvt 	= $glo_lang == '' ? "" : $glo_lang['dvt'];
		$lienhe = $glo_lang == '' ? "" : $glo_lang['gia_lienhe'];
		if(empty($_SESSION['id']) || $_SESSION['id'] == NULL) {
			if($gia_arr != 0) {
				return array("text" => NUMBER_fomat($giatien)." ".$dvt, "gia" => $giatien);
			}
			return $giatien == 0 ? $lienhe : NUMBER_fomat($giatien)." ".$dvt;
		}
		//check gia kv
		$giakv 		= DB_que("SELECT * FROM `#_baiviet_price` WHERE `id_khuvuc` = '".$_SESSION['arr_mb']['kv']."' AND `id_baiviet` = '$idsp' LIMIT 1");
		if(mysql_num_rows($giakv)) {
			$giakv 	= mysql_fetch_assoc($giakv);
			if(($giakv['check_ngay_dang'] == 0 || ($giakv['check_ngay_dang'] == 1 AND $giakv['ngay_dang'] > 0)) && $giakv['gia'] != 0) {
				$giatien 	   = $giakv['gia'];
			}
		}
		// check % giam
		$phantram_giam 	= DB_que("SELECT * FROM `#_members_nhom` WHERE `showhi` = 1 AND `id` = '".$_SESSION['arr_mb']['nhom']."' LIMIT 1");

		if(mysql_num_rows($phantram_giam)) {
			$phantram_giam 	= mysql_fetch_assoc($phantram_giam);
			if($phantram_giam['phan_tram'] > 0) {
				$giatien = (int)($giatien - $giatien * $phantram_giam['phan_tram'] / 100);
			}
		}
		
		if($gia_arr != 0) {
			return array("text" => NUMBER_fomat($giatien)." ".$dvt, "gia" => $giatien);
		}
		return $giatien == 0 ? $lienhe : NUMBER_fomat($giatien)." ".$dvt;
	}
	function GET_sao_sp($num_1, $num_2, $idsp){
    	$sao = 0;
    	if($num_2 != 0) $sao = round((float)($num_1/$num_2));
    	for ($i=1; $i <= 5; $i++) { 
    		$class = !empty($_SESSION['sao'][$idsp]) ? "" : " ad_sao_".$idsp." cur";
    		echo '<span data-sao="'.($num_2 == 0 ? 0 : round((float)($num_1/$num_2))).'" data="'.$idsp.'" class="fa fa-star ad_sao  ad_sao_'.$idsp.'_'.$i.' '.$class.' '.($sao >= $i ? "checked" : "").' " onmouseover="ADD_sao('.$idsp.','.$i.')" onclick="ADD_sao_num(\''.$idsp.'\','.$i.')"></span>';
    	}
    }
    function LAY_chude_muti($val, $step = 0, $name = '', $class = '', $kieu = 0,  $id_ht = 0, $chude = 'true', $muti = ''){
			if($kieu == 0)
				{
					$val 		= @explode(",", $val);
					$chude_arr  = DB_fet("*","#_danhmuc", "`showhi` = '1' AND `step` = ".$step, "`catasort` ASC","", "arr");
					$select 	= '<select name="'.$name.'" class="'.$class.'" '.$muti.'>
	            						<option value="0">Không thuộc danh mục</option>'; 
	            	foreach ($chude_arr as $row_1)
			            {		
			            	if($row_1['id_parent'] != 0) continue;
			            	$check_dis 			= "";
			            	$check_dis_trung 	= "";
			            	if($id_ht == $row_1['id'] && $chude == 'true') $check_dis_trung = 'disabled="disabled"';
			              	$select 		   .= '<option '.$check_dis.$check_dis_trung.' '.(in_array($row_1['id'], $val) ? 'selected="selected"':'').'  value="'.$row_1['id'].'">'.$row_1['tenbaiviet_vi'].'</option> ';
			              	foreach ($chude_arr as $row_2) 
					            {		
					            	if($row_2['id_parent'] != $row_1['id']) continue;
					            	if($id_ht == $row_2['id'] && $check_dis_trung == '' && $chude == 'true') $check_dis1 = 'disabled="disabled"';
					            	else $check_dis1 = "";

					              	$select 		   .= '<option '.$check_dis.$check_dis1.$check_dis_trung.' '.(in_array($row_2['id'], $val)  ?'selected="selected"':'').'  value="'.$row_2['id'].'">↳&nbsp;'.$row_2['tenbaiviet_vi'].'</option> ';
					              	foreach ($chude_arr as $row_3)
							            {	
							            	if($row_3['id_parent'] != $row_2['id']) continue;
							            	if($id_ht == $row_3['id'] && $check_dis_trung == '' && $chude == 'true') $check_dis2 = 'disabled="disabled"';
					            			else $check_dis2 = "";

							              	$select 		   .= '<option '.$check_dis.$check_dis1.$check_dis2.$check_dis_trung.' '.(in_array($row_3['id'], $val) ?'selected="selected"':'').'  value="'.$row_3['id'].'">&nbsp;&nbsp;↳&nbsp;'.$row_3['tenbaiviet_vi'].'</option> ';
							              	foreach ($chude_arr as $row_4) 
									            {	
									            	if($row_4['id_parent'] != $row_3['id']) continue;
									            	if($chude == 'true')
									            		$check_dis3 = 'disabled="disabled"';	
									            	else
									            		$check_dis3 = '';	
											        $select 		   .= '<option '.$check_dis.$check_dis1.$check_dis2.$check_dis3.$check_dis_trung.' '.(in_array($row_4['id'], $val)?'selected="selected"':'').'  value="'.$row_4['id'].'">&nbsp;&nbsp;&nbsp;&nbsp;↳&nbsp;'.$row_4['tenbaiviet_vi'].'</option> ';

												}
										}
								}
						}
						$select .= '</select>';
					return $select;
				}
			else
				{
					$sql_cap 	= DB_que("SELECT `tenbaiviet_vi` FROM `#_danhmuc` WHERE `id` = ".$val." LIMIT 1");
					return mysql_result($sql_cap, 0, 'tenbaiviet_vi');
				}
		}
	
	function ADMIN_show_img ($duongdan, $icon) {
		$iconxx = explode(".", $icon);
		$ext  	= end($iconxx);
		if($ext == "svg") return "<img class='img_show_ds' src='".$duongdan."/".$icon."' style='display: block;'>";
		else return "<img class='img_show_ds' src='".$duongdan."/thumb_".$icon."' style='display: block;'>";
	}
	function load_phivanchuyen ($cart, $n_tinhthanh_new2, $id_quanhuyen_new, $glo_lang){
		$tongtien      = 0;
	    foreach ($cart as $key => $value) { 
	    	$id_sp     = explode("_", $key);
            $id_sp     = $id_sp[0];
			$sanpham   = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` = 1 AND `id` = '".$id_sp."' LIMIT 1");
			if(mysql_num_rows($sanpham) > 0)
			{
				$sanpham   = mysql_fetch_array($sanpham);
				$dongia    = check_gia_sql($id_sp, @$_SESSION['tinhnang'][$key], $sanpham['giatien']);
				$thanhtien = $dongia * $value;
				$tongtien  += $thanhtien;
			}
	    }
	    //
	    if($n_tinhthanh_new2 == 0) {
	      $array = array(
	      "tamtinh" => 0,
	      "phivc"   => 0,
	      "tamtinh_num" => $tongtien,
	      "phivc_num" => 0,
	      "thanhtien" => NUMBER_fomat($tongtien). ' '.$glo_lang['dvt']);
	      return $array;
	      exit();
	    }

	    $check_phiship      = DB_que("SELECT * FROM `#_ship_vanchuyen_khac` WHERE `id_kv` = '$n_tinhthanh_new2' AND (`toi_thieu` >= '$tongtien' OR `toi_thieu` = 0 ) AND (`toi_da` <= '$tongtien' OR `toi_da` = 0 ) ORDER BY `id` DESC LIMIT 1"); 
	    if(!mysql_num_rows($check_phiship)) {
	      $check_phiship      = DB_que("SELECT * FROM `#_ship_vanchuyen_khac` WHERE `id_kv` = '0' AND (`toi_thieu` >= '$tongtien' OR `toi_thieu` = 0 ) AND (`toi_da` <= '$tongtien' OR `toi_da` = 0 ) ORDER BY `id` DESC LIMIT 1"); 
	    }
	    $check_phiship      = mysql_fetch_assoc($check_phiship);
	    $gia_dieu_chinh     = json_decode($check_phiship['gia_dieu_chinh'], true);

	    if(!empty($gia_dieu_chinh[$id_quanhuyen_new])) {
	    	$phi_van_chuyen     = $check_phiship['phi_van_chuyen'] + $gia_dieu_chinh[$id_quanhuyen_new];
	    }
	    else {
	    	$phi_van_chuyen     = $check_phiship['phi_van_chuyen'];
	    }
	    
	 

	    $array = array(
	      "tamtinh" => NUMBER_fomat($tongtien). ' '.$glo_lang['dvt'],
	      "phivc"   => NUMBER_fomat($phi_van_chuyen). ' '.$glo_lang['dvt'],
	    	"tamtinh_num" => $tongtien,
	      "phivc_num"   => $phi_van_chuyen,
	      "thanhtien" => NUMBER_fomat($tongtien + $phi_van_chuyen). ' '.$glo_lang['dvt']);

	    return $array;
	}
	
	function PROCESS_data($array){
		if(is_array($array)) {
			$data 	= array();
			foreach ($array as $key => $val) {
				if(!is_array($val)){
					$val_new 		= sql_id(addslashes(trim($val)));
					$data[$key] 	= $val_new;
				}else{
					$arr_2 		= array();
					foreach ($val as $k => $v) {
						$arr_2_new 		= sql_id(addslashes(trim($v)));
						$arr_2[$k] 		= $arr_2_new;
					}
					$data[$key] 		= $arr_2;
				}
			}
			return $data;
		}else{
			return $array;
		}
		
	}  
	function AOK($sql, $table, $where = "", $order_by = "", $limit = "", $col = "", $where_clear = "", $returnsql = false) {

		    if ($where != "" && $where_clear != '') $where =  "WHERE $where ";
		    else if ($where == "" && $where_clear != '') $where =  "";
		    else {
		    	$where 		= "WHERE `showhi` = 1 ".($where  != "" ? " AND $where " : "");
		    }

		    if ($order_by != "") 	$order_by 	= "ORDER BY $order_by ";
		    if (!empty($limit)) 	$limit 		= "LIMIT $limit ";
		    $where_keys = "SELECT $sql FROM $table $where $order_by $limit ";
		    $return = "";
		    if ($returnsql) {
		        echo "$where_keys<br>";
		    }

		    $baiviet = DB_que($where_keys);
		    $array = array();
		    while ($row = mysql_fetch_assoc($baiviet)) {
		        if ($col != "") {
		            $array[$row[$col]] = $row;
		        } 
		        else {
		            $array[] = $row;
		        }
		    }
		    $return = json_encode($array);
		    return $array;
		}
	function LAY_banner_new($where, $limit = "")
		{
			if($limit != "") {
				$danhsach_bn = DB_fet_rd("*", "`#_banner`", "$where", "`catasort` DESC, `id` DESC", $limit);
				if($limit == 1) return reset($danhsach_bn);
				return $danhsach_bn;
			}
			else {
				$danhsach_bn = DB_fet_rd("*", "`#_banner`", "$where", "`catasort` DESC, `id` DESC");
				return $danhsach_bn;
			}

	}



	// function NewProduct($limit = ""){
	// 		$check_gia  = DB_que("SELECT * FROM `#_step` WHERE `step` = '$step' ORDER BY `id` DESC LIMIT 1"); 
	// }
	
	function LAY_id_step($step) {
		$check_gia  = DB_que("SELECT * FROM `#_step` WHERE `step` = '$step' ORDER BY `id` DESC LIMIT 1"); 
		return mysql_result($check_gia, 0, "id");
	}
	
	function check_gia_sql($id_sp, $id_bvsl, $dongia){

		if($id_bvsl == "") return $dongia;
		$bvtinhnang   = DB_fet("*","`#_baiviet_thuoctinh`","`id_sp` = '".$id_sp."' AND `phien_ban` = '".trim($id_bvsl)."' ","","","arr");
		if(count($bvtinhnang)) {
			$dongia = $bvtinhnang[0]['gia'];
		}
        
	    return $dongia;
	}
	function LAY_danhmuc_co_ipr($step, $id_parent, $danhmuc) {
		if($id_parent == 0) return $id_parent;
		if($danhmuc[$id_parent]['id_parent'] != 0) {
			$id_f = $danhmuc[$id_parent]['id_parent'];
			$id_f_1 = $danhmuc[$id_f]['id_parent'];
			if($id_f_1 != 0) {
				$id_f_2 = $danhmuc[$id_f_1]['id_parent'];
				if($id_f_2 != 0) {
					$id_f_3 = $danhmuc[$id_f_2]['id_parent'];
					if($id_f_3 != 0) {
						$id_f_3 = $danhmuc[$id_f_2]['id_parent'];
						if($id_f_3 != 0) {
							$id_f_4 = $danhmuc[$id_f_3]['id_parent'];
							return $id_f_4;
						}
						return $id_f_3;
					}
					return $id_f_2;
				}
				return $id_f_1;
			}
			return $id_f;
		}
		return $id_parent;
	}
	function full_src_muti($rows, $thumb = 'thumb_', $col = "icon")
		{
			global $fullpath;
			if($rows[$col] != '') {
				return $fullpath."/".$rows['duongdantin']."/".$thumb.$rows[$col];
			}
			else {
				return $fullpath."/myadmin/images/no_image_400_312.jpg";
			}
		}

	function full_src($rows, $thumb = 'thumb_')
		{
			global $fullpath;
			if($rows['icon'] != '') {
				return $fullpath."/".$rows['duongdantin']."/".$thumb.$rows['icon'];
			}
			else {
				return $fullpath."/myadmin/images/no_image_400_312.jpg";
			}
		}
		
	function full_img($rows, $thumb = 'thumb_'){
		global $fullpath, $lang;
		if($rows['icon'] != '') {
			$link_img = $fullpath."/".$rows['duongdantin']."/".$thumb.$rows['icon'];
		}
		else {
			$link_img = $fullpath."/myadmin/images/no_image_400_312.jpg";
		}
		return '<img  src="" class="isload isload_full isload_full_1" data-original="'.$link_img.'" alt="'.$rows['tenbaiviet_'.$lang].'" />';
	}
	




	function full_img_hover($rows, $thumb = 'thumb_'){
		global $fullpath, $lang;
		if($rows['icon_hover'] != '') {
			return '<img  src="" class="isload isload_full isload_full_2" data-original="'.$fullpath."/".$rows['duongdantin']."/".$thumb.$rows['icon_hover'].'" alt="'.$rows['tenbaiviet_'.$lang].'" />';
		}
		return "";
		
	}
	function full_href($rows) {
		global $full_url;
		$link = $rows['seo_name'];
		$blank = "";
		if(strstr($link,"http://") != '' || 
  			strstr($link,"https://") != ''){
			$blank = "_blank";
		}

  		if(strstr($link,"http://") != '' || 
  			strstr($link,"https://") != '' || 
  			strstr($link,"tel:") != '' || 
  			strstr($link,"skype:") != '' || 
  			strstr($link,"mailto:") != '') {
  			$link = $rows['seo_name'];

  			return ' href="'.$link.'" target="'.(!empty($rows['blank']) ? $rows['blank'] : $blank).'" ';
  		}
  		else {
  			$link = $rows['seo_name'] == "" ? $full_url : $full_url."/".trim($link,"/");
  			if(!empty($rows['blank']) && $rows['blank'] != ""){
  				return ' href="'.$link.'" target="'.(!empty($rows['blank']) ? $rows['blank'] : $blank).'" ';
  			}
  			else return ' href="'.$link.'" ';
  		}
	}
	function GET_thang($id){
		if($id == 1) return "Jan"; //January
		if($id == 2) return "Feb"; //February
		if($id == 3) return "Mar"; //March
		if($id == 4) return "Apr"; //April
		if($id == 5) return "May"; //May
		if($id == 6) return "Jun"; //June
		if($id == 7) return "Jul"; //July
		if($id == 8) return "Aug"; //August
		if($id == 9) return "Sep"; //September
		if($id == 10) return "Oct"; //October
		if($id == 11) return "Nov"; //November
		if($id == 12) return "Dec"; //December
	}
	function las_url_lang($lang, $motty, $haity, $baty, $bonty, $namty) {
		global $fullpath;
		$las_url    = "";

		if($motty  != "") $las_url    .= "/".$motty;
		if($haity  != "") $las_url    .= "/".$haity;
		if($baty   != "") $las_url    .= "/".$baty;
		if($bonty  != "") $las_url    .= "/".$bonty;
		if($namty  != "") $las_url    .= "/".$namty;
		
		return $lang == "vi" ? $fullpath.$las_url."/" : $fullpath.'/en'.$las_url."/";
		
	}
	function LAY_sponline() {
		return DB_fet("*","`#_sponline`","`showhi` = 1","`catasort` ASC, `id` DESC", "","arr");
	}
	function admin_input($col = "", $col_val = "", $table = "", $id){
		if(!empty($_SESSION['admin'])){
      		return '<input type="checkbox" class="minimal minimal_click" colum="'.$col.'" idcol="'.$id.'" table="'.$table.'" value="1" '.($col_val == 1 ? 'checked="checked"' : "").'>';
      	}
      	return "";
	}
	function admin_input_text($col = "", $col_val = "", $table = "", $id){
		if(!empty($_SESSION['admin'])){
      		return '<input type="text" value="'.$col_val.'" onchange="UPDATE_colum(this, \''.$id.'\', \''.$col.'\', \''.$table.'\')">';
      	}
      	return "";
	}
	function admin_input_setting($id){
		if(!empty($_SESSION['admin'])){
			$check = DB_que("SELECT * FROM `#_module_setting` WHERE `id` = '$id' LIMIT 1");
			if(!mysql_num_rows($check)) return "";
			$check = mysql_fetch_assoc($check);
      		return "<div class='dv-sting'><span>".$check['ten_vi']."</span><input type='text' value='".$check['ten_key']."' onchange='UPDATE_colum(this, \"".$id."\", \"ten_key\", \"#_module_setting\")'><div class='clr'></div></div>";
      	}
      	return "";
	}
	function admin_check($is_mota = 0){
		if($is_mota == 1 || !empty($_SESSION['admin'])) return true;
		return false;
	}
	function f_link301() {
		$link_check 	 = urldecode(mb_strtolower(htmlspecialchars($_SERVER['REQUEST_URI'])));
		if($link_check  != "") {
			$link_check 	= rtrim($link_check,"/");
			$link_check_new = $link_check."/";

			$link_check  	= DB_que("SELECT * FROM `#_lienket` WHERE (`tenbaiviet_vi` = '$link_check' OR `tenbaiviet_vi` = '$link_check_new') AND `showhi` = 1 LIMIT 1");
			if(@mysql_num_rows($link_check)) {
				$link_check = mysql_fetch_assoc($link_check);
				if($link_check['lien_ket'] != "" && $link_check['lien_ket'] != $link_check['tenbaiviet_vi']) {
					//update
					DB_que("UPDATE `#_lienket` SET `thuc_hien` = `thuc_hien` + 1, `lan_cuoi` = '".time()."' WHERE `tenbaiviet_vi` = '".$link_check['tenbaiviet_vi']."' AND `showhi` = 1 LIMIT 1");
					//
					@header("HTTP/1.1 301 Moved Permanently"); 
					@header("Location: ".$link_check['lien_ket']); 
					exit();
				}
			}
		} 
	}
	function sanitize_output($buffer) {

        $search = array(
            '/\>[^\S ]+/s',
            '/[^\S ]+\</s',
            '/(\s)+/s',
            '/<!--(.|\s)*?-->/'
        );

        $replace = array(
            '>',
            '<',
            '\\1',
            ''
        );

        return preg_replace($search, $replace, $buffer);

    }
?>
