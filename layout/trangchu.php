<div class="bannerMain"> 
  <div class="pagewrap">
    <div class="box_title_banner">
      <ul>
        <h3>Thêm giá trị mỗi ngày</h3>
      </ul>
    </div>
  </div>
  
  
  <div class="banner">
    <li style='background-image:url(delete/banner_1.jpg);'> </li>
    <li style='background-image:url(delete/banner_2.jpg);'> </li>
    <li style='background-image:url(delete/banner_3.jpg);'> </li>
  </div>
  <a href="#" class="placeNav prev1"><i class="fa fa-angle-left"></i></a><a href="#" class="placeNav next1"><i class="fa fa-angle-right"></i></a> 
   <ul class="pagiBanner">
  </ul> <script type="text/javascript">
        jQuery(document).ready(function(){
			$(".banner").carouFredSel({
				circular: true,
				infinite: true,
				responsive: true,
				pagination: '.pagiBanner',
				auto : {pauseDuration : 2000,pauseOnHover  : true,duration: 1200,fx 		: "crossfade",},
				scroll	: {
					fx : "slide",items	: 1,
					onBefore: function( data ) {
						$('.banner li').not(data.items.visible[0]).find('.caption').animate({opacity: 0,visibility: 'hidden',bottom: -50});
						$(data.items.visible[0]).find('.caption').animate({opacity: 1,visibility: 'visible',bottom: 0},{queue:false,duration:1000});
					},
				},
				prev  : ".placeNav.prev1",
        next  : ".placeNav.next1",
				swipe: {onMouse: true,onTouch: true},
				items: {height: "variable",visible: {min: 1,max: 1}}
			});
        });
    </script>
  <div class="clr"></div>
</div>
