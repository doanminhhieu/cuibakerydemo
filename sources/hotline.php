<style>
  .dv-hot-line { position: fixed; bottom: 50px; left: 0px; z-index: 999; height: 40px;; top: auto !important;} 
  .dv-hot-line .ontt {position: relative;}
  .dv-hot-line a { position: initial; top: auto; bottom: auto; left: -30px; width: 120px; height: 120px; }
  .dv-hot-line h2 { position: relative; left: 50px !important; line-height: 40px; bottom: auto; white-space: nowrap;width: 200px;}
  .dv-hot-line .dmd-phone h2 { border-radius: 1000px; }
  .dv-hot-line .dmd-ph-img-circle { top: -0px; left: 50px; }
  .dv-hot-line .dmd-ph-circle-fill { top: -20px; left: 30px; }
  .dv-hot-line .dmd-ph-circle { top: -40px; left: 10px; }
  @media only screen and (max-width: 767px) {
    .dmd-phone h2 { font-size: 16px; height: 35px; line-height: 35px; width: 175px !important; }
  }
</style>
<div class="dv-hot-line no_box">
  <div class="ontt">
  <a href="tel:<?=$thongtin['hotline_'.$lang] ?>" class="popup dmd-phone dmd-green dmd-show mobile" title="Hotline">
    <!-- <h2><?=$thongtin['hotline_'.$lang] ?></h2> -->
    <div class="dmd-ph-circle"></div>
    <div class="dmd-ph-circle-fill"></div>
    <div class="dmd-ph-img-circle"></div>
    </a>
  </div>
</div>