<?php 
  if(isset($_GET['clear'])) {
    unset($_SESSION['list_key_img_otime']);
  }
  function rescandir($path, &$a_stt)
  {
      $data       = @scandir($path);
      $array_dif  = array('.', '..');
      $array_validimges = array('png', 'jpg', 'gif', 'jpeg', 'ico');
      if(is_array($data)) {
        foreach ($data as $row) {
          if (in_array($row, $array_dif))
              continue;
          $str = $path . '/' . $row;
          if (is_dir($str))
              rescandir($str, $a_stt);

          $str_temp = explode('.', $str);
          if (!in_array($str_temp[count($str_temp) - 1], $array_validimges))
              continue;
          echo '<li class="'.md5($str).'">'.$str.'<input type="hidden" class="js_load_images_compress" data="'.md5($str).'" id="'.md5($str).'" value="'.$str.'"></li>';
          $a_stt++;
        }
      }
      
  }
  

?>
    <section class="content-header">
      <h1>
        Thống kê lượt truy cập
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Thống kê</li>
      </ol>
    </section>
    <?php if(isset($_SESSION['admin'])){ ?>
    <style>
      .dv_optime_img li.acti { color: #1180c1; }
      .dv_optime_img li.fal { color: red; }
      .dv_optime_img li { white-space: nowrap; text-overflow: ellipsis; overflow: hidden; margin-top: 3px; font-size: 12px; list-style: none}
    </style>
    <section class="content" style="min-height: 0; padding-bottom: 0;">
      <form action="myadmin/index.php" method="get">
        <label style="margin-bottom: 0 !important;">
          <input type="text" style="width: 250px; height: 28px; border: 1px solid #ccc; border-radius: 4px; padding: 0 7px; font-weight: 500; float: left; margin-right: 7px" name="compress-image" value="<?=isset($_GET['compress-image']) ? $_GET['compress-image'] : 'datafiles' ?>">
          <button type="submit" style="border: 1px solid #ccc; height: 28px; padding: 0 15px; border-radius: 2px; float: left;" class="js_sm_press">Compress Image <span></span></button>
          <a href="myadmin/index.php?clear=ok" style="border: 1px solid #ccc; height: 28px; padding: 0 15px; border-radius: 2px; float: left; background: #dddddd; color: #333; line-height: 28px; margin-left: 7px;">Clear</a>
          <div class="clr"></div>
        </label>
      </form>
      <?php if(isset($_GET['compress-image']) && $_GET['compress-image'] != ''){ ?>
      <div class="dv_optime_img">
        <?php $a = 0; echo rescandir("../".$_GET['compress-image'], $a) ?>
      </div>
      <script>
        $(".js_sm_press").html("Compress Image <span>[0/<?=@$a ?>]</span>");
        var tcong = 0
        function SEND_compress_img() {
          $('.js_load_images_compress').each(function(){
            var data_comp  = $(this).attr('data');
            var img_comp   = $(this).val();
            $("#"+data_comp).remove();
            $("."+data_comp).append('<img src="images/loading8.gif" alt="" style="max-height: 10px; margin-left: 5px">');
            $.ajax({
                type: "POST",
                url: window.location.href,
                data: {'ajax_action': 'compress_img','data_comp': data_comp, 'img_comp': img_comp},
                success: function(response)
                {
                  if(response == 1) {
                    $("."+data_comp).addClass('acti');
                    tcong++;
                  }
                  else {
                    $("."+data_comp).addClass('fal');
                  }
                  $("."+data_comp+" img").remove();
                  $(".js_sm_press").html("Compress Image <span>["+tcong+"/<?=@$a ?>]</span>");
                  // console.log(data);
                  console.log(response);
                  // 
                  
                  SEND_compress_img();
                }
            });
            return false;
          });
        };
        SEND_compress_img();
      </script>
      <?php } ?>
    </section>
    <?php } ?>
    <section class="content">
      <div class="row">
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
                <h2 class="h2_title">
                    <i class="fa fa-dashboard"></i>
                    Thống kê lượt truy cập trong 10 ngày gần nhất
                </h2>
            </div>
            <div class="box-body">
              <div id="bar-chart" style="height: 300px;"></div>
            </div>
            <div class="box-footer">
              <?php
                $tong_luot = DB_fet("SUM(count) AS `tong_luot`", "#_count_date");
                echo 'Tổng lượt truy cập: '.mysql_result($tong_luot, 0, "tong_luot");
              ?>
            </div>
          </div>
        </section>
      </div>
    </section>

  <script type="text/javascript">
    $(document).ready(function() {
    <?php
      $string_data = '';
      for($i = 9; $i>=0; $i--){
        $d = date('d-m-Y', time() - $i*86400);
        $date = explode('-', $d);
        $sl = so_luong_theo_dmy($date[0],$date[1],$date[2]);
        $string_data .= "['$d',$sl],";
      } 
    ?>
      var bar_data = {
        data : [<?=trim($string_data,',')?>],
        color: '#3c8dbc'
      };
      $.plot('#bar-chart', [bar_data], {
        grid  : {
          borderWidth: 1,
          borderColor: '#f3f3f3',
          tickColor  : '#f3f3f3'
        },
        series: {
          bars: {
            show    : true,
            barWidth: 0.5,
            align   : 'center'
          }
        },
        xaxis : {
          mode      : 'categories',
          tickLength: 0
        }
      });
    });
  </script>