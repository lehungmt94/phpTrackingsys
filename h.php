<?php 
//******************************************************************************
//                   
//                           WEBSITE RESPOSE FOR MODULE SIM
//  Description: 
//  Project Name :        Giam sat luong mua
//  Note : /h.php?id=12 	id|timeUpdate|leveWarning
//  Created day : 21/07/2016                               By : Lê Hùng
//  Last fixed :  23/07/2016                               By : Lê Hùng
//*******************************************************************************
include 'config.php';
include 'src/function.php';
connect_MySQL_host($hostDB, $usernameDB, $passwordDB, $nameDB);

$query = "SELECT * FROM `devicecontrol`";
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
						 echo '|'.$row['id'].'|'.$row['timeUpdate'].'|'.($row['leveWarning']);
				}
				echo '|';
?>