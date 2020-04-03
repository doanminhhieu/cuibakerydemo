<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đang kết nối dữ liệu...</title>
</head>
<body>
	<div style="padding: 10px; font-size: 13px; font-family: Arial; letter-spacing: 1px;">[<span id="time">15</span>s] Đang kết nối dữ liệu, xin vui lòng chờ trong giây lát <span id="chamcham">.</span> </div></div>
	<script>
		var time = 15;
		var cham = ".";
		setInterval(function(){ 
			time--;
			cham = cham + ".";
			if(cham == ".......") cham = ".";
			if(time > 0) {
				document.getElementById("time").innerHTML = time;
				document.getElementById("chamcham").innerHTML = cham;
			}
			else {
				window.location.reload();
			}
		}, 1000);
	</script>
</body>
</html>