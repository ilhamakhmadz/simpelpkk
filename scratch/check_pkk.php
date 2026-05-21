<?php
$conn = new mysqli('localhost', 'root', '', 'pkk2023');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$res = $conn->query("SHOW TABLES LIKE 'master_dusun'");
if ($res->num_rows > 0) {
    echo "master_dusun table exists.\n";
    $res2 = $conn->query("SELECT COUNT(*) as count FROM master_dusun");
    $row = $res2->fetch_assoc();
    echo "Count: " . $row['count'] . "\n";
} else {
    echo "master_dusun table DOES NOT EXIST.\n";
}

$conn->close();
?>
