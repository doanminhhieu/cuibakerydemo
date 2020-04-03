<script>
  $(function(){
  <?php 
    if(isset($_SESSION['id'])){
      $check = DB_que("SELECT * FROM `#_yeuthich` WHERE `showhi` = 1 AND `id_member` = '".$_SESSION['id']."'  GROUP BY `id_baiviet` ORDER BY `id` DESC"); 

      $check_click    = "";
      while ($rows    = mysql_fetch_assoc($check)) {
        $check_click .= $check_click == "" ? '.check_click_'.$rows['id_baiviet'] : ",.check_click_".$rows['id_baiviet'];
      }
      echo '$("'.$check_click.'").addClass("acti");';
    }
  ?>
  })
</script>