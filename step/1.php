<?php
	$arr_running = DB_fet_rd("*", "#_baiviet", "`step` = '".$slug_step."'", "`catasort` DESC, `id` DESC", 1); 
	$arr_running = reset($arr_running);
  	include "1a.php";
?>