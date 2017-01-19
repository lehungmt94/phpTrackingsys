<?php

function slideBar_tracking(){
	echo '<div class="content-left fl">
				<h3>Danh dách các thiết bị</h3>
				<ul>';
					read_list_device_MySQL('tracking');
	echo		'</ul>
			</div>';
	
}

function slideBar_setting(){
	echo '<div class="content-left fl">
				<h3>Danh dách các thiệt bị</h3>
				<ul>';
					read_list_device_MySQL('setting');
	echo		'</ul>
			</div>';
	
}

function slideBar_login(){
	echo '<div class="content-left fl">
				<h3>Nội dung chính</h3>
				<ul>
					<li><a href="#">Đăng ký</a></li>
					<li><a href="exit.php">Đăng xuất</a></li>
					<li><a href="#">Quên mật khẩu</a></li>
				</ul>
			</div>';
	
}

$slideBar_index ='<div class="content-left fl">
				<h3>Nội dung chính</h3>
				<ul>
					<li><a href="#">Giới thiệu chung</a></li>
					<li><a href="#">Góc nhìn thiết bị</a></li>
					<li><a href="#">Tổng quan về sơ đồ</a></li>
					<li><a href="#">Giải pháp công nghệ</a></li>
				</ul>
			</div>';
			
			

			
$slideBar_addDevice ='<div class="content-left fl">
				<h3>Hướng dẫn</h3>
				<ul>
					<li><i>Cần điền đầy đủ các thông tin<br>Cung cấp mô tả chính xác sẽ tạo hiệu quả cao trong quản lý</i></li>
					<li>-----------------------------</li>
					<li><a href="setting.php"><font color="#CC0000">Cài đặt chung</font></a></li>

				</ul>
			</div>';
			
$slideBar_export ='<div class="content-left fl">
				<h3>Hướng dẫn</h3>
				<ul>
					<li>Quá trình này sẽ Tạo các bản báo cáo</li>
					<li>Nội dung các báo cáo sẽ được lưu trữ tại google Drive</li>

				</ul>
			</div>';
?>