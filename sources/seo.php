<title><?=$seo_title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta http-equiv="Content-Language" content="vn" />
<link rel="canonical" href="<?=$full_url?>/<?=$motty?>">
<meta name="description" content="<?=$seo_description ?>">
<meta name="keywords" content="<?=$seo_keywords ?>">
<meta property="og:url" content="<?=$full_url.$_SERVER["REQUEST_URI"] ?>">
<meta property="og:title" content="<?=$seo_title ?>">
<meta property="og:description" content="<?=$seo_description?>">
<meta property="og:type" content="website">
<meta property="og:image" content="<?=$seo_image ?>">
<meta property="og:site_name" content="<?=$seo_title?>">
<link rel="image_src" href="<?=($seo_image != '') ? $seo_image : $fullpath."/".$thongtin["duongdantin"]."/".$thongtin["favico"] ?>">
<link rel="shortcut icon" href="<?=$fullpath."/".$thongtin["duongdantin"]."/".$thongtin["favico"] ?>" type="image/x-icon">
<meta itemprop="name" content="<?=$seo_title?>">
<meta itemprop="description" content="<?=$seo_description?>">
<meta itemprop="image" content="<?=$seo_image ?>">
<meta itemprop="url" content="<?=$full_url.$_SERVER["REQUEST_URI"] ?>">
 