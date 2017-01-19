<?php 
//******************************************************************************
//                   
//                           WEBSITE CONTROL INDEX
//  Description: 
//  Project Name :        Giam sat luong mua
//  Note : 
//  Created day : 21/07/2016                               By : Lê Hùng
//  Last fixed :  16/07/2016                               By : Lê Hùng
//*******************************************************************************
	include 'config.php';
	include 'src/function.php';
	include 'src/menu.php';
	include 'src/footer.php';
	include 'src/slideBar.php';
	include 'src/header.php';
if(isset($_POST['ok']))
{
$u=$p="";
 if($_POST['username'] == NULL)
 {
  $_nullUsername = "Please enter your username<br />";
 }
 else
 {
  $u=$_POST['username'];
 }
 if($_POST['password'] == NULL)
 {
  $_nullPassword= "Please enter your password<br />";
 }
 else
 {
  $p=$_POST['password'];
 }
 if($u && $p)
 {
  connect_MySQL_host($hostDB, $usernameDB, $passwordDB, $nameDB);
  $sql="select * from user where username='".$u."' and password='".$p."'";
  $query=mysql_query($sql);
  if(mysql_num_rows($query) == 0)
  {
   $ktdangnhap="Tên đăng nhập và tài khoản này không tồn tại";
  }
  else
  {
   $row=mysql_fetch_array($query);
   session_start();
   @$_SESSION['userid'] = $row[id];
   @$_SESSION['username'] = $row[username];
   @$_SESSION['Email'] = $row[email];
   $ktdangnhap='Đăng nhập thành công';
  
  }
 }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Giám Sát Lượng Mưa - Login</title>
	<meta name="description" content="Trang qu?n tr? gi�m s�t lu?ng mua vi?t b?i L� H�ng Email:lehungmt94@gmail.com">
	<meta name="keywords" content="Gi�m s�t mua, c?nh b�o lu">
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
			<?php slideBar_login(); ?>
			<!-- begin slideBar -->
			<div class="content-right fr">
				<h3>Đăng nhập</h3>
				<div class="main-content">
					<form action='login.php' class="frmContact" method='post'>
						<div class="row">
							<center>
							<label>Tên đăng nhập </label>
							<input type='text' name='username' /><br />
							<label>Password</label> 
							<input type='password' name='password' /><br /> <br />
							<input class=button type='submit' name='ok' value='Đăng Nhập' />
							</center>
						</div>
					</form>
					<center><?php echo @$ktdangnhap; echo @$_nullUsername; echo @$_nullPassword;  ?></center>
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




