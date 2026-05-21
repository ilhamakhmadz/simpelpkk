<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');
$res = $db->query('SELECT * FROM tbl_roles');
echo "=== ROLES ===\n";
while($row = $res->fetch_assoc()) echo $row['id'].' : '.$row['name'].PHP_EOL;

echo "=== ACL ===\n";
$res = $db->query('SELECT * FROM tbl_role_permissions WHERE resource_id LIKE "sip/%"');
while($row = $res->fetch_assoc()) echo 'Role: '.$row['role_id'].' Resource: '.$row['resource_id'].PHP_EOL;
?>
