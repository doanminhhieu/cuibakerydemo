<div class="dv-ul-menu dv-ul-menu-child-on <?=$motty != "" ? "dv-ul-menu-child" : "" ?>">
  <ul class="sub-1">
    <?php 
      $danhmuc = LAY_danhmuc(2);
      foreach ($danhmuc as $dm) { 
        if($dm['id_parent'] != 0) continue;
    ?>
      <li> 
        <a <?=full_href($dm) ?> class=""><?=full_img($dm, '') ?><?=full_img_hover($dm, '') ?><?=SHOW_text($dm['tenbaiviet_'.$lang]) ?></a>
        <?php 
          $list_dm = "";
          foreach ($danhmuc as $dm2) { 
            if($dm2['id_parent'] != $dm['id']) continue;
            $list_dm .= '<li><a '.full_href($dm2).' ><i class="fa fa-angle-right"></i>'.SHOW_text($dm2['tenbaiviet_'.$lang]).'</a>';

            $sli_dm3 = "";
            foreach ($danhmuc as $dm3) { 
              if($dm3['id_parent'] != $dm2['id']) continue;
              $sli_dm3 .= '<li><a '.full_href($dm3).' >'.SHOW_text($dm3['tenbaiviet_'.$lang]).'</a>';
            }

            $sli_dm3 = $sli_dm3 == "" ? "" : '<ul>'.$sli_dm3.'</ul>';



            $list_dm .= $sli_dm3.' </li>';
          }
          echo $list_dm != "" ? '<ul class="sub-2">'.$list_dm.'</ul>' : "";
        ?>
      </li>
      <?php } ?>
    </ul>
  </div>