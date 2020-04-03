<div id="owl-demo" class="owl-carousel owl-theme dv-ow-slhome">
  <?php  
    $table = DB_fet("*", "#_danhmuc", "`showhi` = 1 AND `id_parent` = 0 AND `step` = 2","`catasort` DESC","", "arr");
    foreach ($table as $rows) { 
  ?>
  <ul class="item">
      <li class="onePro_2 "> <a href="<?=GET_link($full_url, SHOW_text($rows['seo_name'])) ?>/">
        <div  class="proImg"> <img src="<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin'], '400_312', 'thumb_') ?>" width="250" height="250" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"> </div>
        <h4><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></h4>
        </a> 
      </li>
  </ul>
  <?php } ?>
</div>
<script type="text/javascript">
      $(document).ready(function() {
    $(".dv-ow-slhome").owlCarousel({
      navigation : true,
      slideSpeed : 300,
      paginationSpeed : 400,
      items : 1,
      itemsCustom : [
        [0, 1],
        [450, 2],
        [600, 2],
        [700, 3],
        [1000, 4],
        [1200, 4],
        [1400, 4],
        [1600, 4]
        ],
      autoPlay: true,
      navigationText : ["‹","›"]
    });
  });
</script>