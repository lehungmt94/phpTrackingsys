<?php
//******************************************************************************
//                   
//                           FUNCTION FOR SYSTEM 
//  Description: 
//  Project Name :        Giam sat luong mua
//  Note : 
//  Created day : 23/06/2016                               By : Lê Hùng
//  Last fixed :  21/01/2017                               By : Lê Hùng
//*******************************************************************************

$GLOBALS["DEBUG"]=false;

	function write_login_data($id,$name,$class,$time){	

				$sql=mysql_query("INSERT INTO login (`id`,`time`,`name`,`class`) value	('".$id."','".$time."','".$name."', '".$class."')");
				if($sql) {
					if($GLOBALS["DEBUG"]) echo 'write login_data successfull<br>';
					return 1;
				}
				else {
					if($GLOBALS["DEBUG"]) echo 'sql login_data error<br>';
					return 0;
				}
	}
	function write_collection_data($id, $temp, $rain, $realtime){	
		//$timezone  = +7; //Múi giờ
		//$realtime= gmdate("Y-m-j H:i:s", time() + 3600*($timezone+date("I"))); 
	
		 if(1){// $temp && $rain){
				$sql=mysql_query("INSERT INTO collection_data (`id` ,`time`, `temperature`, `rain`) value	('".$id."', '".$realtime."', '".$temp."', '".$rain."')");
				if($sql) {
					if($GLOBALS["DEBUG"]) echo 'write write_collection_data successfull<br>';
					return 1;
				}
				else {
					if($GLOBALS["DEBUG"]) echo 'sql write_collection_data error<br>';
					return 0;
				}
		}
		else{
				if($GLOBALS["DEBUG"]) echo 'sql write_collection_data error Null<br>';
				return 0;
			}
	}
	
	
	function write_lastUpdate($id){	
		$timezone  = +7; //Múi giờ
		$realtime= gmdate("Y-m-j H:i:s", time() + 3600*($timezone+date("I"))); 
	
		$sql=mysql_query('UPDATE devicecontrol SET lastUpdate="'.$realtime.'" WHERE id='.$id);
		//kiểm tra quá trình ghi dữ liệu có xảy ra lỗi
		if($sql) {
			if($GLOBALS["DEBUG"]) echo 'write write_lastUpdate successfull<br>';
			return 1;
		}
		else {
			if($GLOBALS["DEBUG"]) echo 'sql write_lastUpdate error<br>';
			return 0;
		}
	}
	
	
	
	function write_device_control($id, $nameDevice, $description, $key){	
		$sql=mysql_query("INSERT INTO devicecontrol (`id` ,`nameDevice`, `description`, `key`) value	('".$id."', '".$nameDevice."', '".$description."', '".$key."')");
		//kiểm tra quá trình ghi dữ liệu có xảy ra lỗi
		if($sql) {
			if($GLOBALS["DEBUG"]) echo 'write write_device_control successfull<br>';
			return 1;
		}
		else {
			if($GLOBALS["DEBUG"]) echo 'sql write_device_control error<br>';
			return 0;
		}
	}
	
	
	
	function read_data_MySQL($id){
		
			$query = "
			  SELECT *
			  FROM collection_data
			  ORDER BY time ASC";
			$result = mysql_query( $query );

			// All good?
			if ( !$result ) {
			  // Nope
			  $message  = 'Invalid query: ' . mysql_error() . "\n";
			  $message .= 'Whole query: ' . $query;
			  die( $message );
			}

			// Print out rows
			$i=0;
			$prefix = '';
			echo "[\n";
			while ( $row = mysql_fetch_assoc( $result ) ) {
				if($row['id']==$id){
				  echo $prefix . " {\n";
				  echo '  "y": "' . $row['time'] . '",' . "\n";
				  //echo '  "b": ' . $row['temperature'] . ',' . "\n";
				  echo '  "a": ' . $row['rain'] . '' . "\n";
				  echo " }";
				  $prefix = ",\n";
				}
				$i=$i+1;
				if($i==30) break;
			}
			echo "\n]";
			
			
	}
	
	
	function read_batery_MySQL($id){
		
			$query = "
			  SELECT *
			  FROM collection_data
			  ORDER BY time DESC";
			$result = mysql_query( $query );

			// All good?
			if ( !$result ) {
			  // Nope
			  $message  = 'Invalid query: ' . mysql_error() . "\n";
			  $message .= 'Whole query: ' . $query;
			  die( $message );
			}
			
			
			// Print out rows
			while ( $row = mysql_fetch_assoc( $result ) ) {
				if($row['id']==$id){
					echo  $row['temperature'];
					break;
				}
			}
			
	}

	
	function read_list_device_MySQL($lurl){
		
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

			
			while ( $row = mysql_fetch_assoc( $result ) ) {
				  echo '<li><a href="'.$lurl.'.php?id='.$row['id'].'">'.$row['nameDevice'].'</a></li>'."\n";
				}
			
			
	}
	
	
	
	
	function check_device_online($id){
		$timezone  = +7; //Múi giờ
		$realtime= gmdate("Y-m-j H:i:s", time() + 3600*($timezone+date("I"))); 
		$datetime1 = new DateTime(read_lastUpdate($id));
		$datetime2 = new DateTime($realtime);
		$interval = $datetime1->diff($datetime2);
		$hour= $interval->format('%h ');
		$minute= $interval->format('%i ');
		$diffTimeminute=(int)$minute+60*(int)$hour;
		//echo '<br>';
		//echo read_timeUpdate($id);
		//echo '<br>';
		//echo ($diffTimeminute - read_timeUpdate($id));
		if (($diffTimeminute - read_timeUpdate($id)) > 10){
			return false;
		}	
		else{
			return true;
		}
			
	}
	

	
	
	function read_device_name_MySQL($id){
		
			$query = "SELECT * FROM `devicecontrol` WHERE id=".$id;
			$result = mysql_query( $query );

			// All good?
			if ( !$result ) {
			  // Nope
			  $message  = 'Invalid query: ' . mysql_error() . "\n";
			  $message .= 'Whole query: ' . $query;
			  die( $message );
			}

			// Print out rows
			while ( $row = mysql_fetch_assoc( $result ) ) {
				  echo $row['nameDevice'];
				}
			
			
	}
	
	
	function read_lastUpdate($id){
			$query = "SELECT * FROM `devicecontrol` WHERE id=".$id;
			$result = mysql_query( $query );
			// All good?
			if ( !$result ) {
			  // Nope
			  $message  = 'Invalid query: ' . mysql_error() . "\n";
			  $message .= 'Whole query: ' . $query;
			  die( $message );
			}
			// Print out rows
			$row = mysql_fetch_assoc( $result ) ;
			return @$row[lastUpdate];
			//sufFix
				//echo $settingArr[description];
				//settingArr=array($nameDevice,$leveWarning,$timeUpdate,$key,$description);
			//return settingArr;
			
	}	
		
	
	function read_timeUpdate($id){
			$query = "SELECT * FROM `devicecontrol` WHERE id=".$id;
			$result = mysql_query( $query );
			// All good?
			if ( !$result ) {
			  // Nope
			  $message  = 'Invalid query: ' . mysql_error() . "\n";
			  $message .= 'Whole query: ' . $query;
			  die( $message );
			}
			// Print out rows
			$row = mysql_fetch_assoc( $result ) ;
			return @(int)$row[timeUpdate];
			//sufFix
				//echo $settingArr[description];
				//settingArr=array($nameDevice,$leveWarning,$timeUpdate,$key,$description);
			//return settingArr;
			
	}	
	
	
	function update_setting_device($id, $leveWarning, $timeUpdate){
		//UPDATE my_table SET my_column='new value' WHERE something='some value';
		//$sql=mysql_query("INSERT INTO devicecontrol (`id` ,`nameDevice`, `description`, `key`) value	('".$id."', '".$nameDevice."', '".$description."', '".$key."')");
		$sql=mysql_query('UPDATE devicecontrol
        SET leveWarning='.$leveWarning.'
        WHERE id='.$id);
		$sql=mysql_query('UPDATE devicecontrol
        SET timeUpdate='.$timeUpdate.'
        WHERE id='.$id);
		//kiểm tra quá trình ghi dữ liệu có xảy ra lỗi
		if($sql) {
			if($GLOBALS["DEBUG"]) echo 'write update_setting_device successfull<br>';
			return 1;
		}
		else {
			if($GLOBALS["DEBUG"]) echo 'sql update_setting_device error<br>';
			return 0;
		}
	}
	
	
	function connect_MySQL_host($address, $user_name, $password, $database_name){
		//Khởi tạo kết nối tới máy chủ
		$link = @mysql_connect( $address, $user_name, $password );
		//Kiểm tra nếu kết nối tới máy chủ SQL
		if(!$link){
			if($GLOBALS["DEBUG"]) echo "Không thể kết nối tới máy chủ SQL<br>";
			if($GLOBALS["DEBUG"]) echo "Mã lỗi: ".mysql_error()."<br>";
			return 0;
		}
		else
			if($GLOBALS["DEBUG"]) echo "Kết nối thành công<br>";
		
		mysql_select_db($database_name);	
	}
	

	
	function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
	$char_string="==";
    return $randomString.$char_string;
}
?>