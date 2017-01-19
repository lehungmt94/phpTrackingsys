<?php 
//******************************************************************************
//                   
//                           WEBSITE CONTROL INDEX
//  Description: 
//  Project Name :        Giam sat luong mua
//  Note : 
//  Created day : 16/06/2016                               By : Lê Hùng
//  Last fixed :  21/07/2016                               By : Lê Hùng
//*******************************************************************************
	include 'config.php';
	include 'src/menu.php';
	include 'src/footer.php';
	include 'src/slideBar.php';
	include 'src/header.php';
	include 'src/function.php';

        include 'lib/libTracking.php';

	connect_MySQL_host($hostDB, $usernameDB, $passwordDB, $nameDB);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Giám sát thời gian thực</title>
	<meta name="description" content="Trang quản trị giám sát lượng mưa được phát triển bởi TAPIT">
	<meta name="keywords" content="Giám sát mưa, cảnh báo lũ">
	<script src="raphael-min.js"></script>
	<script src="jquery-1.8.2.min.js"></script>
	<script src="morris-0.4.1.min.js"></script>

	<script>
		window.setInterval("reloadIFrame();", 5000);
		function reloadIFrame() {
		 document.getElementById("myFrame").src="showData.php?id=<?php echo $_GET["id"]; ?>";
		}
	</script>
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
			<?php slideBar_tracking();?>
			<!-- begin slideBar -->
			<div class="content-right fr">
			<?php
				if(!$_GET["id"]){
					index_tracking();
				}
				else{
					/*
					echo '<h3>Tên thiết bị: '; read_device_name_MySQL($_GET["id"]); echo'</h3>';
					echo '<div id="line-example"></div>
							<script id="jsbin-javascript">';
					echo "Morris.Line({
					element: 'line-example',
					data:";
					read_data_MySQL($_GET["id"]);
					echo ",
					xkey: 'y',
						ykeys: ['a', 'b'],
						ymax:120,
						smooth: false,
						labels: ['Nhiệt độ(°C)', 'Lượng mưa(ml)'],
						lineColors: ['#CC0000','#0000CC']
					});";
					echo '</script>';
					*/
					echo '<h3>Tên thiết bị: '; read_device_name_MySQL($_GET["id"]); echo'</h3>';
					echo '<iframe id="myFrame" scrolling="no" frameborder="0" height=400px width=600px src="showData.php?id='.$_GET["id"].'"></iframe>';
					echo '<h3>Dung lượng Pin hiện tại:</h3><center><font size="5px">';
					read_batery_MySQL($_GET["id"]);
					echo '%</font></center>';
                                        echo '</br><h3>Bảng Thông Số:</h3>';
                                        read_device_infomation($_GET["id"]);
				}
				?>
				

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
