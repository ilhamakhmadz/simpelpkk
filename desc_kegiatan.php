<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');
$res = $db->query("DESCRIBE posyandu_kegiatan");
if($res){
    while($row = $res->fetch_assoc()) echo $row['Field'] . ' | ' . $row['Type'] . "\n";
} else {
    echo $db->error;
}
