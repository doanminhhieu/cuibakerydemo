
<header>
    <div class="header_top">

      <div class="contact_top">
          <div class="container">
              <ul class="no_style list_contac_top">
                <li><i class="fa fa-home"></i><?=$glo_lang['slugan_1'] ?></li>
              </ul>
          </div>
        </div>
        <div class="container">
            
            <div class="box_header_top cl">
                <div class="left_header_top">
                    <div class="logo">
                       <a href="<?=$full_url ?>"><img src="<?=full_src($thongtin,'') ?>" alt="<?=$thongtin['tenbaiviet_'.$lang] ?>"></a>
                    </div>
                </div>

                <div class="right_header_top">
                    <ul class="static no_style flex">
                        <li class="static_p">
                          <p class="static-title">Hotline</p>
                          <p class="static-info"> 0918.036.835  - 0328.616.294 </p>
                        </li>                
                        <li class="static_e">
                          <p class="static-title">Email</p>
                          <p class="static-info">cuibakery@gmail.com</p>
                        </li>                
                        <li class="static_t">
                          <p class="static-title">Open</p>
                          <p class="static-info"> 8AM - 9:30 PM</p>
                        </li>
                   </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container">
            <div class="box_h_bottom flex">
              <div class="left_h_bottom">
                <?php include _source."menu_top.php"; ?>
              </div>
              <div class="right_h_bottom">
                 <ul class="no_style">
                   <li>
                     <a class="btn_search" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                     <div class="box_form">
                        <form class="form_search">
                            <input type="text" placeholder="Nhập tên bánh cần tìm ?" class="input_search input_search_enter input_keyword" data=".input_search_enter" data-href="<?=$full_url ?>/search/?key=" class="input_keyword">
                            <a class="btn_submit" onClick="SEARCH_timkiem('<?=$full_url ?>/search/?key=','.input_search_enter'); if($('.input_search_enter').val() == '') $('.timkiem_top').removeClass('acti') " style="cursor:pointer"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </form>
                      </div>
                   </li>
                   <li>
                     <a class="btn_cart" href="#">
                      <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                      <span class="number_cart">0</span>
                    </a>
                   </li>
                 </ul>
              </div>
                
            </div>

        </div>
        
    </div>
</header>




