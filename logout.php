<?php session_start(); ?>
<!DOCTYPE html>
<html>
	
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
       <?php 
       if (isset($_SESSION['userid']) && $_SESSION['username'] && $_SESSION['Email']){
           echo 'Bạn đang đăng nhập với tài khoản: '.$_SESSION['username'].' Email: '.$_SESSION['Email'].'<br/>';
           echo 'Click vào đây để đăng xuất <a href="logout.php">Logout</a>';
       }
       else{
           echo 'B?n chua dang nh?p';
       }
       ?>
    </body>
</html>
