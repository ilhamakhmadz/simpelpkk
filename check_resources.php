<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');
$res = $db->query("SELECT * FROM acl_resources WHERE name LIKE 'sip%'");
if($res){
    while($row = $res->fetch_assoc()) {
        echo "Resource: " . $row['name'] . "\n";
    }
} else {
    echo "Query failed: " . $db->error . "\n";
}
