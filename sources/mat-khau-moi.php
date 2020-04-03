<?php
    $email  = isset($_GET['email']) ? htmlentities($_GET['email']): '';
    $key    = isset($_GET['key']) ? htmlentities($_GET['key']): '';

    if(isset($_SESSION['id'])) LOCATION_js($full_url);

    $sql = DB_que("SELECT * FROM `#_members` WHERE `showhi` = 1 AND `email` = '".$email."' AND `active` = '".$key."' AND `phanquyen` = 0 LIMIT 1");
    if(!mysql_num_rows($sql)){
        ALERT_js($glo_lang['lien_ket_khong_hop_le_hoac_da_su_dung']);
        LOCATION_js($full_url);
        exit();
    }
?>
<script>
    $(function(){
        LOAD_popup_new("<?=$full_url ?>/pa-size-child/lay-mat-khau/?email=<?=$email ?>&key=<?=$key ?>","400px");
    });
</script>