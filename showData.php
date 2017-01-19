<?php 
//******************************************************************************
//                   
//                           WEBSITE SHOW CHAR DATA
//  Description: 
//  Project Name :        Giam sat luong mua
//  Note : 
//  Created day : 16/06/2016                               By : Lê Hùng
//  Last fixed :  16/06/2016                               By : Lê Hùng
//*******************************************************************************
	include 'config.php';
	include 'src/function.php';
	connect_MySQL_host($hostDB, $usernameDB, $passwordDB, $nameDB);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<script src="raphael-min.js"></script>
	<script src="jquery-1.8.2.min.js"></script>
	<script src="morris-0.4.1.min.js"></script>	
</head>

<body>
<?php 
					echo '<div id="line-example"></div>
							<script id="jsbin-javascript">';
					echo "Morris.Bar({
					element: 'line-example',
					data:";
					read_data_MySQL($_GET["id"]);
					echo ",
					xkey: 'y',
						ykeys: ['a'],
						ymax:600,
						pointFillColors: ['red'],
						lineColors: ['#009298'],
						labels: ['Lượng mưa (ml)']
					});";
					echo '</script>';
?>
</body>