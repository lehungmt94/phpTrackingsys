<?php 
//******************************************************************************
//                   
//                           WEBSITE CONTROL INDEX
//  Description: 
//  Project Name :        Giam sat luong mua
//  Note : 
//  Created day : 16/06/2016                               By : Lê Hùng
//  Last fixed :  16/06/2016                               By : Lê Hùng
//*******************************************************************************

	
	include 'src/menu.php';
	include 'src/footer.php';
	include 'src/slideBar.php';
	include 'src/header.php';
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!--<meta http-equiv="refresh" content="http://tapit.hanhtrinhso.com/tracking.php?id=1">-->
	<title>Tracking system with PHP</title>
	<meta name="description" content="Tracking system with PHP">
	<meta name="keywords" content="Tracking, PHP, MCU learning">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="wrapper">
		<!-- begin header -->
		<?php echo $header; ?>
		<!-- end header -->
		
		<!-- begin menu -->
		<?php echo $menu; ?>
		<!-- end menu -->
		
		<!-- end content -->
		<div id="content">
			<!-- begin slideBar -->
			<?php echo $slideBar_index; ?>
			<!-- begin slideBar -->
			<div class="content-right fr">
				<h3>Giới thiệu</h3>
				<div class="main-content">
					<center><img src="images/phpsystem.png"  width="370px" alt="" /></center></br>
					<p>
						<strong>Tracking system with PHP </strong>là một mã nguồn miễn phí cho các hệ thống giám sát từ xa viết bằng PHP dùng cho Module SIM, ESP8266 xây dựng bởi Lê Hùng <br /><br />
					</p>
					<p>
						Hệ thống được xây dựng một cách đơn giản dùng làm bản mẫu Prototype cho các dự án về giám sát từ xa sử dụng IoT.
					</p></br>
					<p>
						Toàn bộ mã nguồn thiết kết tương thích với các phần cứng Module SIM của Hãng SIMCOM và module Wifi ESP8266 của SPARKFUN

					</p>
					<p></br>
						Điểm mạnh của hệ thống là có khả năng mở rộng kết nối với nhiều thiết bị không giới hạn
					</p></br>
					<p></br>
						<strong>Các chức năng bao gồm:</strong></br></br>
						-Giám sát thời gian thực</br>
						-Hệ thống đăng nhập đơn giản</br>
						-Cài đặt thời gian cập nhật</br>
						-Cấu hình các ngưỡng cảnh báo</br>
						-Xuất dữ liệu ra file excel</br>
					</p>	 
				</div>
			</div>
			<div class="clr"></div>
		</div>
		<!-- end content -->
		
		<!-- begin footer -->
		<?php echo $footer; ?>
		<!-- end footer -->
	</div>
</body>
</html>
