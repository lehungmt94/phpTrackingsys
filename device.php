<?php
//******************************************************************************
//                   
//                           CONNET TO DEVICE
//  Description: 
//  Project Name:         Giam sat luong mua
//  Note : /device.php?id=1&temperature=23&rain=16&time=103517102015	2015-10-17 10:35:00
//  Created day : 23/06/2016                               By : Lê Hùng
//  Last fixed :  23/06/2016                               By : Lê Hùng
//******************************************************************************

	include 'config.php';
	include 'src/function.php';
	@$_GET["time"];
	if(@$_GET["time"]==null){
		$timezone  = +7; //Múi giờ
		$time_S= gmdate("Y-m-j H:i:s", time() + 3600*($timezone+date("I"))); 
	}else{
		$hour = substr($_GET["time"],0,2);
		$minute = substr($_GET["time"],2,2);
		$day = substr($_GET["time"],4,2);
		$mouth = substr($_GET["time"],6,2);
		$year = substr($_GET["time"],8,4);
		$time_S=$year.'-'.$mouth.'-'.$day.' '.$hour.':'.$minute.':00';
	}
	
	//echo $hour."<br>";echo $minute."<br>";echo $day."<br>";echo $mouth."<br>";echo $year."<br><br>";
	//echo $time_S;

	connect_MySQL_host($hostDB, $usernameDB, $passwordDB, $nameDB);
        write_lastUpdate($_GET["id"]);
	$temp_rain = $_GET["rain"];
	write_collection_data($_GET["id"],$_GET["temperature"],$temp_rain*20,$time_S);
	echo "ID: ".$_GET["id"];
	echo "<br>Nhiet do: ".$_GET["temperature"];
	echo "<br>Luong mua: ".$_GET["rain"]*20;
       // echo "<br>Thoi gian: ".$time_S;
?>