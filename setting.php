<?php 
//******************************************************************************
//                   
//                           WEBSITE CONTROL INDEX
//  Description: 
//  Project Name :        Giam sat luong mua
//  Note : 
//  Created day : 21/07/2016                               By : Lê Hùng
//  Last fixed :  21/06/2016                               By : Lê Hùng
//*******************************************************************************
	
	include 'config.php';
	include 'src/function.php';
	include 'src/menu.php';
	include 'src/footer.php';
	include 'src/slideBar.php';
	include 'src/header.php';
	
	@$_GET["id"];
	@$_GET["name"];
	@$_GET["key"];
	@$_GET["description"];
	connect_MySQL_host($hostDB, $usernameDB, $passwordDB, $nameDB);
		
	//update_setting_device(3, 70, 99);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<title>Thiêm thiết bị giám sát</title>
	<meta name="description" content="Trang quản trị giám sát lượng mưa phát triển bởi TAPIT">
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
			<?php slideBar_setting(); ?>
			<!-- begin slideBar -->
			<div class="content-right fr">
			<?php
			//update_setting_device(1, 8, 90);
				if(!@$_GET["id"]){
					if(@$_GET["leveWarning"]){
						update_setting_device(@$_GET["_id"], @$_GET["leveWarning"], @$_GET["timeUpdate"]);
						echo "cập nhật xong";
					}
					else{
						echo "Chưa cập nhật";
					}
				}
				else{
					$query = "SELECT * FROM `devicecontrol` WHERE id=".@$_GET["id"];
					$result = mysql_query( $query );
	;
					// All good?
					if ( !$result ) {
					  // Nope
					  $message  = 'Invalid query: ' . mysql_error() . "\n";
					  $message .= 'Whole query: ' . $query;
					  die( $message );
					}

					// Print out rows
					while ( $row = mysql_fetch_assoc( $result ) ) {
						 $id = $row['id'];
						 $name = $row['nameDevice'];
						 $key = $row['key'];
						 $description = $row['description'];
						 $leveWarning= $row['leveWarning'];
						 $timeUpdate = $row['timeUpdate'];
				}
					echo '<h3>Cài đặt thông số cho thiết bị ';echo read_device_name_MySQL($_GET["id"]); echo '</h3>
					<div class="main-content">
						<form action="" class="frmContact">
							<p>Các thông số cài đặt gồm: </p>
							<div class="row">
								<label>ID nhận dạng: </label>
								<input type="text" name="_id" value="'.$id.'"readonly/>
								<label>Tên thiết bị: </label>
								<input type="text" name="nameDevice" value="'.$name.'" disabled/>
								<label>Ngưỡng cảnh báo </label>
								<input type="text" name="leveWarning" value="'.$leveWarning.'" />
								<label>Thời gian cập nhật </label>
								<input type="text" name="timeUpdate" value="'.$timeUpdate.'" />
								<label>Khóa xác thực: </label>
								<input type="text" name="key" value="'.$key.'" disabled/>
							</div>
							<div class="row">
								<label>Mô tả đầy đủ(nên cung cấp thông tin về vị trí): </label>
								<textarea name="description" disabled>'.$description.'</textarea>
							</div>
							<div class="row">
								<input class=button type="submit" name="submit" value="Xác nhận" />
								<input class=button type="reset" name="reset" value="Nhập lại" />
							</div>
						</form>';
				}
						?>
						<font color= "red" size="4"><?php if(@$check) echo 'Tạo thiết bị '.@$_GET["name"].' thành công';?></font>
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