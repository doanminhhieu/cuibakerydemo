<?php 
    if(!defined("MOTTY")) die('???');
    $page       = isset($_POST['page']) ? $_POST['page'] : 0;
    $total      = isset($_POST['total']) ? $_POST['total'] : 0;
    $numview    = isset($_POST['numview']) ? $_POST['numview'] : 0;
    $step       = isset($_POST['step']) ? $_POST['step'] : 0;
    $whe        = isset($_POST['whe']) ? $_POST['whe'] : "";

    if(!is_numeric($numview))  $numview      = 8; 

    if ($page < 1)  $page = 1;
    $start = ($numview * $page) - $numview;
    $wh = "";

    if($whe != "") {
        $whe = explode(">>>", $whe);
        foreach ($whe as $key => $vlue) {
            if($vlue == "") continue;
            $vlue = explode("|==|", $vlue);
            if(@$vlue[0] == "opt2") $wh .= " AND `opt2` = 1";
            if(@$vlue[0] == "key") $wh .= " AND `tenbaiviet_".$lang."` LIKE '%".@$vlue[1]."%' ";
        }
    }

    $nd_kietxuat  = DB_que("SELECT * FROM `#_baiviet` WHERE `showhi` =  1 AND `step` = '".$step."' $wh ORDER BY `catasort` DESC, `id` DESC LIMIT $start,".$numview);


    $i           = 0;
    while ($rows = mysql_fetch_assoc($nd_kietxuat)) { 
        $i ++;
?>
<ul>
    <a <?=full_href($rows) ?>>
        <li><img src="<?=full_src($rows) ?>" alt="<?=SHOW_text($rows['tenbaiviet_'.$lang]) ?>"></li>
        <h3><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></h3>
        <?php if($haity == "video"){ ?>
        <p><i class="fa fa-eye"></i><?=number_format($rows['soluotxem']) ?> <span><?=$glo_lang['luot_xem'] ?></span><i class="fa fa-calendar-check-o"></i><?=date("d/m/Y", $rows['ngaydang']) ?></p>
        <?php } ?>
    </a>
</ul>
<?php } ?>
<?php 
    if ($total <= ($numview * $page)){
        echo '<script language="javascript">stopped = true; $(".button_readmore").hide();  </script>';
    }
?>