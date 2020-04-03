<?php if(!empty($_SESSION['show_message_on'])){ ?>
<script>$(function(){$('.alert').delay(2000).slideUp(1000);})</script>
<div class="alert alert-success alert-dismissible" >
  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  	<i class="icon fa fa-check"></i>Thành công! <?=$_SESSION['show_message_on'] ?>
</div>
<?php unset($_SESSION['show_message_on']); ?>

<?php } else if(!empty($_SESSION['show_message_off'])){ ?>
<script>$(function(){$('.alert').delay(2000).slideUp(1000);})</script>
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fa fa-ban"></i>Lỗi! <?=$_SESSION['show_message_off'] ?>
</div>
<?php unset($_SESSION['show_message_off']) ?>
<?php } ?>

