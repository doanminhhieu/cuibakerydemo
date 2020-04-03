<?php
	// header('Content-Type: text/plain');
	header("Content-type: text/xml");
	echo '<?xml version="1.0" encoding="UTF-8"?>
	<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$sitemap = '<url>
	        <loc>'.$fullpath.'</loc>
	        <priority>1</priority>
	      </url>';

	    $arrsitemap = DB_que("SELECT * FROM `#_slug` ORDER BY `id` DESC");
	    while($row  = mysql_fetch_array($arrsitemap))
	    {
	      	$sitemap .= '<url>
	             <loc>'.$fullpath."/".$row['slug'].'/</loc>
	             <priority>'.(RAND(111,999)/1000).'</priority>
	            </url>';
	        $sitemap .= '<url>
	             <loc>'.$fullpath."/en/".$row['slug'].'/</loc>
	             <priority>'.(RAND(111,999)/1000).'</priority>
	            </url>';
	    }
	    $sitemap .= '</urlset>';
	echo $sitemap;
?>