<?php
$servername = "localhost";
$username = "hanhtrin_demo";
$password = "tQdgR1DL8e";
$dbname = "hanhtrin_demo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT `id` ,`rain` FROM demo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - rain: " . $row["rain"]. " "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
echo "PHL";
?>