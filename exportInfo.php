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
	
	include 'config.php';
	include 'src/menu.php';
	include 'src/footer.php';
	include 'src/slideBar.php';
	include 'src/header.php';
	include 'src/function.php';
	connect_MySQL_host($hostDB, $usernameDB, $passwordDB, $nameDB);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Xuất thông tin</title>
	<meta name="description" content="Trang quản trị giám sát lượng mưa viết bởi Lê Hùng Email:lehungmt94@gmail.com">
	<meta name="keywords" content="Giám sát mưa, cảnh báo lũ">
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
			<?php echo $slideBar_export; ?>
			<!-- begin slideBar -->
			<div class="content-right fr">
				<h3>Gửi dữ liệu lên Google Drive</h3>
				<div class="main-content">
					<?php read_list_device_MySQL("excel");?>
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