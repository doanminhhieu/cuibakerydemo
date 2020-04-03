<script>
  $(function(){
  <?php 
    if(isset($_COOKIE['sp_yeuthich'])){
      $cooke = explode(",", $_COOKIE['sp_yeuthich']);
      foreach ($cooke as $ke) {
        if($ke == "") continue;
        echo '$(".p_yeuthich_'.$ke.'").addClass("acti");';
        echo '$(".p_yeuthich_'.$ke.'").attr("data", 1);';
      }
    }
  ?>
  })
</script>