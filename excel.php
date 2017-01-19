<?php 
//******************************************************************************
//                   
//                           WEBSITE MAKE FILE EXCEL DATA
//  Description: 
//  Project Name :        Giam sat luong mua
//  Note : 
//  Created day : 08/08/2016                               By : Lê Hùng
//  Last fixed :  08/08/2016                               By : Lê Hùng
//*******************************************************************************

?>

<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data.xls");
header("Pragma: no-cache");
header("Expires: 0");
	include 'config.php';
	include 'src/function.php';
	connect_MySQL_host($hostDB, $usernameDB, $passwordDB, $nameDB);
//Đọc dữ liệu từ MySQL
	function read_data_MySQL_export_excel($id){
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
			$prefix = '';
			
			while ( $row = mysql_fetch_assoc( $result ) ) {
				if($row['id']==$id){
					echo "<tr>";
					echo "<td></td>";
					echo "<td>".$row['time']."</td>";
					echo "<td>".$row['temperature']."</td>";
					echo "<td>".$row['rain']." ml</td>";
					echo "</tr>";	
				}
			}	
	}
?> 
 
<meta charset="utf-8" /> 
<table>
    <thead>
        <tr>
			<td color="red"><?php read_device_name_MySQL($_GET["id"]);?></td>
            <td>Thời gian</td>
						<td>%PIN</td>
            <td>Lượng mưa</td>
        </tr>
    </thead>
    <tbody>
        <?php read_data_MySQL_export_excel($_GET["id"]); ?>
    </tbody>
</table>    