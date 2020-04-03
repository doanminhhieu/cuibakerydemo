<style>
  .ul_notifile > a > span { width: 16px; height: 16px; line-height: 16px; position: absolute; top: 6px; right: 5px; background: #FF9800; text-align: center; border-radius: 100px; font-size: 10px; }
  .ul_notifile:hover > a{    background: rgba(0,0,0,0.1);    color: #f6f6f6;}
  .ul_notifile ul { position: absolute; width: 184px; list-style: none; background: #367fa9; padding: 10px; border-radius: 0 0 6px 6px; display: none}
  .ul_notifile:hover ul { display: block}
  .ul_notifile ul li a:hover { color: #ffeb00;}
  .ul_notifile ul li a { color: #fff; padding: 5px 0; display: block; }
  .ul_notifile ul li + li { border-top: 1px solid #ffffff29; }
  .ul_notifile ul li a span { width: 20px; height: 20px; float: right; display: inline-block; background: #ff9800; text-align: center; line-height: 20px; border-radius: 100px; font-size: 10px; position: relative; top: -1px; }
  .num_soluong_chuong {display: none}
</style>
<nav class="navbar navbar-static-top">
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="ul_notifile">
        <a><i class="fa fa-bell-o" aria-hidden="true"></i> <span class="num_soluong_chuong"></span></a>
        <ul class="ul_js_load_nuti"></ul>
        <script>
          function check_noti_end() {
            $.ajax({
              type: "POST",
              url: "index.php",
              data: {"ajax_action": "check_noti_end", "action" : "<?=$action ?>", "step" : "<?=$step ?>" },
              success: function(data) {
                
                try {
                    data = JSON.parse(data);
                    if(data.tongso != 0) {
                      $(".num_soluong_chuong").html(data.tongso);
                      $(".num_soluong_chuong").show();
                    } 
                    $(".ul_js_load_nuti").html(data.text);
    
                } catch (e) {
                  console.log(data);
                }
              }
            });
          }
          var tim_check  = 60;
          setInterval(function(){ 
            tim_check--;
            if(tim_check == 0) {
              tim_check  = 60;
              check_noti_end();
            }
         }, 1000);
          $(function(){
            check_noti_end();
          });
        </script>
      </li>
      <?php if( $_SESSION['phanquyen'] == 1) { ?>
      <!-- Quan ly main menu-->
      <li>
        <a href="?module=quan-ly-main-menu&action=danh-sach-main-menu">
          <i class="fa fa-navicon"></i>
          Main module
        </a>
      </li>
      <?php } ?>
      <!-- Dien thoai ho tro-->
      <li>
        <a href="tel:1900 9477">
          <i class="fa fa-phone"></i>
          Hỗ trợ 24/7: 1900 9477
        </a>
      </li>
      <!-- Link toi mail ho tro -->
      <li>
        <a href="mailto:web@pavietnam.vn">
          <i class="fa fa-envelope-o"></i>
          web@pavietnam.vn
        </a>
      </li>
      <!-- Ra trang chinh ben ngoai-->
      <li>
        <a href="?module=quan-ly-thanh-vien&action=dang-xuat">
          <i class="fa fa-sign-out"></i>
          Đăng xuất
        </a>
      </li>
    </ul>
  </div>
</nav>
