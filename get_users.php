<?php
$servername = "mysql-nethunter.alwaysdata.net";
$username = "nethunter";
$password = "Rpvrnpv@123";
$dbname = "nethunter_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

$users = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($users);
?>
