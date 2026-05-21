<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');
$res = $db->query('SHOW CREATE TABLE posyandu');
$row = $res->fetch_assoc();
echo $row['Create Table'] . ";\n\n";

$res2 = $db->query('SHOW CREATE TABLE posyandu_kegiatan');
$row2 = $res2->fetch_assoc();
echo $row2['Create Table'] . ";\n\n";
