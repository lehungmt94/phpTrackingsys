<?php 
session_start();
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
	include 'src/function.php';
	include 'src/menu.php';
	include 'src/footer.php';
	include 'src/slideBar.php';
	include 'src/header.php';
	
	@$_GET["id"];
	@$_GET["name"];
	@$_GET["key"];
	@$_GET["description"];
	$check=false;
	connect_MySQL_host($hostDB, $usernameDB, $passwordDB, $nameDB);
	if (isset($_SESSION['userid']) && @$_SESSION['username'] && $_SESSION['Email']){
		if(@$_GET["id"] && @$_GET["name"] && @$_GET["description"] && @$_GET["key"]){
			$check = write_device_control($_GET["id"],$_GET["name"],$_GET["description"],$_GET["key"]);
		}
		else
			if($GLOBALS["DEBUG"]) echo "loi du lieu trong";
	$ktdangnhap ='Vui lòng điền đầy đủ các thông tin sau(chý id có thể bị trùng):';
	}
	else{
		$ktdangnhap= 'Bạn chưa đăng nhập chức năng tạo thiết bị sẽ không hoạt động';
		$check=false;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<title>Thêm thiết bị giám sát</title>
	<meta name="description" content="Trang quản trị giám sát lượng mưa được phát triển bởi TAPIT">
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
			<?php echo $slideBar_addDevice; ?>
			<!-- begin slideBar -->
			<div class="content-right fr">
				<h3>Tạo thêm thiết bị giám sát mới</h3>
				<div class="main-content">
					<form action="" class="frmContact">
						<p><?php if (isset($_SESSION['userid']) && @$_SESSION['username'] && $_SESSION['Email'])
									echo 'Bạn đang đăng nhập với tài khoản: <font color=blue>'.$_SESSION['username'].'</font> Địa chỉ email: <font color=blue>'.$_SESSION['Email'].'</font><br/>';
							?></p>
						<p><?php echo $ktdangnhap; ?> </p>
						<div class="row">
							<label>ID thiết bị: </label>
							<input type="text" name="id" value="" <?php echo $check; ?>/>
							<label>Tên thiết bị: </label>
							<input type="text" name="name" value="" <?php echo $check; ?>/>
							<label>Khóa xác thực: </label>
							<input type="text" name="key" value="<?php echo generateRandomString(); ?>" <?php echo $check; ?>/>
						</div>
						<div class="row">
							<label>Mô tả đầy đủ(nên cung cấp thông tin về vị trí): </label>
							<textarea name="description" <?php echo $check; ?>></textarea>
						</div>
						<div class="row">
							<input class=button type="submit" name="submit" value="Xác nhận" />
							<input class=button type="reset" name="reset" value="Nhập lại" />
						</div>
					</form>
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
