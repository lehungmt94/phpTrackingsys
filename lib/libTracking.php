<?php	
//******************************************************************************
//                   
//                           LIBRARY FOR TRACKING 
//  Description: 
//  Project Name :        Giam sat luong mua
//  Note : 
//  Created day : 25/07/2016                               By : Lê Hùng
//  Last fixed :  25/07/2016                               By : Lê Hùng
//*******************************************************************************

	//Đọc các thông số của thiết bị
	function index_tracking(){
		echo '<h3>Thông tin trực quan hiện tại</h3>
					<div class="main-content items-new">
						<ul>
							<li>
								<h2>
									<a href="#" title="">Số thiết bị đang có trên hệ thống</a>
								</h2>
								<div class="item">';
									$count = read_list_device_Tracking();
									echo '<p>Tổng cộng có: <b>'.$count.'</b> thiết bị';
									echo '<div class="clr"></div>
								</div>
							</li>
							<li>
								<h2>
									<a href="#" title="">Các thiết bị đang hoạt động</a>
								</h2>
								<div class="item">';
									$count = read_list_device_Online();
									echo '<p>Tổng cộng có: <b>'.$count.'</b> thiết bị';
									echo '<div class="clr"></div>
								</div>
							</li>
							<li>
								<h2>
									<a href="#" title="">Những cảnh báo sự cố</a>
								</h2>
								<div class="item">
									<p>Hòa Khánh: Hết pin</p>
									<p>Hòa Cầm: Hết pin</p>
									<div class="clr"></div>
								</div>
							</li>
						</ul>
					</div>';
	}
	
	
	function read_list_device_Online(){
		
			$query = "
			  SELECT *
			  FROM devicecontrol
			  ORDER BY id ASC";
			$result = mysql_query( $query );

			// All good?
			if ( !$result ) {
			  // Nope
			  $message  = 'Invalid query: ' . mysql_error() . "\n";
			  $message .= 'Whole query: ' . $query;
			  die( $message );
			}

			// Print out rows
			$countDevice=0;
			while ( $row = mysql_fetch_assoc( $result ) ) {
				if(check_device_online($row['id'])){
				   echo '  •  '.$row['nameDevice'].'</br>'."\n";
				   $countDevice=$countDevice+1;
				}
			}
			return $countDevice;
			
	}
	
	function read_list_device_Tracking(){
		
			$query = "
			  SELECT *
			  FROM devicecontrol
			  ORDER BY id ASC";
			$result = mysql_query( $query );

			// All good?
			if ( !$result ) {
			  // Nope
			  $message  = 'Invalid query: ' . mysql_error() . "\n";
			  $message .= 'Whole query: ' . $query;
			  die( $message );
			}
			$countDevice=0;
			// Print out rows
			while ( $row = mysql_fetch_assoc( $result ) ) {
				  echo '  •  '.$row['nameDevice'].'</br>'."\n";
				  $countDevice=$countDevice+1;
				}
			return $countDevice;
			
	}
	
	function read_device_infomation($id){
			$query = "SELECT * FROM `devicecontrol` WHERE id=".$id;
			$result = mysql_query( $query );
			// All good?
			if ( !$result ) {
			  // Nope
			  $message  = 'Invalid query: ' . mysql_error() . "\n";
			  $message .= 'Whole query: ' . $query;
			  die( $message );
			}
			//PreFix
			echo '<table id="t01">
					<tr>
						<th><center>Thông số</center></th>
						<th><center>Nội dung</center></th> 
					</tr>';
			// Print out rows
			while ( $row = mysql_fetch_assoc( $result ) ) {
				echo '<tr>
						<td>Tình trạng kết nối: </td>
						<td>';
						if(check_device_online($id)) 
							echo 'Online';
						else 
							echo 'Offline';
				 echo'</td>
					</tr>';
				echo '<tr>
						<td>Mã xác thực: </td>
						<td>'.$row['key'].'</td>
					</tr>';
				echo '<tr>
						<td>Mô tả: </td>
						<td>'.$row['description'].'</td>
					 </tr>'; 
				echo '<tr>
						<td>Lần cập nhật lần cuối: </td>
						<td>'.$row['lastUpdate'].'</td>
					 </tr>';
				echo '<tr>
						<td>Mức cảnh báo l: </td>
						<td>'.($row['leveWarning']).' ml</td>
					 </tr>';
				echo '<tr>
						<td>Thời gian cập nhât: </td>
						<td>'.$row['timeUpdate'].' phút/lần</td>
					 </tr>';
				 break;
				}
			//sufFix
			echo '</table>';
				//echo $settingArr[description];
				//settingArr=array($nameDevice,$leveWarning,$timeUpdate,$key,$description);
			//return settingArr;
			
	}
	/*
	$timezone  = +7; //Múi giờ
	$realtime= gmdate("Y-m-j H:i:s", time() + 3600*($timezone+date("I"))); 
	$datetime1 = new DateTime(read_lastUpdate(2));
	$datetime2 = new DateTime($realtime);
	$interval = $datetime1->diff($datetime2);
	echo $interval->format('%a days');
	*/
?>
