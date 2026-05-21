<?php
$conn = new mysqli('localhost', 'root', '', 'pkk2023');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "--- TABLES ---\n";
$res = $conn->query("SHOW TABLES");
while ($row = $res->fetch_row()) {
    echo $row[0] . "\n";
}

echo "\n--- DESCRIBE master_desa ---\n";
$res = $conn->query("DESCRIBE master_desa");
while ($row = $res->fetch_assoc()) {
    echo $row['Field'] . " - " . $row['Type'] . " - Null: " . $row['Null'] . " - Key: " . $row['Key'] . "\n";
}

echo "\n--- DESCRIBE master_kecamatan ---\n";
$res = $conn->query("DESCRIBE master_kecamatan");
while ($row = $res->fetch_assoc()) {
    echo $row['Field'] . " - " . $row['Type'] . " - Null: " . $row['Null'] . " - Key: " . $row['Key'] . "\n";
}

$conn->close();
?>
