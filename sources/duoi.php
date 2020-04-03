
		  
 <?php include"footer.php";?>
 
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/jquery.lazyload.min.js"></script>
<script ype="text/javascript" src='js/jquery.sticky.js' type='text/javascript'></script> 
<script ype="text/javascript" src='menu_mb/jquery.mmenu.min.js' type='text/javascript'></script> 

<script type="text/javascript" src="js/me.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<script>

	$(".box_link_scroll").sticky({topSpacing:0});
	$(".scroll").click(function(){

        var str = $(this).attr("href");
        $('html, body').animate({
            scrollTop: $(str).offset().top

        }, 1000);

        return false;
    });


	$(function(){
	  	$("#nav-mobile").mmenu();
		$("#nav-mobile").show();
	});
</script>
 
<?php if(!empty($slug_step)){ ?>
<script>$(".active_mn_<?=$slug_step ?>").addClass("acti")</script>
<?php }else{ ?>
<script>$(".active_mn_01").addClass("acti")</script>
<?php } ?>
</div>
</body>
</html>